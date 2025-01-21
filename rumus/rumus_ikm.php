<?php
include_once '../config/koneksi.php';
$pdo = Database::getConnection();

function getCurrentYearAndTriwulan() {
    $currentMonth = date('m');
    $currentYear = date('Y');

    if ($currentMonth >= 1 && $currentMonth <= 3) {
        $currentTriwulan = 'T1';
    } elseif ($currentMonth >= 4 && $currentMonth <= 6) {
        $currentTriwulan = 'T2';
    } elseif ($currentMonth >= 7 && $currentMonth <= 9) {
        $currentTriwulan = 'T3';
    } else {
        $currentTriwulan = 'T4';
    }

    return [$currentYear, $currentTriwulan];
}
function calculateIKMperTriwulan($tahun, $triwulan) {
    global $pdo;
    $questions = range(1, 27); // Array berisi nomor pertanyaan dari 1 sampai 27
    $totalIKM = [];
    $bobotIKM = 1 / 27;
    $sumWeightedAverages = 0;

    $triwulanMapping = [
        'T1' => ['start' => '01-01', 'end' => '03-31'],
        'T2' => ['start' => '04-01', 'end' => '06-30'],
        'T3' => ['start' => '07-01', 'end' => '09-30'],
        'T4' => ['start' => '10-01', 'end' => '12-31']
    ];
    $dates = $triwulanMapping[$triwulan];
    foreach ($questions as $question_id) {
        $sql = "SELECT SUM(SR.response_value) AS total_nilai_ikm
                FROM survey_responses SR
                JOIN surveys S ON SR.survey_id = S.survey_id
                JOIN survey_questions SQ ON SR.question_id = SQ.question_id
                WHERE SQ.question_id = :question_id AND S.survey_date BETWEEN :start_date AND :end_date";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'question_id' => $question_id,
            'start_date' => "$tahun-{$dates['start']}",
            'end_date' => "$tahun-{$dates['end']}"
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalIKM[$question_id] = $row['total_nilai_ikm'];
    }

    // Query untuk menghitung total responden
    $sql = "SELECT COUNT(DISTINCT R.respondent_id) AS total_respondents 
        FROM respondents R 
        JOIN surveys S ON R.respondent_id = S.respondent_id 
        WHERE S.survey_date BETWEEN :start_date AND :end_date";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'start_date' => "$tahun-{$dates['start']}",
        'end_date' => "$tahun-{$dates['end']}"
    ]);
    $rowTotalRespondents = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalRespondents = $rowTotalRespondents['total_respondents'];
    if ($totalRespondents > 0) {
        foreach ($totalIKM as $total) {
            $average = $total / $totalRespondents;
            $weightedAverage = $average * $bobotIKM;
            $sumWeightedAverages += $weightedAverage;
        }


        $iKMConversion = $sumWeightedAverages * 25;
        // Determine the category based on iKMConversion
        if ($iKMConversion >= 25.00 && $iKMConversion <= 64.99) {
            $nilai = "D (Tidak Baik)";
        } elseif ($iKMConversion >= 65.00 && $iKMConversion <= 76.00) {
            $nilai = "C (Kurang Baik)";
        } elseif ($iKMConversion >= 76.61 && $iKMConversion <= 88.30) {
            $nilai = "B (Baik)";
        } elseif ($iKMConversion >= 88.31 && $iKMConversion <= 100.00) {
            $nilai = "A (Sangat Baik)";
        } else {
            $nilai = "Nilai Triwulan ini Tidak Ditemukan ";
        }

    } else {
        $nilai = "Tidak Ada Responden";
        $iKMConversion = 0;
    }


    return [
        'iKMConversion' => $iKMConversion,
        'nilai' => $nilai,
        'totalrespondents' => $totalRespondents
    ];
}

function calculateTotalNilai($tahun, $triwulan) {
    global $pdo;
    $questions = range(1, 27);
    $totalNilai = 0;

    $triwulanMapping = [
        'T1' => ['start' => '01-01', 'end' => '03-31'],
        'T2' => ['start' => '04-01', 'end' => '06-30'],
        'T3' => ['start' => '07-01', 'end' => '09-30'],
        'T4' => ['start' => '10-01', 'end' => '12-31']
    ];
    if (!isset($triwulanMapping[$triwulan])) {
        throw new Exception("Invalid triwulan value");
    }
    $dates = $triwulanMapping[$triwulan];
    foreach ($questions as $question_id) {
        $sql = "SELECT SUM(SR.response_value) AS total_nilai_mentah
                FROM survey_responses SR
                JOIN surveys S ON SR.survey_id = S.survey_id
                JOIN survey_questions SQ ON SR.question_id = SQ.question_id
                WHERE SQ.question_id = :question_id AND S.survey_date BETWEEN :start_date AND :end_date";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'question_id' => $question_id,
            'start_date' => "$tahun-{$dates['start']}",
            'end_date' => "$tahun-{$dates['end']}"
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalNilai += $row['total_nilai_mentah'];
    }

    return $totalNilai;
}
function calculateIKMgraphperCategory($tahun, $triwulan) {
    global $pdo;

    $questionPerCategory = [
        1 => range(1, 11),
        2 => range(12, 16),
        3 => range(17, 24),
        4 => range(25, 27)
    ];

    $triwulanMapping = [
        'T1' => ['start' => '01-01', 'end' => '03-31'],
        'T2' => ['start' => '04-01', 'end' => '06-30'],
        'T3' => ['start' => '07-01', 'end' => '09-30'],
        'T4' => ['start' => '10-01', 'end' => '12-31']
    ];

    $categoryWeights = [
        1 => 1 / 11,
        2 => 1 / 5,
        3 => 1 / 8,
        4 => 1 / 3
    ];

    // Validasi triwulan
    if (!isset($triwulanMapping[$triwulan])) {
        return "Triwulan tidak valid.";
    }

    $dates = $triwulanMapping[$triwulan];
    $ikmPerCategory = [];

    foreach ($questionPerCategory as $category => $questions) {
        $totalNilaipertanyaankategori = []; // Array untuk menyimpan nilai per pertanyaan

        foreach ($questions as $question_id) {
            $sql = "SELECT SUM(SR.response_value) AS total_nilai_ikm
                    FROM survey_responses SR
                    JOIN surveys S ON SR.survey_id = S.survey_id
                    JOIN survey_questions SQ ON SR.question_id = SQ.question_id
                    WHERE SQ.question_id = :question_id AND S.survey_date BETWEEN :start_date AND :end_date";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'question_id' => $question_id,
                'start_date' => "$tahun-{$dates['start']}",
                'end_date' => "$tahun-{$dates['end']}"
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalNilaipertanyaankategori[] = isset($row['total_nilai_ikm']) ? $row['total_nilai_ikm'] : 0; // Simpan nilai ke array
            // Simpan nilai ke array
        }

        // Query untuk menghitung total responden
        $sql = "SELECT COUNT(DISTINCT R.respondent_id) AS total_respondents
                FROM respondents R
                JOIN surveys S ON R.respondent_id = S.respondent_id
                WHERE S.survey_date BETWEEN :start_date AND :end_date";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'start_date' => "$tahun-{$dates['start']}",
            'end_date' => "$tahun-{$dates['end']}"
        ]);
        $rowTotalRespondents = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalRespondents = isset($rowTotalRespondents['total_respondents']) ? $rowTotalRespondents['total_respondents'] : 0;


        if ($totalRespondents > 0) {
            // Perhitungan rata-rata dan bobot
            $sumWeightedAverages = 0;
            foreach ($totalNilaipertanyaankategori as $total) {
                $average = $total / $totalRespondents;
                $weightedAverage = $average * $categoryWeights[$category];
                $sumWeightedAverages += $weightedAverage;
            }

            $ikmConversion = $sumWeightedAverages * 25;
            // Determine the category based on iKMConversion
            if ($ikmConversion >= 25.00 && $ikmConversion <= 64.99) {
                $nilai = "D (Tidak Baik)";
            } elseif ($ikmConversion >= 65.00 && $ikmConversion <= 76.00) {
                $nilai = "C (Kurang Baik)";
            } elseif ($ikmConversion >= 76.61 && $ikmConversion <= 88.30) {
                $nilai = "B (Baik)";
            } elseif ($ikmConversion >= 88.31 && $ikmConversion <= 100.00) {
                $nilai = "A (Sangat Baik)";
            } else {
                $nilai = "Nilai Triwulan ini Tidak Ditemukan ";
            }

            $ikmPerCategory[$category] = $ikmConversion;
        } else {
            // Jika tidak ada responden
            $ikmPerCategory[$category] = 0;
            $nilai = "Tidak Ada Responden";
        }
    }

    return [
        'ikmPerCategory' => $ikmPerCategory,
        'nilai' => $nilai
    ];


}

function retrieveCategories() {
    global $pdo;
    $Categories = [1, 2, 3, 4];
    $categoryNames = [];

    foreach ($Categories as $category_id) {
        $sql = "SELECT category_name FROM survey_questions_category WHERE category_id = :category_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['category_id' => $category_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $categoryNames[] = $row['category_name'];
        }
    }

    return $categoryNames;
}
?>
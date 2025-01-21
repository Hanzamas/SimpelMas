<?php
include '../config/koneksi.php';

$pdo = Database::getConnection();

// Cek apakah respondent_id ada di POST atau GET
if (isset($_POST['respondent_id'])) {
    $respondent_id = $_POST['respondent_id'];
} elseif (isset($_GET['respondent_id'])) {
    $respondent_id = $_GET['respondent_id'];
} else {
    die("Responden atau layanan tidak ditemukan.");
}

// Mengambil service_id dari respondents
$sql = "SELECT service_id FROM respondents WHERE respondent_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$respondent_id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

// Pastikan service_id ditemukan untuk responden
if ($service) {
    $service_id = $service['service_id'];
} else {
    die("Responden atau layanan tidak ditemukan.");
}

// Ambil pertanyaan SKM dari database tanpa duplikasi
$sql = "SELECT DISTINCT question_id, question_text FROM survey_questions WHERE survey_type = 'SKM'";
$stmt = $pdo->query($sql);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Filter untuk memastikan tidak ada duplikasi question_id
$unique_question_ids = [];
$filtered_questions = [];

foreach ($questions as $question) {
    $question_id = $question['question_id'];
    $sql = "SELECT DISTINCT option_value, option_text FROM question_options WHERE question_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$question_id]);
    $options = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Hanya tambahkan pertanyaan jika question_id belum ada di $unique_question_ids
    if (!in_array($question_id, $unique_question_ids)) {
        $question['options'] = $options;
        $filtered_questions[] = $question;
        $unique_question_ids[] = $question_id;
    }
}

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['respondent_id'])) {
    // Buat survei baru di tabel surveys
    $sql = "INSERT INTO surveys (respondent_id, service_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$respondent_id, $service_id]);

    // Ambil survey_id yang baru dimasukkan
    $survey_id = $pdo->lastInsertId();

    // Simpan setiap jawaban ke tabel survey_responses
    foreach ($filtered_questions as $question) {
        $question_id = $question['question_id'];
        if (isset($_POST['question_' . $question_id])) {
            $response_value = $_POST['question_' . $question_id];

            $sql = "INSERT INTO survey_responses (survey_id, question_id, response_value) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$survey_id, $question_id, $response_value]);
        }
    }

    header("Location: survei_ipk.php?respondent_id=$respondent_id");
    exit();
}
?>
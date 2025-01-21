<?php
include_once '../config/koneksi.php';
$pdo = Database::getConnection();

function getGenderRespondentData() {
    global $pdo;
    $sql = "SELECT jenis_kelamin, COUNT(*) AS count FROM respondents GROUP BY jenis_kelamin";
    $stmt = $pdo->query($sql);
    $genderData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $genderData;
}

function getAgeRespondentData() {
    global $pdo;
    $sql = "SELECT usia, COUNT(*) AS count FROM respondents GROUP BY usia";
    $stmt = $pdo->query($sql);
    $ageData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $ageData;
}

function getEducationRespondentData() {
    global $pdo;
    $sql = "SELECT pendidikan, COUNT(*) AS count FROM respondents GROUP BY pendidikan";
    $stmt = $pdo->query($sql);
    $educationData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $educationData;
}

function getJobRespondentData() {
    global $pdo;
    $sql = "SELECT pekerjaan, COUNT(*) AS count FROM respondents GROUP BY pekerjaan";
    $stmt = $pdo->query($sql);
    $jobData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $jobData;
}

function getTotalRespondents() {
    global $pdo;
    $sql = "SELECT COUNT(*) AS total_respondents FROM respondents";
    $stmt = $pdo->query($sql);
    $totalRespondents = $stmt->fetch(PDO::FETCH_ASSOC)['total_respondents'];
    return $totalRespondents;
}
function getQuestionperCategory() {
    global $pdo;
    $sql = "SELECT survey_questions_category.category_id, survey_questions_category.category_name, COUNT(*) AS count FROM survey_questions JOIN survey_questions_category ON survey_questions_category.category_id = survey_questions.category_id GROUP BY  category_name ORDER BY category_id ";
    $stmt = $pdo->query($sql);
    $questionData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $questionData;
}
?>
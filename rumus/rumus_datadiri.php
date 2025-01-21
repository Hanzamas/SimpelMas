<?php
include '../config/koneksi.php';

$pdo = Database::getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_responden = $_POST['nama_responden'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pendidikan = $_POST['pendidikan'];
    $pekerjaan = $_POST['pekerjaan'];
    $service_id = $_POST['service_id'];

    $sql = "INSERT INTO respondents (nama_responden, alamat, no_telepon, usia, jenis_kelamin, pendidikan, pekerjaan, service_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nama_responden, $alamat, $no_telepon, $usia, $jenis_kelamin, $pendidikan, $pekerjaan, $service_id]);

    $respondent_id = $pdo->lastInsertId();
    // Redirect ke halaman survei IPK
    header("Location: ../responden/survei_ikm.php?respondent_id=" . $respondent_id);
    exit();
}

$sql = "SELECT service_id, nama_pelayanan FROM services";
$stmt = $pdo->query($sql);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
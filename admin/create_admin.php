<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan server database Anda
$dbusername = "root"; // Ganti dengan username database Anda
$dbpassword = ""; // Ganti dengan password database Anda
$dbname = "survei_kepuasan_masyarakat"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Data admin baru
$username = "adminsimpelmas"; // Ganti dengan username admin
$password = "adminsimpelmas"; // Ganti dengan password admin yang ingin Anda simpan

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk menyimpan admin baru ke database
$sql = "INSERT INTO admins (username, password_hash) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password); // Binding parameter (username, hashed_password)

// Eksekusi query
if ($stmt->execute()) {
    echo "Admin berhasil dibuat!";
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>

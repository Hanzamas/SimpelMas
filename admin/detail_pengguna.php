<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    // Jika tidak login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Koneksi ke database
$host = 'localhost';
$dbname = 'survei_kepuasan_masyarakat';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Ambil data seluruh pengguna dari tabel respondents
$sql = "SELECT * FROM respondents";
$stmt = $pdo->query($sql);
$respondents = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil informasi admin dari session
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>
    <link rel="icon" href="../image/logo5.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
        }
        .dashboard-container {
            margin: 20px auto;
            max-width: 1200px;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-body {
            font-size: 16px;
        }
        table th, table td {
            text-align: center;
        }
        .btn-back {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
        .icon-user {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- Halaman Detail Pengguna -->
<div class="dashboard-container">
    <div class="card">
        <div class="card-header">
            <span><i class="fas fa-user icon-user"></i>Daftar Pengguna</span> <!-- Ikon User ditambahkan -->
            <a href="dashboard_admin.php" class="btn-back">Kembali</a> <!-- Tombol Kembali di sebelah kanan -->
        </div>
        <div class="card-body">
            <h5 class="card-title">Semua Pengguna</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Usia</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                        <th>Service ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Menampilkan seluruh data pengguna
                    $id = 1;  // ID Pengguna otomatis mulai dari 1
                    foreach ($respondents as $respondent) { 
                    ?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo htmlspecialchars($respondent['nama_responden']); ?></td>
                            <td><?php echo htmlspecialchars($respondent['alamat']); ?></td>
                            <td><?php echo htmlspecialchars($respondent['no_telepon']); ?></td>
                            <td><?php echo htmlspecialchars($respondent['usia']); ?></td>
                            <td><?php echo htmlspecialchars($respondent['jenis_kelamin']); ?></td>
                            <td><?php echo htmlspecialchars($respondent['pendidikan']); ?></td>
                            <td><?php echo htmlspecialchars($respondent['pekerjaan']); ?></td>
                            <td><?php echo htmlspecialchars($respondent['service_id']); ?></td>
                        </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

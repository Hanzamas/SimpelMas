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

// Proses Hapus Admin
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Query untuk menghapus admin berdasarkan ID
    $sqlDelete = "DELETE FROM admins WHERE id = ?";
    $stmt = $pdo->prepare($sqlDelete);
    $stmt->execute([$delete_id]);

    // Redirect ke halaman daftar admin setelah admin dihapus
    header("Location: detail_admin.php");
    exit();
}

// Ambil data admin dari database
$sql = "SELECT * FROM admins";
$stmt = $pdo->query($sql);
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin</title>
    <link rel="icon" href="../image/logo5.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }

        .card-body {
            font-size: 16px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .d-flex {
            margin-bottom: 20px;
        }

        .btn-add-admin {
            font-size: 14px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
        }

        .btn-add-admin:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Tombol Tambah Admin -->
    <div class="d-flex justify-content-between align-items-center">
        <h3><i class="fas fa-user-shield"></i> Daftar Admin</h3>
        <a href="add_admin.php" class="btn btn-add-admin"><i class="fas fa-user-plus"></i> Tambah Admin</a>
    </div>

    <!-- Tabel Daftar Admin -->
    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-users"></i> Daftar Admin yang Terdaftar</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password Hash</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $index => $admin): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($admin['username']); ?></td>
                            <td><?php echo htmlspecialchars($admin['password_hash']); ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="edit_admin.php?id=<?php echo $admin['id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <!-- Tombol Hapus -->
                                <a href="?delete_id=<?php echo $admin['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-3">
        <a href="dashboard_admin.php" class="btn btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>

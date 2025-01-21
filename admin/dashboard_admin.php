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

// Ambil jumlah admin dari tabel admins
$sql_admin = "SELECT COUNT(*) AS total_admin FROM admins";
$stmt_admin = $pdo->query($sql_admin);
$total_admin = $stmt_admin->fetch(PDO::FETCH_ASSOC)['total_admin'];

// Ambil jumlah pengguna dari tabel respondents
$sql_users = "SELECT COUNT(*) AS total_users FROM respondents";
$stmt_users = $pdo->query($sql_users);
$total_users = $stmt_users->fetch(PDO::FETCH_ASSOC)['total_users'];

// Cek jika form disubmit untuk menambah menu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_menu'])) {
    $nama_menu = $_POST['nama_menu'];
    $url_menu = $_POST['url_menu'];

    // Insert menu baru ke tabel menu_dropdown
    $sql = "INSERT INTO menu_dropdown (nama_menu, url_menu) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nama_menu, $url_menu]);

    // Redirect setelah menambah menu
    header("Location: dashboard_admin.php");
    exit();
}

// Ambil semua menu dari tabel menu_dropdown
$sql = "SELECT * FROM menu_dropdown";
$stmt = $pdo->query($sql);
$menus = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil informasi admin dari session
$admin_id = $_SESSION['admin_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
        .welcome-message {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }
        .card-body {
            font-size: 16px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: gray;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Halaman Dashboard -->
<div class="dashboard-container">
    <div class="welcome-message">
        <h2>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Anda berhasil login sebagai Admin.</p>
    </div>

    <!-- Kartu Statistik/Info -->
    <div class="row">
        <!-- Kartu 1: Statistik Pengguna -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users"></i> Statistik Pengguna
                </div>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pengguna</h5>
                    <p class="card-text">Jumlah total pengguna saat ini: <?php echo $total_users; ?></p>
                    <a href="detail_pengguna.php" class="btn btn-primary w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        <!-- Kartu 2: Statistik Admin -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user-shield"></i> Statistik Admin
                </div>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Admin</h5>
                    <p class="card-text">Jumlah admin yang terdaftar: <?php echo $total_admin; ?></p>
                    <a href="detail_admin.php" class="btn btn-primary w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        <!-- Kartu 3: Pengaturan -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-cogs"></i> Pengaturan Sistem
                </div>
                <div class="card-body">
                    <h5 class="card-title">Pengaturan Sistem</h5>
                    <p class="card-text">Kelola pengaturan sistem</p>
                    <a href="settings.php" class="btn btn-primary w-100">Pengaturan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Menambah Menu Dropdown -->
    <div class="card mt-4">
        <div class="card-header">
            <i class="fas fa-plus"></i> Tambah Menu Dropdown
        </div>
        <div class="card-body">
            <form action="dashboard_admin.php" method="POST">
                <div class="mb-3">
                    <label for="nama_menu" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                </div>
                <div class="mb-3">
                    <label for="url_menu" class="form-label">URL Menu</label>
                    <input type="url" class="form-control" id="url_menu" name="url_menu" required>
                </div>
                <button type="submit" name="add_menu" class="btn btn-success">Tambah Menu</button>
            </form>
        </div>
    </div>

    <!-- Menampilkan Menu Dropdown -->
    <div class="card mt-4">
        <div class="card-header">
            <i class="fas fa-list"></i> Menu Dropdown
        </div>
        <div class="card-body">
            <ul class="list-group">
                <?php foreach ($menus as $menu) : ?>
                    <li class="list-group-item">
                        <a href="<?php echo htmlspecialchars($menu['url_menu']); ?>" target="_blank"><?php echo htmlspecialchars($menu['nama_menu']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Log Out Button -->
    <div class="text-center mt-4">
        <a href="../auth/logout.php" class="btn btn-danger">Log Out</a>
    </div>
</div>

</body>
</html>

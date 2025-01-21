<?php
session_start(); // Mulai session untuk mengelola status login

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database
    $servername = "localhost"; // Ganti dengan server database Anda
    $dbusername = "root"; // Ganti dengan username database Anda
    $dbpassword = ""; // Ganti dengan password database Anda
    $dbname = "survei_kepuasan_masyarakat"; // Ganti dengan nama database Anda

    // Buat koneksi ke database
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk mencari admin berdasarkan username
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql); // Persiapkan query
    $stmt->bind_param("s", $username); // Binding parameter (username)
    $stmt->execute(); // Eksekusi query
    $result = $stmt->get_result(); // Ambil hasil query
    $admin = $result->fetch_assoc(); // Ambil data admin dari hasil query

    // Verifikasi jika admin ditemukan dan password cocok
    if ($admin && password_verify($password, $admin['password_hash'])) {
        // Login berhasil, simpan informasi admin dalam session
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];

        // Redirect ke halaman dashboard_admin.php
        header("Location: dashboard_admin.php");
        exit();
    } else {
        // Login gagal, tampilkan pesan kesalahan
        $error_message = "Username atau password salah.";
    }

    // Tutup koneksi
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="icon" href="../image/logo5.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
        }

        .login-container {
            max-width: 400px;
            margin: 5% auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Menambahkan logo di dalam form */
        .login-logo {
            display: block;
            width: 100%;
            max-width: 300px; /* Ukuran logo lebih besar */
            margin: 0 auto 20px; /* Memberikan jarak antara logo dan form */
        }

        .login-container h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .login-container .form-control {
            border-radius: 20px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-container .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .login-container .btn-primary:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: gray;
            margin-top: 20px;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .alert {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- Halaman Login -->
<div class="login-container">
    <!-- Logo di dalam form -->
    <img src="../image/logo4.png" alt="Logo" class="login-logo"> <!-- Ganti dengan path logo Anda -->

    <h2>Login Admin</h2>

    <!-- Pesan kesalahan jika login gagal -->
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <!-- Username Input -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan Username">
        </div>

        <!-- Password Input -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <!-- Tombol Kembali ke Halaman Data Diri -->
    <div class="mt-3">
        <a href="../index.php" class="btn btn-primary w-100">Kembali</a>
    </div>

    <!-- Forgot Password Link (optional) -->
<!--    <div class="mt-3 text-center">-->
<!--        <a href="#">Lupa Password?</a>-->
<!--    </div>-->
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 Sistem Survei Kepuasan Masyarakat. Semua hak cipta dilindungi.</p>
</div>

<!-- Link ke Bootstrap JS dan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

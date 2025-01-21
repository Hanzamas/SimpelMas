<?php
include '../rumus/rumus_datadiri.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri Responden</title>
    <link rel="icon" href="../image/logo5.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
        }

        .navbar-brand img {
            height: 100px;
            width: auto;
        }

        .navbar-brand, .nav-link {
            color: black !important;
            font-size: 20px;
        }

        .nav-link:hover {
            color: #ffd700 !important;
        }

        .header h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .info-box {
            font-size: 1.1rem;
            background-color: #f0f9ff;
            border: 1px solid #b0e5ff;
            padding: 15px;
        }

        .form-container {
            max-width: 600px;
            margin-top: 20px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: gray;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        @media (max-width: 768px) {
            .navbar-brand img {
                height: 50px;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .btn-xl {
                padding: 20px 30px;
                font-size: 24px;
            }

            .info-box {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../image/logo4.png" alt="Logo"> <!-- Sesuaikan dengan path gambar Anda -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="data_diri.php">Survey</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="rekap.php">Rekapitulasi IKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../responden/rekap_ipk.php">Rekapitulasi IPK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="statistika.php">Statistika</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedoman.php">Pedoman</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="header text-center mb-4">
        <h1>Kuesioner Survey Kepuasan Masyarakat (SKM) & Indeks Persepsi Korupsi</h1>
    </div>

    <div class="info-box text-center rounded mb-4">
        <p>Untuk mengisi SIMPEL MAS (Sistem Informasi Kepuasan Pelayanan Masyarakat) pada KANTOR KEMENTERIAN AGAMA KABUPATEN JOMBANG. Silakan Lengkapi Formulir Data Diri Anda di bawah ini.</p>
    </div>

    <div class="form-container mx-auto bg-white shadow rounded p-4">
        <h2 class="text-center my-3">Data Diri Responden</h2>
        <form action="data_diri.php" method="POST">
            <div class="mb-3">
                <label for="service" class="form-label">Nama Layanan</label>
                <select id="service" name="service_id" class="form-select" required>
                    <option value="">-- Pilih Layanan --</option>
                    <?php foreach ($services as $service): ?>
                        <option value="<?php echo $service['service_id']; ?>"><?php echo htmlspecialchars($service['nama_pelayanan']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Responden (Opsional)</label>
                <input type="text" name="nama_responden" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No Telepon / Email</label>
                <input type="text" name="no_telepon" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Usia</label>
                <select name="usia" class="form-select">
                    <option value="di bawah 20 tahun">Di bawah 20 tahun</option>
                    <option value="21-30 tahun">21-30 tahun</option>
                    <option value="31-40 tahun">31-40 tahun</option>
                    <option value="41-50 tahun">41-50 tahun</option>
                    <option value="di atas 50 tahun">Di atas 50 tahun</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pendidikan Terakhir</label>
                <select name="pendidikan" class="form-select">
                    <option value="sekolah dasar">Sekolah Dasar</option>
                    <option value="sekolah lanjut tingkat pertama">Sekolah Lanjut Tingkat Pertama</option>
                    <option value="sekolah menengah atas">Sekolah Menengah Atas</option>
                    <option value="strata 1">Strata 1</option>
                    <option value="strata 2">Strata 2</option>
                    <option value="strata 3">Strata 3</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pekerjaan</label>
                <select name="pekerjaan" class="form-select">
                    <option value="pns,tni,polri">PNS, TNI, POLRI</option>
                    <option value="pegawai swasta">Pegawai Swasta</option>
                    <option value="wiraswasta">Wiraswasta</option>
                    <option value="pelajar atau mahasiswa">Pelajar atau Mahasiswa</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Lanjut ke Survei SKM</button>
        </form>
    </div>
</div>

<div class="footer">
    Hak cipta © 2025 Kantor Kementerian Agama Kabupaten Jombang Inc.<br>
    Seluruh hak cipta dilindungi undang-undang.<br>
    IKM dan IPK Version 3.0<br>
    Modified by Hanzamas
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
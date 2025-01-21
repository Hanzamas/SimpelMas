<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPELMAS</title>
    <link rel="icon" href="image/logo5.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
        }

        p {
            text-align: justify;
        }

        section {
            margin-top: 50px;
            margin-bottom: 50px;
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

        .btn-xl {
            padding: 30px 50px;
            font-size: 32px;
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

        .kontak .info-item i {
            color: #312f2f;
            background: #ffc451;
            font-size: 20px;
            width: 44px;
            height: 44px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 4px;
            transition: all 0.3s ease-in-out;
            margin-right: 15px;
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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm" style="z-index: 1;">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="image/logo4.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="responden/data_diri.php">Survey</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="responden/rekap.php">Rekapitulasi IKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="responden/rekap_ipk.php">Rekapitulasi IPK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="responden/statistika.php">Statistika</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="responden/pedoman.php">Pedoman</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="masthead" style="background-image: url('image/bgs.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: -1;"></div>
    <div class="container h-100" style="position: relative; z-index: 2;">
        <div class="row h-100">
            <div class="col-lg-7 my-auto">
                <div class="mx-auto header-content">
                    <h1 class="mb-4 text-white">Kuesioner Survey Kepuasan Masyarakat (SKM) & Indeks Persepsi Korupsi</h1>
                    <p class="mb-4 text-white">Kuesioner Survey Kepuasan Masyarakat (SKM) merupakan instrumen penting dalam mengukur tingkat kepuasan warga terhadap pelayanan publik. Melalui survei ini, masyarakat memiliki kesempatan untuk memberikan umpan balik yang konstruktif, sehingga dapat menciptakan lingkungan yang lebih responsif dan transparan.</p>
                    <p class="mb-4 text-white">Tekan tombol di bawah untuk mengisi survey.</p>
                    <a class="btn btn-outline-warning btn-xl" role="button" href="responden/data_diri.php" style="margin-top: 10px;">Isi Survey Sekarang!</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Features Section -->
<section id="features" class="features">
    <div class="container">
        <div class="text-center section-heading">
            <h2>Apa itu IKM dan IPAK?</h2>
            <h6 class="text-muted">Baca penjelasannya dibawah ini!</h6>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="feature-item">
                    <h3>IKM</h3>
                    <p class="text-muted">Indeks Kepuasan Masyarakat (IKM) adalah alat ukur yang digunakan untuk menilai tingkat kepuasan masyarakat terhadap kualitas layanan yang diberikan oleh instansi pemerintah atau unit pelayanan publik. IKM diperoleh melalui survei yang mengumpulkan data kuantitatif dan kualitatif mengenai pendapat masyarakat terkait berbagai aspek pelayanan, seperti persyaratan, prosedur, waktu penyelesaian, biaya, produk layanan, kompetensi petugas, perilaku petugas, penanganan pengaduan, serta sarana dan prasarana. Tujuan dari pengukuran IKM adalah untuk mengidentifikasi kelemahan atau kekurangan dalam penyelenggaraan pelayanan publik, sehingga dapat menjadi dasar bagi instansi terkait untuk melakukan perbaikan dan inovasi guna meningkatkan kualitas layanan kepada masyarakat.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-item">
                    <h3>IPAK</h3>
                    <p class="text-muted">Indeks Persepsi Korupsi (IPK), atau dalam bahasa Inggris dikenal sebagai Corruption Perceptions Index (CPI), adalah indikator yang dikembangkan oleh Transparency International untuk mengukur persepsi publik terhadap tingkat korupsi di sektor publik suatu negara. IPK menilai 180 negara dan wilayah berdasarkan persepsi tingkat korupsi, dengan skala skor dari 0 (sangat korup) hingga 100 (sangat bersih). Skor yang lebih tinggi menunjukkan tingkat korupsi yang lebih rendah. IPK disusun berdasarkan berbagai sumber data yang mencakup penilaian ahli dan survei kepada pelaku bisnis. Tujuan dari IPK adalah untuk memberikan gambaran mengenai sejauh mana korupsi dipersepsikan terjadi di sektor publik, sehingga dapat mendorong upaya pemberantasan korupsi dan peningkatan transparansi serta akuntabilitas pemerintahan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- IPK Section -->
<section class="text-center bg-primary bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-heading" style="margin-top: 20px">Index Persepsi Korupsi Indonesia 2022</h2>
                <hr>
                <p>Menurut laporan Transparency International Indonesia, IPK Indonesia pada tahun 2022 berada di skor 34/100, menempatkan Indonesia pada peringkat 110 dari 180 negara yang disurvei. Skor ini menunjukkan bahwa Indonesia masih menghadapi tantangan serius dalam upaya pemberantasan korupsi di sektor publik.</p>
            </div>
        </div>
    </div>
</section>

<!-- Survey Section -->
<section style="background: linear-gradient(to left, #7b4397, #dc2430);">
    <div class="content-wrapper d-flex align-items-center justify-content-center" style="height: 100%;">
        <div class="container text-center text-white">
            <h3 class="display-6" style="margin-top: 10px">Kenapa Harus Mengisi Survey?</h3>
            <hr>
            <p>Mengisi survei IKM (Indeks Kepuasan Masyarakat) dan IPAK (Indeks Persepsi Anti-Korupsi) sangat penting untuk membantu pemerintah mengevaluasi kualitas pelayanan publik dan tingkat integritas dalam birokrasi. Survei IKM dirancang untuk mengukur kepuasan masyarakat terhadap layanan publik yang diberikan, termasuk aspek waktu tunggu, biaya, dan perilaku petugas. Data yang dikumpulkan membantu pemerintah mengidentifikasi masalah dan meningkatkan kualitas pelayanan agar lebih sesuai dengan kebutuhan masyarakat. Sementara itu, survei IPAK menggambarkan persepsi masyarakat terhadap korupsi di sektor publik dan berfungsi sebagai bahan evaluasi untuk memperkuat upaya pemberantasan korupsi.</p>
            <p>Melalui survei ini, masyarakat diberikan kesempatan untuk menyuarakan pengalaman, opini, dan masukan mereka terhadap layanan yang mereka terima. Hal ini memastikan partisipasi aktif masyarakat dalam menciptakan tata kelola yang lebih baik dan transparan. Hasil survei digunakan sebagai dasar dalam pengambilan kebijakan publik berbasis data, sehingga menghasilkan langkah-langkah perbaikan yang relevan dan efektif. Selain itu, survei IPAK turut membantu meningkatkan kepercayaan publik terhadap upaya pemberantasan korupsi dan reformasi birokrasi.</p>
            <p>Partisipasi dalam survei ini memiliki dampak jangka panjang, seperti peningkatan standar pelayanan, keberlanjutan reformasi birokrasi, dan pemantauan progres pemerintah. Di sisi lain, hasil survei IPAK juga dapat memperbaiki citra negara di mata internasional terkait transparansi dan integritas. Oleh karena itu, mengisi survei IKM dan IPAK tidak hanya membantu menciptakan pelayanan publik yang lebih baik, tetapi juga menjamin kepuasan dan perlindungan hak masyarakat secara keseluruhan.</p>
            <h2 class="mb-4">Tunggu apa lagi.<br>Ayo Isi Survey.<br></h2>
            <a class="btn btn-outline-warning btn-xl" role="button" href="responden/data_diri.php" style="margin-bottom: 20px">Isi Survey!</a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="kontak" class="kontak section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Hubungi Kami</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.899587623964!2d112.2235603!3d-7.5578913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78403d4c7bf751%3A0xe2324a9eba7c84c7!2sKemenag%20Jombang!5e0!3m2!1sen!2sid!4v1693556879483!5m2!1sen!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Alamat</h3>
                        <p>Jl. Bupati R.Soedirman No.26 Jombang</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Telepon</h3>
                        <p>0321-861321</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email</h3>
                        <p>kemenagkabjombang@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<div class="footer">
    Hak cipta © 2025 Kantor Kementerian Agama Kabupaten Jombang Inc.<br>
    Seluruh hak cipta dilindungi undang-undang.<br>
    IKM dan IPK Version 3.0<br>
    Modified by Hanzamas
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
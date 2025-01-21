<?php

include '../rumus/rumus_ikm.php';
//echo $_POST['tahun'];
//echo $_POST['triwulan'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['tahun']) && !empty($_POST['triwulan'])) {
    $selectedYear = $_POST['tahun'];
    $selectedTriwulan = $_POST['triwulan'];
} else {
    list($selectedYear, $selectedTriwulan) = getCurrentYearAndTriwulan();
}

$iKM = calculateIKMperTriwulan($selectedYear, $selectedTriwulan);
$totalNilai = calculateTotalNilai($selectedYear, $selectedTriwulan);
$iKMConversion = $iKM['iKMConversion'];
$nilai = $iKM['nilai'];
$totalRespondents = $iKM['totalrespondents'];
$totalNilaiSemua = $totalNilai;
$ikmPerCategory = calculateIKMgraphperCategory($selectedYear, $selectedTriwulan);
$hasilperkategori = $ikmPerCategory['ikmPerCategory'];
$nilaiperkategori = $ikmPerCategory['nilai'];
$categoryNames = retrieveCategories();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Rekap IKM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="../image/logo5.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h2 {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #343a40;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
            margin-top: 30px;
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
        .centered-box {
            text-align: center;
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 15px;
            margin: 15px;
            display: inline-block;
            font-size: 16pt;
            font-weight: bold;
            background-color: #e9ecef;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            min-width: 300px;
        }

        .centered-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            background-color: #f8f9fa;
            border-color: #0056b3;
        }

        .stats-wrapper {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .stats-container {
            padding: 30px;
            margin: 30px 0;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .stats-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        .rata-rata-box {
            font-size: 48px;
            color: #007bff;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, text-shadow 0.3s ease;
            cursor: pointer;
        }

        .rata-rata-box:hover {
            transform: translateY(-10px); /* Posisi naik */
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan lebih jelas */
        }

        .kategori-box {
            font-size: 32px;
            padding: 15px 30px;
            background-color:rgb(219, 170, 10);
            color: white;
            border-radius: 10px;
            display: inline-block;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stats-label {
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .kategori-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0,0,0,0.15);
        }
        .footer {
            margin-top: 50px;
            text-align: center;
        }
        .chart-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        .chart-box {
            text-align: center;
            border-color: #0056b3;
            border-radius: 8px;
            padding: 15px;
            margin: 15px;
            display: inline-block;
            font-size: 16pt;
            font-weight: bold;
            background-color: #f8f9fa;

            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            min-width: 700px;
            width: 100%; /* Ensure it takes the full width of the container */
            max-width: 700px; /* Optional: Set a max-width to match the stats box */
        }
        .chart-box:hover {
            transform: translateY(-8px);

            background-color: #f8f9fa;
            border-color: #0056b3;
        }
        .table-container {
            text-align: center;

            border-radius: 8px;
            padding: 15px;
            margin: 15px;
            display: inline-block;
            font-size: 16pt;

            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
            max-width: 700px;
        }

        .table-container:hover {
            transform: translateY(-8px);
            background-color: #f8f9fa;
            border-color: #0056b3;
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
        .footer {
            text-align: center;
            font-size: 12px;
            color: gray;
            margin-top: auto;
            padding: 10px 0;
            background-color: #f0f4f8;
        }

    </style>
</head>
<body>

<!-- Navbar -->
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
                    <a class="nav-link " aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="data_diri.php">Survey</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="rekap.php">
                        Rekapitulasi IKM
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="../responden/rekap_ipk.php">
                        Rekapitulasi IPK
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="statistika.php" >
                        Statistika
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedoman.php">Pedoman</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h2>Data Rekapitulasi IKM</h2>
    <!-- Form untuk memilih Tahun dan Triwulan -->
    <form action="" method="POST" class="mb-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="triwulan" class="form-label">Triwulan</label>
                <select id="triwulan" name="triwulan" class="form-control">
                    <option value="T1" <?php echo ($selectedTriwulan == 'T1') ? 'selected' : ''; ?>>Triwulan 1</option>
                    <option value="T2" <?php echo ($selectedTriwulan == 'T2') ? 'selected' : ''; ?>>Triwulan 2</option>
                    <option value="T3" <?php echo ($selectedTriwulan == 'T3') ? 'selected' : ''; ?>>Triwulan 3</option>
                    <option value="T4" <?php echo ($selectedTriwulan == 'T4') ? 'selected' : ''; ?>>Triwulan 4</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tahun" class="form-label">Tahun</label>
                <select id="tahun" name="tahun" class="form-control">
                    <option value="2025" <?php echo ($selectedYear == '2025') ? 'selected' : ''; ?>>2025</option>
                    <option value="2026" <?php echo ($selectedYear == '2026') ? 'selected' : ''; ?>>2026</option>
                    <option value="2027" <?php echo ($selectedYear == '2027') ? 'selected' : ''; ?>>2027</option>
                    <option value="2028" <?php echo ($selectedYear == '2028') ? 'selected' : ''; ?>>2028</option>
                    <option value="2029" <?php echo ($selectedYear == '2029') ? 'selected' : ''; ?>>2029</option>
                    <option value="2030" <?php echo ($selectedYear == '2030') ? 'selected' : ''; ?>>2030</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>
    <div class="flex-container">
        <div class="stats-container">
            <div>
                <div class="stats-label">Rata-Rata Nilai Keseluruhan</div>
                <div class="rata-rata-box">
                    <strong><?php echo number_format($iKMConversion, 0); ?></strong>
                </div>
                <div class="stats-label">Nilai</div>
                <div class="kategori-box">
                    <strong><?php echo $nilai; ?></strong>
                </div>
            </div>
            <div class="stats-wrapper">
                <div class="centered-box">
                    <strong>Jumlah Responden: </strong><?php echo $totalRespondents; ?>
                </div>
                <div class="centered-box">
                    <strong>Total Nilai Keseluruhan: </strong><?php echo number_format($totalNilaiSemua, 0, '', ','); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-container">
        <div class="chart-box">
            <canvas id="ikmCategoryChart" width="800" height="800"></canvas>
        </div>
    </div>
    <div class="chart-container">
        <div class="table-container">
            <table class="table  table-hover table-striped">
                <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nilai Kategori</th>
                    <th>Kategori Grade</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categoryNames as $index => $categoryName): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $categoryName; ?></td>
                        <td><?php echo number_format($hasilperkategori[$index + 1], 2); ?></td>
                         <td><?php
                             if ($nilaiperkategori == "Tidak Ada Responden") {
                                 echo "Tidak Ada Grade";
                             } else {
                                 echo $nilaiperkategori;
                             }
                             ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="footer">
    Hak cipta © 2025 Kantor Kementerian Agama Kabupaten Jombang Inc.<br>
    Seluruh hak cipta dilindungi undang-undang.<br>
    IKM dan IPK Version 3.0<br>
    Modified by Hanzamas
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const ctx = document.getElementById('ikmCategoryChart').getContext('2d');
    const ikmCategoryChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($categoryNames); ?>,
            datasets: [{
                label: 'Nilai IKM per Kategori',
                data: <?php echo json_encode(array_values($hasilperkategori)); ?>,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
<?php
include '../rumus/rumus_statistika.php';

$respondentgender = getGenderRespondentData();
$genders = [];
$counts = [];
foreach ($respondentgender as $data) {
    $genders[] = $data['jenis_kelamin'];
    $counts[] = $data['count'];
}

$respondentAge = getAgeRespondentData();
$ages = [];
$ageCounts = [];
foreach ($respondentAge as $data) {
    $ages[] = $data['usia'];
    $ageCounts[] = $data['count'];
}

$respondentEducation = getEducationRespondentData();
$educations = [];
$educationCounts = [];
foreach ($respondentEducation as $data) {
    $educations[] = $data['pendidikan'];
    $educationCounts[] = $data['count'];
}

$respondentJob = getJobRespondentData();
$jobs = [];
$jobCounts = [];
foreach ($respondentJob as $data) {
    $jobs[] = $data['pekerjaan'];
    $jobCounts[] = $data['count'];
}

$totalRespondents = getTotalRespondents();

$categoryQuestions = getQuestionperCategory();
$categories = [];
$questionCounts = [];
foreach ($categoryQuestions as $data) {
    $categories[] = $data['category_name'];
    $questionCounts[] = $data['count'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistika Responden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="../image/logo5.png" type="image/png">
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

        .header h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .rata-rata {
            font-size: 64pt;
            text-align: center;
            color: #007bff;
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .kategori {
            font-size: 20pt;
            text-align: center;
            color: #28a745;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .centered-box {
            text-align: center;
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 15px;
            margin-top: 10px;
            display: inline-block;
            font-size: 16pt;
            font-weight: bold;
            background-color: #e9ecef;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .centered-box:hover {
            transform: translateY(-5px);
            box-shadow: 6px 6px 15px rgba(0, 0, 0, 0.2);
        }

        .input-group {
            max-width: 500px;
            margin: 0 auto 20px;
        }

        table, th, td {
            text-align: center;
        }

        table {
            margin: 0 auto;
            width: 80%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            overflow: hidden;
            background-color: #ffffff;
        }

        th {
            background-color: #007bff;
            color: black;
            font-size: 18px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        td {
            font-size: 16px;
            color: #495057;
        }

        #myInput {
            border: 2px solid #007bff;
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #myInput:focus {
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            text-align: center;
            flex-wrap: wrap;
        }

        .chart-container {
            max-width: 400px;
            flex: 1 1 100%;
        }

        @media (min-width: 768px) {
            .chart-container {
                flex: 1 1 45%;
            }
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

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../image/logo4.png" alt="Logo">
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
<section class="header">
    <div class="container">
        <h2>Statistika Responden</h2>
    </div>
</section>
<hr>
<div class="container">
    <div class="flex-container">
        <div class="chart-container">
            <h4>Jumlah Responden Menurut Jenis Kelamin</h4>
            <canvas id="genderChart" width="400" height="400"></canvas>
        </div>
        <div class="chart-container">
            <h4>Jumlah Responden Menurut Usia</h4>
            <canvas id="ageChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="flex-container">
        <div class="chart-container">
            <h4>Jumlah Responden Menurut Pendidikan</h4>
            <canvas id="educationChart" width="400" height="400"></canvas>
        </div>
        <div class="chart-container">
            <h4>Jumlah Responden Menurut Pekerjaan</h4>
            <canvas id="jobChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="flex-container">
        <div class="chart-container">
            <h4>Jumlah Responden Keseluruhan</h4>
            <canvas id="respondentsChart" width="400" height="400"></canvas>
        </div>
        <div class="chart-container">
            <h4>Jumlah Pertanyaan per Kategori</h4>
            <canvas id="categoryChart" width="400" height="400"></canvas>
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
    const genderLabels = <?php echo json_encode($genders); ?>;
    const genderData = {
        labels: genderLabels,
        datasets: [{
            label: 'Jumlah Responden',
            data: <?php echo json_encode($counts); ?>,
            backgroundColor: ['#007bff'],
            borderWidth: 1
        }]
    };

    const genderConfig = {
        type: 'bar',
        data: genderData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const genderChart = new Chart(
        document.getElementById('genderChart'),
        genderConfig
    );

    const ageLabels = <?php echo json_encode($ages); ?>;
    const ageData = {
        labels: ageLabels,
        datasets: [{
            label: 'Jumlah Responden',
            data: <?php echo json_encode($ageCounts); ?>,
            backgroundColor: '#ffc107',
            borderWidth: 1
        }]
    };

    const ageConfig = {
        type: 'bar',
        data: ageData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const ageChart = new Chart(
        document.getElementById('ageChart'),
        ageConfig
    );

    const educationLabels = <?php echo json_encode($educations); ?>;
    const educationData = {
        labels: educationLabels,
        datasets: [{
            label: 'Jumlah Responden',
            data: <?php echo json_encode($educationCounts); ?>,
            backgroundColor: ['#dc3545'],
            borderWidth: 1
        }]
    };

    const educationConfig = {
        type: 'bar',
        data: educationData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const educationChart = new Chart(
        document.getElementById('educationChart'),
        educationConfig
    );

    const jobLabels = <?php echo json_encode($jobs); ?>;
    const jobData = {
        labels: jobLabels,
        datasets: [{
            label: 'Jumlah Responden',
            data: <?php echo json_encode($jobCounts); ?>,
            backgroundColor: ['#28a745'],
            borderWidth: 1
        }]
    };

    const jobConfig = {
        type: 'bar',
        data: jobData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const jobChart = new Chart(
        document.getElementById('jobChart'),
        jobConfig
    );

    const respondentsData = {
        labels: ['Jumlah Responden Keseluruhan'],
        datasets: [{
            label: 'Jumlah Responden',
            data: [<?php echo $totalRespondents; ?>],
            backgroundColor: ['#17a2b8'],
            borderWidth: 1
        }]
    };

    const respondentsConfig = {
        type: 'bar',
        data: respondentsData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const respondentsChart = new Chart(
        document.getElementById('respondentsChart'),
        respondentsConfig
    );

    const categoryLabels = <?php echo json_encode($categories); ?>;
    const categoryData = {
        labels: categoryLabels,
        datasets: [{
            label: 'Jumlah Pertanyaan',
            data: <?php echo json_encode($questionCounts); ?>,
            backgroundColor: ['#6c757d'],
            borderWidth: 1
        }]
    };

    const categoryConfig = {
        type: 'bar',
        data: categoryData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const categoryChart = new Chart(
        document.getElementById('categoryChart'),
        categoryConfig
    );

</script>
</body>
</html></html>
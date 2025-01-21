<?php
include '../rumus/rumus_surveiipk.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey IPK</title>
    <link rel="icon" href="../image/logo5.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:  #f0f4f8;
        }

        .card {
            border: none;
            border-radius: 12px;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        .survey-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-check-label {
            font-size: 1em;
            cursor: pointer;
            margin-right: 10px;
        }

        .label-sad {
            color: #f44336;
        }

        .label-neutral {
            color: #9e9e9e;
        }

        .label-happy {
            color: #4caf50;
        }

        .label-joyful {
            color: #ffeb3b;
        }

        button {
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
            margin-top: 30px;
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

<div class="container mt-5">
    <h2 class="text-center mb-4">Survei Indeks Perspeksi anti Korupsi (IPK)</h2>

    <div class="card shadow-sm">
        <form action="survei_ipk.php?respondent_id=<?php echo $respondent_id; ?>" method="POST">
            <?php foreach ($filtered_questions as $question): ?>
                <h5><?php echo htmlspecialchars($question['question_text']); ?><br></h5>
                <?php foreach ($question['options'] as $option): ?>
                    <label><input type="radio" name="question_<?php echo $question['question_id']; ?>" value="<?php echo $option['option_value']; ?>" required> <?php echo htmlspecialchars($option['option_text']); ?></label> <br>
                <?php endforeach; ?>
                <br>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary w-100">Kirim Survei</button>
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
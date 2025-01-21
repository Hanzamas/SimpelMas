<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/logo5.png" type="image/png">
    <title>Terima Kasih</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main Content Area */
        .container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: auto;
        }

        h1 {
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 30px;
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

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            font-size: 12px;
            color: gray;
            margin-top: auto;
            padding: 10px 0;
            background-color: #f0f4f8;
        }

        /* Responsiveness */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
                max-width: 90%;
            }

            h1 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
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

<div class="container">
    <h1>Terima Kasih Telah Mengikuti Survei</h1>
    <p>Data Anda telah berhasil disimpan. Terima kasih atas partisipasi Anda dalam survei ini.</p>
    <a href="data_diri.php">
        <button type="button">Kembali</button>
    </a>
</div>

<div class="footer">
    Hak cipta © 2025 Kantor Kementerian Agama Kabupaten Jombang Inc.<br>
    Seluruh hak cipta dilindungi undang-undang.<br>
    IKM dan IPK Version 3.0<br>
    Modified by Hanzamas
</div>

</body>
</html>

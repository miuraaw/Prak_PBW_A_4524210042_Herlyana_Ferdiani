<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - LaraPress</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", sans-serif;
            background: #f3e8ff;
            color: #4c3a5d;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 650px;
            padding: 45px;
            text-align: center;
            background: white;
            border-radius: 30px;
            box-shadow: 0 15px 35px rgba(126, 87, 160, 0.15);
        }

        .emoji {
            font-size: 50px;
        }

        h1 {
            color: #8e6bbf;
            margin-bottom: 20px;
        }

        .description {
            background: #f0e1fa;
            padding: 22px;
            border-radius: 20px;
            line-height: 1.7;
            color: #70527f;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            background: #cdb4db;
            color: white;
            padding: 13px 22px;
            border-radius: 15px;
            font-weight: 600;
            transition: 0.3s;
        }

        a:hover {
            background: #a98bc4;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="emoji">🌷💜🌷</div>

        <h1>Tentang LaraPress</h1>

        <div class="description">
            <p>
                LaraPress adalah sebuah proyek blog sederhana
                yang dibuat untuk mempelajari dasar-dasar
                framework Laravel 12.
            </p>
        </div>

        <a href="/">🏠 Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
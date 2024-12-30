<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkında</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .about-container {
            max-width: 800px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }
        .about-header img {
            width: 200px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .team-list {
            margin-top: 20px;
        }
        .btn-home {
            display: inline-block;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="about-container">
        <div class="about-header">
            <img src="<?php echo base_url('yksss.webp'); ?>" alt="Hakkında">
            <h1>Hakkında</h1>
        </div>
        <p>Biz, Gönen'de okuyan bir grup öğrenci olarak CodeIgniter kullanarak bu projeyi geliştirdik. Amacımız, YKS öğrencilerine tercih sürecinde rehberlik etmek ve bilinçli tercihler yapmalarına destek olmaktır.</p>
        <div class="team-list">
            <h2>Takım Üyeleri</h2>
            < class="list-group">
                <li class="list-group-item">Eyüp Han Çiçek (2313201051)</li>
                <li class="list-group-item">Duygu Beyza Esği (2313201034)</li>
                <li class="list-group-item">Yusuf Gül (2313201031)</li>
                <li class="list-group-item">Rıdvan Yusuf Ceviz (2313201040)</li>
            </ul>
        </div>
        <a href="<?php echo site_url('/'); ?>" class="btn btn-primary btn-home">Ana Sayfaya Dön</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

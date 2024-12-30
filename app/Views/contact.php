<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .contact-container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .contact-header {
            text-align: center;
        }
        .contact-header img {
            width: 100px;
            margin-bottom: 15px;
        }
        .contact-info {
            margin-top: 20px;
        }
        .btn-home {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-header">
            <img src="<?php echo base_url('ykssss.webp'); ?>" alt="İletişim">
            <h1>İletişim</h1>
        </div>
        <p>Bize ulaşmak için aşağıdaki bilgileri kullanabilirsiniz:</p>
        <div class="contact-info">
            <ul class="list-group">
                <li class="list-group-item">Email: <a href="mailto:ykstercih@gmail.com">ykstercih@gmail.com</a></li>
                <li class="list-group-item">Telefon: <a href="tel:+905428469609">+90 542 846 9609</a></li>
            </ul>
        </div>
        <a href="<?php echo site_url('/'); ?>" class="btn btn-primary btn-home">Ana Sayfaya Dön</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

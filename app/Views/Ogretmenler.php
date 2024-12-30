<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğretmenler</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            margin-bottom: 20px;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">YKS Tercih Rehberi</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?php if ($user != 'Ziyaretçi'): ?>
                            <span class="navbar-text">Hoşgeldiniz, <?= $user ?>!</span>
                        <?php else: ?>
                            <span class="navbar-text">Ziyaretçi olarak giriş yapılmıştır.</span>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center">Öğretmenler Sayfası</h1>
        <p class="text-center">Bu sayfada öğretmenler hakkında bilgiler yer alacaktır.</p>
        <div class="text-center">
            <a href="/login" class="btn btn-primary">Giriş Yap</a>
        </div>
        <div class="text-center mt-4">
            <a href="javascript:history.back()" class="btn btn-secondary">Geri Dön</a>
        </div>
    </div>
</body>
</html>

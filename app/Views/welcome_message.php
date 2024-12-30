<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YKS Tercih Rehberi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        #hero img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .section-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #007bff;
        }
        #about, #tips, #contact {
            margin-top: 50px;
            padding: 30px;
            border-radius: 10px;
            background: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        footer {
            background: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
        .hero-text h2 {
            color: #0056b3;
        }
        .auth-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
    </style>
</head>
<body>
<header class="bg-primary text-white py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center">YKS Tercih Rehberi</h1>
            <div class="auth-buttons">
                <?php if (session()->get('logged_in')): ?>
                    <span class="navbar-text">Hoşgeldiniz, <?= htmlspecialchars(session()->get('name'), ENT_QUOTES, 'UTF-8') ?>!</span>
                    <form action="<?= site_url('logout') ?>" method="post" style="display: inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm">Çıkış Yap</button>
                    </form>
                <?php else: ?>
                    <a href="<?= site_url('login') ?>" class="btn btn-light btn-sm">Giriş Yap</a>
                    <a href="<?= site_url('register') ?>" class="btn btn-outline-light btn-sm">Kayıt Ol</a>
                <?php endif; ?>
            </div>
        </div>
        <nav class="nav justify-content-center mt-3">
            <a href="home/about2" class="nav-link text-white">Hakkında</a>
            <a href="home/tips" class="nav-link text-white">İpuçları</a>
            <a href="home/contact" class="nav-link text-white">İletişim</a>
            <a href="home/ogretmenler" class="nav-link text-white">Öğretmenler</a>
        </nav>
    </div>
</header>

    <main class="container my-4">
        <!-- Hero Section -->
        <section id="hero">
            <img src="ykss.webp" alt="YKS Tercih" class="img-fluid rounded shadow">
            <div class="hero-text text-center">
                <h2 class="mt-4">Doğru Tercihlerle Geleceğe Adım Atın</h2>
                <p>YKS tercih sürecinde uzman rehberliğimizle yanınızdayız.</p>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="shadow">
            <h2 class="section-title">Hakkında</h2>
            <p>YKS, yükseköğretim kurumlarına girişte önemli bir adım. Bu süreçte öğrencilerin en iyi tercihi yapmasına yardımcı olmak için rehberlik sağlıyoruz. Tercihlerinizi doğru analiz etmek ve geçmiş yılların verilerini incelemek, başarıya giden yolda önemli adımlardır.</p>
        </section>

        <!-- Tips Section -->
        <section id="tips" class="shadow">
            <h2 class="section-title">İpuçları</h2>
            <ul class="list-group">
                <li class="list-group-item">Tercihlerinizi iyi analiz edin.</li>
                <li class="list-group-item">Geçmiş yılların başarı sıralarını inceleyin.</li>
                <li class="list-group-item">İlgilendiğiniz bölümleri detaylı araştırın.</li>
                <li class="list-group-item">Hedeflerinize uygun üniversiteleri değerlendirin.</li>
            </ul>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="shadow">
            <h2 class="section-title">İletişim</h2>
            <p>Bizimle iletişime geçmek için aşağıdaki bilgileri kullanabilirsiniz:</p>
            <ul>
                <li>Email: <a href="mailto:ykstercih@gmail.com">ykstercih@gmail.com</a></li>
                <li>Telefon: +90 542 846 9609</li>
                <li>Sosyal Medya: <a href="#">@YKSTercih</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 YKS Tercih Rehberi. Tüm Hakları Saklıdır.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
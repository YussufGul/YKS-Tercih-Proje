<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Giriş Yap</h2>
        <?php if(session()->getFlashdata('error')):?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('message')):?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif;?>
        <form method="post" action="<?= site_url('auth/login') ?>">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= set_value('email') ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
        </form>
        <p class="text-center mt-3">Hesabınız yok mu? <a href="<?= site_url('register') ?>">Kayıt Ol</a></p>
    </div>
</body>
</html>

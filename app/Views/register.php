<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Kayıt Ol</h2>
        
        <!-- Hata Mesajları -->
        <?php if(session()->getFlashdata('error')):?>
            <?php 
                $errors = session()->getFlashdata('error');
                if(is_array($errors)) {
                    foreach($errors as $error) {
                        echo '<div class="alert alert-danger">'.esc($error).'</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">'.esc($errors).'</div>';
                }
            ?>
        <?php endif;?>

        <!-- Başarı Mesajları -->
        <?php if(session()->getFlashdata('message')):?>
            <div class="alert alert-success"><?= esc(session()->getFlashdata('message')) ?></div>
        <?php endif;?>

        <!-- Doğrulama Hataları -->
        <?php if(isset($validation)):?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif;?>

        <form method="post" action="<?= site_url('auth/register') ?>">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="name" class="form-label">Adınız</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?= set_value('name') ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= set_value('email') ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kayıt Ol</button>
        </form>
        <p class="text-center mt-3">Hesabınız var mı? <a href="<?= site_url('login') ?>">Giriş Yap</a></p>
    </div>
</body>
</html>

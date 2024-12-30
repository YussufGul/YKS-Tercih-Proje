<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Paneli</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="navbar-text">Hoşgeldiniz, <?= session()->get('username') ?>!</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('logout') ?>">Çıkış Yap</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if(session()->getFlashdata('success')):?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif;?>
        <h1>Öğretmenler Yönetimi</h1>
        <a href="<?= site_url('admin/create') ?>" class="btn btn-primary mb-3">Öğretmen Ekle</a>
        <?php if(empty($teachers)): ?>
            <p>Hiç öğretmen eklenmemiş.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>E-posta</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($teachers as $teacher): ?>
                        <tr>
                            <td><?= esc($teacher['id']) ?></td>
                            <td><?= esc($teacher['name']) ?></td>
                            <td><?= esc($teacher['email']) ?></td>
                            <td>
                                <a href="<?= site_url('admin/edit/'.$teacher['id']) ?>" class="btn btn-warning btn-sm">Düzenle</a>
                                <a href="<?= site_url('admin/delete/'.$teacher['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?');">Sil</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğretmen Ekle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Öğretmen Ekle</h2>
        <form method="post" action="<?= site_url('admin/store') ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Öğretmen Adı</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?= set_value('name') ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= set_value('email') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Öğretmen Ekle</button>
            <a href="<?= site_url('admin') ?>" class="btn btn-secondary">İptal</a>
        </form>
    </div>
</body>
</html>

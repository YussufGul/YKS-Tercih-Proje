<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğretmen Düzenle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Öğretmen Düzenle</h2>
        <form method="post" action="<?= site_url('admin/update/'.$teacher['id']) ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Öğretmen Adı</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?= esc($teacher['name']) ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= esc($teacher['email']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <a href="<?= site_url('admin') ?>" class="btn btn-secondary">İptal</a>
        </form>
    </div>
</body>
</html>

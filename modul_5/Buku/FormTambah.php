<?php
require_once '../Model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = new Model('buku', 'id_buku');
    $model->create([
        'judul_buku' => $_POST['judul_buku'],
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit']
    ]);
    header('Location: Buku.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Tambah Buku</h2>
    <form method="POST">
        Judul: <input type="text" name="judul_buku" required><br>
        Penulis: <input type="text" name="penulis" required><br>
        Penerbit: <input type="text" name="penerbit" required><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
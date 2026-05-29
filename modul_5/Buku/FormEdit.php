<?php
require_once '../Model.php';
$model = new Model('buku', 'id_buku');
$id = $_GET['id'] ?? null;
$buku = $model->find((int)$id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->update((int)$id, [
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
    <h2>Edit Buku</h2>
    <form method="POST">
        Judul: <input type="text" name="judul_buku" value="<?= htmlspecialchars($buku['judul_buku']) ?>" required><br>
        Penulis: <input type="text" name="penulis" value="<?= htmlspecialchars($buku['penulis']) ?>" required><br>
        Penerbit: <input type="text" name="penerbit" value="<?= htmlspecialchars($buku['penerbit']) ?>" required><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
<?php
require_once '../Model.php';
$model = new Model('buku', 'id_buku');

if (isset($_GET['delete'])) {
    $model->delete((int)$_GET['delete']);
    header('Location: Buku.php');
    exit;
}
$bukuList = $model->all();
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Data Buku</h2>
    <a href="FormTambah.php">Tambah Buku</a> | <a href="../index.php">Kembali</a>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Aksi</th></tr>
        <?php foreach ($bukuList as $row): ?>
        <tr>
            <td><?= $row['id_buku'] ?></td>
            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
            <td><?= htmlspecialchars($row['penulis']) ?></td>
            <td><?= htmlspecialchars($row['penerbit']) ?></td>
            <td><?= $row['tahun_terbit'] ?></td>
            <td>
                <a href="FormEdit.php?id=<?= $row['id_buku'] ?>">Edit</a> | 
                <a href="?delete=<?= $row['id_buku'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
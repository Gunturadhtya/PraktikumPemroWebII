<?php
require_once '../Model.php';
$model = new Model('peminjaman', 'id_peminjaman');

if (isset($_GET['delete'])) {
    $model->delete((int)$_GET['delete']);
    header('Location: Peminjaman.php');
    exit;
}

$sql = "SELECT p.*, m.nama_member, b.judul_buku 
        FROM peminjaman p 
        JOIN member m ON p.id_member = m.id_member 
        JOIN buku b ON p.id_buku = b.id_buku";
$peminjamanList = $model->query($sql);
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Data Peminjaman</h2>
    <a href="FormTambah.php">Tambah Peminjaman</a> | <a href="../index.php">Kembali</a>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Member</th><th>Buku</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Aksi</th></tr>
        <?php foreach ($peminjamanList as $row): ?>
        <tr>
            <td><?= $row['id_peminjaman'] ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
            <td><?= $row['tgl_pinjam'] ?></td>
            <td><?= $row['tgl_kembali'] ?: 'Belum Kembali' ?></td>
            <td>
                <a href="FormEdit.php?id=<?= $row['id_peminjaman'] ?>">Edit</a> | 
                <a href="?delete=<?= $row['id_peminjaman'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
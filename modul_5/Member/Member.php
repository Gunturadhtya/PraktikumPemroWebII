<?php
require_once '../Model.php';
$model = new Model('member', 'id_member');

if (isset($_GET['delete'])) {
    $model->delete((int)$_GET['delete']);
    header('Location: Member.php');
    exit;
}
$memberList = $model->all();
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Data Member</h2>
    <a href="FormTambah.php">Tambah Member</a> | <a href="../index.php">Kembali</a>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Nama</th><th>Nomor</th><th>Alamat</th><th>Mendaftar</th><th>Terakhir Bayar</th><th>Aksi</th></tr>
        <?php foreach ($memberList as $row): ?>
        <tr>
            <td><?= $row['id_member'] ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['nomor_member']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= $row['tgl_mendaftar'] ?></td>
            <td><?= $row['tgl_terakhir_bayar'] ?></td>
            <td>
                <a href="FormEdit.php?id=<?= $row['id_member'] ?>">Edit</a> | 
                <a href="?delete=<?= $row['id_member'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
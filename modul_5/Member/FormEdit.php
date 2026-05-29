<?php
require_once '../Model.php';
$model = new Model('member', 'id_member');
$id = $_GET['id'] ?? null;
$member = $model->find((int)$id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->update((int)$id, [
        'nama_member' => $_POST['nama_member'],
        'nomor_member' => $_POST['nomor_member'],
        'alamat' => $_POST['alamat'],
        'tgl_mendaftar' => $_POST['tgl_mendaftar'],
        'tgl_terakhir_bayar' => $_POST['tgl_terakhir_bayar'] ?: null
    ]);
    header('Location: Member.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Edit Member</h2>
    <form method="POST">
        Nama: <input type="text" name="nama_member" value="<?= htmlspecialchars($member['nama_member']) ?>" required><br>
        Nomor: <input type="text" name="nomor_member" value="<?= htmlspecialchars($member['nomor_member']) ?>" required><br>
        Alamat: <textarea name="alamat"><?= htmlspecialchars($member['alamat']) ?></textarea><br>
        Tgl Mendaftar: <input type="datetime-local" name="tgl_mendaftar" value="<?= date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])) ?>" required><br>
        Terakhir Bayar: <input type="date" name="tgl_terakhir_bayar" value="<?= $member['tgl_terakhir_bayar'] ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
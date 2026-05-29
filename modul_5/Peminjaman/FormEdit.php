<?php
require_once '../Model.php';
$model = new Model('peminjaman', 'id_peminjaman');
$bukuModel = new Model('buku', 'id_buku');
$memberModel = new Model('member', 'id_member');

$id = $_GET['id'] ?? null;
$peminjaman = $model->find((int)$id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->update((int)$id, [
        'id_member' => $_POST['id_member'],
        'id_buku' => $_POST['id_buku'],
        'tgl_pinjam' => $_POST['tgl_pinjam'],
        'tgl_kembali' => $_POST['tgl_kembali'] ?: null
    ]);
    header('Location: Peminjaman.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Edit Peminjaman</h2>
    <form method="POST">
        Member: 
        <select name="id_member" required>
            <?php foreach ($memberModel->all() as $m): ?>
                <option value="<?= $m['id_member'] ?>" <?= $m['id_member'] == $peminjaman['id_member'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m['nama_member']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        Buku: 
        <select name="id_buku" required>
            <?php foreach ($bukuModel->all() as $b): ?>
                <option value="<?= $b['id_buku'] ?>" <?= $b['id_buku'] == $peminjaman['id_buku'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($b['judul_buku']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        Tgl Pinjam: <input type="date" name="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam'] ?>" required><br>
        Tgl Kembali: <input type="date" name="tgl_kembali" value="<?= $peminjaman['tgl_kembali'] ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
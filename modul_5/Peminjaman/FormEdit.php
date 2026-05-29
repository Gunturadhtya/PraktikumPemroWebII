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

include '../templates/header.php'; 
?>

<nav class="navbar navbar-light bg-white border-bottom px-4 py-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 fw-bold">Perpustakaan Guntur</span>
        <a href="Peminjaman.php" class="btn btn-dark px-4">Kembali</a>
    </div>
</nav>

<div class="container mt-5 bg-form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4 text-dark">Form Edit Peminjaman<br>Perpustakaan Guntur</h3>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Member:</label>
                    <select name="id_member" class="form-select bg-light border-0 py-2" required>
                        <?php foreach ($memberModel->all() as $m): ?>
                            <option value="<?= $m['id_member'] ?>" <?= $m['id_member'] == $peminjaman['id_member'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($m['nama_member']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Buku:</label>
                    <select name="id_buku" class="form-select bg-light border-0 py-2" required>
                        <?php foreach ($bukuModel->all() as $b): ?>
                            <option value="<?= $b['id_buku'] ?>" <?= $b['id_buku'] == $peminjaman['id_buku'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($b['judul_buku']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Tgl Pinjam:</label>
                    <input type="date" name="tgl_pinjam" class="form-control bg-light border-0 py-2" value="<?= $peminjaman['tgl_pinjam'] ?>" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Tgl Kembali:</label>
                    <input type="date" name="tgl_kembali" class="form-control bg-light border-0 py-2" value="<?= $peminjaman['tgl_kembali'] ?>">
                </div>
                
                <button type="submit" class="btn btn-dark rounded px-4 py-2">Ubah Data</button>
            </form>
        </div>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
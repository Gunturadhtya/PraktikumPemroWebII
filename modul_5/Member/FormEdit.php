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

include '../templates/header.php'; 
?>

<nav class="navbar navbar-light bg-white border-bottom px-4 py-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 fw-bold">Perpustakaan Guntur</span>
        <a href="Member.php" class="btn btn-dark px-4">Kembali</a>
    </div>
</nav>

<div class="container mt-5 bg-form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4 text-dark">Form Edit Member<br>Perpustakaan Guntur</h3>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Nama Member:</label>
                    <input type="text" name="nama_member" class="form-control bg-light border-0 py-2" value="<?= htmlspecialchars($member['nama_member']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Nomor Member:</label>
                    <input type="text" name="nomor_member" class="form-control bg-light border-0 py-2" value="<?= htmlspecialchars($member['nomor_member']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Alamat:</label>
                    <textarea name="alamat" class="form-control bg-light border-0 py-2" rows="3"><?= htmlspecialchars($member['alamat']) ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Tgl Mendaftar:</label>
                    <input type="datetime-local" name="tgl_mendaftar" class="form-control bg-light border-0 py-2" value="<?= date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])) ?>" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Tgl Terakhir Bayar:</label>
                    <input type="date" name="tgl_terakhir_bayar" class="form-control bg-light border-0 py-2" value="<?= $member['tgl_terakhir_bayar'] ?>">
                </div>
                
                <button type="submit" class="btn btn-dark rounded px-4 py-2">Ubah Data</button>
            </form>
        </div>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
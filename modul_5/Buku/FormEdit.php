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

include '../templates/header.php'; 
?>

<nav class="navbar navbar-light bg-white border-bottom px-4 py-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 fw-bold">Perpustakaan Guntur</span>
        <a href="Buku.php" class="btn btn-dark px-4">Kembali</a>
    </div>
</nav>

<div class="container mt-5 bg-form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4 text-dark">Form Edit Buku<br>Perpustakaan Guntur</h3>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Judul Buku:</label>
                    <input type="text" name="judul_buku" class="form-control bg-light border-0 py-2" placeholder="Negeri Para Bedebah" value="<?= htmlspecialchars($buku['judul_buku']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Penulis:</label>
                    <input type="text" name="penulis" class="form-control bg-light border-0 py-2" placeholder="Tere Liye" value="<?= htmlspecialchars($buku['penulis']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Penerbit:</label>
                    <input type="text" name="penerbit" class="form-control bg-light border-0 py-2" placeholder="Gramedia" value="<?= htmlspecialchars($buku['penerbit']) ?>" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.9rem;">Tahun Terbit:</label>
                    <input type="number" name="tahun_terbit" class="form-control bg-light border-0 py-2" placeholder="2012" value="<?= htmlspecialchars($buku['tahun_terbit']) ?>" required>
                </div>
                
                <button type="submit" class="btn btn-dark rounded px-4 py-2">Ubah Data</button>
            </form>
        </div>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
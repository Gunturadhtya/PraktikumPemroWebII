<?php
require_once '../Model.php';
$model = new Model('buku', 'id_buku');

if (isset($_GET['delete'])) {
    $model->delete((int)$_GET['delete']);
    header('Location: Buku.php');
    exit;
}
$bukuList = $model->all();

include '../templates/header.php'; 
?>

<div class="container-fluid p-0 bg-dashboard">
    <div class="row g-0">
        <div class="col-md-2 sidebar p-4">
            <h2 class="mb-5 text-white text-center">Data Buku</h2>
            <a href="../index.php">Kembali</a>
            <a href="FormTambah.php">Tambah Data Buku</a>
        </div>
        
        <div class="col-md-8 p-5">
            <h3 class="mb-4 text-dark">Daftar Buku Perpustakaan Guntur</h3>
            
            <div class="card border-0">
                <div class="card-body p-0">
                    <table class="table table-bordered border-dark table-hover align-middle text-center mb-0 bg-white">
                        <thead>
                            <tr>
                                <th class="table-custom-header py-3">ID Buku</th>
                                <th class="table-custom-header py-3">Judul Buku</th>
                                <th class="table-custom-header py-3">Penulis</th>
                                <th class="table-custom-header py-3">Penerbit</th>
                                <th class="table-custom-header py-3">Tahun Terbit</th>
                                <th class="table-custom-header py-3" colspan="2">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bukuList as $row): ?>
                            <tr>
                                <td><?= $row['id_buku'] ?></td>
                                <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                                <td><?= htmlspecialchars($row['penulis']) ?></td>
                                <td><?= htmlspecialchars($row['penerbit']) ?></td>
                                <td><?= $row['tahun_terbit'] ?></td>
                                <td><a href="?delete=<?= $row['id_buku'] ?>" class="btn btn-custom-hapus btn-sm px-3" onclick="return confirm('Hapus?')">Hapus</a></td>
                                <td><a href="FormEdit.php?id=<?= $row['id_buku'] ?>" class="btn btn-custom-ubah btn-sm px-3 ms-2">Ubah</a></td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
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

include '../templates/header.php'; 
?>

<div class="container-fluid p-0 bg-dashboard">
    <div class="row g-0">
        <div class="col-md-2 sidebar p-4">
            <h2 class="mb-5 text-white text-center">Data Peminjaman</h2>
            <a href="../index.php">Kembali</a>
            <a href="FormTambah.php">Tambah Peminjaman</a>
        </div>
        
        <div class="col-md-10 p-5">
            <h3 class="mb-4 text-dark">Daftar Peminjaman Perpustakaan Guntur</h3>
            
            <div class="card border-0">
                <div class="card-body p-0">
                    <table class="table table-bordered border-dark table-hover align-middle text-center mb-0 bg-white">
                        <thead>
                            <tr>
                                <th class="table-custom-header py-3">ID</th>
                                <th class="table-custom-header py-3">Nama Member</th>
                                <th class="table-custom-header py-3">Judul Buku</th>
                                <th class="table-custom-header py-3">Tgl Pinjam</th>
                                <th class="table-custom-header py-3">Tgl Kembali</th>
                                <th class="table-custom-header py-3" colspan="2">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peminjamanList as $row): ?>
                            <tr>
                                <td><?= $row['id_peminjaman'] ?></td>
                                <td><?= htmlspecialchars($row['nama_member']) ?></td>
                                <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                                <td><?= $row['tgl_pinjam'] ?></td>
                                <td><?= $row['tgl_kembali'] ?: 'Belum Kembali' ?></td>
                                <td><a href="?delete=<?= $row['id_peminjaman'] ?>" class="btn btn-custom-hapus btn-sm px-3" onclick="return confirm('Hapus?')">Hapus</a></td>
                                <td><a href="FormEdit.php?id=<?= $row['id_peminjaman'] ?>" class="btn btn-custom-ubah btn-sm px-3 ms-2">Ubah</a></td>
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
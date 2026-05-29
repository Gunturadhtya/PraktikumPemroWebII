<?php include 'templates/header.php'; ?>

<div class="bg-library d-flex align-items-center justify-content-center">
    <div class="card p-5 index-card" style="width: 800px;">
        <div class="row align-items-center">
            <div class="col-md-2 text-center">
                <img src="assets/book_icon.jpg" alt="Logo Buku" class="img-fluid rounded" style="max-height: 150px;">
            </div>
            
            <div class="col-md-6 text-center">
                <h2 class="fw-bold text-dark mb-0">Perpustakaan Guntur</h2>
            </div>
            
            <div class="col-md-2 d-grid gap-3">
                <a href="Member/Member.php" class="btn btn-dark btn-lg">Member</a>
                <a href="Buku/Buku.php" class="btn btn-dark btn-lg">Buku</a>
                <a href="Peminjaman/Peminjaman.php" class="btn btn-dark btn-lg">Peminjaman</a>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
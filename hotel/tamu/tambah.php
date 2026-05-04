<?php include '../config.php'; $page_title = 'Tambah Tamu'; ?>
<?php include '../includes/header.php'; ?>

<div class="content-card">
    <div class="d-flex align-items-center mb-4">
        <a href="index.php" class="btn btn-outline-secondary me-3">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="text-dark mb-0"><i class="bi bi-person-plus"></i> Tambah Tamu Baru</h3>
    </div>

    <?php
    if(isset($_POST['simpan'])){
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
        mysqli_query($conn, "INSERT INTO tamu(nama,email,telepon) VALUES('$nama','$email','$telepon')");
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> Tamu berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
        
    }
    ?>

    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-semibold">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-semibold">Nomor Telepon</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <input type="text" name="telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
            </div>
        </div>

        <div class="col-12 mt-4">
            <button name="simpan" class="btn btn-success me-2">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="index.php" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>

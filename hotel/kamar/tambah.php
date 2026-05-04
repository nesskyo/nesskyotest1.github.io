<?php
include '../config.php';
$page_title = 'Tambah Kamar';

$nomor = '';
$status = 'tersedia';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor = trim($_POST['nomor'] ?? '');
    $status = trim($_POST['status'] ?? 'tersedia');
    $allowedStatus = ['tersedia', 'terpesan', 'maintenance'];

    if ($nomor === '') {
        $error = 'Nomor kamar tidak boleh kosong.';
    } elseif (!in_array($status, $allowedStatus, true)) {
        $error = 'Status tidak valid.';
    } else {
        $nomorEscaped = mysqli_real_escape_string($conn, $nomor);
        $statusEscaped = mysqli_real_escape_string($conn, $status);

        if (mysqli_query($conn, "INSERT INTO kamar (nomor_kamar, status) VALUES ('$nomorEscaped', '$statusEscaped')")) {
            header('Location: index.php');
            exit;
        }

        $error = 'Gagal menambahkan kamar: ' . mysqli_error($conn);
    }
}
?>
<?php include '../includes/header.php'; ?>

<div class="content-card">
    <div class="d-flex align-items-center mb-4">
        <a href="index.php" class="btn btn-outline-secondary me-3">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="text-dark mb-0"><i class="bi bi-plus-circle"></i> Tambah Kamar Baru</h3>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle"></i> <?= htmlspecialchars($error); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Nomor Kamar</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-door-open"></i></span>
                <input type="text" name="nomor" class="form-control" placeholder="Contoh: 101" value="<?= htmlspecialchars($nomor); ?>" required>
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-semibold">Status</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-circle-fill"></i></span>
                <select name="status" class="form-select" required>
                    <option value="tersedia" <?= $status === 'tersedia' ? 'selected' : ''; ?>>Tersedia</option>
                    <option value="terpesan" <?= $status === 'terpesan' ? 'selected' : ''; ?>>Terpesan</option>
                    <option value="maintenance" <?= $status === 'maintenance' ? 'selected' : ''; ?>>Maintenance</option>
                </select>
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

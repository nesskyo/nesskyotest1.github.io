<?php include '../config.php'; $page_title = 'Edit Kamar'; ?>
<?php
$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM kamar WHERE id_kamar='$id'");
$d = mysqli_fetch_array($data);
?>
<?php include '../includes/header.php'; ?>

<div class="content-card">
    <div class="d-flex align-items-center mb-4">
        <a href="index.php" class="btn btn-outline-secondary me-3">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="text-dark mb-0"><i class="bi bi-pencil"></i> Edit Kamar</h3>
    </div>

    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Nomor Kamar</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-door-open"></i></span>
                <input type="text" name="nomor" class="form-control" value="<?= $d['nomor_kamar']; ?>" required>
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-semibold">Status</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-circle-fill"></i></span>
                <select name="status" class="form-select" required>
                    <option value="tersedia" <?= ($d['status']=='tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                    <option value="terpesan" <?= ($d['status']=='terpesan') ? 'selected' : ''; ?>>Terpesan</option>
                    <option value="maintenance" <?= ($d['status']=='maintenance') ? 'selected' : ''; ?>>Maintenance</option>
                </select>
            </div>
        </div>

        <div class="col-12 mt-4">
            <button name="update" class="btn btn-success me-2">
                <i class="bi bi-save"></i> Update
            </button>
            <a href="index.php" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </form>
</div>

<?php
if(isset($_POST['update'])){
    $nomor = mysqli_real_escape_string($conn, $_POST['nomor']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    mysqli_query($conn, "UPDATE kamar SET nomor_kamar='$nomor', status='$status' WHERE id_kamar='$id'");
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> Kamar berhasil diperbarui!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>';
    header("Refresh: 1; url=index.php");
}
?>

<?php include '../includes/footer.php'; ?>

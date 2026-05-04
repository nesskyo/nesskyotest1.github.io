<?php
include '../config.php';
$page_title = 'Edit Tamu';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, trim($_POST['nama'] ?? ''));
    $email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $telepon = mysqli_real_escape_string($conn, trim($_POST['telepon'] ?? ''));

    mysqli_query($conn, "UPDATE tamu SET nama='$nama', email='$email', telepon='$telepon' WHERE id_tamu=$id");
    header('Location: index.php');
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM tamu WHERE id_tamu=$id");
if (!$result || mysqli_num_rows($result) === 0) {
    header('Location: index.php');
    exit;
}

$row = mysqli_fetch_assoc($result);
?>

<?php include '../includes/header.php'; ?>

<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0"><i class="bi bi-pencil-square"></i> Edit Data Tamu</h3>
        <a href="index.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <form method="post" action="" class="row g-3">
        <div class="col-12">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama']); ?>" required>
        </div>

        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($row['email']); ?>" required>
        </div>

        <div class="col-12">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" id="telepon" name="telepon" class="form-control" value="<?= htmlspecialchars($row['telepon']); ?>" required>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>

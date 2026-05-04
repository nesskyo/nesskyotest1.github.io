<?php include '../config.php'; $page_title = 'Data Tamu'; ?>
<?php include '../includes/header.php'; ?>

<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0"><i class="bi bi-people"></i> Data Tamu</h3>
        <a href="tambah.php" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Tambah Tamu
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="60">ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($conn, "SELECT * FROM tamu ORDER BY nama ASC");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td class="fw-bold">#<?= $d['id_tamu']; ?></td>
                    <td>
                        <i class="bi bi-person-circle text-secondary me-2"></i>
                        <?= htmlspecialchars($d['nama']); ?>
                    </td>
                    <td>
                        <a href="mailto:<?= htmlspecialchars($d['email']); ?>" class="text-decoration-none">
                            <i class="bi bi-envelope text-primary me-1"></i>
                            <?= htmlspecialchars($d['email']); ?>
                        </a>
                    </td>
                    <td>
                        <a href="tel:<?= $d['telepon']; ?>" class="text-decoration-none">
                            <i class="bi bi-telephone text-success me-1"></i>
                            <?= $d['telepon']; ?>
                        </a>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $d['id_tamu']; ?>" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="hapus.php?id=<?= $d['id_tamu']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus tamu ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>


<?php include '../config.php'; $page_title = 'Data Kamar'; ?>
<?php include '../includes/header.php'; ?>

<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0"><i class="bi bi-door-open"></i> Data Kamar</h3>
        <a href="tambah.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Kamar
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="60">ID</th>
                    <th>Nomor Kamar</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($conn, "SELECT * FROM kamar ORDER BY nomor_kamar ASC");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td class="fw-bold">#<?= $d['id_kamar']; ?></td>
                    <td>
                        <i class="bi bi-door-open-fill text-secondary me-2"></i>
                        Kamar <?= $d['nomor_kamar']; ?>
                    </td>
                    <td>
                        <?php
                        $status_class = $d['status']=='tersedia' ? 'success' : ($d['status']=='terpesan' ? 'warning' : 'secondary');
                        $status_icon = $d['status']=='tersedia' ? 'check-circle' : ($d['status']=='terpesan' ? 'clock' : 'x-circle');
                        ?>
                        <span class="badge bg-<?= $status_class; ?>">
                            <i class="bi bi-<?= $status_icon; ?>"></i> <?= ucfirst($d['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $d['id_kamar']; ?>" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="hapus.php?id=<?= $d['id_kamar']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus kamar ini?')">
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

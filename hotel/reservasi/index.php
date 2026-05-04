<?php include '../config.php'; $page_title = 'Data Reservasi'; ?>
<?php include '../includes/header.php'; ?>

<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0"><i class="bi bi-calendar-check"></i> Data Reservasi</h3>
        <a href="tambah.php" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Tambah Reservasi
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="60">ID</th>
                    <th>Tamu</th>
                    <th>Kamar</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($conn, "
                SELECT r.*, t.nama, k.nomor_kamar 
                FROM reservasi r
                JOIN tamu t ON r.id_tamu=t.id_tamu
                JOIN kamar k ON r.id_kamar=k.id_kamar
                ORDER BY r.tgl_check_in DESC
                ");

                while($d = mysqli_fetch_array($data)){
                    // Calculate nights
                    $checkin = new DateTime($d['tgl_check_in']);
                    $checkout = new DateTime($d['tgl_check_out']);
                    $nights = $checkin->diff($checkout)->days;
                ?>
                <tr>
                    <td class="fw-bold">#<?= $d['id_reservasi']; ?></td>
                    <td>
                        <i class="bi bi-person-fill text-info me-2"></i>
                        <?= htmlspecialchars($d['nama']); ?>
                    </td>
                    <td>
                        <i class="bi bi-door-open-fill text-primary me-2"></i>
                        Kamar <?= $d['nomor_kamar']; ?>
                    </td>
                    <td>
                        <i class="bi bi-box-arrow-in-right text-success me-1"></i>
                        <?= date('d M Y', strtotime($d['tgl_check_in'])); ?>
                    </td>
                    <td>
                        <i class="bi bi-box-arrow-right text-danger me-1"></i>
                        <?= date('d M Y', strtotime($d['tgl_check_out'])); ?>
                        <span class="badge bg-secondary ms-1"><?= $nights; ?> malam</span>
                    </td>
                    <td>
                        <a href="hapus.php?id=<?= $d['id_reservasi']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin batalkan reservasi ini?')">
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

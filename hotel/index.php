<?php include 'config.php'; $page_title = 'Dashboard - Hotel Management'; ?>
<?php
$kamar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM kamar"));
$tamu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tamu"));
$reservasi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM reservasi"));
$kamar_tersedia = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM kamar WHERE status='tersedia'"));
?>
<?php include 'includes/header.php'; ?>

<h1 class="page-title text-center display-4 fw-bold">
    <i class="bi bi-building-fill"></i> Hotel Management System
</h1>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="stat-card">
            <i class="bi bi-door-open-fill text-primary"></i>
            <h3 class="fw-bold"><?= $kamar['total']; ?></h3>
            <p class="mb-0">Total Kamar</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <i class="bi bi-check-circle-fill text-success"></i>
            <h3 class="fw-bold"><?= $kamar_tersedia['total']; ?></h3>
            <p class="mb-0">Kamar Tersedia</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <i class="bi bi-people-fill text-info"></i>
            <h3 class="fw-bold"><?= $tamu['total']; ?></h3>
            <p class="mb-0">Total Tamu</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <i class="bi bi-calendar-event-fill text-warning"></i>
            <h3 class="fw-bold"><?= $reservasi['total']; ?></h3>
            <p class="mb-0">Total Reservasi</p>
        </div>
    </div>
</div>

<div class="content-card">
    <h3 class="mb-4 text-dark"><i class="bi bi-grid-3x3-gap-fill"></i> Menu Utama</h3>
    <div class="row g-4">
        <div class="col-md-4">
            <a href="kamar/index.php" class="text-decoration-none">
                <div class="card h-100 border-0">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-door-open text-primary" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 text-dark">Data Kamar</h4>
                        <p class="text-muted">Kelola kamar hotel</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="tamu/index.php" class="text-decoration-none">
                <div class="card h-100 border-0">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-people text-success" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 text-dark">Data Tamu</h4>
                        <p class="text-muted">Kelola data tamu</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="reservasi/index.php" class="text-decoration-none">
                <div class="card h-100 border-0">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-calendar-check text-warning" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 text-dark">Reservasi</h4>
                        <p class="text-muted">Kelola reservasi</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

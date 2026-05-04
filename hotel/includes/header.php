<?php
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Hotel Management'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .navbar {
            background: var(--primary-color) !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }
        .nav-link {
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 4px;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-2px);
        }
        .nav-link.active {
            background: var(--secondary-color) !important;
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }
        .btn {
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
        }
        .table thead {
            background: var(--primary-color);
            color: white;
        }
        .table tbody tr {
            transition: all 0.2s ease;
        }
        .table tbody tr:hover {
            background: rgba(52, 152, 219, 0.1);
            transform: scale(1.01);
        }
        .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: 600;
        }
        .page-title {
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 30px;
        }
        .stat-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            color: white;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-8px);
        }
        .stat-card i {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }
        .content-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="bi bi-building"></i> Hotel App
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_dir == '.' || $current_dir == '') ? 'active' : ''; ?>" href="../index.php">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_dir == 'kamar') ? 'active' : ''; ?>" href="../kamar/index.php">
                            <i class="bi bi-door-open"></i> Kamar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_dir == 'tamu') ? 'active' : ''; ?>" href="../tamu/index.php">
                            <i class="bi bi-people"></i> Tamu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_dir == 'reservasi') ? 'active' : ''; ?>" href="../reservasi/index.php">
                            <i class="bi bi-calendar-check"></i> Reservasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">

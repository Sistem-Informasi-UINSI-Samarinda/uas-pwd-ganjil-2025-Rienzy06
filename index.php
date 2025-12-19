<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker - Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-layer-group"></i> TrackFinance
        </div>
        <div style="margin-top: 10px;">
            <a href="index.php?page=dashboard" class="menu-item <?= $page == 'dashboard' ? 'active' : '' ?>">
                <i class="fas fa-house-chimney-window"></i> Dashboard
            </a>
            <a href="index.php?page=transaksi" class="menu-item <?= $page == 'transaksi' ? 'active' : '' ?>">
                <i class="fas fa-wallet"></i> Transaksi
            </a>
            <a href="index.php?page=laporan" class="menu-item <?= $page == 'laporan' ? 'active' : '' ?>">
                <i class="fas fa-chart-pie"></i> Laporan
            </a>
            <a href="index.php?page=budget" class="menu-item <?= $page == 'budget' ? 'active' : '' ?>">
                <i class="fas fa-bullseye"></i> Goal Tabungan
            </a>
            <a href="index.php?page=profil" class="menu-item <?= $page == 'profil' ? 'active' : '' ?>">
                <i class="fas fa-circle-user"></i> Profil Saya
            </a>

            <a href="auth/logout.php" class="menu-item" style="color: #ff4757; margin-top: 50px;">
                <i class="fas fa-arrow-right-from-bracket"></i> Keluar
            </a>
        </div>
    </div>

    <div class="main-panel" id="main-panel">

        <div class="top-nav">
            <div class="hamburger" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </div>

            <div class="user-info">
                <span style="font-size: 14px; font-weight: 500; color: #2d3436;">
                    Halo, <b style="color: var(--primary);"><?= $_SESSION['username'] ?></b>
                </span>
                <div class="avatar">
                    <?= strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)) ?>
                </div>
            </div>
        </div>

        <div class="content">
            <?php
            $target = "pages/" . $page . ".php";
            if (file_exists($target)) {
                include $target;
            } else {
                echo "<div style='text-align:center; padding-top:100px;'>
                        <img src='https://cdn-icons-png.flaticon.com/512/6134/6134065.png' width='120' style='opacity:0.2'>
                        <h2 style='color:#b2bec3; margin-top:20px;'>Halaman Tidak Ditemukan</h2>
                      </div>";
            }
            ?>
        </div>
    </div>

    <script src="/assets/js/script.js"></script>

</body>

</html>

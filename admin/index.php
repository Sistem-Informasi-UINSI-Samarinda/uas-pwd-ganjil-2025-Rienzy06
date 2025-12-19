<?php
session_start();
include '../config/koneksi.php';

//Proteksi Sesi: Pastikan hanya admin yang bisa masuk
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

//Routing: Menentukan halaman mana yang akan dimuat
$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - TrackFinance</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <div class="sidebar sidebar-admin" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-user-shield"></i> ADMIN PANEL
        </div>
        <div style="margin-top: 20px;">
            <a href="index.php?page=dashboard" class="menu-item <?= $page == 'dashboard' ? 'active' : '' ?>">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="index.php?page=users" class="menu-item <?= $page == 'users' ? 'active' : '' ?>">
                <i class="fas fa-users"></i> Kelola User
            </a>
            <a href="index.php?page=semua_transaksi" class="menu-item <?= $page == 'semua_transaksi' ? 'active' : '' ?>">
                <i class="fas fa-exchange-alt"></i> Transaksi
            </a>

            <a href="../auth/logout.php" class="menu-item" style="margin-top: 50px; color: #ff7675;">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </div>

    <div class="main-panel" id="main-panel">
        <div class="top-nav">
            <div class="hamburger" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </div>

            <div class="user-info">
                <span class="badge-admin">Administrator</span>
                <span style="font-size: 14px; font-weight: 600; color: #2d3436;">
                    <?= $_SESSION['username'] ?>
                </span>
                <div class="avatar" style="background: #2d3436;">
                    <?= strtoupper(substr($_SESSION['username'] ?? 'A', 0, 1)) ?>
                </div>
            </div>
        </div>

        <div class="content">
            <?php
            // Memuat konten secara dinamis
            $file = "pages/" . $page . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                echo "<div style='text-align:center; margin-top:50px;'>
                        <i class='fas fa-exclamation-circle' style='font-size:48px; color:#dfe6e9;'></i>
                        <h2 style='color:#b2bec3;'>Halaman tidak ditemukan</h2>
                      </div>";
            }
            ?>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>

</body>

</html>
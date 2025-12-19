<?php
session_start();
include '../../config/koneksi.php';

// Pastikan hanya admin yang mengakses file ini
if ($_SESSION['role'] !== 'admin') {
    die("Akses Ditolak");
}

if (isset($_GET['hapus_user'])) {
    $id = $_GET['hapus_user'];

    // Hapus transaksi user dulu (karena foreign key)
    mysqli_query($conn, "DELETE FROM transaksi WHERE user_id = '$id'");

    // Baru hapus user-nya
    mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

    header("Location: ../index.php?page=users&pesan=terhapus");
}

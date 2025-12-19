<?php
// 1. Pastikan session dimulai di paling atas
session_start();
require '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // 2. Ambil data user
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $user_data = mysqli_fetch_assoc($query);

    if ($user_data) {
        // 3. Verifikasi Password
        if (password_verify($password, $user_data['password'])) {

            // 4. CEK APAKAH KOLOM 'role' ADA DI DATABASE
            if (!isset($user_data['role'])) {
                die("Error: Kolom 'role' tidak ditemukan di database. Pastikan Anda sudah menjalankan ALTER TABLE.");
            }

            // 5. SIMPAN KE SESSION
            $_SESSION['user_id']  = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['role']     = $user_data['role']; // Ini harus terbaca 'admin' atau 'user'

            // 6. REDIRECT BERDASARKAN ROLE
            if ($_SESSION['role'] == 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.history.back();</script>";
    }
}
?>
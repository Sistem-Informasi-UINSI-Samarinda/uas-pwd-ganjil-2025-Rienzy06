<?php
require '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    // 1. Validasi Password
    if ($password !== $confirm) {
        echo "<script>alert('Password tidak cocok!'); window.history.back();</script>";
        exit();
    }

    // 2. Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah terdaftar!'); window.history.back();</script>";
        exit();
    }

    // 3. Hash Password (Keamanan)
    $password_aman = password_hash($password, PASSWORD_DEFAULT);

    // 4. Simpan (Role default: user)
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password_aman', 'user')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Berhasil Daftar! Silakan Login'); window.location='login.php';</script>";
    } else {
        echo "Gagal daftar: " . mysqli_error($conn);
    }
}
?>
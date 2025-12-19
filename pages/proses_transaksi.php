<?php
session_start();
include '../config/koneksi.php';
$uid = $_SESSION['user_id'];

// LOGIKA TAMBAH
if (isset($_POST['tambah'])) {
    $tgl = $_POST['tanggal'];
    $kat = $_POST['kategori'];
    $nom = $_POST['nominal'];
    $ket = $_POST['keterangan'];
    $query = "INSERT INTO transaksi (user_id, kategori, nominal, tanggal, keterangan) 
              VALUES ('$uid', '$kat', '$nom', '$tgl', '$ket')";

    mysqli_query($conn, $query);
    header("Location: ../index.php?page=transaksi");
}

// LOGIKA UPDATE (PENTING AGAR TIDAK HALAMAN KOSONG)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tgl = $_POST['tanggal'];
    $kat = $_POST['kategori'];
    $nom = $_POST['nominal'];
    $ket = $_POST['keterangan'];

    $query = "UPDATE transaksi SET 
                tanggal='$tgl', 
                kategori='$kat', 
                nominal='$nom', 
                keterangan='$ket' 
              WHERE id='$id' AND user_id='$uid'";

    mysqli_query($conn, $query);
    header("Location: ../index.php?page=transaksi");
}

// LOGIKA HAPUS
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM transaksi WHERE id='$id' AND user_id='$uid'");
    header("Location: ../index.php?page=transaksi");
}

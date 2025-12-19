<?php
session_start();
include '../config/koneksi.php';

$uid = $_SESSION['user_id'];
$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

// Header agar browser mendownload file excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Keuangan_" . $dari . "_to_" . $sampai . ".xls");

$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE user_id='$uid' AND tanggal BETWEEN '$dari' AND '$sampai' ORDER BY tanggal ASC");
?>

<table border="1">
    <tr>
        <th colspan="4">LAPORAN KEUANGAN PERIODE <?= $dari ?> s/d <?= $sampai ?></th>
    </tr>
    <tr>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Keterangan</th>
        <th>Nominal</th>
    </tr>
    <?php while ($r = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $r['tanggal'] ?></td>
            <td><?= $r['kategori'] ?></td>
            <td><?= $r['keterangan'] ?></td>
            <td><?= $r['nominal'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
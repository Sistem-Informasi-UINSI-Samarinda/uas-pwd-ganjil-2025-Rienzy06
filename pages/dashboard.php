<?php
$uid = $_SESSION['user_id'];
$m = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) as total FROM transaksi WHERE user_id='$uid' AND kategori='Pemasukan'"));
$k = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) as total FROM transaksi WHERE user_id='$uid' AND kategori='Pengeluaran'"));
$u = mysqli_fetch_assoc(mysqli_query($conn, "SELECT target_dana FROM users WHERE id='$uid'"));

$masuk = $m['total'] ?? 0;
$keluar = $k['total'] ?? 0;
$target = $u['target_dana'] ?? 0;
$saldo = $masuk - $keluar;
$persen = ($target > 0) ? ($keluar / $target) * 100 : 0;
?>

<h2 style="margin-bottom: 20px; color: #2f3542;">Dashboard</h2>
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
    <div style="background: white; padding: 20px; border-radius: 12px; border-left: 5px solid #2ecc71; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <small style="color: #a4b0be; font-weight: bold;">TOTAL PEMASUKAN</small>
        <h2 style="margin: 10px 0; color: #2ecc71;">Rp <?= number_format($masuk, 0, ',', '.') ?></h2>
    </div>
    <div style="background: white; padding: 20px; border-radius: 12px; border-left: 5px solid #ff4757; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <small style="color: #a4b0be; font-weight: bold;">TOTAL PENGELUARAN</small>
        <h2 style="margin: 10px 0; color: #ff4757;">Rp <?= number_format($keluar, 0, ',', '.') ?></h2>
    </div>
    <div style="background: white; padding: 20px; border-radius: 12px; border-left: 5px solid #4834d4; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <small style="color: #a4b0be; font-weight: bold;">SALDO SAAT INI</small>
        <h2 style="margin: 10px 0; color: #2f3542;">Rp <?= number_format($saldo, 0, ',', '.') ?></h2>
    </div>
</div>

<div style="background: white; padding: 25px; border-radius: 12px; margin-top: 25px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    <h4 style="margin-top: 0;">Progress Anggaran Bulanan</h4>
    <div style="background: #f1f2f6; height: 15px; border-radius: 10px; overflow: hidden; margin: 15px 0;">
        <div style="width: <?= min($persen, 100) ?>%; background: <?= $persen > 90 ? '#ff4757' : '#4834d4' ?>; height: 100%;"></div>
    </div>
    <small style="color: #747d8c;">Terpakai <?= number_format($persen, 1) ?>% dari target Rp <?= number_format($target, 0, ',', '.') ?></small>
</div>
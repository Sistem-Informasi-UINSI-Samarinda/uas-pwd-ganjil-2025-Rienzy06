<?php
// Ambil data statistik sistem
$count_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE role='user'"));
$sum_transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) as total FROM transaksi"));
$count_transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM transaksi"));
?>

<h2 style="margin-bottom: 25px;">Statistik Sistem</h2>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
    <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); display: flex; align-items: center;">
        <div style="background: #ebf5ff; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #3498db; font-size: 24px; margin-right: 20px;">
            <i class="fas fa-users"></i>
        </div>
        <div>
            <div style="color: #a4b0be; font-size: 14px;">Total Pengguna</div>
            <div style="font-size: 22px; font-weight: bold;"><?= $count_user['total'] ?> Orang</div>
        </div>
    </div>

    <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); display: flex; align-items: center;">
        <div style="background: #e8fcf1; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #2ecc71; font-size: 24px; margin-right: 20px;">
            <i class="fas fa-exchange-alt"></i>
        </div>
        <div>
            <div style="color: #a4b0be; font-size: 14px;">Volume Transaksi</div>
            <div style="font-size: 22px; font-weight: bold;">Rp <?= number_format($sum_transaksi['total'], 0, ',', '.') ?></div>
        </div>
    </div>
</div>

<div style="margin-top: 30px; background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
    <h4 style="margin-top: 0;">Log Aktivitas Sistem</h4>
    <p style="color: #747d8c;">Total transaksi terproses: <b><?= $count_transaksi['total'] ?> data</b></p>
</div>
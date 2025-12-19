<?php
if (isset($_POST['update_target'])) {
    $target = $_POST['target'];
    mysqli_query($conn, "UPDATE users SET target_dana='$target' WHERE id='{$_SESSION['user_id']}'");
    echo "<script>alert('Target berhasil diubah!'); window.location='index.php?page=budget';</script>";
}
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT target_dana FROM users WHERE id='{$_SESSION['user_id']}'"));
?>

<div style="max-width: 500px; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin: auto;">
    <h3 style="text-align: center; margin-bottom: 25px;"><i class="fas fa-bullseye" style="color: #4834d4;"></i> Atur Target Pengeluaran</h3>
    <form method="POST">
        <label style="color: #747d8c; font-size: 14px;">Nominal Batas Pengeluaran Bulanan:</label>
        <input type="number" name="target" value="<?= $user['target_dana'] ?>" style="width: 100%; padding: 15px; margin: 15px 0; border: 1px solid #ddd; border-radius: 8px; font-size: 18px; font-weight: bold;">
        <button type="submit" name="update_target" style="width: 100%; padding: 15px; background: #4834d4; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">Simpan Pengaturan</button>
    </form>
</div>
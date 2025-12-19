<?php
$id = $_GET['id'];
$uid = $_SESSION['user_id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transaksi WHERE id='$id' AND user_id='$uid'"));

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); max-width: 600px; margin: auto;">
    <h3 style="margin-top: 0;">Edit Transaksi</h3>
    <form action="pages/proses_transaksi.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" style="width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ddd;">

        <label>Kategori</label>
        <select name="kategori" style="width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ddd;">
            <option value="Pemasukan" <?= $data['kategori'] == 'Pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
            <option value="Pengeluaran" <?= $data['kategori'] == 'Pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
        </select>

        <label>Nominal</label>
        <input type="number" name="nominal" value="<?= $data['nominal'] ?>" style="width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ddd;">

        <label>Keterangan</label>
        <input type="text" name="keterangan" value="<?= $data['keterangan'] ?>" style="width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ddd;">

        <div style="margin-top: 20px;">
            <button type="submit" name="update" style="background: #4834d4; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">Simpan Perubahan</button>
            <a href="index.php?page=transaksi" style="text-decoration: none; color: #747d8c; margin-left: 10px;">Batal</a>
        </div>
    </form>
</div>
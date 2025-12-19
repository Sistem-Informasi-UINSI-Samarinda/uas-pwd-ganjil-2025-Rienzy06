<h2 style="margin-bottom: 20px;">Transaksi</h2>
<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 25px;">
    <h4 style="margin-top: 0;">Tambah Transaksi Baru</h4>
    <form action="pages/proses_transaksi.php" method="POST" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
        <input type="date" name="tanggal" required style="padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
        <select name="kategori" required style="padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
            <option value="Pemasukan">Pemasukan</option>
            <option value="Pengeluaran">Pengeluaran</option>
        </select>
        <input type="number" name="nominal" placeholder="Nominal" required style="padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
        <input type="text" name="keterangan" placeholder="Keterangan" required style="padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
        <button type="submit" name="tambah" style="background: #4834d4; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">Simpan</button>
    </form>
</div>

<div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="text-align: left; border-bottom: 2px solid #f1f2f6;">
                <th style="padding: 12px;">Tanggal</th>
                <th>Keterangan</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE user_id='{$_SESSION['user_id']}' ORDER BY tanggal DESC LIMIT 10");
            while ($row = mysqli_fetch_assoc($query)):
            ?>
                <tr style="border-bottom: 1px solid #f1f2f6;">
                    <td style="padding: 12px;"><?= $row['tanggal'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td style="color: <?= $row['kategori'] == 'Pemasukan' ? '#2ecc71' : '#ff4757' ?>;">
                        <?= $row['kategori'] == 'Pemasukan' ? '+' : '-' ?> Rp <?= number_format($row['nominal'], 0, ',', '.') ?>
                    </td>
                    <td>
                        <a href="index.php?page=edit_transaksi&id=<?= $row['id'] ?>" style="color: #4834d4; text-decoration: none; margin-right: 10px;"><i class="fas fa-edit"></i></a>
                        <a href="pages/proses_transaksi.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" style="color: #ff4757;"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
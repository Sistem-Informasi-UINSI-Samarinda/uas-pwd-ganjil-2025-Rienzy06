<h2 style="margin-bottom: 20px;">Seluruh Transaksi Sistem</h2>
<div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow-x: auto;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="text-align: left; background: #f8f9fa;">
                <th style="padding: 15px;">User</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Join table untuk mengambil nama user
            $q = mysqli_query($conn, "SELECT transaksi.*, users.username FROM transaksi JOIN users ON transaksi.user_id = users.id ORDER BY transaksi.tanggal DESC LIMIT 50");
            while ($t = mysqli_fetch_assoc($q)):
            ?>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; font-weight: bold;"><?= $t['username'] ?></td>
                    <td><?= date('d M Y', strtotime($t['tanggal'])) ?></td>
                    <td>
                        <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; background: <?= $t['kategori'] == 'Pemasukan' ? '#e8fcf1' : '#fff0f0' ?>; color: <?= $t['kategori'] == 'Pemasukan' ? '#2ecc71' : '#ff4757' ?>;">
                            <?= $t['kategori'] ?>
                        </span>
                    </td>
                    <td><?= $t['keterangan'] ?></td>
                    <td style="font-weight: bold;">Rp <?= number_format($t['nominal'], 0, ',', '.') ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
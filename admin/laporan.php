<h2>Laporan Transaksi Seluruh User</h2>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Nominal</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT t.*, u.username FROM transaksi t JOIN users u ON t.user_id = u.id ORDER BY t.tanggal DESC");
        if(mysqli_num_rows($query) > 0):
            while($r = mysqli_fetch_assoc($query)):
        ?>
        <tr>
            <td><u style="color: #4834d4;"><?= $r['username'] ?></u></td>
            <td><?= date('d M Y', strtotime($r['tanggal'])) ?></td>
            <td style="color: <?= $r['kategori'] == 'Pemasukan' ? '#2ecc71' : '#ff4757' ?>; font-weight: bold;">
                <?= $r['kategori'] ?>
            </td>
            <td>Rp <?= number_format($r['nominal'], 0, ',', '.') ?></td>
            <td><?= $r['keterangan'] ?></td>
        </tr>
        <?php 
            endwhile; 
        else:
        ?>
            <tr><td colspan="5" align="center">Belum ada transaksi di sistem.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
<?php
// Set tanggal default jika belum ada filter
$dari = isset($_GET['dari']) ? $_GET['dari'] : date('Y-m-01');
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : date('Y-m-t');

$uid = $_SESSION['user_id'];

// Query data transaksi
$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE user_id='$uid' AND tanggal BETWEEN '$dari' AND '$sampai' ORDER BY tanggal DESC");
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h2 style="margin: 0; color: #2d3436;">Laporan Keuangan</h2>
</div>

<div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 25px;">
    <div style="display: flex; align-items: flex-end; gap: 10px; flex-wrap: wrap;">
        
        <form method="GET" action="index.php" style="display: flex; align-items: flex-end; gap: 10px; flex-grow: 1;">
            <input type="hidden" name="page" value="laporan">
            
            <div style="flex: 1; min-width: 150px;">
                <label style="font-size: 11px; color: #a4b0be; font-weight: bold; display: block; margin-bottom: 5px; text-transform: uppercase;">Dari</label>
                <input type="date" name="dari" value="<?= $dari ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; font-size: 14px;">
            </div>

            <div style="flex: 1; min-width: 150px;">
                <label style="font-size: 11px; color: #a4b0be; font-weight: bold; display: block; margin-bottom: 5px; text-transform: uppercase;">Sampai</label>
                <input type="date" name="sampai" value="<?= $sampai ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; font-size: 14px;">
            </div>

            <button type="submit" style="height: 42px; padding: 0 20px; background: #2c3e50; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-filter"></i> Filter
            </button>
        </form>

        <div style="display: flex; gap: 8px;">
            <a href="pages/unduh_laporan.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>" 
               title="Unduh Excel"
               style="height: 42px; width: 42px; background: #2ecc71; color: white; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s;">
                <i class="fas fa-download"></i>
            </a>

            <button onclick="window.print()" 
                    title="Cetak Laporan"
                    style="height: 42px; width: 42px; background: #f1f2f6; color: #2c3e50; border: 1px solid #ddd; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: 0.3s;">
                <i class="fas fa-print"></i>
            </button>
        </div>
        
    </div>
</div>

<div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
            <thead>
                <tr style="background: #f8f9fa; text-align: left;">
                    <th style="padding: 15px 20px; color: #2d3436; font-size: 14px;">Tanggal</th>
                    <th style="padding: 15px 20px; color: #2d3436; font-size: 14px;">Kategori</th>
                    <th style="padding: 15px 20px; color: #2d3436; font-size: 14px;">Keterangan</th>
                    <th style="padding: 15px 20px; color: #2d3436; font-size: 14px; text-align: right;">Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($query) > 0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr style="border-bottom: 1px solid #f1f2f6;">
                            <td style="padding: 15px 20px; font-size: 14px; color: #636e72;">
                                <?= date('d/m/Y', strtotime($row['tanggal'])) ?>
                            </td>
                            <td style="padding: 15px 20px; font-size: 14px;">
                                <span style="color: <?= $row['kategori'] == 'Pemasukan' ? '#2ecc71' : '#ff4757' ?>; font-weight: 500;">
                                    <?= $row['kategori'] ?>
                                </span>
                            </td>
                            <td style="padding: 15px 20px; font-size: 14px; color: #2d3436;">
                                <?= $row['keterangan'] ?>
                            </td>
                            <td style="padding: 15px 20px; font-size: 14px; text-align: right; font-weight: bold; color: #2d3436;">
                                Rp <?= number_format($row['nominal'], 0, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" style="padding: 30px; text-align: center; color: #a4b0be;">Tidak ada data pada periode ini.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
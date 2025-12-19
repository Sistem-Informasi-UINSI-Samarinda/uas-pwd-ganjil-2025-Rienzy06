<h2 style="margin-bottom: 20px;">Daftar Pengguna</h2>
<div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow-x: auto;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="text-align: left; background: #f8f9fa;">
                <th style="padding: 15px;">ID</th>
                <th>Username</th>
                <th>Target Dana</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM users WHERE role='user' ORDER BY id DESC");
            while ($u = mysqli_fetch_assoc($query)):
            ?>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px;"><?= $u['id'] ?></td>
                    <td><i class="fas fa-user-circle"></i> <b><?= $u['username'] ?></b></td>
                    <td>Rp <?= number_format($u['target_dana'], 0, ',', '.') ?></td>
                    <td>
                        <button onclick="confirmDelete(<?= $u['id'] ?>)" style="background: #ff4757; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="../assets/js/script.js"></script>
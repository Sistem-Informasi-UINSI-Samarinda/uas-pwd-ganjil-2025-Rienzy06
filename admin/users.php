<?php 
// Fitur Hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    echo "<script>alert('User berhasil dihapus'); window.location='users.php';</script>";
}
?>

<h2>Daftar Pengguna Aplikasi</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT id, username, target_dana FROM users WHERE role='user' ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($query)):
        ?>
        <tr>
            <td>#<?= $row['id'] ?></td>
            <td><b><?= $row['username'] ?></b></td>
            <td>
                <span class="badge <?= $row['role'] == 'admin' ? 'bg-admin' : 'bg-user' ?>">
                    <?= strtoupper($row['role']) ?>
                </span>
            </td>
            <td>Aktif</td>
            <td>
                <?php if($row['username'] !== $_SESSION['username']): ?>
                    <a href="?hapus=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                <?php else: ?>
                    <span style="color: #ccc;">(Anda)</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
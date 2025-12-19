<?php
$uid = $_SESSION['user_id'];

// Logika Update Profil
if (isset($_POST['update_profil'])) {
    $user_baru = mysqli_real_escape_string($conn, $_POST['username']);
    $pass_baru = $_POST['password'];

    if (!empty($pass_baru)) {
        $hash_pass = password_hash($pass_baru, PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE users SET username='$user_baru', password='$hash_pass' WHERE id='$uid'");
    } else {
        mysqli_query($conn, "UPDATE users SET username='$user_baru' WHERE id='$uid'");
    }

    $_SESSION['username'] = $user_baru; // Update session agar nama di header berubah
    echo "<script>alert('Profil diperbarui!'); window.location='index.php?page=profil';</script>";
}

$u_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id='$uid'"));
?>

<div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    <h2 style="text-align: center;"><i class="fas fa-user-circle"></i> Pengaturan Profil</h2>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" value="<?= $u_info['username'] ?>" required style="width: 100%; padding: 12px; margin: 10px 0 20px; border-radius: 8px; border: 1px solid #ddd;">

        <label>Ganti Password (kosongkan jika tidak ingin ganti)</label>
        <div style="position: relative;">
            <input type="password" name="password" id="password_profil" style="width: 100%; padding: 12px; margin: 10px 0; border-radius: 8px; border: 1px solid #ddd;">
        </div>

        <button type="submit" name="update_profil" style="width: 100%; background: #4834d4; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; margin-top: 20px;">
            Simpan Perubahan
        </button>
    </form>
</div>
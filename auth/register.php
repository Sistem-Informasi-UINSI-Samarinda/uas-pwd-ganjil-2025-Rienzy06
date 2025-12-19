<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TrackDuit</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="auth-body">
    <div class="glow" style="top: 10%; right: 10%;"></div>
    <div class="glow" style="bottom: 10%; left: 10%; background: var(--indigo-light);"></div>

    <div class="login-box">
        <div style="font-size: 40px; color: var(--primary); margin-bottom: 10px;">
            <i class="fas fa-user-plus"></i>
        </div>

        <h2>Sign Up</h2>
        <p>Mulai kelola keuangan Anda sekarang.</p>

        <form action="proses_register.php" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Buat Username" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Buat Password" required>
            </div>

            <div class="input-group">
                <i class="fas fa-check-double"></i>
                <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            </div>

            <button type="submit">Daftar Akun</button>
        </form>

        <a href="login.php" class="toggle-link">Sudah punya akun? <b>Login Disini</b></a>
    </div>
</body>

</html>
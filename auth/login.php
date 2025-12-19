<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TrackDuit</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="auth-body">
    <div class="glow"></div>
    <div class="glow" style="top: auto; bottom: 10%; left: 10%; background: var(--indigo-light);"></div>

    <div class="login-box">
        <div style="font-size: 40px; color: var(--primary); margin-bottom: 10px;">
            <i class="fas fa-wallet"></i>
        </div>
        <h2>Sign In</h2>
        <p>Silakan masuk ke akun FinaceTracker Anda.</p>

        <form action="proses_login.php" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Masuk Sekarang</button>
        </form>

        <a href="register.php" class="toggle-link">Belum punya akun? <b>Daftar Disini</b></a>
    </div>
</body>

</html>
<?php
session_start();

function login($input_username, $input_password) {
    $username = "admin";
    $password = "12345";

    if ($input_username == $username && $input_password == $password) {
        return true;
    }
    return false;
}

if (isset($_POST['login'])) {
    if (login($_POST['username'], $_POST['password'])) {
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<main class="login-box">
    <div class="logo" aria-hidden="true"></div>
    <h2>Login Perpustakaan</h2>
    <p class="subjudul">Silakan masuk untuk melanjutkan</p>

    <?php if (isset($_GET['error'])) { ?>
        <p class="error">Username atau password tidak sesuai</p>
    <?php } ?>

    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="current-password" required>

        <button type="submit" name="login">Masuk</button>
    </form>
</main>

</body>
</html>
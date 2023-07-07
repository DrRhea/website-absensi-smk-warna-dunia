<?php
require 'functions.php';

$error = false;

if (isset($_POST["register"])) {
    $username = $_POST["user"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];

    $result = registrasi($username, $password, $password2);
    if ($result === true) {
        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Warna Dunia | Halaman Login</title>

    <link rel="stylesheet" href="css/login.css">

    <link rel="icon" type="image/x-icon" href="img/icon.png">
</head>

<body>
    <section class="container">
        <form action="" method="post">
            <label for="user">Username</label>
            <input type="text" name="user" class="user" id="user" autocomplete="off" required>
            <label for="pass">Password</label>
            <input type="password" name="pass" class="pass" id="pass" required>
            <label for="pass">Konfirmasi Password</label>
            <input type="password" name="pass2" class="pass" id="pass2" required>
            <a href="login.php">sudah punya akun?</a>
            <button type="submit" name="register">Daftar</button>

            <?php if ($error) : ?>
                <span>password tidak sesuai!</span>
            <?php endif; ?>
        </form>
    </section>
</body>

</html>

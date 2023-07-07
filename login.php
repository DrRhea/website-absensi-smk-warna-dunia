<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    $username = $_POST["user"];
    $password = $_POST["pass"];

    if (login($username, $password)) {
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
            <input type="text" name="user" class="user" id="user" required>
            <label for="pass">Password</label>
            <input type="password" name="pass" class="pass" id="pass" required>
            <a href="registrasi.php">daftar?</a>
            <button type="submit" name="submit">Masuk</button>

            <?php if (isset($error)) : ?>
                <span>Username atau password salah!</span>
            <?php endif; ?>
        </form>
    </section>
</body>

</html>

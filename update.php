<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        Header("Location: login.php");
        exit;
    }

  require 'functions.php';

  $id = $_GET["id"];

  $siswa = query("SELECT * FROM siswa WHERE id = $id")[0];

  if (isset($_POST["submit"])) {
    if( update($_POST) > 0 ) {
      Header("Location: index.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMK Warna Dunia | Halaman Tambah Data Siswa</title>

  <link rel="stylesheet" href="css/tambah.css">

  <link rel="icon" type="image/x-icon" href="img/icon.png">
</head>

<body>
  <section class="container">
    <div class="link">
      <a href="index.php" class="kembali"><span>kembali</span></a>
    </div>
    <h1>Update Data Siswa</h1>
    <form action="" method="post" enctype="multipart/form">
      <input type="hidden" name="id" value="<?= $siswa["id"] ?>">
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama" value="<?= $siswa["nama"] ?>" required>
      <label for="nis">Nomor Induk Siswa</label>
      <input type="number" name="nis" id="nis" value="<?= $siswa["nis"] ?>" required>
      <label for="jenis-kelamin">Jenis Kelamin</label>
      <select id="jenis-kelamin" name="jenis-kelamin" value="<?= $siswa["jenis_kelamin"] ?>">
        <option disabled selected value="<?= $siswa["jenis_kelamin"] ?>"><?= $siswa["jenis_kelamin"] ?></option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
      <label for="agama">Agama</label>
      <select id="agama" name="agama" value="<?= $siswa["jenis_kelamin"] ?>">
        <option disabled selected value="<?= $siswa["agama"] ?>"><?= $siswa["agama"] ?></option>
        <option value="Islam">Islam</option>
        <option value="Kristen Protestan">Kristen Protestan</option>
        <option value="Khatolik">Khatolik</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddha">Buddha</option>
        <option value="Konghucu">Konghucu</option>
      </select>
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" required><?= $siswa["alamat"] ?></textarea>
      <div class="tombol">
        <button type="submit" name="submit" class="submit">Ubah</button>
        <button type="reset" name="reset" class="reset">Reset</button>
      </div>
    </form>
  </section>
</body>

</html>
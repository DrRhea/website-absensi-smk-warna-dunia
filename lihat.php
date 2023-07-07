<?php
  session_start();

  if (!isset($_SESSION['login'])) {
      Header("Location: login.php");
      exit;
  }

  require 'functions.php';
  $siswa = query("SELECT siswa.*, absensi.tgl_absen
  FROM siswa
  LEFT JOIN absensi ON siswa.nis = absensi.nis
  WHERE absensi.tgl_absen IS NOT NULL");

  if (isset($_POST["status"])) {
    $status = $_POST["status"];
    absen($status);
    header("Location: index.php");
    exit;
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMK Warna Dunia</title>

  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/datepicker.css">

  <link rel="icon" type="image/x-icon" href="img/icon.png">
</head>

<body>
  <section class="container" style="width: auto">
    <div class="link-kel">
      <a href="index.php" class="logout">kembali</a>
      <a href="logout.php" class="logout">logout</a>
    </div>
    <h1>Data Kehadiran Siswa <br> SMK WARNA DUNIA</h1>
    <div>
      <div class="date-style">
        Tanggal Awal: <input type="date" class="datepicker" value="<?= date("Y-m-d") ?>" name="startDate" id="startDate"
          autofocus>
        Tanggal Akhir: <input type="date" class="datepicker" value="<?= date("Y-m-d") ?>" name="endDate" id="endDate"
          autofocus>
      </div>

    </div>

    <div class="tombol-aksi">
      <a href="#" class="cetak-data"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path class="cetak-data-p"
            d="M7 17H17V22H7V17ZM19 20V15H5V20H3C2.44772 20 2 19.5523 2 19V9C2 8.44772 2.44772 8 3 8H21C21.5523 8 22 8.44772 22 9V19C22 19.5523 21.5523 20 21 20H19ZM5 10V12H8V10H5ZM7 2H17C17.5523 2 18 2.44772 18 3V6H6V3C6 2.44772 6.44772 2 7 2Z">
          </path>
        </svg></a>
    </div>
    <div id="tab">
      <table cellspacing="10">
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>NIS</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Alamat</th>
          <th>Tanggal Absen</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($siswa as $row) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $row["nama"] ?></td>
          <td><?= $row["nis"] ?></td>
          <td><?= $row["jenis_kelamin"] ?></td>
          <td><?= $row["agama"] ?></td>
          <td><?= $row["alamat"] ?></td>
          <td>
            <?= $row["tgl_absen"] ?>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

      </table>
    </div>
  </section>

  <script src="js/lihat.js"></script>
  <script src="js/index.js"></script>
</body>

</html>
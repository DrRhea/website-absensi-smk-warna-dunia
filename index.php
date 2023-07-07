<?php
  session_start();

  if (!isset($_SESSION['login'])) {
      Header("Location: login.php");
      exit;
  }

  require 'functions.php';
  $siswa = query("SELECT * FROM siswa");

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

  <link rel="icon" type="image/x-icon" href="img/icon.png">
</head>

<body>
  <section class="container">
    <a href="logout.php" class="logout">logout</a>
    <h1>Data Kehadiran Siswa <br> SMK WARNA DUNIA</h1>
    Tanggal hari ini: <?php echo date('d M Y'); ?>
    <form action="">
      <input type="text" class="search-bar" placeholder="Cari siswa..." name="keyword" id="keyword" autocomplete="off">
    </form>
    <div class="tombol-aksi">
      <a href="tambah.php" class="tambah-data"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path class="tambah-data-p" d="M14 14.252V22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z""></path></svg></a>
      <a href="#" class="cetak-data"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path class="cetak-data-p" d="M7 17H17V22H7V17ZM19 20V15H5V20H3C2.44772 20 2 19.5523 2 19V9C2 8.44772 2.44772 8 3 8H21C21.5523 8 22 8.44772 22 9V19C22 19.5523 21.5523 20 21 20H19ZM5 10V12H8V10H5ZM7 2H17C17.5523 2 18 2.44772 18 3V6H6V3C6 2.44772 6.44772 2 7 2Z"></path></svg></a>
      <a href="lihat.php" class="lihat-data"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path class="lihat-data-p" d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg></a>
    </div>
    <div id="tab">
      <table css="table-siswa">
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>NIS</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Alamat</th>
          <th id="keterangan">Keterangan</th>
          <th id="ubah-data">Ubah Data</th>
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
            <div class="absen">
              <form action="" method="post"">
                  <a href=" absen.php?id=<?= $row["id"]; ?>" id="hadir"><button type="submit" name="status" class="hadir"
                  value="Hadir">Hadir</button></a>
              </form>
            </div>
          </td>
          <td>
            <div class="edit">
              <a href="update.php?id=<?= $row["id"]; ?>"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                    class="update-data-p"
                      d="M7.24264 17.9964H3V13.7538L14.435 2.31877C14.8256 1.92825 15.4587 1.92825 15.8492 2.31877L18.6777 5.1472C19.0682 5.53772 19.0682 6.17089 18.6777 6.56141L7.24264 17.9964ZM3 19.9964H21V21.9964H3V19.9964Z"></path>
                  </svg></a>
              <a href="hapus.php?id=<?= $row["id"]; ?>"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                    class="hapus-data-p"
                      d="M7 6V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7ZM13.4142 13.9997L15.182 12.232L13.7678 10.8178L12 12.5855L10.2322 10.8178L8.81802 12.232L10.5858 13.9997L8.81802 15.7675L10.2322 17.1817L12 15.4139L13.7678 17.1817L15.182 15.7675L13.4142 13.9997ZM9 4V6H15V4H9Z"
                      fill="rgba(255,255,255,1)"></path>
                  </svg></a>
            </div>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

      </table>
    </div>
  </section>

  <script src="js/index.js"></script>
</body>

</html>
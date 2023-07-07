<?php
require '../functions.php';

$startDate = $_GET["startDate"];
$endDate = $_GET["endDate"];

$query = "SELECT siswa.*, absensi.tgl_absen
  FROM siswa
  LEFT JOIN absensi ON siswa.nis = absensi.nis
  WHERE absensi.tgl_absen IS NOT NULL
  AND DATE(absensi.tgl_absen) BETWEEN '$startDate' AND '$endDate'";

$siswa = query($query);
?>

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
<?php
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM siswa
          WHERE
          nis LIKE '%$keyword%' OR
          nama LIKE '%$keyword%' OR
          jenis_kelamin LIKE '%$keyword%' OR
          agama LIKE '%$keyword%' OR
          alamat LIKE '%$keyword%'";
$siswa = query($query);

?>

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
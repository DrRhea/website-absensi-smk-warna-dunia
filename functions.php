<!-- connect to database -->
<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $db = mysqli_connect("localhost", "root", "", "absen-smk-wd");

// function
  function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

  function tambah($data) {
    global $db;

    $nis = htmlspecialchars($data['nis']);
    $nama = htmlspecialchars($data['nama']);
    $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);
    $agama = htmlspecialchars($data['agama']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "INSERT INTO siswa
    VALUES
    ('', '$nis', '$nama', '$alamat', '$jenis_kelamin',  '$agama')
    ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  function absen($data) {
    global $db;
  
    $id = $data['id'];
    $tgl_absen = date('Y-m-d');
  
    $query = "SELECT * FROM siswa WHERE id = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $nis = $row['nis'];
  
    $query = "INSERT INTO absensi (nis, tgl_absen) VALUES ('$nis', '$tgl_absen')";
    
    $cek1 = mysqli_query($db, "SELECT nis FROM absensi WHERE nis = '$nis'");
    $cek2 = mysqli_query($db, "SELECT tgl_absen FROM absensi WHERE tgl_absen = '$tgl_absen'");

    $row1 = mysqli_fetch_assoc($cek1);
    $row2 = mysqli_fetch_assoc($cek2);

    if ($row1 && $row2) {
      return false; // Username already exists
    }

    mysqli_query($db, $query);
  }

  function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($db);
  }

  function update($data) {
    global $db;

    $id = $data["id"];
    $nis = htmlspecialchars($data['nis']);
    $nama = htmlspecialchars($data['nama']);
    $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);
    $agama = htmlspecialchars($data['agama']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "UPDATE siswa
    SET
      nis = '$nis',
      nama = '$nama',
      jenis_kelamin = '$jenis_kelamin',
      agama = '$agama',
      alamat = '$alamat'
    WHERE id = $id
        ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  function registrasi($username, $password, $password2)
  {
      global $db;
  
      $username = strtolower(stripslashes($username));
      $password = mysqli_real_escape_string($db, $password);
      $password2 = mysqli_real_escape_string($db, $password2);
  
      $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");
  
      if (mysqli_fetch_assoc($result)) {
          return false; // Username already exists
      }
  
      if ($password !== $password2) {
          return false; // Passwords don't match
      }
  
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
      mysqli_query($db, "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')");
  
      return true;
  }

  function login($username, $password)
  {
      global $db;
  
      $username = strtolower(stripslashes($username));
      $password = mysqli_real_escape_string($db, $password);
  
      $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
  
      if ($row = mysqli_fetch_assoc($result)) {
          if (password_verify($password, $row['password'])) {
              $_SESSION["login"] = true;
              return true; // Login berhasil
          }
      }
  
      return false; // Login gagal
  }
?>
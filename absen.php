<?php
  session_start();

  if (!isset($_SESSION['login'])) {
    Header("Location: login.php");
    exit;
  }

  require 'functions.php';

  $id = $_GET["id"];

  if (absen(['id' => $id])) {
    echo "<script>
      document.location.href = 'index.php'
    </script>";
  } else {
    echo "<script>
      document.location.href = 'index.php'
    </script>";
  }
?>

<?php
  $serverName = "localhost";
  $dbUsername = "root";
  $dbPwd = "";
  $dbName = "db_vocabulary_learning";

  $conn = mysqli_connect($serverName,$dbUsername,$dbPwd,$dbName);
  if (!$conn) {
    header("Location: ../index.php?error=sqlError");
    exit();
  }
?>

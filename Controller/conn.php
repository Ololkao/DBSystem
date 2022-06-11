<?php
	$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "STAT";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("資料庫連線錯誤:" . $conn->connect_error);
  }
  
  $conn->query('SET NAMES UTF8');
  $conn->query('SET time_zone = "+08:00"');
?>

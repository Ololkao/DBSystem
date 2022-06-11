<?php
require_once('conn.php');

/**
 * Insert data from POST form
 */

// $sID = $_POST['id'];
// $sName = $_POST['name'];
$sql = "";
$table = 'Student';
$SID = 'H24076087';
$SName = 'sususu STAT';
$SGender = 'male';

if (empty($SID) || empty($SName) || empty($SGender)) {
  die("請輸入完整資料");
}
// $dMng = isset($dID) ? "69" : "NULL";
// echo $dMng . "<br>";
$sql = "INSERT INTO ${table} VALUES('{$SID}', '{$SName}', '{$SGender}', 0)";
// echo $sql . "<br>";

$res = $conn->query($sql);
if (!$res) {
  die($conn->error);
}

if ($conn->affected_rows == 0) {
  echo "新增失敗";
}
else {
  echo "新增成功";
}

// header("Location: ../index.php");

$conn->close();
?>
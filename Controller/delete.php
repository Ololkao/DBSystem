<?php
require_once('conn.php');

/**
 * Delete data from POST form
 */

// $sid = $_POST['delrow'];
$sql = "";
$table = 'Student';
$key = 'SID';
$val = 'H24076087';

if (empty($val)) {
  die("請輸入${key}");
}
$sql = "DELETE FROM ${table} WHERE ${key} = '${val}'";
// echo $sql . "<br>";

$res = $conn->query($sql);
if (!$res) {
  die($conn->error);
}

if ($conn->affected_rows == 0) {
  echo "刪除失敗";
}
else {
  echo "刪除成功";
}

$conn->close();
?>
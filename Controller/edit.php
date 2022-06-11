<?php
require_once('conn.php');

/**
 * Update data from POST form
 */

$sql = "";
$table = 'Student';
$key = 'SID';
$val = 'H24076087';
$varname = 'SName';
// a variable 'variable name'
$$varname = 'sususu shiba';

if (empty($val)) {
  die("請指定一個${key}");
}
$sql = "UPDATE ${table} SET ${varname} = '${$varname}' WHERE ${key} = '${val}'";
// echo $sql . "<br>";

$res = $conn->query($sql);
if (!$res) {
  die($conn->error);
}
echo '修改成功<br>';

// header("Location: ../index.php");

$conn->close();
?>
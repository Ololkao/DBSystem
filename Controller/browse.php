<?php
require_once('conn.php');

$table1 = 'Course';
$table2 = 'Professor';
$column = 'PRank';
$value = '"assistant"';
$sql = "SELECT * FROM ${table1} F, ${table2} S WHERE F.PID = S.PID AND ${column} = ${value}";
// echo $sql . "\n";
$res = $conn->query($sql);

if (!$res) {
  die($conn->error);
}

while ($row = $res->fetch_assoc()) {
  // print_r($row);

  /**
   * Render a table to browse
   */
  echo 'course id: ' . $row['CID'] . ', course name: ' . $row['CName'] . ', professor: ' . $row['PName'] . '<br>';
}

$conn->close();
?>
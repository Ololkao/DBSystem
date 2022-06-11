<?php
require_once('conn.php');


$table1 = 'Student';
$table2 = 'Grouping';
$table3 = 'Professor';
$sql = "CREATE TEMPORARY TABLE SGroup "
      ."SELECT S.GNO, S.PID, F.SID, SName FROM ${table1} F, ${table2} S WHERE F.SID = S.SID;";
// echo $sql . "\n";
$res = $conn->query($sql);
if (!$res) {
  die($conn->error);
}


$table1 = 'Student';
$table2 = 'Interview';
$sql = "CREATE TEMPORARY TABLE Lookup "
      ."SELECT F.SID, SName, SGender, IID, ITime FROM ${table1} F, ${table2} S WHERE F.SID = S.SID;";
// echo $sql . "\n";
$res = $conn->query($sql);
if (!$res) {
  die($conn->error);
}


$sql = $_POST['sql'];
// echo $sql . '<br>';
$i = 0;
$msg = "指令送出<br>";
if ($conn->multi_query($sql)) {
  do {
    if ($res = $conn->store_result()) {
      // $msg .= $text[$i];
      while ($row = $res->fetch_row()) {
        $msg .= $row[0].' ';
      }
      $msg .= '<br>';
      $i++;
    }
  }
  while ($conn->next_result());
}

echo $msg . '<br>';

$conn->close();
exit();
?>
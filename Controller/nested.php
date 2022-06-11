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


$tag = 'NOT ';
// $tag = '';
$in = "SELECT * FROM SGroup AS L, Professor AS P WHERE L.PID = P.PID "
      ."AND L.PID "
      ."IN (2, 5, 7);";

$notin = "SELECT * FROM SGroup AS L, Professor AS P WHERE L.PID = P.PID "
      ."AND L.PID ".$tag
      ."IN (2, 5, 7);";

$exist = "SELECT PName FROM Professor AS P WHERE "
        ."EXISTS ("
        ."SELECT PID FROM SGroup AS L WHERE L.PID = P.PID AND GNO = 6);";

$notex = "SELECT PName FROM Professor AS P WHERE ".$tag
      ."EXISTS ("
      ."SELECT PID FROM SGroup AS L WHERE L.PID = P.PID AND GNO = 6);";


$text = array(0=>'IN：', 
            'NOT IN：', 
            'EXISTS：', 
            'NOT EXISTS：');
$i = 0;
$msg = "";
if ($conn->multi_query($in.$notin.$exist.$notex)) {
  do {
    if ($res = $conn->store_result()) {
      $msg .= $text[$i];
      while ($row = $res->fetch_row())
        $msg .= $row[0].', ';
      $msg .= '<br>';
      $i++;
    }
  }
  while ($conn->next_result());
}

$return = [$msg, $in, $notin, $exist, $notex];
echo json_encode($return);

$conn->close();
?>
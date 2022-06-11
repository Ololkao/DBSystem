<?php
require_once('conn.php');

$table1 = 'Student';
$table2 = 'Interview';
$sql = "CREATE TEMPORARY TABLE Lookup "
      ."SELECT F.SID, SName, SGender, IID, ITime FROM ${table1} F, ${table2} S WHERE F.SID = S.SID;";
// echo $sql . "\n";
$res = $conn->query($sql);
if (!$res) {
  die($conn->error);
}

$text = array(0=>'資料總筆數：', 
            '訪問總時數：', 
            '單一調查最大時數：', 
            '單一調查最小時數：', 
            '學生平均訪問時數：', 
            '達門檻之學生名單：');

$count = "SELECT COUNT(*) FROM Lookup;";
$sum = "SELECT SUM(ITime) FROM Lookup;";
$max = "SELECT MAX(ITime) FROM Lookup;";
$min = "SELECT MIN(ITime) FROM Lookup;";
$avg = "SELECT AVG(tot) AS mean_time FROM ("
      ."SELECT `SID`, SUM(ITime) AS tot FROM Lookup GROUP BY `SID`) T;";
$have = "SELECT `SID` FROM Lookup GROUP BY `SID` HAVING SUM(ITime) >= 20;";

$i = 0;
$msg = "";
if ($conn->multi_query($count.$sum.$max.$min.$avg.$have)) {
  do {
    if ($res = $conn->store_result()) {
      $msg .= $text[$i];
      while ($row = $res->fetch_row())
        $msg .= $row[0].' ';
      $msg .= '<br>';
      $i++;
    }
  }
  while ($conn->next_result());
}
// if (!$res) {
//   die($conn->error);
// }
// echo $res->fetch_row()[0] . "\n";

$return = [$msg, $count, $sum, $max, $min, $avg, $have];
echo json_encode($return);

$conn->close();
?>
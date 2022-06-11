<?php
require_once('../Controller/conn.php');
//
// $conn->close();
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="./ajax.js"></script>
</head>

<body>
  <h1><center>學務管理系統</h1>
  <!-- <h1>Students Affairs Management System</h1> -->
  
  <div class="tab_css">
    <form method="POST" id="form1">
      <input id="tab1" type="submit" name="tab"/>
      <label for="tab1">SELECT</label>
    </form>
    <form method="POST" id="form2">
      <input id="tab2" type="submit" name="tab"/>
      <label for="tab2">DELETE</label>
    </form>
    <form method="POST" id="form3">
      <input id="tab3" type="submit" name="tab"/>
      <label for="tab3">INSERT</label>
    </form>
    <form method="POST" id="form4">
      <input id="tab4" type="submit" name="tab"/>
      <label for="tab4">UPDATE</label>
    </form>
    <form method="POST" id="form5">
      <input id="tab5" type="submit" name="tab"/>
      <label for="tab5">Nested Queries</label>
    </form>
    <form method="POST" id="form6">
      <input id="tab6" type="submit" name="tab"/>
      <label for="tab6">Aggregation</label>
    </form>
  </div>
  <div class="tab_content"></div><br>
  <div class="text_content">
    <form method="POST" id="form" action="../Controller/syntax.php">
      <label for="sql">執行SQL語法</label><br>
      <textarea id="sql" name="sql" rows="6" cols="50"></textarea>
      <input type="submit" value="送出">
    </form>
  </div>

  <style>
    textarea {
      resize: none;
    }

    .tab_css {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding-bottom: 2vw;
    }

    .tab_css input {
      display: none
    }

    .tab_css label {
      margin: 0 5px 5px 0;
      padding: 10px 16px;
      cursor: pointer;
      border-radius: 5px;
      background: #999;
      color: #fff;
      opacity: 0.6;
    }

    .tab_css input:checked + label, 
    .tab_css label:hover {
      opacity: 1;
      font-weight: bold;
    }
    
    .tab_css input:checked + label + .tab_content{display: initial;}
    
    .tab_content, .text_content {
      margin: 0 auto;
      width: 40vw;
      border-bottom: 3px solid #ddd;
      line-height: 1.6;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      text-align: center;
    }
  </style>

</body>
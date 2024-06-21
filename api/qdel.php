<?php include_once "./db.php";
//取得要刪除的類型是日期還是電影，並將其對應的欄位值存入$data陣列
$data[$_POST['type']]=$_POST['val'];
$Orders->del($data);
$Orders->del($_POST['id']);
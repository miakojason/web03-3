<?php include_once "./db.php";
// 排序陣列sort
sort($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);
$id=$Orders->max('id')+1;
// sprintf 用於格式化字串。"%04d" 這種格式化說明符用於將整數格式化為至少四位數字，不足部分用 0 填充
$_POST['no']=date("Ymd").sprintf("%04d",$id);
$Orders->save($_POST);
// 回傳訂單編號;
echo $_POST['no'];
?>
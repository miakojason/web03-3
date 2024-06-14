<?php include_once "./db.php";
  $row=$Movie->find($_POST['id']);
if (!empty($_FILES['trailer']['tmp_name'])) {
    move_uploaded_file($_FILES['trailer']['tmp_name'], "../img/" . $_FILES['trailer']['name']);
    $_POST['trailer'] = $_FILES['trailer']['name'];
}else{
     // $row=$Movie->find($_POST['id']);移到02行
     //此功能aip新的，確保用戶，沒有編輯上傳新的預告影片(trailer)或著海報(poster)file檔案，可以保留原檔案在資料庫，不會上傳新的空值。
    $_POST['trailer']=$row['trailer'];//->02行$row
}
if (!empty($_FILES['poster']['tmp_name'])) {
    move_uploaded_file($_FILES['poster']['tmp_name'], "../img/" . $_FILES['poster']['name']);
    $_POST['poster'] = $_FILES['poster']['name'];
}else{
    // $row=$Movie->find($_POST['id']);
    $_POST['poster']=$row['poster'];
}
$_POST['ondate'] = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
unset($_POST['year'], $_POST['month'], $_POST['day']);
if (!isset($_POST['id'])) {
    $_POST['rank'] = $Movie->max('id') + 1;
}
$Movie->save($_POST);
to("../back.php?do=movie");
// 
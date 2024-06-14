<?php include_once "./db.php";
  $row=$Movie->find($_POST['id']);
if (!empty($_FILES['trailer']['tmp_name'])) {
    move_uploaded_file($_FILES['trailer']['tmp_name'], "../img/" . $_FILES['trailer']['name']);
    $_POST['trailer'] = $_FILES['trailer']['name'];
}else{
     // $row=$Movie->find($_POST['id']);
    $_POST['trailer']=$row['trailer'];
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

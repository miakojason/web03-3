<?php include_once "./db.php";
// id edit
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Poster->del($id);
        } else {
            $row = $Poster->find($id);
            $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
            $row['name'] = $_POST['name'][$idx];
            $row['ani'] = $_POST['ani'][$idx];
            $Poster->save($row);
        }
    }
} else {
    //create
    if (isset($_FILES['poster']['tmp_name'])) {
        move_uploaded_file($_FILES['poster']['tmp_name'], "../img/" . $_FILES['poster']['name']);
        $_POST['img'] = $_FILES['poster']['name'];
    }
    $_POST['rank'] = $Poster->max('id') + 1;
    $_POST['ani'] = rand(1, 3);
    $Poster->save($_POST);
}
to("../back.php?do=poster");

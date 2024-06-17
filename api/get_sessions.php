<?php include_once "./db.php";
$row = $_GET['movie'];
$movieName = $Movie->find($row)['name'];
$date = $_GET['date'];
$H = date('G'); //24H制
$start = ($H >= 14 && $date == date("Y-m-d")) ? 7 - ceil((24 - $H) / 2) : 1;
for($i=$start;$i<=5;$i++){
    $qt=$Orders->sum('qt',['movie'=>$movieName,'date'=>$date,'session'=>$sess[$i]]);
    $lave=20-$qt;
    echo "<option value='{$sess[$i]}'>{$sess[$i]}剩餘座位$lave</option>";
}

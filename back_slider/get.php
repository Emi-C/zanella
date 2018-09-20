<?php
include('../dbclass.php');

$q="select * from zan_slider order by id desc";
$res=mysqli_query($conn, $q);
//echo json_encode($res);

$cad=[];
$i=0;
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    $cad[$i]["id"]=$row[0];
    $cad[$i]["img"]=$row[1];
    $i++;
}
echo json_encode($cad);

mysqli_close($conn);
?>
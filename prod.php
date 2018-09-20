<?php
include('dbclass.php');

$id=$_POST['id'];
$q = "select * from zan_prodotti where id=".$id;

$res=mysqli_query($conn, $q);

$cad=[];
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    $cad["id"]=$row[0];
    $cad["tit"]=$row[1];
    $cad["prezzo"]=$row[2];
    $cad["link"]=$row[3];
    $cad["testo"]=$row[4];
    $cad["img"]=$row[5];
    $cad["img1"]=$row[6];
    $cad["img2"]=$row[7];
    $cad["img3"]=$row[8];
}
echo json_encode($cad);

mysqli_close($conn);
?>
<?php
include('../dbclass.php');
$id=$_POST['id'];

$q="select * from zan_prodotti where id=".$id;
$res=mysqli_query($conn, $q);
$num_rows = mysqli_num_rows($res);

while ($row = mysqli_fetch_assoc($res)) {
	$pos=$row["pos"];
}


$qu="update zan_prodotti set pos=pos-1 where pos>".$pos;

if (!mysqli_query($conn, $qu)){
	http_response_code(500);
	echo $qu."<br>";
	echo("Error shift: " . mysqli_error($conn));
}


$q="delete from zan_prodotti where id=".$id;
if (!mysqli_query($conn, $q)) {
    http_response_code(500);
    echo $q;
    echo "Error delete table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

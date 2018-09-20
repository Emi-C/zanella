<?php
include('../dbclass.php');
$id=$_POST['id'];


$q="delete from zan_slider where id=".$id;
if (!mysqli_query($conn, $q)) {
    http_response_code(500);
    echo $q;
    echo "Error delete table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

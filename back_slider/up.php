<?php
include('../dbclass.php');
$img=$_FILES['img'];


$uploaddir = '/back_slider/imgups/';
$uploadfile = $uploaddir . basename($img['name']);

$x=1;
$newfilename=$uploadfile;

while(is_file($_SERVER['DOCUMENT_ROOT'].$newfilename)){
	$newfilename=$uploadfile;
	
	$fn=explode(".",$newfilename);
	$fp=(count($fn))-2;
	$fn[$fp].=$x;
	
	$newfilename=implode(".",$fn);
	$x++;
}

if (move_uploaded_file($img['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$newfilename)) {
    echo "File ".$newfilename." is valid, and was successfully uploaded.\n";
} else {
	echo $newfilename."\n\n";
    echo "Possible file upload attack!\n";
}


$q="insert into zan_slider (img) values ('".$newfilename."')";
if (!mysqli_query($conn, $q)) {
    http_response_code(500);
    echo $q."\n";
    echo "Error insert table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

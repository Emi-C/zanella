<?php
include('../dbclass.php');
$tit=$_POST['tit'];
$prz=$_POST['prz'];
$lnk=$_POST['lnk'];
// if ($lnk==""){
	// $lnk="#contact";
// }

$txt=$_POST['txt'];
$img[0]=$_FILES['img'];
$img[1]=$_FILES['img1'];
$img[2]=$_FILES['img2'];
$img[3]=$_FILES['img3'];

$uploaddir = '/backend/imgups/';
$uploadfile[0] = $uploaddir . basename($img[0]['name']);
$uploadfile[1] = $uploaddir . basename($img[1]['name']);
$uploadfile[2] = $uploaddir . basename($img[2]['name']);
$uploadfile[3] = $uploaddir . basename($img[3]['name']);


$newfilename=array();//superfluo?
$index=0;//lo uso per array newfilename


foreach ($uploadfile as $thisfile){
	$x=1;
	//$newfilename=$uploadfile;
	$newfilename[$index]=$thisfile;

	while(is_file($_SERVER['DOCUMENT_ROOT'].$newfilename[$index])){
		//$newfilename=$uploadfile;
		$newfilename[$index]=$thisfile;
		
		$fn=explode(".",$newfilename[$index]);
		$fp=(count($fn))-2;
		$fn[$fp].=$x;
		
		$newfilename[$index]=implode(".",$fn);
		$x++;
	}

	if (move_uploaded_file($img[$index]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$newfilename[$index])) {
		echo "File ".$newfilename[$index]." is valid, and was successfully uploaded.\n";
	} else {
		echo $newfilename[$index]."\n\n";
		echo "Possible file upload attack!\n";
	}
	
	$index++;
}


$que="update zan_prodotti set pos=pos+1";
if (!mysqli_query($conn, $que)){
	http_response_code(500);
	echo $qu."<br>";
	echo("Error shift: " . mysqli_error($conn));
}

$q="insert into zan_prodotti (tit,prezzo,link,testo,img,img1,img2,img3,pos) values ('".$tit."','".$prz."','".$lnk."','".$txt."','".str_replace(" ","%20",$newfilename[0])."','".str_replace(" ","%20",$newfilename[1])."','".str_replace(" ","%20",$newfilename[2])."','".str_replace(" ","%20",$newfilename[3])."',1)";
if (!mysqli_query($conn, $q)) {
    http_response_code(500);
    echo $q."\n";
    echo "Error insert table: " . mysqli_error($conn);
}




mysqli_close($conn);
?>

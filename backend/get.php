<?php
include('../dbclass.php');

header('Content-type: text/plain; charset=utf-8');

$q="select * from zan_prodotti order by pos";
$res=mysqli_query($conn, $q);

$num_rows = mysqli_num_rows($res);

$cad=[];
$i=0;
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    $cad[$i]["id"]=$row[0];
    $cad[$i]["tit"]=$row[1];
    $cad[$i]["prezzo"]=$row[2];
    $cad[$i]["link"]=$row[3];
    $cad[$i]["testo"]=$row[4];
    $cad[$i]["img"]=$row[5];
    $cad[$i]["img1"]=$row[6];
    $cad[$i]["img2"]=$row[7];
    $cad[$i]["img3"]=$row[8];
	$cad[$i]["posbloc"]="";
	for ($x = 1; $x <= $num_rows; $x++) {
		if ($x==$row[9]){
			$cad[$i]["posbloc"].="<option value=".$x." selected>".$x."</option>";
		}else{
			$cad[$i]["posbloc"].="<option value=".$x.">".$x."</option>";
		}
	}
	
    $i++;
}

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

//echo json_encode($cad);
//echo json_last_error_msg();
echo json_encode(utf8ize($cad));


mysqli_close($conn);
?>
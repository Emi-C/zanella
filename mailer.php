<?php
$name=$_POST["nome"];
$cog=$_POST["cognome"];
$mail=$_POST["mail"];
$msg=$_POST["msg"];

$to = 'zanellazine@gmail.com';
$subject = 'Nuovo messaggio su Zanellazine';
$message = $msg;
$headers = 'From: '.$name." ".$cog.' <'.$mail.'>';
if (!mail($to, $subject, $message, $headers)) {  http_response_code (400);} else {  http_response_code (200);}
?>
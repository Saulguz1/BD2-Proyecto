<?php
session_start();
$_SESSION['reporte1']=[];
$url = 'http://localhost:5000/posttransaccionbycuenta';
$cui = '0000';

if (isset($_POST['inputCui'])) {
    $cui = $_POST['inputCui'];
}

$data = array('cui'=> $carnet);

$data = array();
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( $data );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);

echo $result;

$resultr=json_decode($result,true);


if(sizeof($resultr) != 0){
    $_SESSION['reporte1']=$resultr;
   header("Location: reporte1.php");
   exit;
}else{
    $_SESSION['reporte1']=[];
   header("Location: reporte1.php");
  exit;
}

?>

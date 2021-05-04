<?php
ob_start();
session_start();

$_SESSION['cuentahabiente']=[];
$url = 'http://127.0.0.1:5000/getCuentaHabiente';

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
    $_SESSION['cuentahabiente']=$resultr;
   header("Location: subirreporte.php");
   exit;
}else{
    $_SESSION['cuentahabiente']=[];
   header("Location: subirreporte.php");
  exit;
}

?>

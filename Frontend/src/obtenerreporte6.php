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
}else{
    $_SESSION['cuentahabiente']=[];
}

$_SESSION['reporte6']=[];
$url = 'http://127.0.0.1:5000/getMovimientos_by_Cuentahabiente_by_mes';

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
    $_SESSION['reporte6']=$resultr;
   header("Location: reporte6.php");
   exit;
}else{
    $_SESSION['reporte6']=[];
   header("Location: reporte6.php");
  exit;
}

?>

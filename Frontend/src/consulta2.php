<?php
ob_start();
session_start();
$_SESSION['reporte2']=[];
$url = 'http://127.0.0.1:5000/postDebito_by_Institucion';
$inputins = ' ';

if (isset($_POST['inputins'])) {
    $inputins = $_POST['inputins'];
}

echo $inputins;
$data = array('institucion'=> $inputins);

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
    $_SESSION['reporte2']=$resultr;
   header("Location: reporte2.php");
   exit;
}else{
    $_SESSION['reporte2']=[];
   header("Location: reporte2.php");
  exit;
}

?>

<?php
ob_start();
session_start();
$_SESSION['reporte6']=[];
$url = 'http://127.0.0.1:5000/postMovimientos_by_Cuentahabiente_by_mes';
$cui = '0000';
$mes = '01';
$ano = '2020';
$fechai = '2020-01-01';
$fechaf = '2020-01-31';

if (isset($_POST['inputCui'])) {
    $cui = $_POST['inputCui'];
}
if (isset($_POST['inputmes'])) {
    $mes = $_POST['inputmes'];
}
if (isset($_POST['inputano'])) {
    $ano = $_POST['inputano'];
}

if($mes == '01' ||$mes == '03'||$mes == '05'||$mes == '07'||$mes == '08'||$mes == '10'||$mes == '12'){
    $fechai = $ano.'-'.$mes.'-01';
    $fechaf = $ano.'-'.$mes.'-31';
}else if($mes == '04'||$mes == '06'||$mes == '11'||$mes == '09'){
    $fechai = $ano.'-'.$mes.'-01';
    $fechaf = $ano.'-'.$mes.'-30';
}else{
    $fechai = $ano.'-'.$mes.'-01';
    $fechaf = $ano.'-'.$mes.'-28';
}

$data = array('cui'=> $cui,'fechai'=> $fechai,'fechaf'=> $fechaf);

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

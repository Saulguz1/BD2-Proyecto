<?php
ob_start();
session_start();

$url = 'http://127.0.0.1:5000/insertnuevo';
$strcuenta1 = '';
$strcuenta2 = '';
$monto = 0;
$saldomenos = 0;
$saldomas = 0;


if (isset($_POST['inputcuenta1'])) {
    $strcuenta1 = $_POST['inputcuenta1'];
}
if (isset($_POST['inputcuenta2'])) {
    $strcuenta2 = $_POST['inputcuenta2'];
}
if (isset($_POST['inputmonto'])) {
    $monto = $_POST['inputmonto'];
}
$cuenta1 = explode(',', $strcuenta1);
$cuenta2 = explode(',', $strcuenta2);

if($monto > $cuenta1[9]){
    $_SESSION['color']=1;
   header("Location: subirreporte.php");
   exit;
}else{

    $saldomenos = $cuenta1[9] - $monto;
    $saldomas = $cuenta2[9] + $monto;
    $data = array('nombre1'=> $cuenta1[0],'apellido1'=> $cuenta1[1],'cui1'=> $cuenta1[2],'email1'=> $cuenta1[3],'fechareg1'=> $cuenta1[4],'genero1'=> $cuenta1[5],'institucion1'=> $cuenta1[6],'abreviacion1'=> $cuenta1[7],'tipocuenta1'=> $cuenta1[8],'saldoi1'=> $cuenta1[9],'nombre2'=> $cuenta2[0],'apellido2'=> $cuenta2[1],'cui2'=> $cuenta2[2],'email2'=> $cuenta2[3],'fechareg2'=> $cuenta2[4],'genero2'=> $cuenta2[5],'institucion2'=> $cuenta2[6],'abreviacion2'=> $cuenta2[7],'tipocuenta2'=> $cuenta2[8],'saldoi2'=> $cuenta2[9],'montotrasf'=> $monto,'saldomenos'=>$saldomenos,'saldomas'=>$saldomas);
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
 echo $resultr['mensaje'];

    if($resultr['mensaje'] == 1){
        $_SESSION['color']=2;
        header("Location: subirreporte.php");
        exit;
    }else{
        $_SESSION['color']=3;
    header("Location: subirreporte.php");
    exit;
    }


}



?>

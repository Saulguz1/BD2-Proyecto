<?php
ob_start();
session_start();

$url = 'http://127.0.0.1:5000/insertnuevo';
$cuenta1 = '';
$cuenta2 = '';
$monto = '';


if (isset($_POST['inputcuenta1'])) {
    $cuenta1 = $_POST['inputcuenta1'];
}
if (isset($_POST['inputcuenta2'])) {
    $cuenta2 = $_POST['inputcuenta2'];
}
if (isset($_POST['inputmonto'])) {
    $monto = $_POST['inputmonto'];
}
if($monto > $cuenta1['saldoinicial']){
    echo "<script>
                alert('Error al realizar transaccion, no tiene fondos suficientes');
                window.location= 'consulta7.php'
    </script>";
   header("Location: subirreporte.php");
   exit;
}else{
    $data = array('nombre1'=> $cuenta1['nombre'],'apellido1'=> $cuenta1['apellido'],'cui1'=> $cuenta1['cui'],'email1'=> $cuenta1['email'],'fechareg1'=> $cuenta1['fechareg'],'genero1'=> $cuenta1['genero'],'institucion1'=> $cuenta1['institucion'],'abreviacion1'=> $cuenta1['abreviatura'],'tipocuenta1'=> 'Ahorro','saldoi1'=> $cuenta1['saldoinicial'],'nombre2'=> $cuenta2['nombre'],'apellido2'=> $cuenta2['apellido'],'cui2'=> $cuenta2['cui'],'email2'=> $cuenta2['email'],'fechareg2'=> $cuenta2['fechareg'],'genero2'=> $cuenta2['genero'],'institucion2'=> $cuenta2['institucion'],'abreviacion2'=> $cuenta2['abreviatura'],'tipocuenta2'=> 'Ahorro','saldoi2'=> $cuenta2['saldoinicial'],'montotrasf'=> $monto);
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


    if($result['mensaje'] == 1){
        echo "<script>
                    alert('Transaccion Realizada con exito');
                    window.location= 'consulta7.php'
        </script>";
        header("Location: index.php");
        exit;
    }else{
        echo "<script>
                    alert('Error al realizar transaccion');
                    window.location= 'consulta7.php'
        </script>";
    header("Location: subirreporte.php");
    exit;
    }


}



?>

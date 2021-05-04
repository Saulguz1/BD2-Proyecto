<?php
session_start();
$url = 'http://load_balancer:8080/crearreporte';

$nombre = '';
$carnet = '';
$curso = '';
$reporte = '';



if (isset($_POST['inputCarnet'])) {
    $carnet = $_POST['inputCarnet'];
}
if (isset($_POST['inputName'])) {
    $nombre = $_POST['inputName'];
}
if (isset($_POST['inputCurso'])) {
    $curso = $_POST['inputCurso'];
}
if (isset($_POST['inputCuerpo'])) {
    $reporte = $_POST['inputCuerpo'];
}


$data = array('carnet'=> $carnet,'nombre'=>$nombre,'curso'=>$curso,'reporte'=>$reporte);
$ch = curl_init( $url );
$payload = json_encode( $data );
echo $payload;
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
echo $result;
if($result['mensaje'] == 1){
    echo "<script>
                alert('si se inserto');
                window.location= 'uploadreporterequest.php'
    </script>";
    header("Location: index.php");
    exit;
}else{
    echo "<script>
                alert('Mensaje no se pudo insertar');
                window.location= 'uploadreporterequest.php'
    </script>";
   header("Location: subirreporte.php");
   exit;
}

?>


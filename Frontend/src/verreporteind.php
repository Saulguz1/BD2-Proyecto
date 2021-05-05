<?php
session_start();
$url = 'http://load_balancer:8080/reporte';
$id = '';
$_SESSION['carnetind']="";
$_SESSION['nombreind']="";
$_SESSION['cursoind']="";
$_SESSION['cuerpoind']="";
$_SESSION['fechaind']="";
$_SESSION['servidorind']="";
$_SESSION['servatend'] ="";

if (isset($_POST['submit'])) {
    $id = $_POST['submit'];
}

if($id != ""){

    $data = array('id'=>$id);
    $ch = curl_init( $url );
    $payload = json_encode( $data );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $result = curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
   
    if(sizeof($result) != 0){
      $_SESSION['carnetind']=$result['reporte']['carnet'] ;
      $_SESSION['nombreind']=$result['reporte']['nombre'] ;
      $_SESSION['cursoind']=$result['reporte']['curso'] ;
      $_SESSION['cuerpoind']=$result['reporte']['reporte'] ;
      echo $_SESSION['cuerpoind'];
      $_SESSION['fechaind']=$result['reporte']['fecha'] ;
      $_SESSION['servidorind']=$result['reporte']['servidor'] ;
      $_SESSION['servatend'] =$result['servidorrecibido'] ;
    }
  //se va a la pantalla individual
  echo "<script>
                alert('Cargando Reporte...');
                window.location= 'uploadreporterequest.php'
    </script>";
  header("Location: reporteind.php");
  exit;
}else{
  echo "<script>
                alert('No se pudo cargar reporte :(');
                window.location= 'uploadreporterequest.php'
    </script>";
  header("Location: listareporte.php");
  exit;

}
?>

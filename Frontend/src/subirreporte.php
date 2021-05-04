<?php
session_start();
include_once "header.php";
?>

<div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ingreso Nueva Transaccion</h3></div>

						<?php  

if($_SESSION['color']==1){
echo "<div class='form-group mt-4 mb-0'>
                                                    <button class='btn btn-primary btn-block' style='background-color: yellow; color:black;'>Nota: Saldo insuficiente. </button>
                                                </div>"; 
}else if($_SESSION['color']==2){
echo "<div class='form-group mt-4 mb-0'>
                                                    <button class='btn btn-primary btn-block' style='background-color: green; color:black;'>Nota: Transaccion realizada. </button>
                                                </div>";  
}else if($_SESSION['color']==3){
echo "<div class='form-group mt-4 mb-0'>
                                                    <button class='btn btn-primary btn-block' style='background-color: red; color:white;'>Nota: Error al realizar transaccion </button>
                                                </div>";  
}

else{
echo "<div class='form-group mt-4 mb-0'>
                                                    <button class='btn btn-primary btn-block' '> Realice una transaccion nueva. </button>
                                                </div>";  

}
?>
						
                                    <div class="card-body">
                                        <form method="post" action="consulta7.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                    <label for="cuenta">Elegir Cuenta Origen:</label>
                                                    <select class="form-control py" id="inputcuenta1" name="inputcuenta1">
                                                        <?php  
                                                                    foreach ($_SESSION['cuentahabiente'] as $item) { 
                                                                        echo "
                                                                        <option value='".$item['nombre'].",".$item['apellido'].",".$item['cui'].",".$item['email'].",".$item['fechareg'].",".$item['genero'].",".$item['institucion'].",".$item['abreviatura'].",".$item['tipocuenta'].",".$item['saldoinicial']."'>".$item['cui']." - ".$item['nombre'].$item['apellido']." - ".$item['institucion']." - ".$item['tipocuenta']." - ".$item['saldoinicial']."</option>
                                                                        ";
                                                                    }
                                                                ?>    
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="cuenta">Elegir Cuenta Destino:</label>
                                                    <select class="form-control py" id="inputcuenta2" name="inputcuenta2">
                                                        <?php  
                                                                    foreach ($_SESSION['cuentahabiente'] as $item) { 
                                                                        echo "
                                                                        <option value='".$item['nombre'].",".$item['apellido'].",".$item['cui'].",".$item['email'].",".$item['fechareg'].",".$item['genero'].",".$item['institucion'].",".$item['abreviatura'].",".$item['tipocuenta'].",".$item['saldoinicial']."'>".$item['cui']." - ".$item['nombre'].$item['apellido']." - ".$item['institucion']." - ".$item['tipocuenta']." - ".$item['saldoinicial']."</option>
                                                                        ";
                                                                    }
                                                                ?>    
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputmonto">Monto a depositar: </label>
                                                        <input class="form-control py-4" id="inputmonto"  name="inputmonto" type="number"/>
                                                    </div>
                                

                                                <div class="form-group mt-4 mb-0">
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Submit">Realizar Transaccion</button>
                                                </div>
                                        </form>
 
				
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

<?php
include "footer.php"
?>

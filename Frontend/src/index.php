<?php
session_start();
$_SESSION['cuentahabiente']=[];
$_SESSION['institucion']=[];
$_SESSION['reporte1']=[];
$_SESSION['reporte2']=[];
$_SESSION['reporte3']=[];
$_SESSION['reporte4']=[];
$_SESSION['reporte5']=[];
$_SESSION['reporte6']=[];

include_once "header.php";
?>

<h1 style="color:white"></h1>
     
<div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                                <div class="card-header"><h3 class="text-center font-weight-light my-4">INICIO</h3></div>
                                                <div class="card-body">

                                                            
                                                <div class="form-group">
                                                                <label class="small mb-1" for="inputName"> Proyecto FInal - BD2 - 1s2021</label>
                                                                </div>
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputName">201602517     |     Marvin Saul Guzman Garcia</label>
                                                                </div>
                                                                
                                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
include "footer.php"
?>


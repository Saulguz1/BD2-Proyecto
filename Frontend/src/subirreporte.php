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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ingreso de reportes de practicantes</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="uploadreporterequest.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCarnet">Carnet:</label>
                                                        <input class="form-control py-4" id="inputCarnet"  name="inputCarnet" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputName">Nombre de Estudiante</label>
                                                        <input class="form-control py-4" id="inputName"  name="inputName" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCurso">Curso/Proyecto</label>
                                                        <input class="form-control py-4" id="inputCurso"  name="inputCurso" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCuerpo">Cuerpo del Reporte</label>
                                                        <textarea class="form-control py-4" id="inputCuerpo" name="inputCuerpo" rows="10" cols="40"></textarea> 
                                                    </div>

                                                <div class="form-group mt-4 mb-0">
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Submit">Enviar reporte</button>
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

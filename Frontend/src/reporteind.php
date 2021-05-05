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
                                        <form method="post" action="obtenerreportes.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCarnet">Carnet:</label>
                                                        <input class="form-control py-4" id="inputCarnet"  name="inputCarnet" value="<?php echo $_SESSION['carnetind'] ?>" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputName">Nombre de Estudiante</label>
                                                        <input class="form-control py-4" id="inputName"  name="inputName" value="<?php echo $_SESSION['nombreind'] ?>" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCurso">Curso/Proyecto</label>
                                                        <input class="form-control py-4" id="inputCurso"  name="inputCurso" value="<?php echo $_SESSION['cursoind'] ?>" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputp">Procesado por</label>
                                                        <input class="form-control py-4" id="inputp"  name="inputp" value="<?php echo $_SESSION['servidorind'] ?>" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputf">Fecha</label>
                                                        <input class="form-control py-4" id="inpuf"  name="inpuf" value="<?php echo $_SESSION['fechaind'] ?>" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputCuerpo">Cuerpo del Reporte</label>
                                                        <textarea class="form-control py-4" id="inputCuerpo" name="inputCuerpo" rows="10" cols="40"  readonly><?php echo $_SESSION['cuerpoind'] ?></textarea> 
                                                    </div>

                                                <div class="form-group mt-4 mb-0">
                                                <label class="small mb-1" for="inputCuerpo">Solicitud atendida por:  <?php echo ''.$_SESSION['servatend'].'' ?> </label>
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Submit">Regresar</button>
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

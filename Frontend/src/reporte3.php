<?php
session_start();
include_once "header.php";
?>
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Credito_by_Institucion
                            </div>
                            <div class="card-header">
                            <form method="post" action="consulta3.php" enctype="multipart/form-data">

                            <label for="cuenta">Elegir Institucion:</label>
                            <select id="inputins" name="inputins">
                                <?php  
                                            foreach ($_SESSION['institucion'] as $item) { 
                                                echo "
                                                <option value=".$item['institucion'].">".$item['institucion']."</option>
                                                ";
                                            }
                                        ?>    
                            </select>
                            <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Submit">Buscar</button>
                            </form>
                            </div>
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Institucion</th>
                                                <th>Abreviatura</th>
                                                <th>Monto</th>
                                                <th>Fecha</th>
                                              
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Institucion</th>
                                                <th>Abreviatura</th>
                                                <th>Monto</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                          
                                            foreach ($_SESSION['reporte3'] as $item) {
                                                echo "
                                                <tr>
                                                <td align='center'>".$item['institucion']."</td>
                                                <td align='center'>".$item['abreviatura']."</td>
                                                <td align='center'>".$item['montotransf']."</td>
                                                <td align='center'>".$item['fechatransf']."</td>
                                                </tr>
                                                ";
                                            }
                                        ?>                                        
                                        </tbody>
                                    </table>
                                </div>
                             </div>
                </div>


<?php
include "footer.php"
?>

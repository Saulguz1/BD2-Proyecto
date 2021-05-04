<?php
session_start();
include_once "header.php";
?>
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Transaccion_by_CuentaHabiente 
                            </div>
                            <div class="card-header">
                            <form method="post" action="consulta1.php" enctype="multipart/form-data">

                            <label for="cuenta">Elegir CUI de cuentahabiente:</label>
                            <select id="inputCui" name="inputCui">
                                <?php  
                                            foreach ($_SESSION['cuentahabiente'] as $item) { 
                                                echo "
                                                <option value=".$item['cui'].">".$item['cui']." - ".$item['nombre']." - ".$item['apellido']." - ".$item['institucion']."</option>
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
                                                <th>CUI</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Intitucion</th>
                                                <th>Saldo Inicial</th>
                                                <th>Monto</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>CUI</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Email</th>
                                                <th>Intitucion</th>
                                                <th>Saldo Inicial</th>
                                                <th>Monto</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                          
                                            foreach ($_SESSION['reporte1'] as $item) {
                                                echo "
                                                <tr>
                                                <td align='center'>".$item['cui']."</td>
                                                <td align='center'>".$item['nombre']."</td>
                                                <td align='center'>".$item['apellido']."</td>
                                                <td align='center'>".$item['institucion']."</td>
                                                <td align='center'>".$item['saldoinicial']."</td>
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

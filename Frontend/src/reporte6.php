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
                            <form method="post" action="consulta6.php" enctype="multipart/form-data">

                            <label for="cuenta">Elegir Cuentahabiente:</label>
                            <select id="inputCui" name="inputCui">
                                <?php  
                                            foreach ($_SESSION['cuentahabiente'] as $item) { 
                                                echo "
<option value=".$item['cui'].">".$item['cui']." - ".$item['nombre']." - ".$item['apellido']." - ".$item['institucion']."</option>
                                                ";
                                            }
                                        ?>    
                            </select>
                            <label for="cuenta">Elegir Mes:</label>
                            <select id="inputmes" name="inputmes">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                                
                            </select>

 </select>
                            <label for="cuenta">Elegir A??o:</label>
                            <select id="inputano" name="inputano">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            
                                                
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
                                                <th>Tipo Cuenta</th>
                                                <th>Monto</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>CUI</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Intitucion</th>
                                                <th>Tipo Cuenta</th>
                                                <th>Monto</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                          
                                            foreach ($_SESSION['reporte6'] as $item) {
                                                echo "
                                                <tr>
                                                <td align='center'>".$item['cui']."</td>
                                                <td align='center'>".$item['nombre']."</td>
                                                <td align='center'>".$item['apellido']."</td>
                                                <td align='center'>".$item['institucion']."</td>
                                                <td align='center'>".$item['tipocuenta']."</td>
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

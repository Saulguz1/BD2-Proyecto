<?php
session_start();
include_once "header.php";
?>
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                CuentaHabientes
                            </div>
                            <div class="card-header">
                           
                            </div>
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>CUI</th>
                                                <th>Email</th>
                                                <th>Fecha Reg</th>
                                                <th>Genero</th>
                                                <th>Institucion</th>
                                                <th>Sañdo Inicial</th>
                                              
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>CUI</th>
                                                <th>Email</th>
                                                <th>Fecha Reg</th>
                                                <th>Genero</th>
                                                <th>Institucion</th>
                                                <th>Saldo Inicial</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                          
                                            foreach ($_SESSION['reporte4'] as $item) {
                                                echo "
                                                <tr>
                                                <td align='center'>".$item['nombre']."</td>
                                                <td align='center'>".$item['apellido']."</td>
                                                <td align='center'>".$item['cui']."</td>
                                                <td align='center'>".$item['email']."</td>
                                                <td align='center'>".$item['fechareg']."</td>
                                                <td align='center'>".$item['genero']."</td>
                                                <td align='center'>".$item['institucion']."</td>
                                                <td align='center'>".$item['saldoinicial']."</td>
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

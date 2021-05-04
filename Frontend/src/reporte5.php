<?php
session_start();
include_once "header.php";
?>
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Instituciones
                            </div>
                            <div class="card-header">
                           
                            </div>
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Institucion</th>
                                                <th>Abreviatura</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Institucion</th>
                                                <th>Abreviatura</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                          
                                            foreach ($_SESSION['reporte5'] as $item) {
                                                echo "
                                                <tr>
                                                
                                                <td align='center'>".$item['institucion']."</td>
                                                <td align='center'>".$item['abreviatura']."</td>
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

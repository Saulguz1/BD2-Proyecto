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
$_SESSION['color']=0;
$_SESSION['username']='';
include_once "outheader.php";
?>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="loginrequest.php" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputUser"  name="inputUser" placeholder="Ingrese su usuario" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword"  name="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                       
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        
<?php
include "outfooter.php"
?>

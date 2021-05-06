<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Proyecto-BD2</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <style>
        body {
        background-image: url('https://steamuserimages-a.akamaihd.net/ugc/708526305132654960/B48B2A593B7C76205C510AD1AA3200004C7D1486/');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        }
        </style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Proyecto-BD2</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php">Inicio</a>
                        <div class="dropdown-divider"></div>    
                        <a class="dropdown-item" href="obtenerreporte7.php">Realizar Transaccion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="obtenerreporte1.php">Transaccion By CuentaHabiente</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="obtenerreporte2.php">Debito By Institucion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="obtenerreporte3.php">Credito By Institucion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="obtenerreporte4.php">Cuentahabientes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="obtenerreporte5.php">Institucion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="obtenerreporte6.php">Movimientos by Cuentahabiente by Mes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Login.php">Cerrar Sesion</a>
                        <div class="dropdown-divider"></div>
                    </div>    
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Acciones</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Inicio
                            </a>
                            <a class="nav-link" href="obtenerreporte7.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Realizar Transaccion
                            </a>
                            <a class="nav-link" href="obtenerreporte1.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaccion By CuentaHabiente
                            </a>
                            <a class="nav-link" href="obtenerreporte2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Debito By Institucion
                            </a>
                            <a class="nav-link" href="obtenerreporte3.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Credito By Institucion
                            </a>
                            <a class="nav-link" href="obtenerreporte4.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Cuentahabientes
                            </a>
                            <a class="nav-link" href="obtenerreporte5.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Institucion
                            </a>
                            <a class="nav-link" href="obtenerreporte6.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Movimientos by Cuentahabiente by Mes
                            </a>

                            
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo "".$_SESSION['username']."";?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

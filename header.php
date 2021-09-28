<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>
<body>
<div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="index.php">Supermercado en linea</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                        <?php
                        if(isset($_SESSION['idusuario']) ){
                        ?>
                        <li class="nav-item"><a class="nav-link" href="cerrar_sesion.php"><img src="imagenes/menu/atras.png"   width="60" height="60"></a></li>
                        <li class="nav-item"> <a class="nav-link" href="configurar.php?valor=inicio" >Usuario:  <?= $_SESSION['nombre_de_usuario']; ?></a> </li>
                        
                        <?php    
                        }
                        else{
                        ?>
                        <li class="nav-item"><a class="nav-link" href="inicio_sesion.php"><img src="imagenes/menu/registro.png"   width="60" height="60"></a></li>
                            
                        <?php } ?>
                                <img src="imagenes/menu/carrito.png" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar  Compra</a>
                                </div>
                                <li class="nav-item"><a class="nav-link"                            href="reclamos.php">                <img src="imagenes/menu/reclamo.png"    width="60" height="60"></a></li>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
</body>
</html>
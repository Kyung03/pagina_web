<?php
//if(isset($_SESSION['idusuario']))
session_start();

//echo $_SESSION['idusuario'];
include("conexion.php");
$con=conectar();
include("consulta.php"); 
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <title>Supermercado web</title>
</head>

<body onload="botonOFF()">

    <header>
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
                        <li class="nav-item"><a class="nav-link" href="cerrar_sesion.php"><img src="imagenes/menu/atras.png"   width="40" height="40"></a></li>

                           
                        <?php    
                        }
                        else{
                        ?>
                        <li class="nav-item"><a class="nav-link"                            href="inicio_sesion.php"><img src="imagenes/menu/registro.png"   width="40" height="40"></a></li>
                            
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
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                                        Compra</a>
                                </div>
                                <li class="nav-item"><a class="nav-link"                            href="#!">                <img src="imagenes/menu/reclamo.png"    width="40" height="40"></a></li>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            
             
        </div>
        
       
        <form action="registrar_solicitud.php" method="POST"> 
                    <center> 
                    <h1 class="display-5 fw-bold">Registrar datos</h1>
                    <label for="nombreU">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="">
                    <br><br>
                    <label for="apellidoU">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="">
                    <br><br>
                    <label for="correoU">Correo: </label>
                    <input type="text" id="correo" name="correo" value="">
                    <br><br>
                    <label for="telU">Telefono:</label>
                    <input type="text" id="tel" name="tel" value="">
                    <br><br>
                    <label for="dirU">Dirección:</label>
                    <input type="text" id="dir" name="dir" value=""> 
                    <br><br>
                    <label for="dirU">Ciudad:</label>
                    <select name=ciudad>
                    <option value='0'>Seleccione</option>
                    <?php 
                    $sql2="SELECT nombre_ciudad FROM `ciudad` ";
                    $result2=mysqli_query($con,$sql2);
                    while($mostrar2=mysqli_fetch_array($result2)){
                        echo '<option value="'.$mostrar2['nombre_ciudad'].'">'.$mostrar2['nombre_ciudad'].'</option>'; 
                    }
                    ?>
                    </select><br>
                    
                    <button class="btn btn-primary btn-lg" type="submit" id="myBtn">Ingresar</button>
                    
                    </center>
                   
                </form> 
    </main>

    <div id="con">
    <div id="footer">
    
    <p style="background: #2e4053; color:white; font-weight:bold; padding:15px; border:3px solid  #2e4053; margin-top:40px; margin-bottom:40px; text-align:center; font-size:22px; border-radius:10px;">
    <input type="button" value="Acerca de nosotros" onclick="location.href='contacto.php'">
    <input type="button" value="Solicitud de empleo" onclick="location.href='solicitud.php'">
    </p>
    
    </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>

</body>

</html>

<script>
let seleccionar = document.querySelector('select');
let collection = seleccionar.selectedOptions;
seleccionar.addEventListener('change', seleccion_ciudad);

function seleccion_ciudad() {
  let eleccion = seleccionar.value;
  if (eleccion === '0') {
    botonOFF();
  } else  {
    botonON();
  } 
}

function botonON() {
  document.getElementById("myBtn").disabled = false;
}
function botonOFF() {
  document.getElementById("myBtn").disabled = true;
}
</script>
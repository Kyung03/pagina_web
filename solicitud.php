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

<?php  require 'header.php'; ?>

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

    <?php  require 'footer.php'; ?>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>

</body>

</html>

<script src="js/boton.js"></script>
<?php 
session_start(); 
include("conexion.php");
$con=conectar();


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
    <title>Configurar usuario</title>
    <style>
.vertical-menu {
  width: 200px;
  position: absolute;
  left: 0px;
  top: 90px;
}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu a.active {
  background-color: #04AA6D;
  color: white;
}
    </style>
</head>
<body>
<?php  require 'header.php'; ?>
<main>
<div class="vertical-menu">
  <a href="#" class="active">Menu</a>
  <a href="configurar.php?valor=datos">Informacion</a>
  <a href="configurar.php?valor=datos_usuario">Cambiar contraseña</a>
  <a href="configurar.php?valor=compras">Compras</a>
  <a href="configurar.php?valor=reclamos">Reclamos</a>
</div>

<div class="container px-lg-5">
    <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
        <div class="m-4 m-lg-5"> 
            <?php 
            $var = $_GET["valor"]; 
            switch($var){
                case "datos":
                    require 'configurar.datos.vista.php';
                    break;
                case "inicio":
                    echo "<br><br><h2> Aqui puede configurar toda la informacion de su cuenta y revisar las acciones realizadas </h2>";
                    break;
                case "compras":
                    echo "<h2> Lista de compras realizadas </h2>";
                    require 'configurar.compras.vista.php';
                    break;
                case "reclamos":
                    echo "<h2> Reclamos realizados </h2>";
                    require 'configurar.reclamos.vista.php';
                    break;
                case "datos_usuario":
                    require 'configurar.usuario.vista.php';
                    break;
                default:
                    break;
            }
            ?>
        </div>
    </div>
</div>

<div class="container" id="lista-productos">  
<div class="card-deck mb-3 text-center">
</div>
</div> 
</main>
<?php  require 'footer.php'; ?>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/carrito.js"></script>
<script src="js/pedido.js"></script>
</body>
</html>
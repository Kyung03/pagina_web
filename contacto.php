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

<body>
    <?php  require 'header.php'; ?>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            
            <h1 class="display-4 mt-4">Lista de Productos</h1>
            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>
        <!-- Categorias  -->
        <center>
        <nav>
        <ull >
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=despensa" >  <font size=2 face="Georgia"><img src="imagenes/categorias/des.png"            width="70" height="70">Despensa         </font></a></lii> 
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=Carne"  >       <font size=3 face="Georgia"><img src="imagenes/categorias/carnes.png"         width="70" height="70">Carne            </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=Pescados"  >       <font size=2 face="Georgia"><img src="imagenes/categorias/pez.png"            width="70" height="70">Pescados         </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=Bebidas"  >        <font size=2 face="Georgia"><img src="imagenes/categorias/bebidas.png"        width="70" height="70">Bebidas          </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=Frutas"  >           <font size=3 face="Georgia"><img src="imagenes/categorias/frutas.png"         width="70" height="70">Frutas           </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=Verduras"  >           <font size=2 face="Georgia"><img src="imagenes/categorias/verduras.png"       width="70" height="70">Verduras         </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=Higiene"  >          <font size=2 face="Georgia"><img src="imagenes/categorias/higiene.png"        width="70" height="70">Higiene          </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="index.php?valor=Limpieza"  >        <font size=2 face="Georgia"><img src="imagenes/categorias/limpieza.png"       width="70" height="70">Limpieza         </font></a></lii>
        </ull>
        </nav>
        </center>
        <br>
        <!-- BOTON DE ORDENAMIENTO -->
        <center> 
        <input type="button" value="Precio" onclick="location.href='index.php?valor=precio_producto'">
        <input type="button" value="Alfabetico" onclick="location.href='index.php?valor=nombre_producto'">
        <br><br>
        </center>
       <!-- BARRA DE BUSQUEDA -->
        <form action="buscar.php" method="post">
        <center> 
        <input type="text" id="fname" name="fname" value="">
        <input type="submit" value="Buscar"><br>
        </center>
        </form>
        <br><br>
    </main>

        
    <h1 align="center" >Mision</h1>
    <i  align="center">
    Nuestra misión es convertirnos en una cadena de supermercados 
    a nivel nacional al tiempo que ofrecemos 
    un amplio surtido de productos de calidad a unos precios competitivos. 
    El desarrollo de nuestra actividad 
    se realiza teniendo en cuenta la labor de los empleados y el trato 
    personalizado y cercano hacia el cliente.
    A través de un compromiso con el desarrollo local, apostamos por 
    el modelo de franquicia para fortalecer 
    y hacer crecer el proyecto de Supermercados 
    La Despensa apostando por el trabajo en equipo y la colaboración.    
    </i>

    <h1 align="center">Vision</h1>
    <i style="text-align:justify">
    Consolidarnos como una cadena de supermercados cercana, donde el cliente siempre esté bien atendido y pueda realizar su compra de manera agradable y satisfactoria.
      </i>
    <h2 align="center">Informacion de contacto</h2>
    <h3 align="center">Telefonos</h3>
    <p align="center">1111-1111</p>
    <p align="center">1111-1111</p>
    <h3 align="center">Correo</h3>
    <p align="center">supermercadoweb@gmail.com</p>

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
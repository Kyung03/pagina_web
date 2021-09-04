<?php
//if(isset($_SESSION['idusuario']))
session_start();

//echo $_SESSION['idusuario'];
//echo $_SESSION['nombre_de_usuario'];
//die();
include("conexion.php");
$con=conectar();
include("en_consulta.php");
$query=consulta();



$result=mysqli_query($con,$query);
		
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

    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="en_index.php">Online supermarket</a>
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
                        <li class="nav-item"> <a class="nav-link">User:  <?= $_SESSION['nombre_de_usuario']; ?></a> </li>
                        
                        <?php    
                        }
                        else{
                        ?>
                        <li class="nav-item"><a class="nav-link"                            href="en_inicio_sesion.php"><img src="imagenes/menu/registro.png"   width="40" height="40"></a></li>
                            
                        <?php } ?>
                                <img src="imagenes/menu/carrito.png" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Empty Cart</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Process Purchase</a>
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
            
            <h1 class="display-4 mt-4">List of products</h1>
            <p class="lead">Select one of our products and access a discount</p>
        </div>
        <!-- Categorias  -->
        <center>
        <nav>
        <ull >
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=despensa" >  <font size=2 face="Georgia"><img src="imagenes/categorias/des.png"            width="70" height="70">Pantry         </font></a></lii> 
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=Carne"  >       <font size=3 face="Georgia"><img src="imagenes/categorias/carne2.png"         width="70" height="70">Meat            </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=Pescados"  >       <font size=2 face="Georgia"><img src="imagenes/categorias/pez.png"            width="70" height="70">Fish         </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=Bebidas"  >        <font size=2 face="Georgia"><img src="imagenes/categorias/bebidas.png"        width="70" height="70">Drinks          </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=Frutas"  >           <font size=3 face="Georgia"><img src="imagenes/categorias/frutas.png"         width="70" height="70">Fruits           </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=Verduras"  >           <font size=2 face="Georgia"><img src="imagenes/categorias/verduras.png"       width="70" height="70">Vegetables         </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=Higiene"  >          <font size=2 face="Georgia"><img src="imagenes/categorias/higiene.png"        width="70" height="70">Hygiene          </font></a></lii>
        <lii><a class="btn btn-primary btn-lg"  href="en_index.php?valor=Limpieza"  >        <font size=2 face="Georgia"><img src="imagenes/categorias/limpieza.png"       width="70" height="70">Cleaning         </font></a></lii>
        </ull>
        </nav>
        </center>
        <br>
        <!-- BOTON DE ORDENAMIENTO -->
        <center> 
        <input type="button" value="Price" onclick="location.href='en_index.php?valor=precio_producto'">
        <input type="button" value="Alphabetic" onclick="location.href='en_index.php?valor=nombre_producto'">
        <br><br>
        </center>
       <!-- BARRA DE BUSQUEDA -->
        <form action="buscar.php" method="post">
        <center> 
        <input type="text" id="fname" name="fname" value="">
        <input type="submit" value="Search"><br>
        </center>
        </form>
        <br><br>
        <div class="container" id="lista-productos">
            
            <div class="card-deck mb-3 text-center">
            <?php
                while($mostrar=mysqli_fetch_array($result)){
                ?>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold"><?=$mostrar['nombre_producto']?></h4>
                    </div>
                    <div class="card-body">
                        <img src="imagenes/productos/<?=$mostrar['imagen']?>"  class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">Q/. <span class=""><?=$mostrar['precio_producto']?></span></h1>

                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="<?=$mostrar['codigo_producto']?>">Buy</a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>

        </div> <!-- no borrar --->
    </main>

    <div id="con">
    <div id="footer">
    
    <p style="background: #2e4053; color:white; font-weight:bold; padding:15px; border:3px solid  #2e4053; margin-top:40px; margin-bottom:40px; text-align:center; font-size:22px; border-radius:10px;">
    <input type="button" value="About us" onclick="location.href='en_contacto.php'">
    <input type="button" value="Job application" onclick="location.href='en_solicitud.php'">
    <a href="en_index.php" ><img src="imagenes/menu/en.png"  width="40" height="40"> </a>
    <a href="index.php" ><img src="imagenes/menu/es.png"  width="40" height="30"> </a>
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
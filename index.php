<?php
//if(isset($_SESSION['idusuario']))
session_start();
echo $_SESSION['idusuario'];
include("conexion.php");
$con=conectar();

$sql="SELECT * from producto";
$result=mysqli_query($con,$sql);
		
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pagina principal</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body >
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="#!">Supermercado Web</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">                <img src="imagenes/menu/carrito.png"    width="40" height="40"></a></li>
                        <?php
                        if(isset($_SESSION['idusuario'])){
                        ?>
                        <li class="nav-item"><a class="nav-link"                            href="index.php"><img src="imagenes/menu/carrito.png"   width="40" height="40"></a></li>
                        <?php    
                        }
                        else{

                        
                        ?>
                        <li class="nav-item"><a class="nav-link"                            href="inicio_sesion.php"><img src="imagenes/menu/registro.png"   width="40" height="40"></a></li>
                        <?php } ?>
                        <li class="nav-item"><a class="nav-link"                            href="#!">                <img src="imagenes/menu/reclamo.png"    width="40" height="40"></a></li>
                    </ul>
                    
                </div>
                
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Bienvenido</h1>
                      <!--   <p class="fs-4">Informacion</p>
                      <!--  <a class="btn btn-primary btn-lg" href="#!">Ingresar</a>-->
                      <!-- Categorias  -->
                      <center>
                        <nav>
                            <ull id="mainMenu">
                                <lii><a class="btn btn-primary btn-lg"  href="inicio_sesion.html">  <font size=2 face="Georgia"><img src="imagenes/categorias/des.png"            width="70" height="70">Despensa         </font></a></lii> 
                                <lii><a class="btn btn-primary btn-lg"  href="services.html">       <font size=3 face="Georgia"><img src="imagenes/categorias/carne.png"          width="70" height="70">Carne            </font></a></lii>
                                <lii><a class="btn btn-primary btn-lg"  href="products.html">       <font size=2 face="Georgia"><img src="imagenes/categorias/pez.png"            width="70" height="70">Pescados         </font></a></lii>
                                <lii><a class="btn btn-primary btn-lg"  href="support.html">        <font size=2 face="Georgia"><img src="imagenes/categorias/bebidas.png"        width="70" height="70">Bebidas          </font></a></lii>
                                <lii><a class="btn btn-primary btn-lg"  href="blog.html">           <font size=3 face="Georgia"><img src="imagenes/categorias/frutas.png"         width="70" height="70">Frutas           </font></a></lii>
                                <lii><a class="btn btn-primary btn-lg"  href="blog.html">           <font size=2 face="Georgia"><img src="imagenes/categorias/verduras.png"         width="70" height="70">Verduras         </font></a></lii>
                                <lii><a class="btn btn-primary btn-lg"  href="about.html">          <font size=2 face="Georgia"><img src="imagenes/categorias/higiene.png"        width="70" height="70">Higiene          </font></a></lii>
                                <lii><a class="btn btn-primary btn-lg"  href="contact.html">        <font size=2 face="Georgia"><img src="imagenes/categorias/limpieza.png"       width="70" height="70">Limpieza         </font></a></lii>
                            </ull>
                        </nav>
                    </center>
                    <br>

                    </div>
                        
                        
                </div>
                
            </div>
                
        </header>
        
        <!-- Page Content-->
       
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <center> 
                <!--  <label for="fname">Buscar producto:</label>-->
                <input type="text" id="fname" name="fname" value="">
                <input type="submit" value="Buscar"><br>
                </center>
                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <script>
                                    function traer_algo() {
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                          if (this.readyState == 4 && this.status == 200) {
                                           document.getElementById("contenido").innerHTML = (this.responseText);
                                           console.log((this.responseText));
                                          }
                                        };
                                        xhttp.open("POST", "ejemplo.php", true);
                                        xhttp.send();
                                      }
                                    </script>
                                <img src="imagenes/productos/aceite.jpg" width="200" height="200" onload="traer_algo()" >
                                <h2 id="contenido" class="fs-4 fw-bold" ></h2>
                                <p class="mb-0">-</p><input type="button" value="Agredar" >
                            </div>
                        </div>
                    </div>
                    <?php
                    while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <img src="imagenes/productos/<?=$mostrar['imagen']?>" width="200" height="200">
                                <h2 class="fs-4 fw-bold"><?=$mostrar['nombre_producto']?> </h2>
                                <p class="mb-0">Q.15.00 </p><input type="button" value="Agredar">
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <img src="imagenes/productos/jabon.jpg" width="200" height="200">
                                <h2 class="fs-4 fw-bold">Jabón</h2>
                                <p class="mb-0">-</p><input type="button" value="Agredar">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <img src="imagenes/productos/gas.jpg" width="200" height="200">
                                <h2 class="fs-4 fw-bold">Gaseosa</h2>
                                <p class="mb-0">-</p><input type="button" value="Agredar">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <img src="imagenes/productos/harina.jpg" width="200" height="200">
                                <h2 class="fs-4 fw-bold">Harina</h2>
                                <p class="mb-0">-</p><input type="button" value="Agredar">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <img src="imagenes/productos/atun.jpg" width="200" height="200">
                                <h2 class="fs-4 fw-bold">Atún</h2>
                                <p class="mb-0">-</p><input type="button" value="Agredar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
    </body>
</html>



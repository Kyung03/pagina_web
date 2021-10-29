<?php 
include("conexion.php");
$con=conectar(); 
session_start(); 
$query_duda="select * from preguntas";
$result_duda=mysqli_query($con,$query_duda); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro de datos super web</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
         
    </head>
    <body >
        <!-- Responsive navbar-->
        <?php  require 'header.php'; ?>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5"> 
                            <center> 
                            <h2 class="display-5 fw-bold">Preguntas</h2> 
                            <?php
                            while($mostrar_duda=mysqli_fetch_array($result_duda)){
                            ?>
                            <div class="card mb-4 shadow-sm"> 
                                <div class="card-body">  
                                    <label style="color:red"> <?=$mostrar_duda['pregunta']?> </label> 
                                    <br>
                                    <label style="color:blue"> <?=$mostrar_duda['descripcion']?> </label> 
                                    <br><br>
                                </div>
                            </div>
                            <?php
                                }
                            ?> 
                            </center>  
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        <!-- Footer-->
        <div class="container" id="lista-productos">  
        <div class="card-deck mb-3 text-center">
        </div>
        </div>  
        <?php  require 'footer.php'; ?> 
        
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/carrito.js"></script>
        <script src="js/pedido.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html> 
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
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php  require 'header.php'; ?>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <form action="registrar.php" method="POST"> 
                    
                            <center> 
                            <h1 class="display-5 fw-bold">Registrar datos</h1>
                            <label for="nombreU">Nombre:</label>
                            <input type="text" id="nombreU" name="nombreU" value="">
                            <br><br>
                            <label for="apellidoU">Apellido:</label>
                            <input type="text" id="apellidoU" name="apellidoU" value="">
                            <br><br>
                            <label for="correoU">Correo: </label>
                            <input type="text" id="correoU" name="correoU" value="">
                            <br><br>
                            <label for="telU">Telefono:</label>
                            <input type="text" id="telU" name="telU" value="">
                            <br><br>
                            <label for="dirU">Dirección:</label>
                            <input type="text" id="dirU" name="dirU" value="">
                            <br><br>
                            <label for="usuarioU">Usuario:</label>
                            <input type="text" id="usuarioU" name="usuarioU" value="">
                            <br><br>
                            <label for="contrasenaU">Contraseña:</label>
                            <input type="text" id="contrasenaU" name="contrasenaU" value="">
                            <br><br>
                            <option value='0'>Seleccione</option>"
                            <select name=ciudad>
                            <option value='0'>Seleccione</option>"
                            <?php
                            include("conexion.php");
                            $con=conectar();
                            $sql2="SELECT nombre_ciudad FROM `ciudad` ";
                            $result2=mysqli_query($con,$sql2);
                            while($mostrar2=mysqli_fetch_array($result2)){
                                echo '<option value="'.$mostrar2['codigo_ciudad'].'">'.$mostrar2['nombre_ciudad'].'</option>'; 
                            }
                            ?>
                            </select>
                            <br><br>
                            </center>
                            <button class="btn btn-primary btn-lg" type="submit" >Ingresar</button>
                        </form>
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

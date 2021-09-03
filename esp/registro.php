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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="index.php">Supermercado web</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php"><img src="imagenes/menu/atras.png" width="40" height="40"></a></li>
                        <li class="nav-item"><a class="nav-link" href="inicio_sesion.html"><img src="imagenes/menu/carrito.png" width="40" height="40"></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><img src="imagenes/menu/reclamo.png" width="40" height="40"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
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
                            </center>
                            <button class="btn btn-primary btn-lg" type="submit" >Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
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

<?php
//if(isset($_SESSION['idusuario']))
session_start(); 
		
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <title>Carrito Compras en JavaScript</title>
    
</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-between mb-5">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="index.php">Supermercado en linea</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>

    <br>

    <main>
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h2 class="d-flex justify-content-center mb-3">Realizar Compra</h2>
                    <form id="procesar-pago" action="#">
                        <?php
                        if(isset($_SESSION['idusuario']) ){
                        ?>
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Nombre :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente" value="<?= $_SESSION['nombre_de_cliente']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Apellido :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente" value="<?= $_SESSION['apellido_de_cliente']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Telefono :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente" value="<?= $_SESSION['telefono_de_cliente']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Direccion :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente" value="<?= $_SESSION['direccion_de_cliente']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente" value="<?= $_SESSION['correo_de_cliente']; ?>" required>
                            </div>
                        </div>
                        <?php    
                        }
                        else{
                        ?>
                        <!-- <th scope="col"></th> -->
                        
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Cliente :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa nombre cliente" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Apellido :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa apellido cliente" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Telefono :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa tu telefono" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Direccion :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa tu direccion" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="email" class="form-control" id="correo" placeholder="Ingresa tu correo" required>
                            </div>
                        </div>

                        -

                        <?php } ?>
                        
                        <div class="row justify-content-center" id="loaders"> 
                            <div style="text-align:center;">
                                <table>
                                    <tr><h3>Metodo de Pago</h3> 
                                        <td>
                                        <label class="container">Contra entrega
                                        <input type="radio" checked="checked" name="radio">
                                        <span class="checkmark"></span>
                                        </label></td>
                                        <td>
                                        <label class="container">Tarjeta de credito
                                        <input type="radio" checked="checked" name="radio">
                                        <span class="checkmark"></span>
                                        </label></td>
                                    </tr>
                                </table>
                            </div> 
                        </div>

                        <div id="carrito" class="table-responsive">
                            <table class="table" id="lista-compra">
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">SUB TOTAL :</th>
                                    <th scope="col">
                                        <p id="subtotal"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">IVA :</th>
                                    <th scope="col">
                                        <p id="igv"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">TOTAL :</th>
                                    <th scope="col">
                                        <p id="total"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>

                            </table>
                        </div>
                        

                        <div class="row justify-content-center" id="loaders">
                            <img id="cargando" src="img/cargando.gif" width="220">
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-2">
                                <a href="index.php" class="btn btn-info btn-block">Seguir comprando</a>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a href="" class="btn btn-success btn-block" id="procesar-compra">Realizar compra</a>
                            </div>
                        </div>
                    </form>


                </div>


            </div>

        </div>
    </main>





    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/compra.js"></script>

</body>

</html>
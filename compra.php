<?php
//if(isset($_SESSION['idusuario']))
session_start(); 


		
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

<body  >
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
                     
                        <?php
                        if(isset($_SESSION['idusuario']) ){
                        ?>
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Nombre :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $_SESSION['nombre_de_cliente']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Apellido :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="apellido" class="form-control" id="apellido" value="<?= $_SESSION['apellido_de_cliente']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Telefono :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="telefono" class="form-control" id="telefono" value="<?= $_SESSION['telefono_de_cliente']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Direccion :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="direccion" class="form-control" id="direccion" value="<?= $_SESSION['direccion_de_cliente']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="correo" class="form-control" id="correo" value="<?= $_SESSION['correo_de_cliente']; ?>" required>
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
                                <input type="text" name="nombre" class="form-control" id="nombre"
                                    placeholder="Ingresa nombre cliente" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Apellido :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="apellido" class="form-control" id="apellido"
                                    placeholder="Ingresa apellido cliente" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Telefono :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="telefono" class="form-control" id="telefono"
                                    placeholder="Ingresa tu telefono" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Direccion :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="direccion" class="form-control" id="direccion"
                                    placeholder="Ingresa tu direccion" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="email" name="correo" class="form-control" id="correo" placeholder="Ingresa tu correo" required>
                            </div>
                        </div>

                        -

                        <?php } ?>
                        
                        <div class="row justify-content-center" id="loaders"> 
                            <div style="text-align:center;">
                            <h2>Metodo de pago</h2>
                                <select name="mpago" id="mpago">
                                    <option value="Contra entrega">Contra entrega</option>
                                    <option value="Tarjeta de credito">Tarjeta de credito</option>
                                </select>
                            </div> 
                        </div>
                        <br><br>
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
                                        <p id="subtotal" name="subtotal"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">IVA :</th>
                                    <th scope="col">
                                        <p id="igv" name="igv"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">TOTAL :</th>
                                    <th scope="col">
                                        <p id="total" name="total"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>

                            </table>
                            <p id="pr"></p>
                        </div>
                        

                        <div class="row justify-content-center" id="loaders">
                            
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-2">
                                <a href="index.php" class="btn btn-info btn-block">Seguir comprando</a>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <button type="submit" id="button" class="btn btn-success btn-block" onclick="window.print()">Realizar compra</button> 
                                
                            </div>
                                 
                        </div>
                    


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

<script>
    var lista = [];
    var lista_cantidad = [];
    var lista_precios = [];
    var lista_nombres = [];

    $(document).ready(function(){
        
        $("#button").click(function(){
            prueba();
            var nombre=$("#nombre").val(); 
            var apellido=$("#apellido").val(); 
            var telefono=$("#telefono").val(); 
            var correo=$("#correo").val(); 
            var direccion=$("#direccion").val(); 
            //var clienteid=$("#clienteid").val();
            var mpago=$("#mpago").val();
            for(var i=0; i<lista.length; i++){ 
                var can=document.getElementById("cantidad"+lista[i]).value;  
                lista_cantidad.push(can);
                } 
            $.ajax({
                url:'compra_procesada.php',
                method:'POST',
                data:{
                    'lista': JSON.stringify(lista),
                    'lista_precios': JSON.stringify(lista_precios),
                    'lista_cantidad': JSON.stringify(lista_cantidad),
                    'lista_nombres': JSON.stringify(lista_nombres),
                    nombre:nombre,
                    apellido:apellido,
                    telefono:telefono,
                    correo:correo,
                    direccion:direccion,
                    mpago:mpago
                },
               success:function(data){
                   //alert(data);
                   //location.replace("index.php");
                   if(data.trim() == "fallo"){
                    alert("Uno de los productos excede las existencias");
                    window.location.replace("index.php");
                    }else{
                    alert("compra realizada correctamente.");
                    window.location.replace("index.php");
                    }
               }
            });
        });
    });

    function prueba(){
        if (typeof(Storage) !== "undefined") {
    // Store 
    // Retrieve
    var obj = JSON.parse(localStorage.getItem('productos'));
    obj.forEach(function (producto){
        
                lista.push(producto.id);
                //lista_cantidad = document.getElementById("cantidad"+producto.id).value;
                lista_precios.push(producto.precio);
                lista_nombres.push(producto.titulo);
                
                //alert(lista);  
                //alert(lista_nombres);
                //alert(lista_precios);
                //alert(lista_cantidad);
                 
        }); 
        } else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
        }
    }
</script>
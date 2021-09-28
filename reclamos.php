<?php
//if(isset($_SESSION['idusuario']))
session_start();

include("conexion.php");
$con=conectar();
include ("consulta.php")

//echo $_SESSION['idusuario'];
//echo $_SESSION['nombre_de_usuario'];
//die();
		
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
            
            <h1 class="display-4 mt-4">Reclamos</h1>
           

        </div>
                            
        <?php
                    if(isset($_SESSION['idusuario']) ){
                        ?>
                    <form action="registrar_reclamo.php" method="POST"> 
                    <center>
                    <h1 class="display-5 fw-bold">Registrar reclamo</h1>
                    <!--
                    <label for="num_factura">Numero de Factura:</label>
                    <input type="text" id="num_factura" name="num_factura" value="">
                    --->
                    <br><br>
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id="descripcion" name="Descripcion" value="">
                    <br><br>
                    <label for="tip_reclamo">Tipo de reclamo: </label>
                    <select name=tipo_reclamo>
                    <option value='0'>Seleccione</option> 
                    <?php 
                    $sql2="SELECT *  FROM `tipo_reclamo` ";
                    $result2=mysqli_query($con,$sql2);
                    while($mostrar2=mysqli_fetch_array($result2)){
                        echo '<option value="'.$mostrar2['codigo_tipo_reclamo'].'">'.$mostrar2['nombre_tipo_reclamo'].'</option>'; 
                    }
                    ?>
                    </select><br>
                    <button class="btn btn-primary btn-lg" type="submit" id="myBtn">Registrar</button>
                    </center>
                    </form>
                        <?php    
                    }
                        else{
                        ?>
                        <center>
                        <label>Para hacer un reclamo es necesario <a href="inicio_sesion.php">iniciar sesion</a></label><br>
                        <label>Para registrar puedes entrar <a href="registro.php">aqui</a> </label>
                        </center>
                        <?php 
                        } ?>
        
            
        
               
                                
        
        <div class="container" id="lista-productos">
            
            <div class="card-deck mb-3 text-center">
           
            </div>

        </div> 
        <!-- no borrar --->
    </main>

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="py-5">

                <form action = "actualizar_usuario.php"  method="POST" >
                    <table >
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            
                        </tr> 
                        <tr>
                            <th> <input type="text" name="Nombre"       value="<?php echo $_SESSION['nombre_de_cliente'];       ?> " required> </th>
                            <th> <input type="text" name="Apellido"     value="<?php echo $_SESSION['apellido_de_cliente'];     ?> " required> </th>
                            <th> <input type="text" name="Correo"       value="<?php echo $_SESSION['correo_de_cliente'];       ?> " required> </th>
                            
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Ciudad</th> 
                        </tr>
                        <tr>
                            <th> <input type="text" name="Telefono"     value="<?php echo $_SESSION['telefono_de_cliente'];     ?> " required> </th>
                            <th> <input type="text" name="Dirección"    value="<?php echo $_SESSION['direccion_de_cliente'];    ?> " required> </th>
                            <th>  <select name=ciudad>
                    
                    <?php
                    $sql2="SELECT nombre_ciudad FROM `ciudad` ";
                    $result2=mysqli_query($con,$sql2);
                    while($mostrar2=mysqli_fetch_array($result2)){
                        echo '<option value="'.$mostrar2['codigo_ciudad'].'">'.$mostrar2['nombre_ciudad'].'</option>'; 
                    }
                    ?>
                    </select>
                     </th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            
                        </tr>
                    </table>
                    <br><br>
                    <center> 
                    <table class="table">
                        <tr> 
                            <th>Usuario</th>
                        </tr>
                        <tr>
                            <th> <input type="text" name="Usuario" value = " <?php echo $_SESSION['nombre_de_usuario']; ?> " required> </th>
                        </tr> 
                    </table>
                    </center>  
                    <button class="btn btn-primary btn-lg" type="submit" id="myBtn">Actualizar</button>
                </form>
                

</header>
</body>
</html>
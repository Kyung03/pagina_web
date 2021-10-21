
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
                    <form action = "actualizar_datos_usuario.php"  method="POST" >
                    <br><br>
                    <center> 
                    <table class="table">
                        <tr> 
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Re escribir contraseña</th>
                        </tr>
                        <tr>
                            <th> <input type="text" name="Usuario" value = " <?php echo $_SESSION['nombre_de_usuario']; ?> " required> </th>
                            <th> <input type="password" name="Contraseña" required> </th>
                            <th> <input type="password" name="Contraseña2" required> </th>
                        </tr> 
                    </table>
                    </center>  
                    <button class="btn btn-primary btn-lg" type="submit" id="myBtn">Actualizar</button>
                </form>
                

</header>
</body>
</html>
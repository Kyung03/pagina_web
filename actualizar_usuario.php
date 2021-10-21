<?php
session_start();
include("conexion.php");
$con=conectar();
$nombrecliente = $_POST['Nombre'];
$apellidocliente = $_POST['Apellido'];
$correocliente = $_POST['Correo'];
$telefonocliente = $_POST['Telefono'];
$direccioncliente = $_POST['Dirección'];
$departamentocliente = $_POST['ciudad'];
$usuariocliente = $_POST['Usuario'];
//$contrasenacliente = $_POST['Contraseña']; 
$idusuario = $_SESSION['idusuario'];
 
$query_cliente="UPDATE  `cliente` SET 
`nombre_cliente` = '$nombrecliente', 
`apellido_cliente` = '$apellidocliente', 
`telefono_cliente` = $telefonocliente, 
`correo_cliente` = '$correocliente', 
`direccion_cliente` = '$direccioncliente' 
where `codigo_usuario` = $idusuario";
mysqli_query($con,$query_cliente); 

$query_usuario = "UPDATE  `usuario` SET 
`usuario` = '$usuariocliente'
where `codigo_usuario` = $idusuario";
echo $query_usuario;
mysqli_query($con,$query_usuario); 

$_SESSION['nombre_de_usuario']      =   $usuariocliente         ;
$_SESSION['nombre_de_cliente']      =   $nombrecliente          ;
$_SESSION['apellido_de_cliente']    =   $apellidocliente        ;
$_SESSION['telefono_de_cliente']    =   $telefonocliente        ;
$_SESSION['correo_de_cliente']      =   $correocliente          ;
$_SESSION['direccion_de_cliente']   =   $direccioncliente       ;

$_SESSION['ciudad_de_cliente']      =   $departamentocliente    ;

mysqli_query($con,"CALL `procedimiento_accesos`('$idusuario','$usuariocliente','cliente','Actualizacion')");


echo '<script type="text/javascript">
    alert("Informacion actualizada correctamente.");
    window.location.assign("configurar.php?valor=inicio");
    </script>';
?>
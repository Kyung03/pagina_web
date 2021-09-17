<?php
session_start();
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"]; 
include("conexion.php");
$con=conectar();

$sql="SELECT * FROM `usuario` u, `cliente` c, `rol` r 
WHERE u.`codigo_usuario` = c.`codigo_usuario` and u.`codigo_rol` = r.`codigo_rol` and `usuario` = '$usuario' ";
$result=mysqli_query($con,$sql);
$mostrar=mysqli_fetch_array($result);
    if($contrasena==$mostrar['contrasena_usuario']){
 
        $_SESSION['idusuario']=$mostrar['codigo_usuario'];
        $_SESSION['nombre_de_usuario']=$mostrar['usuario'];
        $_SESSION['nombre_de_cliente']=$mostrar['nombre_cliente'];
        $_SESSION['apellido_de_cliente']=$mostrar['apellido_cliente'];
        $_SESSION['correo_de_cliente']=$mostrar['correo_cliente'];
        $_SESSION['direccion_de_cliente']=$mostrar['direccion_cliente'];
        $_SESSION['telefono_de_cliente']=$mostrar['telefono_cliente'];
        $cod = $mostrar['codigo_usuario'];
        $us = $mostrar['usuario'];
        $rol = $mostrar['nombre_rol'];
        echo $_SESSION['idusuario'];
        echo $_SESSION['nombre_de_usuario'];
        mysqli_query($con,"CALL `procedimiento_accesos`('$cod','$us','$rol','Ingreso')");
        
        header("Location:index.php")  ;
        }
    else{
    echo 'contrasena incorrecta';
}
	
?>
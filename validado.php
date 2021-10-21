<?php
session_start();
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"]; 
include("conexion.php");
$con=conectar();

$sql="SELECT * FROM `usuario` u, `cliente` c, `rol` r, `ciudad` b WHERE u.`codigo_usuario` = c.`codigo_usuario` and u.`codigo_rol` = r.`codigo_rol` and c.`codigo_ciudad` = b.`codigo_ciudad` and `usuario` = '$usuario' ";
$result=mysqli_query($con,$sql);
$mostrar=mysqli_fetch_array($result);
    if($mostrar['estado_usuario'] == 'activo'){
        if(password_verify($contrasena,$mostrar['contrasena_usuario'])){
 
            $_SESSION['idusuario']=$mostrar['codigo_usuario'];
            $_SESSION['idcliente']=$mostrar['codigo_cliente'];
            $_SESSION['nombre_de_usuario']=$mostrar['usuario'];
            $_SESSION['nombre_de_cliente']=$mostrar['nombre_cliente'];
            $_SESSION['apellido_de_cliente']=$mostrar['apellido_cliente'];
            $_SESSION['correo_de_cliente']=$mostrar['correo_cliente'];
            $_SESSION['direccion_de_cliente']=$mostrar['direccion_cliente'];
            $_SESSION['telefono_de_cliente']=$mostrar['telefono_cliente'];
            $_SESSION['ciudad_de_cliente']=$mostrar['nombre_ciudad'];
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
    }else{
        echo 'usuario inactivo'; 
    }
    
	
?>
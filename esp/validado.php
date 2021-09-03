<?php
session_start();
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"]; 
include("conexion.php");
$con=conectar();

$sql="SELECT * from cliente where usuario_cliente = '$usuario'";
$result=mysqli_query($con,$sql);
$mostrar=mysqli_fetch_array($result);
    if($contrasena==$mostrar['contrasena_cliente']){
 
        $_SESSION['idusuario']=$mostrar['codigo_cliente'];
        $_SESSION['nombre_de_usuario']=$mostrar['usuario_cliente'];
        $_SESSION['nombre_de_cliente']=$mostrar['nombre_cliente'];
        $_SESSION['apellido_de_cliente']=$mostrar['apellido_cliente'];
        $_SESSION['correo_de_cliente']=$mostrar['correo_cliente'];
        $_SESSION['direccion_de_cliente']=$mostrar['direccion_cliente'];
        $_SESSION['telefono_de_cliente']=$mostrar['telefono_cliente'];
        echo $_SESSION['idusuario'];
        echo $_SESSION['nombre_de_usuario'];
        header("Location:index.php")  ;
        }
    else{
    echo 'contrasena incorrecta';
}
	
?>
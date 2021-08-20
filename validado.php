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
        header("Location:index.php")  ;
        }
    else{
    echo 'contrasena incorrecta';
}
	
?>
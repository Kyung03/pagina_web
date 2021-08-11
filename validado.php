<?php
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"];

include("conexion.php");
$con=conectar();

$sql="SELECT * from usuario where usuario = '$usuario'";
$result=mysqli_query($con,$sql);
$mostrar=mysqli_fetch_array($result);
if($contrasena==$mostrar['contrasena_usuario']){
    echo $mostrar['contrasena_usuario'];
    header("Location:index.php")  ;
}
else{
    echo 'contrasena incorrecta';
}
	
?>
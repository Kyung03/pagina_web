<?php 
    
include("conexion.php");
$con=conectar();
$nombrecliente = $_POST['nombreU'];
$apellidocliente = $_POST['apellidoU'];
$correocliente = $_POST['correoU'];
$telefonocliente = $_POST['telU'];
$direccioncliente = $_POST['dirU'];
$usuariocliente = $_POST['usuarioU'];
$contrasenacliente = $_POST['contrasenaU'];

$sql="INSERT INTO `cliente` (`nombre_cliente`, `apellido_cliente`, `telefono_cliente`, `correo_cliente`, `direccion_cliente`, 
`usuario_cliente`, `contrasena_cliente`) VALUES
('$nombrecliente', '$apellidocliente', $telefonocliente , '$correocliente', '$direccioncliente', '$usuariocliente', '$contrasenacliente')";
mysqli_query($con,$sql); 
header("Location:index.php")  ;
?>
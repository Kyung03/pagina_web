<?php
//if(isset($_SESSION['idusuario']))
session_start(); 
include("conexion.php");
$con=conectar();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$total = 200;



if(isset($_SESSION['idusuario']) ){
    $sql= "INSERT INTO `factura` (`total`, `fecha_factura`, `codigo_cliente`) 
    VALUES ('$total','sysdate', '$_SESSION[idusuario]')";
    
}else{
    $sql= "INSERT INTO `factura` (`total`, `fecha_factura`) 
    VALUES ('$total', 'sysdate')";
}



mysqli_query($con,$sql); 
$last_id = $con->insert_id;
echo $last_id;

?>


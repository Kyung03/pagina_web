<?php 
    
include("conexion.php");
$con=conectar();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['tel'];
$direccion = $_POST['dir'];
$ciudad = $_POST['ciudad'];

$sql2="SELECT codigo_ciudad FROM `ciudad` where nombre_ciudad = '$ciudad' ";
		$result2=mysqli_query($con,$sql2);

		while($mostrar2=mysqli_fetch_array($result2)){
			$ciudad = $mostrar2['codigo_ciudad']; 
	    }

$sql="INSERT INTO `solicitante` (`nombre`, `apellido`, `telefono`, `correo`, `direccion`, `codigo_ciudad`) VALUES
('$nombre', '$apellido', $telefono , '$correo', '$direccion', '$ciudad')";
mysqli_query($con,$sql); 
echo '<script type="text/javascript">
    alert("Datos enviados.");
    window.location.assign("index.php");
    </script>';
?>
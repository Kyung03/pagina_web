<?php 
    
include("conexion.php");
$con=conectar();
$numeroFactura = $_POST['num_factura'];
$descripcion = $_POST['Descripcion'];
$tipo_reclamo = $_POST['tipo_reclamo'];


$sql2="SELECT codigo_tipo_reclamo FROM tipo_reclamo where nombre_tipo_reclamo = '$tipo_reclamo' ";
		$result2=mysqli_query($con,$sql2);

		while($mostrar2=mysqli_fetch_array($result2)){
			$tipo_reclamo = $mostrar2['codigo_tipo_reclamo']; 
	    }
echo $tipo_reclamo;

$sql= "INSERT INTO `reclamos` (`descripcion_reclamo`, `codigo_tipo_reclamo`, `numero_factura`) VALUES ('$descripcion', '$tipo_reclamo', '$numeroFactura')";
mysqli_query($con,$sql); 

header("Location:index.php");
?>
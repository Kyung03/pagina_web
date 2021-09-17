<?php 
    session_start();
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

$sql= "INSERT INTO `reclamos` (`descripcion_reclamo`, `codigo_tipo`, `codigo_factura`,`codigo_estado`) 
VALUES ('$descripcion', '$tipo_reclamo', '$numeroFactura','1')";
mysqli_query($con,$sql);  
$last_id = $con->insert_id;

$cod_us = $_SESSION['idusuario'];
$us = $_SESSION['nombre_de_usuario']; 
$us_nom = $_SESSION['nombre_de_usuario'];
$cod_reclamo = $last_id; 
echo "CALL `procedimiento_reclamos`('$cod_reclamo','$cod_us','$us_nom','cliente', '$us','enviado')";
mysqli_query($con,"CALL `procedimiento_reclamos`('$cod_reclamo','$cod_us','$us_nom','cliente', '$us','enviado')");

echo '<script type="text/javascript">
    alert("Reclamo enviado correctamente.");
    window.location.assign("index.php");
    </script>';
?>
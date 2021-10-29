<?php 
    session_start();
include("conexion.php");
$con=conectar();
//$numeroFactura = $_POST['num_factura'];
$descripcion = $_POST['Descripcion'];
$tipo_reclamo = $_POST['tipo_reclamo'];
$idusuario = $_SESSION['idusuario'];

$sql2="SELECT codigo_cliente FROM cliente where codigo_usuario = $idusuario ";
		$result2=mysqli_query($con,$sql2);

		while($mostrar2=mysqli_fetch_array($result2)){
			$codigo_cliente = $mostrar2['codigo_cliente']; 
	    } 

$sql = "INSERT INTO `reclamos` (`descripcion_reclamo`, `codigo_tipo`,`codigo_estado`,codigo_cliente) 
VALUES ('$descripcion', '$tipo_reclamo' ,'1',$codigo_cliente)";

//echo $sql;
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
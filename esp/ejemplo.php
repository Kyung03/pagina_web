<?php
include("conexion.php");
$con=conectar();
$sql="SELECT nombre_producto from producto";
$result=mysqli_query($con,$sql);


		while($mostrar=mysqli_fetch_array($result)){
			echo $mostrar['nombre_producto']; 
	}
?>
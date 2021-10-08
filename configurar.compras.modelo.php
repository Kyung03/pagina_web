<?php
$idcliente = $_SESSION['idcliente'];
$query_compras = " SELECT * FROM `factura` f, `carretilla_compra` c,`producto` p 
WHERE f.`codigo_factura` = c.`codigo_factura` 
and c.`codigo_producto` = p.`codigo_producto` 
and `codigo_cliente` =   $idcliente order by c.codigo_factura";

$result=mysqli_query($con,$query_compras);
?>
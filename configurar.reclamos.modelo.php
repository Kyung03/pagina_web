<?php
 

$query_reclamos = " SELECT * FROM `reclamos` r, `estado_reclamo` e, `tipo_reclamo` t, `cliente` c 
WHERE r.`codigo_estado` = e.`codigo_estado` 
and r.`codigo_tipo` = t.`codigo_tipo_reclamo` 
and r.`codigo_cliente` = c.`codigo_cliente`  ";

$result=mysqli_query($con,$query_reclamos);


//include_once('configurar.reclamos.vista.php');

?>
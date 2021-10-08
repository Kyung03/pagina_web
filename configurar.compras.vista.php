<?php require_once('configurar.compras.modelo.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.tabla_compras{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<table id="tabla_reclamo"> 
    
  <tr>
    <th>Factura</th>
    <th>Producto</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Fecha</th>
    <th>Total</th> 
  </tr>
        <?php
        while($mostrar=mysqli_fetch_array($result)){
            //$codigo_reclamo = $mostrar['codigo_reclamo']; 
           echo "<tr>";
           echo "<th>".$mostrar['codigo_factura']. "</th>" ;
           echo "<th>".$mostrar['nombre_producto']. "</th>" ;
           echo "<th>".$mostrar['precio_producto'] ."</th>" ;
           echo "<th>".$mostrar['cantidad']. "</th>" ;
           echo "<th>".$mostrar['fecha_factura']. "</th>" ;
           echo "<th>".$mostrar['total']. "</th>" ;
        //   echo "<th>".$mostrar['estado']. "</th>" ;
            echo "</tr>";
        } 
        ?>
    </table>
</body>
</html>
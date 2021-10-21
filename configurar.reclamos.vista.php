<?php require_once('configurar.reclamos.modelo.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.tabla_reclamo{
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
  <br><br>
    <table id="tabla_reclamo">
        <tr>
            <th>Codigo de reclamo</th>
            <th>Tipo de reclamo</th>
            <th>Descripcion del reclamo</th>
            <th>Estado de reclamo</th>
        </tr>
        <?php
        while($mostrar=mysqli_fetch_array($result)){
            //$codigo_reclamo = $mostrar['codigo_reclamo']; 
            echo "<tr>";
            echo "<th>".$mostrar['codigo_reclamo']. "</th>" ;
            echo "<th>".$mostrar['nombre_tipo_reclamo'] ."</th>" ;
            echo "<th>".$mostrar['descripcion_reclamo']. "</th>" ;
            echo "<th>".$mostrar['estado']. "</th>" ;
            echo "</tr>";
        } 
        ?>
    </table>
    
</body>
</html>
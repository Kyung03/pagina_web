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
$mpago = $_POST['mpago'];
$total = 0;
$lista = json_decode($_POST['lista']);
$lista_cantidad = json_decode($_POST['lista_cantidad']);
$lista_precios = json_decode($_POST['lista_precios']);
$lista_nombres = json_decode($_POST['lista_nombres']);

echo $nombre;
echo $apellido;
echo $telefono;
echo $correo;
echo $direccion;
echo $mpago;
foreach ($lista as $val) {
    echo '/codigo: '.$val;
}
foreach ($lista_cantidad as $val2) {
    echo '/cantidad: '.$val2;
}
foreach ($lista_precios as $val3) {
    echo '/precios: '.$val3;
}
foreach ($lista_nombres as $val4) {
    echo '/names: '.$val4;
}
for ($x = 0; $x < count($lista); $x++) {
    $total = intval($total) + intval($lista_precios[$x])*intval($lista_cantidad[$x]);
    
  } echo $total;

  if(isset($_SESSION['idusuario']) ){ 
    //$sql=" update producto set cantidad_producto = (cantidad_producto-$resta) where codigo_producto=$idproducto and (cantidad_producto>=$resta)";
    //mysqli_query($con,$sql);
    // $last_id;
      /* SE CREA LA FACTURA */
      $cliente = $_SESSION['idcliente'];
      $query_factura = "INSERT INTO `factura`( `total`, `fecha_factura`, `codigo_cliente`, `metodo_pago` ) 
      VALUES ($total, sysdate(), $cliente,'$mpago' )";
      echo $query_factura;
      mysqli_query($con, $query_factura); 
      $last_id = $con->insert_id;
}else{
    //echo "<script>if(confirm('Tu solicitud de compra es mayor a nuestra cantidad de stock.')) window.location.href = 'compra.php';</script>";
    //die();
    /* SE CREA LA FACTURA */
    $query_factura = "INSERT INTO `factura`( `total`, `fecha_factura`, `metodo_pago` ) 
    VALUES ($total, sysdate(),'$mpago' )";
    echo $query_factura;
    mysqli_query($con, $query_factura); 
    $last_id = $con->insert_id;
}


    /* INSERTAR EN VENTAS */
    for($x = 0; $x < count($lista); $x++){
        $sql = "INSERT INTO `carretilla_compra`( `codigo_factura`, `codigo_producto`,`cantidad`) 
        VALUES ($last_id,$lista[$x],$lista_cantidad[$x])";
        echo $sql;
        mysqli_query($con, $sql);
    }




/*
mysqli_query($con,$sql); 
$last_id = $con->insert_id;
echo $last_id;
*/

?>


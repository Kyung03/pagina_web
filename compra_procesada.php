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
$cliente = $_SESSION['idcliente'];
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
  /* SE CREA LA FACTURA */
	$query_factura = "INSERT INTO `factura`( `total`, `fecha_factura`, `codigo_cliente` ) 
	VALUES ($total, sysdate(), $cliente )";
    echo $query_factura;
	mysqli_query($con, $query_factura); 
    $last_id = $con->insert_id;

    /* INSERTAR EN VENTAS */
    for($x = 0; $x < count($lista); $x++){
        $sql = "INSERT INTO `carretilla_compra`( `codigo_factura`, `codigo_producto`,`cantidad`) 
        VALUES ($last_id,$lista[$x],$lista_cantidad[$x])";
        echo $sql;
        mysqli_query($con, $sql);
    }
/*
if(isset($_SESSION['idusuario']) ){
    $sql= "INSERT INTO `factura` (`total`, `fecha_factura`, `codigo_cliente`) 
    VALUES ('$total','sysdate', '$_SESSION[idusuario]')";
    
}else{
    $sql= "INSERT INTO `factura` (`total`, `fecha_factura`) 
    VALUES ('$total', 'sysdate')";
}



mysqli_query($con,$sql); 
$last_id = $con->insert_id;
echo $last_id;
*/

?>


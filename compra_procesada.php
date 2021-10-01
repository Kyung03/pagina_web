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
$total = 200;
$resta = $_POST['resta'];
$idproducto = $_POST['idproducto'];


$sql=" select cantidad_producto from producto where (cantidad_producto>=$resta)";
$result=mysqli_query($con,$sql); 
$mostrar=mysqli_fetch_array($result);

    if($mostrar['cantidad_producto']>=$resta){



        if(isset($_SESSION['idusuario']) ){
            $sql= "INSERT INTO `factura` (`total`, `fecha_factura`, `codigo_cliente`) 
            VALUES ('$total','sysdate', '$_SESSION[idusuario]')";
            mysqli_query($con,$sql);         
            $last_id = $con->insert_id;
                                         }
        else{
        $sql= "INSERT INTO `factura` (`total`, `fecha_factura`) 
        VALUES ('$total', 'sysdate')";
        }
    
    
    $sql=" update producto set cantidad_producto = (cantidad_producto-$resta) where codigo_producto=$idproducto and (cantidad_producto>=$resta)";
    mysqli_query($con,$sql);
    echo $last_id;
}else{
    echo "<script>if(confirm('Tu solicitud de compra es mayor a nuestra cantidad de stock.')) window.location.href = 'compra.php';</script>";
  
    die();
}




?>


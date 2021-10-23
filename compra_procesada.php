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
$verificacion = true;
//echo $nombre;
//echo $apellido;
//echo $telefono;
//echo $correo;
//echo $direccion;
//echo $mpago;




/*
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
*/
for ($x = 0; $x < count($lista); $x++) {
    $total = intval($total) + intval($lista_precios[$x])*intval($lista_cantidad[$x]);
    
  } 
  //echo $total;
    /* VERIFICAR CANTIDAD */
    for($x = 0; $x < count($lista); $x++){
        $query_verificar = "select cantidad_producto from `producto` where codigo_producto=$lista[$x]";
        $result_verificar=mysqli_query($con,$query_verificar);
        $mostrar_verificar=mysqli_fetch_array($result_verificar);
        //echo $query_verificar;
        //echo $mostrar_verificar['cantidad_producto'];
        if($mostrar_verificar['cantidad_producto'] < $lista_cantidad[$x]){
            $verificacion = false;

        }
        //mysqli_query($con, $sql);
    }
    if($verificacion == false){ 
        echo '<script type="text/javascript">
        alert("uno de los productos excede la cantidad de existencia.");
        window.location.assign("index.php");
        </script>';
    }else{
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
        //echo 'compra hecha';
        /* INSERTAR EN VENTAS */
        for($x = 0; $x < count($lista); $x++){
        $sql = "INSERT INTO `carretilla_compra`( `codigo_factura`, `codigo_producto`,`cantidad`) 
        VALUES ($last_id,$lista[$x],$lista_cantidad[$x])";
        echo $sql;
        mysqli_query($con, $sql);
        }
        echo '<script type="text/javascript">
        alert("compra realizada correctamente.");
        window.location.assign("index.php");
        </script>';
    }
 
?>


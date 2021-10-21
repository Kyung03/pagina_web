<?php 
    
include("conexion.php");
$con=conectar();
$nombrecliente = $_POST['nombreU'];
$apellidocliente = $_POST['apellidoU'];
$correocliente = $_POST['correoU'];
$telefonocliente = $_POST['telU'];
$direccioncliente = $_POST['dirU'];
$usuariocliente = $_POST['usuarioU'];
$contrasenacliente = $_POST['contrasenaU'];
$ciudadcliente = $_POST['ciudad']; 
echo $ciudadcliente;
 
$contraseña_fuerte = password_hash($contrasenacliente,PASSWORD_DEFAULT);

$sql="INSERT INTO `usuario` (`usuario`, `contrasena_usuario`, `estado_usuario`, `codigo_rol`, `fecha_creacion_usuario`) 
VALUES ('$usuariocliente', '$contraseña_fuerte', 'activo' , 1, SYSDATE())";
mysqli_query($con,$sql);

$last_id = $con->insert_id;

$sql2="INSERT INTO `cliente` (`nombre_cliente`, `apellido_cliente`, `telefono_cliente`, `correo_cliente`, `direccion_cliente`, `codigo_usuario`,codigo_ciudad) 
VALUES ('$nombrecliente', '$apellidocliente', $telefonocliente , '$correocliente', '$direccioncliente', '$last_id',$ciudadcliente)";
mysqli_query($con,$sql2); 

mysqli_query($con,"CALL `procedimiento_accesos`('$last_id','$usuariocliente','cliente','Creacion')");
echo $sql;
echo $sql2;

echo '<script type="text/javascript">
    alert("Usuario creado correctamente.");
    window.location.assign("inicio_sesion.php");
    </script>';
   
?>
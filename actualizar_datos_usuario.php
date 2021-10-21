<?php
session_start();
include("conexion.php");
$con=conectar(); 
$usuariocliente = $_POST['Usuario'];
$contrasenacliente = $_POST['Contraseña'];
$contrasenacliente2 = $_POST['Contraseña2'];
$idusuario = $_SESSION['idusuario'];

$sql="SELECT * FROM `usuario` WHERE  `usuario` = '$usuariocliente' ";
$result=mysqli_query($con,$sql);
$mostrar=mysqli_fetch_array($result);

if(isset($mostrar['usuario'])){
    if( $contrasenacliente == $contrasenacliente2 ){
        $contraseña_fuerte = password_hash($contrasenacliente,PASSWORD_DEFAULT);
        $query_usuario="UPDATE  `usuario` SET 
        `contrasena_usuario` = '$contraseña_fuerte'
        where `codigo_usuario` = $idusuario";
        mysqli_query($con,$query_usuario); 
        //$_SESSION['nombre_de_usuario']      =   $usuariocliente         ; 
        mysqli_query($con,"CALL `procedimiento_accesos`('$idusuario','$usuariocliente','cliente','ActualizacionClave')");
        echo '<script type="text/javascript">
            alert("Contraseña actualizada correctamente.");
            window.location.assign("configurar.php?valor=inicio");
            </script>';
    }else{
        echo 'Las contraseñas no coinciden';
    }
}else{
    echo 'Usuario incorrecto';
}

/*
$query_usuario="UPDATE  `usuario` SET 
`usuario` = '$usuariocliente'
where `codigo_usuario` = $idusuario";
mysqli_query($con,$query_usuario); 

$_SESSION['nombre_de_usuario']      =   $usuariocliente         ; 

mysqli_query($con,"CALL `procedimiento_accesos`('$idusuario','$usuariocliente','cliente','Actualizacion')");


echo '<script type="text/javascript">
    alert("Informacion actualizada correctamente.");
    window.location.assign("configurar.php?valor=inicio");
    </script>';
*/
?>
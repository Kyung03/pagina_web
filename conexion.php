<?php
function conectar(){
    $usuario="root";
    $contraseña="";
    $servidor="localhost";
    $base_datos="analisis_ii";
    $con=mysqli_connect($servidor,$usuario,$contraseña,$base_datos) or die ("Error al conectar con la base de datos".mysqli_error());
    //$mysqli = new mysqli("localhost", "root", "", "analisis_ii");

    return $con;
}


?>

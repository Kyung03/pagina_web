<?php
include('conexion.php');
session_start();
$con=conectar();
$lista = json_decode($_POST['lista']);
$lista_cantidad = json_decode($_POST['lista_cantidad']);
$lista_precios = json_decode($_POST['lista_precios']);
$lista_nombres = json_decode($_POST['lista_nombres']);

foreach ($lista as $val) {
    echo $val;
}
foreach ($lista_cantidad as $val2) {
    echo $val2;
}
foreach ($lista_precios as $val3) {
    echo $val3;
}
foreach ($lista_nombres as $val4) {
    echo $val4;
}
?>
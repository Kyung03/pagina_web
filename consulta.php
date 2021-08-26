<?php
function consulta(){
    //header('location:index.php?valor=principal');
    $nombre=$_POST['fname'];
    if(is_null($mivalor = $_GET["valor"])){
        header('location:index.php?valor=principal');
    }else {
    $mivalor = $_GET["valor"];
    }

    switch($mivalor){
        case "principal":$query="SELECT * from producto ";

            break;
        case "despensa": $query="SELECT * from producto where Tipo_producto='despensa' ";
            break;
        case "Carne": $query="SELECT * from producto where Tipo_producto='carne'";
            break;
        case "Pescados": $query="SELECT * from producto where Tipo_producto='pescados' ";
            break;
        case "Bebidas": $query="SELECT * from producto where Tipo_producto='bebida' ";
            break;
        case "Frutas": $query="SELECT * from producto where Tipo_producto='frutas'";
            break;
        case "Verduras": $query="SELECT * from producto where Tipo_producto='verduras' ";
            break;
        case "Higiene": $query="SELECT * from producto where Tipo_producto='higiene' ";
            break;
        case "Limpieza": $query="SELECT * from producto where Tipo_producto='limpieza' ";
            break;
        case "precio_producto": $query="SELECT * from producto order by precio_producto";
            break;
        case "nombre_producto": $query="SELECT * from producto order by nombre_producto";
            break;
        case "buscar_producto": $query="SELECT * from producto where nombre_producto like '%$nombre%'";
            break;
        default: $query="SELECT * from producto ";
            break;

    }
    

    return $query;
}


?>
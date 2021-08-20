<?php
function consulta(){
    
    
    if(is_null($mivalor = $_GET["valor"])){
        $mivalor=0;
    }else{
        $mivalor = $_GET["valor"];
    }

    switch($mivalor){
        case "despensa": $query="SELECT * from producto where Tipo_producto='Despensa' ";
            break;
        case "Carne": $query="SELECT * from producto where Tipo_producto='Carne'";
            break;
        case "Pescados": $query="SELECT * from producto where Tipo_producto='Pescados' ";
            break;
        case "Bebidas": $query="SELECT * from producto where Tipo_producto='Bebidas' ";
            break;
        case "Frutas": $query="SELECT * from producto where Tipo_producto='Frutas'";
            break;
        case "Verduras": $query="SELECT * from producto where Tipo_producto='Verduras' ";
            break;
        case "Higiene": $query="SELECT * from producto where Tipo_producto='Higiene' ";
            break;
        case "Limpieza": $query="SELECT * from producto where Tipo_producto='Limpieza' ";
            break;
        case "precio_producto": $query="SELECT * from producto order by precio_producto";
            break;
        case "nombre_producto": $query="SELECT * from producto order by nombre_producto";
            break;
        default: $query="SELECT * from producto ";
            break;

    }
    

    return $query;
}


?>
<?php

$WebService="http://localhost:50687/WebService1.asmx?wsdl";
ini_set("soap.wsdl_cache_enabled","0");
//parametros de la llamada
$nombre = 'Aceite'; 
$parametros = array();
$parametros['producto'] = $nombre; 
//Invocación al web service

$WS = new SoapClient($WebService,$parametros);
//recibimos la respuesta dentro de un objeto
$result = $WS->buscar($parametros);
//Mostramos el resultado de la consulta
//echo $result->consultaResult;
//$array = json_decode(json_encode($result), true);
echo '<pre>'; 
print_r($result);
echo '</pre>'; 
//var_dump ($result); 

//for( $i=0;$i<10;$i++){
//    print_r($result->consultaResult->any[$i]);     
//}
$array = get_object_vars($result);
print_r($array);

?>

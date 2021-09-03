<?php
$WebService="http://localhost:50687/WebService1.asmx?wsdl";

//Invocación al web service
$WS = new SoapClient($WebService);
//recibimos la respuesta dentro de un objeto
$result = $WS->consulta();
//Mostramos el resultado de la consulta
//var_dump ($result); 
$xml = $result->consultaResult->any;
//print_r($xml);
$sxe = new SimpleXMLElement($xml);
$xml = simplexml_load_string($xml);
//echo $xml->Table[0]->nombre_producto;


$sxe->registerXPathNamespace('d', 'urn:schemas-microsoft-com:xml-diffgram-v1');
for($i=0;$i<6;$i++){
$tables = $sxe->xpath('//Table[@d:id="Table'.$i.'"]');
foreach ($tables as $t) {
    echo $t->nombre_producto . PHP_EOL;
}
}
//foreach($xml->children() as $table) 
//  {
 //   echo $table->nombre_producto;
    //$output .= $table->Name;
    //print_r($output);
 // }
$array = get_object_vars($result);
//print_r($result->consultaResult->any);



//$array = json_decode(json_encode($result), true);
?>
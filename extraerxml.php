<?php

// es necesaario extraer el contenido del xml
// agregar libreria de CfdiUtils

//si quisieramos solo el CFDI se utiliza getQuickReader()

$xml = \CfdiUtils\Cfdi::newFromString(file_get_contents('3EAD11D6-97D1-42F2-B0A7-B19FC0127CE6.xml'))
    ->getQuickReader();

// con simplexml_load_file voy a leer el archivo con extension .xml

$xml= simplexml_load_file("3EAD11D6-97D1-42F2-B0A7-B19FC0127CE6.xml"); 
$contenidoXML = new SimpleXMLElement("3EAD11D6-97D1-42F2-B0A7-B19FC0127CE6.xml", 0, true);

foreach ($contenidoXML->Comprobante as $Comprobante) {

	// se van a guardar los datos que hagan referencia a comprobante
	
	$elementoXML = array();
	$elementoXML['Comprobante'] = trim((string)$Comprobante);
}

/* al parecer se utiliza la libreria de cfdiUtils 
echo "El RFC del emisor es: "$xml-> cfdi['Comprobante']['Emisor'][0]-> RFC; 
$DOM= new DOMDocument('1.0', 'utf-8');

$DOM->loadXML($xml);
*/

// en el caso de las etiquetas xml como se obtiene una
$Comprobante = $DOM->getElementsByTagName('cfdi:Concepto');

echo "Concepto CFDI: " .$Comprobante->$Concepto. "<br>";

?>

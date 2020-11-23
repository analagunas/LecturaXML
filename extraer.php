<?php

$xml = simplexml_load_file('3fe5ef75-ab54-49ab-b861-32a71c1a8a05.xml'); 
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);
 
 
//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA 
foreach ($xml->xpath('//c:Comprobante') as $cfdiComprobante){ 
      echo $cfdiComprobante['version']; 
      echo "<br />"; 
      echo $cfdiComprobante['fecha']; 
      echo "<br />"; 
      echo $cfdiComprobante['sello']; 
      echo "<br />"; 
      echo $cfdiComprobante['total']; 
      echo "<br />"; 
      echo $cfdiComprobante['subTotal']; 
      echo "<br />"; 
      echo $cfdiComprobante['certificado']; 
      echo "<br />"; 
      echo $cfdiComprobante['formaDePago']; 
      echo "<br />"; 
      echo $cfdiComprobante['noCertificado']; 
      echo "<br />"; 
      echo $cfdiComprobante['tipoDeComprobante']; 
      echo "<br />"; 
} 
foreach ($xml->xpath('//c:Comprobante//c:Emisor') as $Emisor){ 
   echo $Emisor['rfc']; 
   echo "<br />"; 
   echo $Emisor['nombre']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//c:Comprobante//c:Emisor//c:DomicilioFiscal') as $DomicilioFiscal){ 
   echo $DomicilioFiscal['pais']; 
   echo "<br />"; 
   echo $DomicilioFiscal['calle']; 
   echo "<br />"; 
   echo $DomicilioFiscal['estado']; 
   echo "<br />"; 
   echo $DomicilioFiscal['colonia']; 
   echo "<br />"; 
   echo $DomicilioFiscal['municipio']; 
   echo "<br />"; 
   echo $DomicilioFiscal['noExterior']; 
   echo "<br />"; 
   echo $DomicilioFiscal['codigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//c:Comprobante//c:Emisor//c:ExpedidoEn') as $ExpedidoEn){ 
   echo $ExpedidoEn['pais']; 
   echo "<br />"; 
   echo $ExpedidoEn['calle']; 
   echo "<br />"; 
   echo $ExpedidoEn['estado']; 
   echo "<br />"; 
   echo $ExpedidoEn['colonia']; 
   echo "<br />"; 
   echo $ExpedidoEn['noExterior']; 
   echo "<br />"; 
   echo $ExpedidoEn['codigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//c:Comprobante//c:Receptor') as $Receptor){ 
   echo $Receptor['rfc']; 
   echo "<br />"; 
   echo $Receptor['nombre']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//c:Comprobante//c:Receptor//c:Domicilio') as $ReceptorDomicilio){ 
   echo $ReceptorDomicilio['pais']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['calle']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['estado']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['colonia']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['municipio']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['noExterior']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['noInterior']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['codigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//c:Comprobante//c:Conceptos//c:Concepto') as $Concepto){ 
   echo "<br />"; 
   echo $Concepto['unidad']; 
   echo "<br />"; 
   echo $Concepto['importe']; 
   echo "<br />"; 
   echo $Concepto['cantidad']; 
   echo "<br />"; 
   echo $Concepto['descripcion']; 
   echo "<br />"; 
   echo $Concepto['valorUnitario']; 
   echo "<br />";   
   echo "<br />"; 
} 
foreach ($xml->xpath('//c:Comprobante//c:Impuestos//c:Traslados//c:Traslado') as $Traslado){ 
   echo $Traslado['tasa']; 
   echo "<br />"; 
   echo $Traslado['importe']; 
   echo "<br />"; 
   echo $Traslado['impuesto']; 
   echo "<br />";   
   echo "<br />"; 
} 


?>
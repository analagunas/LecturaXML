<?php

	/*get content hace referencia al contenido del URL dado */
	$contenti = simplexml_load_file("3CE5C9DE-8F91-498D-B94B-8898E0701BA7.xml");
	$ns = $contenti->getNamespaces(true);
	$contenti->registerXPathNamespace('t', $ns['tfd']);

	foreach($contenti->xpath('//cfdi:Comprobante') as $cfdiComprobante)
	{

		echo "<table border= 1>";
		echo "<br>";
		echo "<tr>";
		echo "<td> Certificado </td>";
		echo "</tr>";

		echo "<tr>";
		$Certificado = $cfdiComprobante['Certificado'];
		echo "<td>".$Certificado."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Tipo de Comprobante </td>";
		echo "<td> N&uacute;mero Certificado </td>";
		echo "<td> Lugar Expedici&oacute;n </td>";
		echo "<td> Serie </td>";
		echo "<td> Folio </td>";
		echo "<td> Subtotal </td>";
		echo "<td> Total </td>";
		echo "</tr>";

	  echo "<tr>";
		switch ($cfdiComprobante['TipoDeComprobante']) {
			case 'E':
				$varTipoC="Comprobante de Egreso";
				echo "<td>Comprobante de Egreso </td>";
				break;
			case 'I':
				$varTipoC="Comprobante de Ingreso";
				echo "<td>Comprobante de Ingreso </td>";
				break;
			case 'N':
				$varTipoC="Comprobante de N&oacute;mina";
				echo "<td>Comprobante de N&oacute;mina </td>";
				break;
			case 'P':
				$varTipoC="Comprobante de Pago";
				echo "<td>Comprobante de Pago </td>";
				break;
			default:
				// code...
				break;
		}
				$tipoC=$varTipoC;
		$NoCertificado = $cfdiComprobante['NoCertificado'];
		echo "<td>".$NoCertificado."</td>";
		$LugarExp = $cfdiComprobante['LugarExpedicion'];
		echo "<td>".$LugarExp."</td>";
		$Serie = $cfdiComprobante['Serie'];
		echo "<td>".$Serie."</td>";
		$Folio = $cfdiComprobante['Folio'];
		echo "<td>".$Folio."</td>";
		$Subtotal = $cfdiComprobante['SubTotal'];
		echo "<td>".$Subtotal."</td>";
		$Total = $cfdiComprobante['Total'];
		echo "<td>".$Total."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Moneda </td>";
		echo "<td> M&eacute;todo de Pago </td>";
		echo "<td> Forma de Pago </td>";
		echo "<td> Tipo Cambio </td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>".$cfdiComprobante['Moneda']."</td>";
		if ($cfdiComprobante['MetodoPago'] == 'PUE') {
			$varMpago="Pago en una sola exhibici&oacute;n";
			echo "<td> Pago en una sola exhibici&oacute;n </td>";
		}else {
			$varMpago="Pago en pagos diferidos";
			echo "<td> Pago en pagos diferidos </td>";
		}
		$MetodoPago=$varMpago;

		switch ($cfdiComprobante['FormaPago']) {
			case '01':
				$varFormaPago="Diario";
				echo "<td> Diario </td>";
				break;
			case '02':
				$varFormaPago="Semanal";
				echo "<td> Semanal </td>";
				break;
			case '03':
				$varFormaPago="Catorcenal";
				echo "<td> Catorcenal </td>";
				break;
			case '04':
				$varFormaPago="Quincenal";
				echo "<td> Quincenal </td>";
				break;
			case '05':
				$varFormaPago="Mensual";
				echo "<td> Mensual </td>";
				break;
			case '06':
				$varFormaPago="Bimestral";
				echo "<td> Bimestral </td>";
				break;
			case '07':
				$varFormaPago="Unidad_obra";
				echo "<td> Unidad_obra </td>";
				break;
			case '08':
				$varFormaPago="Comisi&oacute;n";
				echo "<td> Comisi&oacute;n </td>";
				break;
			case '09':
				$varFormaPago="Precio_alzado";
				echo "<td> Precio_alzado </td>";
				break;
			case '99':
				$varFormaPago="Otra Periocidad";
				echo "<td> Otra Periocidad </td>";
				break;
			default:
				// code...
				break;
		}
		$FormaPago = $varFormaPago;

		$TipoCambio = $cfdiComprobante['TipoCambio'];
		echo "<td>".$TipoCambio."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Sello </td>";
		echo "</tr>";

		echo "<tr>";
		$Sello = $cfdiComprobante['Sello'];
		echo "<td>".$Sello."</td>";

	}


	foreach ($contenti->xpath('//cfdi:Emisor') as $cfdiEmisor)
	{

		echo "<br>";
		echo "<tr>";
		echo "<td> RFC emisor </td>";
		echo "<td> Nombre</td>";
		echo "<td> Regimen fiscal </td>";
		echo "</tr>";

		echo "<tr>";
		$RFCemisor = $cfdiEmisor['Rfc'];
		echo "<td>".$RFCemisor."</td>";
		$Nombremisor = $cfdiEmisor['Nombre'];
		echo "<td>".$Nombremisor."</td>";
		switch($cfdiEmisor['RegimenFiscal']){
		case '601':
			$varRegFiscal='General de Ley Personas Morales';
			echo "<td>General de Ley Personas Morales</td>";
			break;
		case '603':
			$varRegFiscal='Personas Morales con Fines no Lucrativos';
			echo "<td>Personas Morales con Fines no Lucrativos</td>";
			break;
		case '605':
			$varRegFiscal='Sueldos y Salarios e Ingresos Asimilados a Salarios';
			echo "<td>Sueldos y Salarios e Ingresos Asimilados a Salarios</td>";
			break;
		case '612':
			$varRegFiscal="Personas F&iacute;sicas con Actividades Profesionales y Empresariales";
			echo "<td>Personas F&iacute;sicas con Actividades Profesionales y Empresariales </td>";
			break;
		}
		$RegFiscal= $varRegFiscal;

		echo "</tr>";
		echo "</br>";

	}


	foreach ($contenti ->xpath('//cfdi:Receptor') as $cfdiReceptor) {

		echo "<br>";
		echo "<tr>";
		echo "<td> RFC Receptor </td>";
		echo "<td> Nombre</td>";
		echo "<td> Uso CFDI </td>";
		echo "</tr>";

		echo "<tr>";
		$Rfcreceptor = $cfdiReceptor['Rfc'];
		echo "<td>".$Rfcreceptor."</td>";
		$Nombrereceptor = $cfdiReceptor['Nombre'];
		echo "<td>".$Nombrereceptor."</td>";
		switch ($cfdiReceptor['UsoCFDI']) {
			case 'G01':
				$varUcfdi= "Adquisici&oacute;n de mercanc&iacute;as";
				echo "<td> Adquisici&oacute;n de mercanc&iacute;as </td>";
				break;
			case 'G02':
				$varUcfdi= "Devoluciones, Descuentos o Bonificaciones";
				echo "<td> Devoluciones, Descuentos o Bonificaciones </td>";
				break;
			case 'G03':
				$varUcfdi= "Gastos en General";
				echo "<td> Gastos en General </td>";
				break;
			case 'I01':
				$varUcfdi= "Construcciones";
				echo "<td> Construcciones </td>";
				break;
			case 'I02':
				$varUcfdi= "Mobiliario y Equipo de Oficina por Inversiones";
				echo "<td> Mobiliario y Equipo de Oficina por Inversiones </td>";
				break;
			case 'I03':
				$varUcfdi="quipo de Transporte";
				echo "<td> Equipo de Transporte </td>";
				break;
			case 'I04':
				$varUcfdi="Equipo de C&oacute;mputo y Accesorios";
				echo "<td> Equipo de C&oacute;mputo y Accesorios </td>";
				break;
			case 'I05':
				$varUcfdi="Dados, Troquels, Moldes, Matrices y Herramental";
				echo "<td> Dados, Troqueles, Moldes, Matrices y Herramental </td>";
				break;
			case 'I06':
				$varUcfdi="Comunicaciones Telf&oacute;nicas";
				echo "<td> Comunicaciones Telef&oacute;nicas </td>";
				break;
			case 'I07':
				$varUcfdi="Comunicaciones Satlitales";
				echo "<td> Comunicaciones Satelitales </td>";
				break;
			case 'I08':
				$varUcfdi="Otra Maquinaria y Equipo";
				echo "<td> Otra Maquinaria y Equipo </td>";
				break;
			case 'D01':
				$varUcfdi="Honorarios M&eacute;dicos, Dentales y Gastos Hospitalarios";
				echo "<td> Honorarios M&eacute;dicos, Dentales y Gastos Hospitalarios </td>";
				break;
			case 'D02':
				$varUcfdi="Gastos M&eacute;dicos por Incapacidad o Discapacidad";
				echo "<td> Gastos M&eacute;dicos por Incapacidad o Discapacidad </td>";
				break;
			case 'D03':
				$varUcfdi="Gastos Funerales";
				echo "<td> Gastos Funerales </td>";
				break;
			case 'D04':
				$varUcfdi="Donativos";
				echo "<td> Donativos </td>";
				break;
			case 'D05':
				$varUcfdi="Intereses Reales Efectivamente Pagados por Cr&eacute;ditos Hipotecarios (Casa Habitaci&oacute;n)";
				echo "<td> Intereses Reales Efectivamente Pagados por Cr&eacute;ditos Hipotecarios (Casa Habitaci&oacute;n) </td>";
				break;
			case 'D06':
				$varUcfdi="Aportaciones Voluntarias al SAR";
				echo "<td> Aportaciones Voluntarias al SAR</td>";
				break;
			case 'D07':
				$varUcfdi="Primas por Seguros de Gastos Medicos";
				echo "<td> Primas por Seguros de Gastos Médicos </td>";
				break;
			case 'D08':
				$varUcfdi="Gastos de Transportaci&oacute;n Escolar Obligatoria";
				echo "<td> Gastos de Transportaci&oacute;n Escolar Obligatoria </td>";
				break;
			case 'D09':
				$varUcfdi="Dep&oacute;sitos en Cuentas para el Ahorro, Primas que tengan como Base Planes de Pensiones";
				echo "<td> Dep&oacute;sitos en Cuentas para el Ahorro, Primas que tengan como Base Planes de Pensiones </td>";
				break;
			case 'D10':
				$varUcfdi="Pagos por Servicios Educativos (Colegiaturas)";
				echo "<td> Pagos por Servicios Educativos (Colegiaturas) </td>";
				break;
			case 'P01':
				$varUcfdi="Por definir";
				echo "<td> Por definir </td>";
				break;
			default:
				// code...
				break;
			}
			$usoCfdi=$varUcfdi;
	}

	foreach ($contenti->xpath('//cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto') as $conimp) {
		echo "<br>";
		echo "<tr>";
		echo "<td> Cantidad </td>";
		echo "<td> Clave Producto y Servicios </td>";
		echo "<td> Clave Unidad </td>";
		echo "<td> Descripcion </td>";
		echo "<td> Importe </td>";
		echo "<td> N&uacute;mero de Identificaci&oacute;n </td>";
		echo "<td> Unidad </td>";
		echo "<td> Valor Unitario </td>";
		echo "</tr>";

		echo "<tr>";
		$Cantidad = $conimp['Cantidad'];
		echo "<td>" .$Cantidad."</td>";
		$ClavePS = $conimp['ClaveProdServ'];
		echo "<td>" .$ClavePS."</td>";
		$ClaveUnidad = $conimp['ClaveUnidad'];
		echo "<td>" .$ClaveUnidad."</td>";
		$Descripcion = $conimp['Descripcion'];
		echo "<td>" .$Descripcion."</td>";
		$Importe = $conimp['Importe'];
		echo "<td>" .$Importe."</td>";
		$NoIdentificacion = $conimp['NoIdentificacion'];
		echo "<td>" .$NoIdentificacion."</td>";
		$Unidad =  $conimp['Unidad'];
		echo "<td>" . $Unidad."</td>";
		$ValorUnitario = $conimp['ValorUnitario'];
		echo "<td>" .$ValorUnitario."</td>";
	}

	foreach ($contenti->xpath('//cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto/cfdi:Impuestos/cfdi:Traslados/cfdi:Traslado') as $conim) {
		echo "<br>";
		echo "<tr>";
		echo "<td> Base </td>";
		echo "<td> Importe </td>";
		echo "<td> Impuesto </td>";
		echo "<td> Tasa O Cuota </td>";
		echo "<td> Tipo Factor </td>";
		echo "</tr>";

		echo "<tr>";
		$Base = $conim['Base'];
		echo "<td>".$Base."</td>";
		$ImporteI = $conim['Importe'];
		echo "<td>".$ImporteI."</td>";
		$Impuesto = $conim['Impuesto'];
		echo "<td>".$Impuesto."</td>";
		$TasaOCuota = $conim['TasaOCuota'];
		echo "<td>".$TasaOCuota."</td>";
		$TipoFactor = $conim['TipoFactor'];
		echo "<td>".$TipoFactor."</td>";
		echo "</tr>";
	}
	foreach ($contenti->xpath('//cfdi:Comprobante/cfdi:Impuestos') as $imptotal) {

		echo "<br>";
		echo "<tr>";
		echo "<td> Total Impuestos </td>";
		echo "</tr>";

		echo "<tr>";
		$TotalImpuestos = $imptotal['TotalImpuestosTrasladados'];
		echo "<td>".$TotalImpuestos."</td>";
		echo "</tr>";
	}

	foreach ($contenti->xpath('//cfdi:Comprobante/cfdi:Impuestos/cfdi:Traslados/cfdi:Traslado') as $imp) {

		echo "<br>";
		echo "<tr>";
		echo "<td> Importe </td>";
		echo "<td> Impuesto </td>";
		echo "<td> Tasa O Cuota </td>";
		echo "<td> Tipo Factor </td>";
		echo "</tr>";

		echo "<tr>";
		$ImporteImp = $imp['Importe'];
		echo "<td>".$ImporteImp."</td>";
		$ImpuestoImp = $imp['Impuesto'];
		echo "<td>".$ImpuestoImp."</td>";
		$TasaCuota = $imp['TasaOCuota'];
		echo "<td>".$TasaCuota."</td>";
		$TipoF = $imp['TipoFactor'];
		echo "<td>".$TipoF."</td>";
	}


foreach ($contenti->xpath('//t:TimbreFiscalDigital') as $tfd){
		echo "<br>";
		echo "<tr>";
		echo "<td> Versi&oacute;n </td>";
		echo "<td> UUID </td>";
		echo "<td> Fecha de Timbrado </td>";
		echo "<td> RFC Proveedor Certificado </td>";
		echo "</tr>";

		echo "<tr>";
		$VersionTfd = $tfd['Version'];
		echo "<td>".$VersionTfd."</td>";
		$UuidTfd = $tfd['UUID'];
		echo "<td>".$UuidTfd."</td>";
		$FechaTimbrado = $tfd['FechaTimbrado'];
		echo "<td>".$FechaTimbrado."</td>";
		$RfcProveedor = $tfd['RfcProvCertif'];
		echo "<td>".$RfcProveedor."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Sello CFD </td>";
		echo "</tr>";

		echo "<tr>";
		$SelloCFD = $tfd['SelloCFD'];
		echo "<td>".$SelloCFD."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Sello SAT </td>";
		echo "</tr>";

		echo "<tr>";
		$SelloSAT = $tfd['SelloSAT'];
		echo "<td>".$SelloSAT."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> N&uacute;mero Certificado SAT</td>";
		echo "</tr>";

		echo "<tr>";
		$NoCertSAT = $tfd['NoCertificadoSAT'];
		echo "<td>".$NoCertSAT."</td>";
		echo "</tr>";

	}

	foreach ($contenti->xpath('//cfdi:Comprobante/cfdi:Addenda/AddendaMercurio') as $addenda) {
		echo "<br>";
		echo "<tr>";
		echo "<td> Calle Emisor </td>";
		echo "<td>N&uacute;mero Emisor </td>";
		echo "<td>Estado Emisor </td>";
		echo "<td>C&oacute;digo Postal Emisor </td>";
		echo "</tr>";

		echo "<tr>";
		$CalleE = $addenda['CALLEEMI'];
		echo "<td>".$CalleE."</td>";
		$NumE = $addenda['NUMEMI'];
		echo "<td>".$NumE."</td>";
		$EdoE = $addenda['EDOEMI'];
		echo "<td>".$EdoE."</td>";
		$CpE = $addenda['EDOEMI'];
		echo "<td>".$CpE."</td>";
		echo "</tr>";
	}

 ?>

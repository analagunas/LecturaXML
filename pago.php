<?php


	/*get content hace referencia al contenido del URL dado */
	$contentp = simplexml_load_file("55101400111872A2020.xml");
	$ns = $contentp->getNamespaces(true);
	$contentp->registerXPathNamespace('t', $ns['tfd']);
	$contentp->registerXPathNamespace('pago10', $ns['pago10']);


	echo "<table border= 1>";

	echo "<br>";
	echo "<tr>";
	echo "<td> Tipo de Comprobante </td>";
	echo "<td> Fecha de Emisión </td>";
	echo "<td> Folio </td>";
	echo "<td> Moneda </td>";
	echo "<td> Total </td>";
	echo "<td> Lugar de Expedición</td>";
	echo "</tr>";

	foreach($contentp->xpath('//cfdi:Comprobante') as $cfdiComprobante)

	{
			echo "<tr>";
			switch($cfdiComprobante['TipoDeComprobante']){
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
				}

				$TipoC=$varTipoC;

		$Fecha = $cfdiComprobante['Fecha'];
		echo "<td>".$Fecha."</td>";
		$Folio = $cfdiComprobante['Folio'];
		echo "<td>".$Folio."</td>";
		$Moneda = $cfdiComprobante['Moneda'];
		echo "<td>".$Moneda."</td>";
		$Total = $cfdiComprobante['Total'];
		echo "<td>".$Total."</td>";
		$LugarExp = $cfdiComprobante['LugarExpedicion'];
		echo "<td>".$LugarExp."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Sello </td>";
		echo "<td> Núm. Certificado </td>";
		echo "</tr>";
		echo "<tr>";
		$Sello = $cfdiComprobante['Sello'];
		echo "<td>".$Sello."</td>";
		$NoCertificado = $cfdiComprobante['NoCertificado'];
		echo "<td>".$NoCertificado."</td>";
		echo "<tr>";
		echo "<td> Certificado </td>";
		echo "</tr>";
		echo "<tr>";
		$Certificado = $cfdiComprobante['Certificado'];
		echo "<td>".$Certificado."</td>";
	}

	foreach ($contentp->xpath('//cfdi:Emisor') as $cfdiEmisor)
	{
		//echo "<table border=1>";
		echo "<br>";
		echo "<tr>";
		echo "<td> RFC emisor </td>";
		echo "<td> Nombre</td>";
		echo "<td> Regimen Fiscal</td>";

		echo "</tr>";
		echo "<tr>";
		$RFCemisor = $cfdiEmisor['Rfc'];
		echo "<td>".$RFCemisor."</td>";
		$Nombremisor = $cfdiEmisor['Nombre'];
		echo "<td>".$Nombremisor."</td>";
		switch($cfdiEmisor['RegimenFiscal']){
		case '601':
			$varRegimenFiscal="General de Ley Personas Morales";
			echo "<td>General de Ley Personas Morales</td>";
			break;
		case '603':
			$varRegimenFiscal="Personas Morales con Fines no Lucrativos";
			echo "<td>Personas Morales con Fines no Lucrativos</td>";
			break;
		case '605':
			$varRegimenFiscal="Sueldos y Salarios e Ingresos Asimilados a Salarios";
			echo "<td>Sueldos y Salarios e Ingresos Asimilados a Salarios</td>";
			break;
		}
		$RegimenFiscal=$varRegimenFiscal;
		echo "</tr>";
		echo "</br>";
	}
	foreach ($contentp ->xpath('//cfdi:Receptor') as $cfdiReceptor) {
		echo "<br>";
		echo "<tr>";
		echo "<td> RFC Receptor </td>";
		echo "<td> Nombre</td>";
		echo "<td> Uso CFDI </td>";
		//echo "<td> Descripci&oacute;n </td>";
		echo "</tr>";
		echo "<tr>";
		$Rfcreceptor = $cfdiReceptor['Rfc'];
		echo "<td>".$Rfcreceptor."</td>";
		$Nombrereceptor = $cfdiReceptor['Nombre'];
		echo "<td>".$Nombrereceptor."</td>";
		switch ($cfdiReceptor['UsoCFDI']) {
			case 'G01':
				$varUcfdi="Adquisici&oacute;n de mercanc&iacute;as";
				echo "<td> Adquisici&oacute;n de mercanc&iacute;as </td>";
				break;
			case 'G02':
				$varUcfdi="Devoluciones, Descuentos o Bonificaciones";
				echo "<td> Devoluciones, Descuentos o Bonificaciones </td>";
				break;
			case 'G03':
				$varUcfdi="Gastos en General";
				echo "<td> Gastos en General </td>";
				break;
			case 'I01':
				$varUcfdi="Construcciones";
				echo "<td> Construcciones </td>";
				break;
			case 'I02':
				$varUcfdi="Mobiliario y Equipo de Oficina por Inversiones";
				echo "<td> Mobiliario y Equipo de Oficina por Inversiones </td>";
				break;
			case 'I03':
				$varUcfdi="Equipo de Transporte";
				echo "<td> Equipo de Transporte </td>";
				break;
			case 'I04':
				$varUcfdi="Equipo de C&oacute;mputo y Accesorios";
				echo "<td> Equipo de C&oacute;mputo y Accesorios </td>";
				break;
			case 'I05':
				$varUcfdi="Dados, Troqueles, Moldes, Matrices y Herramental";
				echo "<td> Dados, Troqueles, Moldes, Matrices y Herramental </td>";
				break;
			case 'I06':
				$varUcfdi="Comunicaciones Telef&oacute;nicas";
				echo "<td> Comunicaciones Telef&oacute;nicas </td>";
				break;
			case 'I07':
				$varUcfdi="Comunicaciones Satelitales";
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
				$varUcfdi="Primas por Seguros de Gastos M&eacute;dicos";
				echo "<td> Primas por Seguros de Gastos M&eacute;dicos </td>";
				break;
			case 'D08':
				$varUcfdi="Gastos de Transportaci&oacute;n Escolar Obligatoria";
				echo "<td> Gastos de Transportaci&oacute;n Escolar Obligatoria </td>";
				break;
			case 'D09':
				$varUcfdi=" Dep&oacute;sitos en Cuentas para el Ahorro, Primas que tengan como Base Planes de Pensiones";
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

	foreach ($contentp->xpath('//cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto') as $concepts) {
		echo "<br>";
		echo "<tr>";
		echo "<td> Clave Productos y Servicios </td>";
		echo "<td> Cantidad </td>";
		echo "<td> Clave Unidad </td>";
		echo "<td> Descripci&oacute;n</td>";
		echo "<td> Valor Unitario </td>";
		echo "<td> Pago</td>";
		echo "</tr>";

		echo "<tr>";
		$ClavePS = $concepts['ClaveProdServ'];
		echo "<td>".$ClavePS."</td>";
		$Cantidad = $concepts['Cantidad'];
		echo "<td>".$Cantidad."</td>";
		$ClaveUnidad = $concepts['ClaveUnidad'];
		echo "<td>".$ClaveUnidad."</td>";
		$Descripcion = $concepts['Descripcion'];
		echo "<td>".$Descripcion."</td>";
		$ValorUnitario = $concepts['ValorUnitario'];
		echo "<td>".$ValorUnitario."</td>";
		$Importe = $concepts['Importe'];
		echo "<td>".$Importe."</td>";

	}

	foreach($contentp->xpath('//cfdi:Comprobante/cfdi:Complemento/pago10:Pagos') as $pagoo){
		echo "<br>";
		echo "<tr>";
		echo "<td> Xmlns </td>";
		echo "<td> Versi&oacute;n </td>";
		echo "<td> Localizaci&oacute;n </td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>".$pagoo['xmlns']."</td>";
		echo "<td>".$pagoo['Version']."</td>";
		echo "<td>".$pagoo['xsi']."</td>";

	}

	foreach($contentp->xpath('//cfdi:Comprobante/cfdi:Complemento/pago10:Pagos/pago10:Pago') as $pago2){
		echo "<br>";
		echo "<tr>";
		echo "<td> Fecha de Pago</td>";
		echo "<td> Forma de Pago</td>";
		echo "<td> Moneda de Pago</td>";
		echo "<td> Monto </td>";
		echo "</tr>";

		echo "<tr>";
		$FechaPago = $pago2['FechaPago'];
		echo "<td>".$FechaPago."</td>";
		$FormaDePagoP = $pago2['FormaDePagoP'];
		echo "<td>".$FormaDePagoP."</td>";
		$MonedaP = $pago2['MonedaP'];
		echo "<td>".$MonedaP."</td>";
		$Monto = $pago2['Monto'];
		echo "<td>".$Monto."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> N&uacute;mero de Operaci&oacute;n </td>";
		echo "<td> RFC Emisor Cuenta Beneficiario </td>";
		echo "<td> Cuenta Beneficiario </td>";
		echo "</tr>";

		echo "<tr>";
		$NumOperacion = $pago2['NumOperacion'];
		echo "<td>".$NumOperacion."</td>";
		$RfcEmisorCtaBen = $pago2['RfcEmisorCtaBen'];
		echo "<td>".$RfcEmisorCtaBen."</td>";
		$CtaBeneficiario = $pago2['CtaBeneficiario'];
		echo "<td>".$CtaBeneficiario."</td>";
		echo "</tr>";

	}

	foreach ($contentp->xpath('//cfdi:Comprobante/cfdi:Complemento/pago10:Pagos/pago10:Pago/pago10:DoctoRelacionado') as $doctrel) {
		echo "<br>";
		echo "<tr>";
		echo "<td> ID Documento </td>";
		echo "<td> Serie </td>";
		echo "<td> Folio </td>";
		echo "</tr>";

		echo "<tr>";
		$IdDocumento = $doctrel['IdDocumento'];
		echo "<td>".$IdDocumento."</td>";
		$Serie = $doctrel['Serie'];
		echo "<td>".$Serie."</td>";
		$Folio = $doctrel['Folio'];
		echo "<td>".$Folio."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Moneda Documento </td>";
		echo "<td> M&eacute;todo Documento </td>";
		echo "<td> N&uacute;mero de Parcialidad </td>";
		echo "<td> Impuesto Saldo Insoluto Anterior </td>";
		echo "<td> Impuesto Pagado </td>";
		echo "<td> Impuesto Saldo Insoluto </td>";
		echo "</tr>";

		echo "<tr>";
		$MonedaDR = $doctrel['MonedaDR'];
		echo "<td>".$MonedaDR."</td>";
		$MetodoDePagoDR = $doctrel['MetodoDePagoDR'];
		echo "<td>".$MetodoDePagoDR."</td>";
		$NumParcialidad = $doctrel['NumParcialidad'];
		echo "<td>".$NumParcialidad."</td>";
		$ImpSaldoAnt = $doctrel['ImpSaldoAnt'];
		echo "<td>".$ImpSaldoAnt."</td>";
		$ImpPagado = $doctrel['ImpPagado'];
		echo "<td>".$ImpPagado."</td>";
		$ImpSaldoInsoluto = $doctrel['ImpSaldoInsoluto'];
		echo "<td>".$ImpSaldoInsoluto. "</td>";
		echo "</tr>";
	}

	foreach ($contentp->xpath('//t:TimbreFiscalDigital') as $tfd){
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

	foreach ($contentp->xpath('//cfdi:Comprobante/cfdi:Addenda/AddendaMercurio') as $addenda) {
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
		$CpE = $addenda['CPEMI'];
		echo "<td>".$CpE."</td>";
		echo "</tr>";
	}

 ?>

<style type="text/css">
td{
	font-family: Arial;
	font-size: 10px;
	background: #ffffff;
	align-items: center;
}
</style>
<?php

	/*get content hace referencia al contenido del URL dado */
	$content = simplexml_load_file("3fe5ef75-ab54-49ab-b861-32a71c1a8a05.xml");
	$ns = $content->getNamespaces(true);
	$content->registerXPathNamespace('t', $ns['tfd']);
	//$content->registerXPathNamespace('xmlns', $ns['xmlns']);

	foreach ($content->xpath('//cfdi:Emisor') as $cfdiEmisor )
	{
		foreach ($content->xpath('//cfdi:Receptor') as $cfdiReceptor) {
			foreach ($content->xpath('//t:TimbreFiscalDigital') as $tfd){
				foreach($content->xpath('//cfdi:Comprobante') as $cfdiComprobante){
				echo "<tr>";

				echo "<tr>";
				$Nombremisor = $cfdiEmisor['Nombre'];
				echo "<td>". $Nombremisor."</td>";
				echo "</tr>";

				echo "<table width=1000px border= 0>";
				echo "<br>";
				echo "<tr>";
				echo "<td> RFC emisor </td>";
				$RFCemisor = $cfdiEmisor['Rfc'];
				echo "<td>".$RFCemisor."</td>";
				echo "<td> Folio fiscal </td>";
				$UuidTfd = $tfd['UUID'];
				echo "<td>".$tfd['UUID']."</td>";
				echo "<tr>";
				echo "<td> Nombre emisor </td>";
				$Nombremisor = $cfdiEmisor['Nombre'];
				echo "<td>". $Nombremisor."</td>";
				echo "<td> No. de serie del CSD: </td>";
				$NoCertificado = $cfdiComprobante['NoCertificado'];
				echo "<td>".$NoCertificado."</td>";
				echo "<tr>";
				echo "<td> RFC receptor </td>";
				$Rfcreceptor = $cfdiReceptor['Rfc'];
				echo "<td>".$cfdiReceptor['Rfc']."</td>";
				echo "<td> C&oacute;digo postal, fecha y hora de emisi&oacute;n:";
				$LugarExp= $cfdiComprobante['LugarExpedicion'];
				echo "<td>".$LugarExp."</td>";
				echo "<tr>";
				echo "<td> Nombre receptor </td>";
				$Nombrereceptor = $cfdiReceptor['Nombre'];
				echo "<td>".$Nombrereceptor."</td>";
				echo "<tr>";
				echo "<td> Uso CFDI </td>";
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
						echo "<td> Equipo de C&oacute;mputo  y Accesorios </td>";
						break;
					case 'I05':
						$varUcfdi="Dados, Troqueles, Moldes, Matrices y Herrramental";
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
						$varUcfdi="Intereses Reales Efectivamente Pagados por Cr&eacute;ditos Hipotecarios(Casa Habitaci&oacute;n)";
						echo "<td> Intereses Reales Efectivamente Pagados por Cr&eacute;ditos Hipotecarios (Casa Habitaci&oacute;n) </td>";
						break;
					case 'D06':
						$varUcfdi="Aportaciones Voluntarias al SAR";
						echo "<td> Aportaciones Voluntarias al SAR</td>";
						break;
					case 'D07':
						$varUcfdi="Primas por Seguros de Gastos Médicos";
						echo "<td> Primas por Seguros de Gastos Médicos </td>";
						break;
					case 'D08':
						$varUcfdi="Gastos de Transportación Escolar Obligatoria ";
						echo "<td> Gastos de Transportación Escolar Obligatoria </td>";
						break;
					case 'D09':
						$varUcfdi="Depósitos en Cuentas para el Ahorro, Primas que tengan como Base Planes de Pensiones";
						echo "<td> Depósitos en Cuentas para el Ahorro, Primas que tengan como Base Planes de Pensiones </td>";
						break;
					case 'D10':
						$varUcfdi="Pagos por Servicios Educativos (Colegiaturas)";
						echo "<td> Pagos por Servicios Educativos (Colegiaturas) </td>";
						break;
					case 'P01':
						$varUcfdi="Por Definir";
						echo "<td> Por definir </td>";
						break;
					default:
						// code...
						break;
				}
				$usoCfdi=$varUcfdi;
			}
			}
		}
	}



	foreach($content->xpath('//cfdi:Comprobante') as $cfdiComprobante)

	{

		echo "<table width=500px border= 0>";
		echo "<br>";

		echo "<tr>";
		echo "<td> Tipo de Comprobante </td>";
		echo "<td> Lugar Expedici&oacute;n </td>";
		echo "<td> M&eacute;todo de Pago </td>";
		echo "<td> Subtotal </td>";
		//echo "<td> Tipo </td>";
		echo "<td> Total </td>";
		echo "<td> Moneda </td>";
		echo "</tr>";

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

		$LugarExp= $cfdiComprobante['LugarExpedicion'];
		echo "<td>".$LugarExp."</td>";
		switch ($cfdiComprobante['MetodoPago']) {
			case 'PPD':
				$varMpago= "Pago en parcialidades o diferidos";
				echo "<td>Pago en parcialidades o diferido</td>";
				break;
			case 'PUE':
				$varMpago="Pago en una sola exhibici&oacute;n";
				echo "<td>Pago en una sola exhibici&oacute;n</td>";
				break;
			default:
				// code...
				break;
		}
		$MetodoPago=$varMpago;

		$Subtotal=$cfdiComprobante['SubTotal'];
		echo "<td>".$Subtotal."</td>";
		//$tipoT="Traslado";
		//echo "<td> Traslado </td>";
		$Total=$cfdiComprobante['Total'];
		echo "<td>".$Total."</td>";
		$Moneda=$cfdiComprobante['Moneda'];
		echo "<td>".$Moneda."</td>";
		echo "</tr>";
		echo "</br>";

		echo "<tr>";
		echo "<td> N&uacute;mero de certificado </td>";
		echo "<td> Forma de Pago </td>";
		echo "<td> Versi&oacute;n </td>";
		echo "<td> Fecha </td>";
		echo "</tr>";

		echo "<tr>";
		$NoCertificado = $cfdiComprobante['NoCertificado'];
		echo "<td>".$NoCertificado."</td>";
		$FormaPago = $cfdiComprobante['FormaPago'];
		echo "<td>".$FormaPago."</td>";
		$Version = $cfdiComprobante['Version'];
		echo "<td>".$Version."</td>";
		$FechaC=$cfdiComprobante['Fecha'];
		echo "<td>".$FechaC."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Certificado </td>";
		echo "<td> Sello </td>";
		echo "</tr>";

		echo "<tr>";
		$Certificado=$cfdiComprobante['Certificado'];
		echo "<td>";
		for ($i=0; $i <2000 ; $i+=80) {
			echo substr($Certificado, $i , 80)."<br>";
		}
		echo "</td>";

		$SelloC=$cfdiComprobante['Sello'];
		echo "<td>";
		for ($i=0; $i <400 ; $i+=80) {
			echo substr($SelloC, $i, 80)."<br>";
		}
		echo "</td>";

		echo "</tr>";


	}


	foreach ($content->xpath('//cfdi:Emisor') as $cfdiEmisor)
	{

		echo "<br>";
		echo "<tr>";
		echo "<td> RFC emisor </td>";
		echo "<td> Nombre</td>";
		echo "<td> Regimen Fiscal </td>";
		echo "</tr>";

		echo "<tr>";
		$RFCemisor = $cfdiEmisor['Rfc'];
		echo "<td>".$RFCemisor."</td>";
		$Nombremisor= $cfdiEmisor['Nombre'];
		echo "<td>".$Nombremisor."</td>";
		switch($cfdiEmisor['RegimenFiscal']){
		case '601':
			$varRegFiscal="General de Ley Personas Morales";
			echo "<td>General de Ley Personas Morales</td>";
			break;
		case '603':
			$varRegFiscal="Personas Morales con Fines no Lucrativos";
			echo "<td>Personas Morales con Fines no Lucrativos</td>";
			break;
		case '605':
			$varRegFiscal="Sueldos y Salarios e Ingresos Asimilados a Salarios";
			echo "<td>Sueldos y Salarios e Ingresos Asimilados a Salarios</td>";
			break;
		case '612':
			$varRegFiscal="Personas F&iacute;sicas con Actividades Profesionales y Empresariales";
			echo "<td>Personas F&iacute;sicas con Actividades Profesionales y Empresariales </td>";
			break;
		}
		$RegFiscal=$varRegFiscal;

		echo "</tr>";
		echo "</br>";

	}


	foreach ($content ->xpath('//cfdi:Receptor') as $cfdiReceptor) {

		echo "<br>";
		echo "<tr>";
		echo "<td> RFC Receptor </td>";
		echo "<td> Nombre </td>";
		echo "<td> Uso CFDI </td>";
		echo "</tr>";

		echo "<tr>";

		$Rfcreceptor = $cfdiReceptor['Rfc'];
		echo "<td>".$cfdiReceptor['Rfc']."</td>";
		$Nombrereceptor = $cfdiReceptor['Nombre'];
		echo "<td>".$cfdiReceptor['Nombre']."</td>";
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
				echo "<td> Equipo de C&oacute;mputo  y Accesorios </td>";
				break;
			case 'I05':
				$varUcfdi="Dados, Troqueles, Moldes, Matrices y Herrramental";
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
				$varUcfdi="Intereses Reales Efectivamente Pagados por Cr&eacute;ditos Hipotecarios(Casa Habitaci&oacute;n)";
				echo "<td> Intereses Reales Efectivamente Pagados por Cr&eacute;ditos Hipotecarios (Casa Habitaci&oacute;n) </td>";
				break;
			case 'D06':
				$varUcfdi="Aportaciones Voluntarias al SAR";
				echo "<td> Aportaciones Voluntarias al SAR</td>";
				break;
			case 'D07':
				$varUcfdi="Primas por Seguros de Gastos Médicos";
				echo "<td> Primas por Seguros de Gastos Médicos </td>";
				break;
			case 'D08':
				$varUcfdi="Gastos de Transportación Escolar Obligatoria ";
				echo "<td> Gastos de Transportación Escolar Obligatoria </td>";
				break;
			case 'D09':
				$varUcfdi="Depósitos en Cuentas para el Ahorro, Primas que tengan como Base Planes de Pensiones";
				echo "<td> Depósitos en Cuentas para el Ahorro, Primas que tengan como Base Planes de Pensiones </td>";
				break;
			case 'D10':
				$varUcfdi="Pagos por Servicios Educativos (Colegiaturas)";
				echo "<td> Pagos por Servicios Educativos (Colegiaturas) </td>";
				break;
			case 'P01':
				$varUcfdi="Por Definir";
				echo "<td> Por definir </td>";
				break;
			default:
				// code...
				break;
		}
		$usoCfdi=$varUcfdi;
	}

		foreach ($content->xpath('//cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto') as $conceptose) {

			echo "<tr>";
			echo "<td> Clave Productos y Servicios </td>";
			echo "<td> Cantidad </td>";
			echo "<td> Clave Unidad </td>";
			echo "<td> Descripci&oacute;n</td>";
			echo "</tr>";


			echo "<tr>";
			$ClavePS = $conceptose['ClaveProdServ'];
			echo "<td>".$conceptose['ClaveProdServ']."</td>";
			$Cantidad = $conceptose['Cantidad'];
			echo "<td>".$conceptose['Cantidad']."</td>";
			$ClaveUnidad = $conceptose['ClaveUnidad'];
			echo "<td>".$conceptose['ClaveUnidad']."</td>";
			$Descripcion =$conceptose['Descripcion'];
			echo "<td>".$conceptose['Descripcion']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td> Valor Unitario </td>";
			echo "<td> Importe </td>";
			echo "</tr>";

			echo "<tr>";
			$ValorUnitario = $conceptose['ValorUnitario'];
			echo "<td>".$conceptose['ValorUnitario']."</td>";
			$Importe = $conceptose['Importe'];
			echo "<td>".$conceptose['Importe']."</td>";
			echo "</tr>";

		}

		foreach ($content->xpath('//cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto/cfdi:Impuestos/cfdi:Traslados/cfdi:Traslado') as $contentras){
			echo "<br>";

			echo "<tr>";
			echo "<td> Base </td>";
			echo "<td> Impuesto </td>";
			echo "<td> Tipo de Factor </td>";
			echo "<td> Tasa Cuota </td>";
			echo "<td> Importe </td>";
			echo "</tr>";

			echo "<tr>";
			$Base = $contentras['Base'];
			echo "<td>".$contentras['Base']."</td>";
			$Impuesto = $contentras['Impuesto'];
			echo "<td>".$contentras['Impuesto']."</td>";
			$TipoFactor = $contentras['TipoFactor'];
			echo "<td>".$contentras['TipoFactor']."</td>";
			$TasaOCuota  = $contentras['TasaOCuota'];
			echo "<td>".$contentras['TasaOCuota']."</td>";
			$ImporteT = $contentras['Importe'];
			echo "<td>".$contentras['Importe']."</td>";
			echo "</tr>";
		}

		foreach ($content->xpath('//cfdi:Comprobante/cfdi:Impuestos') as $contimp) {

			echo "<br>";
			echo "<tr>";
			echo "<td> Total Impuestos Trasladados </td>";
			echo "</tr>";

			echo "<tr>";

			$TotalImpuestos = $contimp['TotalImpuestosTrasladados'];
			echo "<td>".$contimp['TotalImpuestosTrasladados']."</td>";
			echo "</tr>";

		}

		foreach ($content->xpath('//cfdi:Comprobante/cfdi:Impuestos/cfdi:Traslados/cfdi:Traslado') as $contimpu) {
			echo "<br>";
			echo "<tr>";
			echo "<td> Impuesto </td>";
			echo "<td> Tipo de Factor </td>";
			echo "<td> Tasa Cuota </td>";
			echo "<td> Importe </td>";
			echo "</tr>";

			echo "<tr>";
			switch ($contimpu['Impuesto']) {
				case '001':
					$impuestoT="Retenci&oacute;n ISR";
					echo "<td> Retenci&oacute;n ISR</td>";
					break;
				case '002':
					$impuestoT="IVA";
					echo "<td> IVA </td>";
					break;
				case '003':
					$impuestoT="IEPS";
					echo "<td> IEPS </td>";
					break;
				default:
					// code...
					break;
			}
			$varImpuestoT=$impuestoT;

			$TipoF = $contimpu['TipoFactor'];
			echo "<td>".$contimpu['TipoFactor']."</td>";
			$TasaCuota = $contimpu['TasaOCuota'];
			echo "<td>".$contimpu['TasaOCuota']."</td>";
			$ImporteImp = $contimpu['Importe'];
			echo "<td>".$contimpu['Importe']."</td>";
			echo "</tr>";
		}

foreach ($content->xpath('//t:TimbreFiscalDigital') as $tfd){
		echo "<br>";
		echo "<tr>";
		echo "<td> Versi&oacute;n </td>";
		echo "<td> Folio Fiscal </td>";
		echo "<td> Fecha de Timbrado </td>";
		echo "<td> RFC Proveedor Certificado </td>";
		echo "</tr>";

		echo "<tr>";

		$VersionTfd = $tfd['Version'];
		echo "<td>".$tfd['Version']."</td>";
		$UuidTfd = $tfd['UUID'];
		echo "<td>".$tfd['UUID']."</td>";
		$FechaTimbrado = $tfd['FechaTimbrado'];
		echo "<td>".$tfd['FechaTimbrado']."</td>";
		$RfcProveedor = $tfd['RfcProvCertif'];
		echo "<td>".$tfd['RfcProvCertif']."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Sello CFD </td>";
		echo "</tr>";

		echo "<tr>";
		$SelloCFD = $tfd['SelloCFD'];
		echo "<td>";
		for ($i=0; $i <400 ; $i+=80) {
				echo substr($SelloCFD, $i, 80). "<br>";
		}
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Sello SAT </td>";
		echo "</tr>";

		echo "<tr>";
		$SelloSAT = $tfd['SelloSAT'];
		echo "<td>";
		for ($i=0; $i <400 ; $i+=80) {
				echo substr($SelloSAT, $i, 80). "<br>";
		}
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> N&uacute;mero Certificado SAT</td>";
		echo "</tr>";

		echo "<tr>";
		$NoCertSAT = $tfd['NoCertificadoSAT'];
		echo "<td>".$tfd['NoCertificadoSAT']."</td>";
		echo "</tr>";

	}

	foreach ($content->xpath('//cfdi:Comprobante/cfdi:Addenda/AddendaMercurio') as $addenda) {
		echo "<br>";
		echo "<tr>";
		echo "<td> Calle Emisor </td>";
		echo "<td>N&uacute;mero Emisor </td>";
		echo "<td>Estado Emisor </td>";
		echo "<td>C&oacute;digo Postal Emisor </td>";
		echo "</tr>";

		echo "<tr>";
		$CalleE = $addenda['CALLEEMI'];
		echo "<td>".$addenda['CALLEEMI']."</td>";
		$NumE = $addenda['NUMEMI'];
		echo "<td>".$addenda['NUMEMI']."</td>";
		$EdoE = $addenda['EDOEMI'];
		echo "<td>".$addenda['EDOEMI']."</td>";
		$CpE = $addenda['CPEMI'];
		echo "<td>".$addenda['CPEMI']."</td>";
		echo "</tr>";
	}



?>

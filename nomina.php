<?php

	/*get content hace referencia al contenido del URL dado */
	$contenti = simplexml_load_file("rep197038019749844549tmp.xml");
	$ns = $contenti->getNamespaces(true);
	$contenti->registerXPathNamespace('t', $ns['tfd']);

	foreach($contenti->xpath('//cfdi:Comprobante') as $cfdiComprobante)

	{

		echo "<table border= 1>";
		echo "<br>";
		echo "<tr>";
		echo "<td> Fecha </td>";
		echo "<td> Sello </td>";
		echo "<td> Forma de Pago </td>";
		echo "<td> Tipo de Comprobante </td>";
		echo "<td> Lugar Expedici&oacute;n </td>";
		echo "<td> Subtotal </td>";
		echo "<td> Total </td>";
		echo "</tr>";

		echo "<tr>";
		$FechaC = $cfdiComprobante['Fecha'];
		echo "<td>".$FechaC."</td>";
		$Sello = $cfdiComprobante['Sello'];
		echo "<td>".$Sello."</td>";
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
				$varFormaPago="Unidad_Obra";
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

		$LugarExp = $cfdiComprobante['LugarExpedicion'];
		echo "<td>".$LugarExp."</td>";
		$Subtotal = $cfdiComprobante['SubTotal'];
		echo "<td>".$Subtotal."</td>";
		$Total = $cfdiComprobante['Total'];
		echo "<td>". $Total."</td>";
		echo "</tr>";


		echo "<tr>";
		echo "<td> N&uacute;mero de Certificado </td>";
		echo "<td> Certificado </td>";
		echo "</tr>";

		echo "<tr>";
		$NoCertificado = $cfdiComprobante['NoCertificado'];
		echo "<td>".$NoCertificado."</td>";
		$Certificado = $cfdiComprobante['Certificado'];
		echo "<td>".$Certificado."</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td> Serie </td>";
		echo "<td> Folio </td>";
    echo "<td> Moneda </td>";
    echo "<td> Método de Pago </td>";
    echo "<td> Descuento </td>";
		echo "</tr>";

		echo "<tr>";
		$Serie = $cfdiComprobante['Serie'];
		echo "<td>".$Serie."</td>";
		$Folio = $cfdiComprobante['Folio'];
		echo "<td>".$Folio."</td>";
		$Moneda = $cfdiComprobante['Moneda'];
    echo "<td>".$Moneda."</td>";
		if ($cfdiComprobante['MetodoPago'] == 'PUE') {
			$varMpago="Pago en una sola exhibici&oacute;n";
			echo "<td> Pago en una sola exhibici&oacute;n </td>";
		}else {
			$varMpago="Pago en pagos diferidos";
			echo "<td> Pago en pagos diferidos </td>";
		}
		$MetodoPago=$varMpago;
		$Descuento = $cfdiComprobante['Descuento'];
    echo "<td>".$Descuento."</td>";
		echo "</tr>";
		echo "</br>";
		//echo "</table>";
	}


	foreach ($contenti->xpath('//cfdi:Emisor') as $cfdiEmisor)
	{
		echo "<br>";
		echo "<tr>";
    echo "<td> Régimen Fiscal </td>";
		echo "<td> RFC emisor </td>";
		echo "<td> Nombre</td>";
		echo "</tr>";

		echo "<tr>";
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
		$RegFiscal= $varRegFiscal;

		$RFCemisor = $cfdiEmisor['Rfc'];
		echo "<td>".$RFCemisor."</td>";
		$Nombremisor =$cfdiEmisor['Nombre'];
		echo "<td>".$Nombremisor."</td>";
		echo "</tr>";
		echo "</br>";
	}



	foreach ($contenti ->xpath('//cfdi:Receptor') as $cfdiReceptor) {
		echo "<br>";
		echo "<tr>";
		echo "<td> RFC Receptor </td>";
		echo "<td> Nombre </td>";
		echo "<td> Uso CFDI </td>";
		echo "</tr>";

		echo "<tr>";
		$Rfcreceptor = $cfdiReceptor['Rfc'];
		echo "<td>".$Rfcreceptor."</td>";
		$Nombrereceptor = $cfdiReceptor['Nombre'];
		echo "<td>".$Nombremisor."</td>";
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
			echo "</tr>";
	}

    foreach ($contenti->xpath('//cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto') as $nomcon) {

			echo "<br>";
			echo "<tr>";
			echo "<td> Clave Productos y Servicios </td>";
			echo "<td> Cantidad </td>";
			echo "<td> Clave Unidad </td>";
			echo "<td> Descripci&oacte;n </td>";
			echo "<td> Valor Unitario </td>";
			echo "<td> Importe </td>";
			echo "<td> Descuentos </td>";
			echo "</tr>";

			echo "<tr>";
			$ClavePS = $nomcon['ClaveProdServ'];
			echo "<td>".$ClavePS."</td>";
			$Cantidad = $nomcon['Cantidad'];
			echo "<td>".$Cantidad."</td>";
			$ClaveUnidad = $nomcon['ClaveUnidad'];
			echo "<td>".$ClaveUnidad."</td>";
			$Descripcion = $nomcon['Descripcion'];
			echo "<td>".$Descripcion."</td>";
			$ValorUnitario = $nomcon['ValorUnitario'];
			echo "<td>".$ValorUnitario."</td>";
			$ImporteN = $nomcon['Importe'];
			echo "<td>".$nomcon['Importe']."</td>";
			$DescuentoN = $nomcon['Descuento'];
			echo "<td>".$DescuentoN."</td>";
    }

    foreach ($contenti ->xpath('//nomina12:Nomina') as $nomina) {

		echo "<br>";
    echo "<tr>";
    echo "<td> Versión </td>";
    echo "<td> Tipo Nómina </td>";
		echo "<td> Fecha Pago </td>";
    echo "<td> Fecha inicial Pago </td>";
    echo "<td> Fecha final de pago </td>";
    echo "<td> Número días pagados </td>";
    echo "<td> Total Percepciones </td>";
    echo "<td> Total Deducciones </td>";
    echo "<td> Total Otros Pagos </td>";
		echo "</tr>";


		  echo "<tr>";
			$VersionN= $nomina['Version'];
      echo "<td>".$nomina['Version']. "</td>";
      if($nomina['TipoNomina'] == 'O'){
				$varTipoNomina="N&oacute;mina Ordinaria";
        echo "<td> Nómina Ordinaria </td>";
      }else {
				$varTipoNomina="N&oacute;mina Extraordinaria";
        echo "<td> Nómina Extraordinaria </td>";
      }
			$tipoNomina= $varTipoNomina;

			$FechaPago = $nomina['FechaPago'];
      echo "<td>".$FechaPago. "</td>";
			$FechaInicialPago = $nomina['FechaInicialPago'];
      echo "<td>".$FechaInicialPago. "</td>";
			$FechaFinalPago = $nomina['FechaFinalPago'];
      echo "<td>".$FechaFinalPago. "</td>";
			$NumDiasPagados = $nomina['NumDiasPagados'];
      echo "<td>".$NumDiasPagados. "</td>";
			$TotalPercepciones = $nomina['TotalPercepciones'];
      echo "<td>".$TotalPercepciones. "</td>";
			$TotalDeducciones = $nomina['TotalDeducciones'];
      echo "<td>".$TotalDeducciones. "</td>";
      if ($nomina['TotalOtroPagos'] != 0) {
        echo "<td>".$nomina['TotalOtroPagos']. "</td>";
      }else {
        echo "<td> - </td>";
      }

    }

		foreach ($contenti->xpath('//nomina12:Emisor') as $nominaEmisor) {

			echo "<br>";
			echo "<tr>";
			echo "<td> CURP </td>";
			echo "<td> Registro Patronal </td>";
			echo "</tr>";

			echo "<tr>";
			$CurpEmisor = $nominaEmisor['Curp'];
			echo "<td>".$CurpEmisor."</td>";
			$RegistroPatronal = $nominaEmisor['RegistroPatronal'];
			echo "<td>".$RegistroPatronal."</td>";
			echo "</tr>";
		}


    foreach ($contenti->xpath('//nomina12:Receptor') as $nominaReceptor) {

			echo "<br>";
	    echo "<tr>";
	    echo "<td> Regimen </td>";
	    echo "<td> CURP </td>";
	    echo "<td> Número Seguridad Social </td>";
	    echo "<td> Fecha Inicio Relación Laboral </td>";
	    echo "<td> Antiguedad </td>";
	    echo "<td> Tipo de Contrato</td>";
	    echo "<td> Sindicalizado</td>";
	    echo "<td> Tipo de Jornada </td>";
	    echo "<td> Número de Empleado </td>";
	    echo "</tr>";

      switch($nominaReceptor['TipoRegimen']){
  			case '02':
					$varRegimen="Sueldos";
  				echo "<td>Sueldos</td>";
  				break;
  			case '05':
					$varRegimen="Asimilados Miembros Sociedades Cooperativas Producci&oacute;n";
  				echo "<td>Asimilados Miembros Sociedades Cooperativas Producci&oacute;n</td>";
  				break;
  			case '06':
					$varRegimen="Asimilados Integrantes Sociedades Asociaciones Civiles";
					echo "<td>Asimilados Integrantes Sociedades Asociaciones Civiles</td>";
  				break;
  			case '09':
					$varRegimen="Asimilados Honorarios";
  				echo "<td>Asimilados Honorarios</td>";
  				break;
        case '11':
					$varRegimen="Asimilados Otros";
          echo "<td>Asimilados Otros</td>";
          break;
  			}
				$Regimen=$varRegimen;

				$CurpReceptor = $nominaReceptor['Curp'];
        echo "<td>".$CurpReceptor."</td>";
				$NumSeguridadSocial = $nominaReceptor['NumSeguridadSocial'];
        echo "<td>".$NumSeguridadSocial."</td>";
				$FechaInicioRelLaboral = $nominaReceptor['FechaInicioRelLaboral'];
        echo "<td>".$FechaInicioRelLaboral."</td>";
				$Antiguedad = $nominaReceptor['Antigüedad'];
        echo "<td>".$Antiguedad."</td>";

        switch ($nominaReceptor['TipoContrato']) {
        	case '01':
						$varTipoContrato= "Contrato de Trabajo por tiempo indeterminado";
						echo "<td> Contrato de Trabajo por tiempo indeterminado </td>";
        		break;
					case '02':
						$varTipoContrato="Contrato de Trabajo para obra determinada";
						echo "<td> Contrato de Trabajo para obra determinada </td>";
						break;
					case '03':
						$varTipoContrato="Contrato de Trabajo por tiempo determinado";
						echo "<td> Contrato de Trabajo por tiempo determinado </td>";
						break;
					case '04':
						$varTipoContrato="Contrato de Trabajo por Temporada";
						echo "<td> Contrato de Trabajo por Temporada </td>";
						break;
					case '05':
						$varTipoContrato="Contrato de Trabajo sujeto a Prueba";
						echo "<td> Contrato de Trabajo sujeto a Prueba </td>";
						break;
					case '06':
						$varTipoContrato="Contrato de Trabajo con capacitaci&oacute;n inicial";
						echo "<td> Contrato de Trabajo con capacitaci&oacute;n inicial </td>";
						break;
					case '07':
						$varTipoContrato= "Modalidad de contrataci&oacute;n por pago de hora laborada";
						echo "<td> Modalidad de contrataci&oacute;n por pago de hora laborada </td>";
						break;
					case '08':
						$varTipoContrato="Modalidad de trabajo por comisión laboral";
						echo "<td> Modalidad de trabajo por comisión laboral</td>";
						break;
					case '09':
						$varTipoContrato="Modalidades de contrataci&oacute;n donde no existe relaci&oacute;n de trabajo";
						echo "<td> Modalidades de contrataci&oacute;n donde no existe relaci&oacute;n de trabajo </td>";
						break;
					case '10':
						$varTipoContrato="Jubilaci&oacute;n, pensi&oacute;n, retiro.";
						echo "<td> Jubilaci&oacute;n, pensi&oacute;n, retiro.</td>";
						break;
        	default:
						$varTipoContrato="Otro Contrato";
        		echo "<td> Otro Contrato </td>";
        		break;
					}
					$TipoContrato=$varTipoContrato;

				$Sindicalizado = $nominaReceptor['Sindicalizado'];
        echo "<td>".$Sindicalizado."</td>";

        switch($nominaReceptor['TipoJornada']){
    			case '01':
						$varTipoJornada="Diurna";
    				echo "<td>Diurna</td>";
    				break;
    			case '02':
						$varTipoJornada="Nocturna";
    				echo "<td>Nocturna</td>";
    				break;
    			case '03':
						$varTipoJornada="Mixta";
    				echo "<td>Mixta</td>";
    				break;
    			}
				$TipoJornada=$varTipoJornada;

        echo "<td>".$nominaReceptor['NumEmpleado']."</td>";

        echo "<tr>";
        echo "<td> Departamento </td>";
        echo "<td> Puesto </td>";
				echo "<td> Riesgo del Puesto </td>";
				echo "<td> Periocidad de Pago </td>";
				echo "<td> Salario Base Cot Aportación </td>";
				echo "<td> Salario Diario Integrado </td>";
				echo "<td> Clave Entidad Federativa </td>";
				echo "</tr>";

				$Departamento = $nominaReceptor['Departamento'];
        echo "<td>".$Departamento."</td>";
				$Puesto = $nominaReceptor['Puesto'];
        echo "<td>".$Puesto."</td>";

				switch($nominaReceptor['RiesgoPuesto']){
					case '1':
						$varRiesgoPuesto="Clase I";
						echo "<td>Clase I</td>";
						break;
					case '2':
						$varRiesgoPuesto="Clase II";
						echo "<td>Clase II</td>";
						break;
					case '3':
						$varRiesgoPuesto="Clase III";
						echo "<td>Clase III</td>";
						break;
					case '4':
						$varRiesgoPuesto="Clase IV";
						echo "<td>Clase IV</td>";
						break;
					case '5':
						$varRiesgoPuesto="Clase V";
						echo "<td>Clase V</td>";
					}
				$RiesgoPuesto=$varRiesgoPuesto;

			switch($nominaReceptor['PeriodicidadPago']){
				case '01':
					$varPeriocidadPago="Diario";
					echo "<td>Diario</td>";
					break;
				case '02':
					$varPeriocidadPago="Semanal";
					echo"<td>Semanal</td>";
					break;
				case '03':
					$varPeriocidadPago="Catorcenal";
					echo "<td>Catorcenal</td>";
					break;
				case '04':
					$varPeriocidadPago="Quincenal";
					echo "<td>Quincenal</td>";
					break;
				case '05':
					$varPeriocidadPago="Mensual";
					echo "<td>Mensual</td>";
					break;
				case '06':
					$varPeriocidadPago="Bimestral";
					echo "<td>Bimestral</td>";
					break;
				case '07':
					$varPeriocidadPago="Unidad_Obra";
					echo "<td>Unidad_obra</td>";
					break;
				case '08':
					$varPeriocidadPago="Comision";
					echo "<td>Comision</td>";
					break;
				case '09':
					$varPeriocidadPago="Precio_alzado";
					echo "<td>Precio_alzado</td>";
					break;
				case '99':
					$varPeriocidadPago="Otra Periocidad";
					echo "<td>Otra Periocidad</td>";
					break;
			}
			$PeriocidadPago=$varPeriocidadPago;

			$SalarioBaseCotApor = $nominaReceptor['SalarioBaseCotApor'];
			echo "<td>".$SalarioBaseCotApor."</td>";
			$SalarioDiarioIntegrado = $nominaReceptor['SalarioDiarioIntegrado'];
			echo "<td>".$SalarioDiarioIntegrado."</td>";
			$ClaveEntFed = $nominaReceptor['ClaveEntFed'];
			echo "<td>".$ClaveEntFed."</td>";
		}



		foreach ($contenti->xpath('//nomina12:Percepciones') as $nominaPercepcion) {

			echo "<br>";
			echo "<tr>";
			echo "<td> Total Gravado </td>";
			echo "<td> Total Exento </td>";
			echo "<td> Total Sueldos </td>";
			echo "</tr>";

			echo "<tr>";
			$TotalGravado = $nominaPercepcion['TotalGravado'];
			echo "<td>".$TotalGravado."</td>";
			$TotalExento = $nominaPercepcion['TotalExento'];
			echo "<td>".$TotalExento."</td>";
			$TotalSueldos = $nominaPercepcion['TotalSueldos'];
			echo "<td>".$TotalSueldos."</td>";
		}

		foreach ($contenti->xpath('//nomina12:Percepciones/nomina12:Percepcion') as $nomPercepcion) {

			echo "<br>";

			echo "<tr>";
			echo "<td> Tipo de Percepcion </td>";
			echo "<td> Clave </td>";
			echo "<td> Concepto </td>";
			echo "<td> Importe Gravado </td>";
			echo "<td> Importe Exento </td>";
			echo "</tr>";

			echo "<tr>";
			$TipoPercepcion = $nomPercepcion['TipoPercepcion'];
			echo "<td>".$TipoPercepcion."</td>";
			$ClavePercepcion = $nomPercepcion['Clave'];
			echo "<td>".$ClavePercepcion."</td>";
			$ConceptoPercepcion = $nomPercepcion['Concepto'];
			echo "<td>".$ConceptoPercepcion."</td>";
			$ImporteGravado = $nomPercepcion['ImporteGravado'];
			echo "<td>".$ImporteGravado."</td>";
			$ImporteExento = $nomPercepcion['ImporteExento'];
			echo "<td>".$ImporteExento."</td>";


		}

		foreach ($contenti->xpath('//nomina12:Deducciones') as $nominaDeducciones) {
			$OtrasDeducciones = $nominaDeducciones['TotalOtrasDeducciones'];
			echo "<td>".$OtrasDeducciones."</td>";
			echo "</tr>";
		}

		echo "<br>";
		echo "<tr>";
		echo "<td> UUID </td>";
		echo "<td> Fecha de Timbrado </td>";
		//echo "<td> Descripci&oacute;n </td>";
		echo "</tr>";


	foreach ($contenti->xpath('//t:TimbreFiscalDigital') as $tfdTimbre)
	{
		echo "<tr>";
		$UuidTfd = $tfdTimbre['UUID'];
		echo "<td>".$UuidTfd."</td>";
		$FechaTimbrado = $tfdTimbre['FechaTimbrado'];
		echo "<td>".$FechaTimbrado."</td>";
		//echo "<td>".$cfdiConcepto['Descripcion']."</td>";
		echo "</tr>";
		echo "</br>";
		echo "</table>";
	}

 ?>

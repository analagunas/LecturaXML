<?php

/* se da una carpeta base en la que va a comprobarr que haya archivos */

if(is_dir('/')){

	/* declarar variable que pertenee al archivo */


	if ( file_exists == true) {
		/* aqui se busca leer el xml 
		pero no es necesario dar el nombre de cada archivo*/
		$xmlbase = simplexml_load_file( '3fe5ef75-ab54-49ab-b861-32a71c1a8a05.xml');
		$xmlg = $xmlbase-> getNamespaces(TRUE);
		$xmlbase = registerXPathNamespace('c', $ns['cfdi']);

		/* TFD no se necesitan extraer datos */
		$xmlbase = registerXPathNamespace('t', $ns['tfd']);

	// AQUI SE EXTRAEN ELEMENTOS DEL XML POR ETIQUETA
		for ea
	
	}else{
		echo "<p> No se han encontrado arcchivos <p>";
	}
}else{

}



?>
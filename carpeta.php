<?php

/* primero nos sirve para ver si el directorio donde se encontraran los xml existe */

function checardir($directorio){
	$directorio = getcwd();

	if (file_exists($directorio)) {
		echo "El directorio existe </br>";
	}else{
		echo "No existe el directorio </br>";
	}
}

//aqui ya vemos si se aplico
checardir("");



function barridocarpetas($dir){

	$dir ='XML/RECIBIDOS';
	$dir = strtolower($dir);

	$archivos1 = scandir($dir);
	$archivos2 = scandir($dir, 1);

	print_r($archivos1);
	print_r($archivos2);
}

barridocarpetas('XML/RECIBIDOS');

/* aqui solo seran los xml */

function archivitos($nombre_archivos){

	foreach (glob("*.xml") as $nombre_archivos ) {
		echo "$nombre_archivos<br>";
	}
}

archivitos('XML');

/*esta funcion lee los datos de una factura de egreso*/


?>

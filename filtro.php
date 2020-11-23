<?php

// 1. Necesario revisar que es una carpeta
/*
$ruta=$_GET['ruta'];

$ruta= strtolower($ruta);

$directorio= opendir($ruta);

while($archivo = readdir($directorio)){
	if (is_dir($archivo) {
		echo "[".$archivo . "]<br/>";
	}
	else{
		echo $archivo . "<br/>";
	}
}

*/

// Las funciones checardir y listarArchivos parecen ser las mismas

function checardir($ruta){

	// revisar que directorio
	//$ruta = $directorio . "/";
	// revisa que exista el directorio o no

	if (is_dir($ruta)){
		// se debe cambiar porque no queremos que solo imprima
		if($direc=opendir($ruta)){
			while ($file= readdir($direc)!==false){
			echo "<br>Nombre de archivo: $file : Su ruta es:". filetype($ruta . $file);
			// aqui revisa los archivos que no se encuentran en . y ..
			if (is_dir($ruta . $file) && file!="." && file != "..") {
					echo "<br>Directorio: $ruta$file";
					checardir($ruta . $file."/");
				}
			}
			closedir($direc);
		}
	} else
		 echo "<br>No es ruta valida";
}

checardir("");

// esta funcion hace quese tarde mucho porque al parecer revisa los archivos de root

/*function listarArchivos($ruta){
	// leemos archivos de la carpeta
	$dir = opendir($ruta);

	// aqui faltaria el if para ver si es un directorio
	gettype($dir);
	gettype($ruta);
	while($archivo ==readdir($dir)){
		// se necesita revisar donde estan los elementos
		if($elemento != "." && $elemento != ".."){

			// primero se revisa que haya archivos y luego que sea carpeta
			if( is_dir($ruta.$elemento)){
				// cada carpeta se va a imprimir
				echo "<p>La carpeta: ". $elemento . "</p>";
			}else {
				// se imprimen los elementos
				echo "</br>". $elemento;
			}
		}
	}
}

listarArchivos("");
*/
?>

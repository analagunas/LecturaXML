<?php

include 'ejemplo.php';

$peliculas = new SimpleXMLElement($xmlstr);

echo $peliculas->pelicula[0]->argumento;

?>
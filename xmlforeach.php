<?php

// opcion con arrays
$cabecera= array("nombre", "apellido", "carrera" );
$ana= array("ana", "lagunas", "informatica");
$jesus = array("jesus", "garcia", "ing. en compu");
$blanca= array("blanca", "rivera", "ing. en compu");

$agenda= array($cabecera,$ana, $jesus, $blanca);
?>

<table border="1" width="60%" cellspacing="0">

<?php
foreach ($agenda as $fila) {
  echo "<tr>";
  foreach ($fila as $celda) {
    echo "<td> $celda </td>";
  }
  echo "</tr>";
}
?>

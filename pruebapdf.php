<?php

use Dompdf\Dompdf;


include_once('./vendor/autoload.php');

session_start();
ini_set("memory_limit", "128M");

/**header('Location: pruebapdf.php');
die();
*/

$dompdf= new DOMPDF();

$dompdf->set_paper('A4','landscape');

ob_start();
include 'egreso.php';
$html_para_pdf=ob_get_clean();

$dompdf->load_html($html_para_pdf);

$dompdf->render();


$output = $dompdf->output();

//file_put_contents('mipdf.pdf', $output);

$dompdf->stream('3FE5EF75-AB54-49AB-B861-32A71C1A8A05.pdf');
return $dompdf;
?>

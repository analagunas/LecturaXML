<?php

use Dompdf\Dompdf;
use DompdfFontMetrics;

include_once('./vendor/autoload.php');

session_start();
ini_set("memory_limit", "128M");

header('Location: prueba2pdf.php');
exit;

$dompdf= new DOMPDF();

$dompdf->set_paper('A4','landscape');

ob_start();
include 'egreso.php';
$html_para_pdf=ob_get_clean();

$dompdf->load_html($html_para_pdf);

$dompdf->render();

$canvas = $dompdf->getCanvas();
$fontMetrics = new FontMetrics($canvas, $options);

$w = $canvas->get_width();
$h = $canvas->get_height();

$font = $fontMetrics->getFont('times');
$text = "CONFIDENTIAL";

$txtHeight = $fontMetrics->getFontHeight($font,75);
$textWidth = $fontMetrics->getTextWidth($text, $font, 75);

$canvas->set_opacity(.2);

$x = (($w-$textWidth)/2);
$y = (($h-$txtHeight)/2);

$output = $dompdf->output();

//file_put_contents('mipdf.pdf', $output);

$dompdf->stream('mipdf.pdf');
return $dompdf;
?>

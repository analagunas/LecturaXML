<div class="col-md-6">
<?php

include('phpqrcode/qrlib.php');

$contenido = "https://www.baulphp.com/";
$file = 'jr-qrcode.png';

$size = 10;

$level= QR_ECLEVEL_H;

QRcode::png($contenido);

QRcode::png($contenido, $file, $level, $size);

 ?>

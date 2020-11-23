<?php

$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

$PNG_WEB_DIR = 'XML/';

include "phpqrcode/qrlib.php";

if(!file_exists($PNG_TEMP_DIR))
  mkdir($PNG_TEMP_DIR);

$filename = $PNG_TEMP_DIR.'test.png';

$errorCorrectionLevel = 'L';

if(isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H')))
  $errorCorrectionLevel = $_REQUEST['level'];

$matrixPointSize = 4;
if(isset($_REQUEST['size']))
  $matrixPointSize = min(max((int)$_REQUEST['size'],1), 10);

  if(isset($_REQUEST['data']))

    if(trim($_REQUEST['data']) == '')
      die('no puede estar vacio <a href="?">back</a>');

      $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';

      QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

  echo '<img src="'.$PNG_WEB_DIR.basename($filename).'"/>';

  echo '<form action="index.php" method="POST">
        DATOS:
        <input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data'])
        :'PHP QR Code:)').'"/>
        Calidad: <select name="level">
                 <option value="L"'.(($errorCorrectionLevel=='L')?'select':'').'>Baja</option>
                 <option value="M"'.(($errorCorrectionLevel=='M')?'select':'').'>Media</option>
                 <option value="Q"'.(($errorCorrectionLevel=='Q')?'select':'').'>Moderada</option>
                 <option value="H"'.(($errorCorrectionLevel=='H')?'select':'').'>Elevada</option>
                 </select>
                 TAMA&nacute;o<select name="size">';
  for($i=1; $i<=10; $i++)
      echo '<option value="'.$i'"'.(($matrixPointSize==$i)?'selected':'').'>'.$i.'</option>';

      echo '</select>
            <input type="submit" value = QR></form>';

/*
$textqr=$_POST['textqr'];
$sizeqr=$_POST['sizeqr'];

include('vendor/autoload.php');

use vendor\endroid\qrcode;

$qrCode = new QrCode($textqr);
$qrCode->setSize($sizeqr);

$image= $qrCode->writeString();

$imageData=base64_decode($image);

echo '<img src="data:image/png;base64, '.$imageData.'">';
*/
 ?>

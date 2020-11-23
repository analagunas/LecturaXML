<?php

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Vendor\Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

$qrCode= new QrCode('Life is too short to be generating QR codes');
$qrCode->setSize(300);
$qrCode->setMargin(10);

$qrCode->setWriterByName('png');
$qrCode->setEncoding('UTF-8');
$qrCode->setErrorCorrectiionLevel(ErrorCorrectionLevel::HIGH());
$qrCode->setForegroundColor(['r' => 0, 'g'=> 0, 'b' => 0, 'a'=> 0]);
$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);

$qrCode->setLabel('Escanea el c&oacute;digo', 16, __DIR__.'/../assets/fonts/noto_sans.otf', LabelAlignment::CENTER());
$qrCode->setLogoPath(__DIR__.'/../assets/images/symfony.png');
$qrCode->setLogoSize(150,200);
$qrCode->setValidateResult(false);

$qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_MARGIN);
$qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_ENLARGE);
$qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_SHRINK);

$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();

$qrCode->writeFile(__DIR__.'/qrcode.png');

$dataUri = $qrCode->writeDataUri();

 ?>

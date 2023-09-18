<?php
require "vendor/autoload.php";
session_start();

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

if(isset($_POST['submit'])){
    $image_size = $_POST['image_size'] ? $_POST['image_size'] : 300;
    $font_size = $_POST['font_size'] ? $_POST['font_size'] : 20;
    $result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data($_POST['text'])
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size($image_size)
    ->margin(10)
    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->labelText($_POST['text'])
    ->labelFont(new NotoSans($font_size))
    ->labelAlignment(new LabelAlignmentCenter())
    ->validateResult(false)
    ->build();
    $filename = '../img/qrcode_' . date('YmdHis') . '.png';
    $result->saveToFile($filename);
    $_SESSION['qrcode'] = base64_encode($result->getString());
    $_SESSION['text'] = $_POST['text'];
    $_SESSION['image_size'] = $image_size;
    $_SESSION['font_size'] = $font_size;
    
}
header("Location: ../../index.php");

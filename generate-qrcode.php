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

function generate_qrcode($text, $image_size, $font_size){
    $result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data($text)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size($image_size)
    ->margin(10)
    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->labelText($text)
    ->labelFont(new NotoSans($font_size))
    ->labelAlignment(new LabelAlignmentCenter())
    ->validateResult(false)
    ->build();
    $filename = 'assets/img/qrcode_' . date('YmdHis') . '.png';
    $result->saveToFile($filename);
    $_SESSION['qrcode'] = base64_encode($result->getString());
    $_SESSION['text'] = $_POST['text'];
    $_SESSION['image_size'] = $image_size;
    $_SESSION['font_size'] = $font_size;
    return true;
}

if(isset($_POST['submit'])){
    $text = $_POST['text'];
    $image_size = $_POST['image_size'] ? $_POST['image_size'] : 300;
    $font_size = $_POST['font_size'] ? $_POST['font_size'] : 20;
    generate_qrcode($text, $image_size, $font_size);
}
header("Location: index.php");

<?php
if(isset($_GET['filename'])){
    if(file_exists('assets/img/'.$_GET['filename'])){
        echo 'file exist';
        unlink('assets/img/'.$_GET['filename']);
        header("Location: index.php");
    }
}
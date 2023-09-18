<?php
if(isset($_GET['filename'])){
    if(file_exists('../img/'.$_GET['filename'])){
        echo 'file exist';
        unlink('../img/'.$_GET['filename']);
        header("Location: ../../index.php");
    }
}
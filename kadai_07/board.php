<?php

require('sample_php/functions.php');

//掲示板データ取得
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$message = trim(filter_input(INPUT_POST,'message'));
$message = $message !== '' ? $message : '...';

$filename = 'sample_php/messages.txt';
$fp = fopen($filename,'a');
fwrite($fp,$message . "\n");
fclose($fp);
}else {
    exit('Invalid request');
}

header("Location: select_trf.php");
exit;


?>
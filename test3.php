<?php
header('Content-Type: image/png');

$bg = imagecreatefrompng('blueSquare.png');
$img = imagecreatefrompng('redSquare.png');

imagecopy($bg, $img, 50, 50, 0, 0, imagesx($bg), imagesy($bg));

imagepng($bg);
?>
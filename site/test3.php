<?php
header('Content-Type: image/png');

$bg = imagecreatefrompng('https://scontent-b.xx.fbcdn.net/hphotos-xap1/t31.0-8/s720x720/1973506_10202070758169184_5485992952186395972_o.jpg');
$img = imagecreatefrompng('redSquare.png');

imagecopy($bg, $img, 50, 50, 0, 0, imagesx($bg), imagesy($bg));

imagepng($bg);
?>
<?php // merges
header('Content-Type: image/jpg');

// $url_background is initialized earlier
// $boxes

$bg = imagecreatefromjpeg($url); // works
$img = imagecreatefromjpeg($boxes);

//imagecopy($bg, $img, 50, 50, 0, 0, imagesx($bg), imagesy($bg));
imagecopymerge ( $bg, $img , 50, 50, 0,0, imagesx($bg), imagesy($bg), 100);

//imagepng($bg);
imagejpeg($bg);
?>
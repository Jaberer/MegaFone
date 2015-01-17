<?php // merges
header('Content-Type: image/jpg');

// $url_background is initialized earlier
// $boxes
$url = "https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10802084_10202178584064764_8997610770924410470_n.jpg?oh=e5d56a793a552100d1a1af87f426d776&oe=552A498A&__gda__=1428550623_13902483b6901e7a8d3bda315e7767ef";
$bg = imagecreatefrompng('asdf.png'); // works
$img = imagecreatefrompng("full.png");

//imagecopy($bg, $img, 50, 50, 0, 0, imagesx($bg), imagesy($bg));
//imagecopymerge ( $bg, $img , 50, 50, 0,0, imagesx($bg), imagesy($bg), 100);

//imagepng($bg);


    imagealphablending($bg,true);

    imagecopymerge ($bg, $img , 50, 50, 0,0, imagesx($img), imagesy($img), 100);

	imagejpeg($bg);
?>
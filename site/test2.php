<?php // creates textbox mini-image


//$hashtagString = "asdfhaslkdfhsldfhsdjalskdjfhasdjfhlkah.com";
//$hashtagString = "...";
$characterMap = array(
    "#" => 11, // perfect at 11
	"0" => 10, "1" => 10, "2" => 12, "3" => 11, "4" => 11, "5" => 11, // perfect
	"6" => 11, "7" => 11, "8" => 11, "9" => 11, "A" => 14, "B" => 14,
"C" => 14, "D" => 14, "E" => 12, "F" => 12, "G" => 14, "H" => 14,
"I" => 8, "J" => 7, "K" => 14, "L" => 12, "M" => 15, "N" => 15,
"O" => 14, "P" => 14, "Q" => 15, "R" => 14, "S" => 14, "T" => 14,
"U" => 14, "V" => 14, "W" => 14, "X" => 14, "Y" => 14, "Z" => 14,
"a" => 10, "b" => 11, "c" => 11, "d" => 12, "e" => 12, "f" => 11,
"g" => 13, "h" => 12, "i" => 8, "j" => 7, "k" => 11, "l" => 6, "m" => 16,
"n" => 12, "o" => 13, "p" => 11, "q" => 11, "r" => 11, "s" => 11, "t" => 10,
"u" => 11, "v" => 11, "w" => 15, "x" => 11, "y" => 11, "z" => 11
);

// $hashtagString will be initialized earlier
//$hashtagString = "#JeSuisCharlie";
//$hashtagString = "#AllBlackLivesMatter";
$hashtagString = "#abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$width = 0; // will determine width of image
//foreach (array_expression as $value)
$charArray = str_split($hashtagString);
foreach ($charArray as $value) 
{
    $width += $characterMap[$value];
}
 
// NEW WAY
// Set the content-type
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor($width + 20, 30);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$emerald = imagecolorallocate( $im, 46, 204, 113 );
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 9999, 30, $emerald); // lol

// The text to draw

// Replace path by your own font path
$font = './OpenSans-Bold.ttf';

// Add some shadow to the text
//imagettftext($im, 20, 0, 11, 21, $grey, $font, $hashtagString);

// Add the text
imagettftext($im, 15, 0, 10, 20, $white, $font, $hashtagString);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);

?>

// h: 30 l:padding inner for 20, and 5 above, 5 far left right
// each 14pt or maybe 7px each letter
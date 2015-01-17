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
"g" => 13, "h" => 12, "i" => 8, "j" => 7, "k" => 11, "l" => 6, "m" => 17,
"n" => 12, "o" => 13, "p" => 11, "q" => 11, "r" => 11, "s" => 11, "t" => 10,
"u" => 11, "v" => 11, "w" => 15, "x" => 11, "y" => 11, "z" => 11
);

// $hashtagString will be initialized earlier
//$hashtagString = "#JeSuisCharlie";
//$hashtagString = "#AllBlackLivesMatter";
$StringArray = array(0 => "#A", 
1 => "#B", 
2 => "#C", 
3 => "#D", 
4 => "#a", 
5 => "#b", 
6 => "#c", 
7 => "#d", 
8 => "#m", 
);



// $url_background is initialized earlier
	// $boxes
	$url = "https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10802084_10202178584064764_8997610770924410470_n.jpg?oh=e5d56a793a552100d1a1af87f426d776&oe=552A498A&__gda__=1428550623_13902483b6901e7a8d3bda315e7767ef";
	$bg = imagecreatefromjpeg($url); // works
	
$length = 0;
for($i = 0; $i < count($StringArray); $i++)
{
	$width = 0; // will determine width of image
	//foreach (array_expression as $value)
	$charArray = str_split($StringArray[$i]);
	foreach ($charArray as $value) 
	{
		$width += $characterMap[$value];
	}
	 
	// NEW WAY
	// Create the image
	$im = imagecreatetruecolor($width + 20, 30);
	$whiteSpace = imagecreatetruecolor($width + 31, 40);

	// Create some colors
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	
	$emerald = imagecolorallocate( $im, 46, 204, 113 );
	$river = imagecolorallocate($im, 52, 152, 219);
	$amethyst = imagecolorallocate($im, 155, 89, 182);
	$turqouise = imagecolorallocate($im, 26, 188, 156);

$ColorArray = array(
	0 => $emerald, 1 => $river, 2 => $amethyst, 3 => $turqouise,
	4 => $emerald, 5 => $river, 6 => $amethyst, 7 => $turqouise,
	8 => $emerald);


	imagefilledrectangle($im, 0, 0, 4000, 30, $ColorArray[$i]); // lol
	imagefilledrectangle($whiteSpace, 0, 0, 4000, 40, $white); // finished coloring
	
	// The text to draw

	// Replace path by your own font path
	$font = './OpenSans-Bold.ttf';

	// Add some shadow to the text
	//imagettftext($im, 20, 0, 11, 21, $grey, $font, $hashtagString);

	// Add the text
	imagettftext($im, 15, 0, 10, 21, $white, $font, $StringArray[$i]); // text image done
	imagealphablending($im,true);
	imagecopymerge ($whiteSpace, $im , 5, 5, 0,0, imagesx($im), imagesy($im), 100); // white space updated
	//imagejpeg($whiteSpace);
	$img = $whiteSpace;
	header('Content-Type: image/jpg');

	imagealphablending($bg,true);
	imagecopymerge ($bg, $img , $length, 40, 0,0, imagesx($img), imagesy($img), 100);
	$length += imagesx($img) - 5;
}
imagejpeg($bg);
?>

// h: 30 l:padding inner for 20, and 5 above, 5 far left right
// each 14pt or maybe 7px each letter
// 5 padding for white 
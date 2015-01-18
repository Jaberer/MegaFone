<?php // creates textbox mini-image


//if(isset($_GET['url'])) 
{

//$profile = $_GET['p'];
$profile = 0;

//$url = rawurldecode($_GET['url']);
//$url = "https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10802084_10202178584064764_8997610770924410470_n.jpg?oh=e5d56a793a552100d1a1af87f426d776&oe=552A498A&__gda__=1428550623_13902483b6901e7a8d3bda315e7767ef";
//$url = rawurldecode("http://archive.eusa.eu/files/News/2012/photoc-camera_w2.jpg");
$url = rawurldecode("http://www.viralspell.com/wp-content/uploads/2014/04/NatGeo-7.jpg");

//$profilePic = ($_GET['profile']); // 1 or 0
$profilePic = 0;

//$TagStrings = $_GET['tags']; // #asdf#asdf#asdf
		$TagStrings = "#JosephWantsAShower#SuperBowl#ICantBreathe";		
		//$StringArray = array();
		$StringArray = explode("#", $TagStrings);
		
		

		//$StringArray = array(0 => "#ABCD");
		//unset($StringArray[0]);
		for($j = 0; $j < count($StringArray); $j++)
		{
			//echo $StringArray[$j];
			$StringArray[$j] = "#" . $StringArray[$j];
		}

// $url_background is initialized earlier
	// $boxes
	
	$bg = imagecreatefromjpeg($url); // works

if($profile === 1)
{
	$length = 0;
}	
else
{
	$length = imagesx($bg);
}

for($i = 1; $i < count($StringArray); $i++)
{
	
	$HEIGHT_OF_BOX = imagesy($bg) * 0.05;
	$FONT_SIZE = $HEIGHT_OF_BOX / 2;
	 
	list($left,,$right) = imagettfbbox($FONT_SIZE, 0, 'OpenSans-Bold.ttf',$StringArray[$i]);
	$width = $right - $left;
	 
	$WIDTH_OF_BOX = $width * 21/33;
	 
	// NEW WAY
	// Create the image
	$im = imagecreatetruecolor($WIDTH_OF_BOX*1.7 + 10,imagesy($bg)*0.05);
	$whiteSpace = imagecreatetruecolor($WIDTH_OF_BOX*1.7 + 20, $HEIGHT_OF_BOX + 10);
	
	// Create some colors
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	
	$emerald = imagecolorallocate( $im, 46, 204, 113 );
	$river = imagecolorallocate($im, 52, 152, 219);
	$amethyst = imagecolorallocate($im, 155, 89, 182);
	$greenSea = imagecolorallocate($im, 22, 160, 133);
	$alizarin = imagecolorallocate($im, 231, 76, 60);
	$carrot = imagecolorallocate($im, 230, 126, 34);
	
$ColorArray = array(
	0 => $emerald, 1 => $river, 2 => $amethyst, 3 => $carrot,
	4 => $alizarin, 5 => $emerald, 6 => $river, 7 => $amethyst,
	8 => $greenSea);


	imagefilledrectangle($im, 0, 0, 4000, imagesy($bg) * 0.05, $ColorArray[$i]); // lol
	imagefilledrectangle($whiteSpace, 0, 0, 4000, $HEIGHT_OF_BOX + 10, $white); // finished coloring
	
	// The text to draw

	// Replace path by your own font path
	$font = 'OpenSans-Bold.ttf';

	// Add some shadow to the text
	//imagettftext($im, 20, 0, 11, 21, $grey, $font, $hashtagString);

	// Add the text
	imagettftext($im, $FONT_SIZE, 0, $FONT_SIZE / 2, $FONT_SIZE * 1.5, $white, $font, $StringArray[$i]); // text image done
	imagealphablending($im,true);
	imagecopymerge ($whiteSpace, $im , 5, 5, 0,0, imagesx($im), imagesy($im), 100); // white space updated
	//imagejpeg($whiteSpace);
	$img = $whiteSpace;
	

	imagealphablending($bg,true);
	
	if($profile === 1)
	{	
		imagecopymerge ($bg, $img , $length, imagesy($bg) - imagesy($img), 0,0, imagesx($img), imagesy($img), 100);
		$length += imagesx($img) - 5;
	}
	else
	{
		imagecopymerge ($bg, $img , $length - imagesx($img), imagesy($bg) * 0.67, 0,0, imagesx($img), imagesy($img), 100);
		$length -= imagesx($img);
	}
}
//header("Content-type: image/png");
//imagepng($bg);
$photoID = rand(0,100000);
$pathName = 'photos/' . $photoID . ".png";
imagepng($bg, $pathName, 0);
echo "
FB.api(
'/me/photos',
'POST',
{
'url': 'http://megaphone.nicholasrub.in/photos/".$photoID.".png'
},
function (response) {
if (response && !response.error) {
window.location.href = 'http://www.facebook.com/profile.php?preview_cover='+response.id;
}
}
);
";
} 
?>
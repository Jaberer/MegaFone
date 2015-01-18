<?php // creates textbox mini-image

	//include('SimpleImage.php');

			//if(isset($_GET['url'])) {
	
				//$url = rawurldecode($_GET['url']);
				//$profilePic = ($_GET['profile']); // 1 or 0
				$profilePic = 1;
				//$url = rawurldecode("https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10802084_10202178584064764_8997610770924410470_n.jpg?oh=e5d56a793a552100d1a1af87f426d776&oe=552A498A&__gda__=1428550623_13902483b6901e7a8d3bda315e7767ef");
				$url = rawurldecode("http://archive.eusa.eu/files/News/2012/photoc-camera_w2.jpg");
				
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
				$StringArray = array();

			//$StringArray[0] = "#" . $_GET['tags']; // don't assign, just push
			array_push($StringArray, "#AllAreGreen", "#JosephIsBetterThanNick", "#TBT");

			// $url_background is initialized earlier
			// $boxes
			$bg = imagecreatefromjpeg($url); // works
			if($profilePic === 1)
			{
				$length = 0;
			}
			else
			{
				$length = imagesx($bg);
			}
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
				
				$HEIGHT_OF_BOX = imagesy($bg) * 0.05;
				$FONT_SIZE = $HEIGHT_OF_BOX / 2;
				
				//$im = imagecreatetruecolor($width + 20, 30); 
				$im = imagecreatetruecolor($width + 20, imagesy($bg) * 0.05); // 5% height
				$whiteSpace = imagecreatetruecolor($width + 31, $HEIGHT_OF_BOX + 10);

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
					4 => $alizarin, 5 => $greenSea, 6 => $river, 7 => $amethyst,
					8 => $emerald);


					imagefilledrectangle($im, 0, 0, 4000,  imagesy($bg) * 0.05, $ColorArray[$i]); // lol
					imagefilledrectangle($whiteSpace, 0, 0, 4000, $HEIGHT_OF_BOX + 10, $white); // finished coloring
	
					// The text to draw

					// Replace path by your own font path
					$font = './OpenSans-Bold.ttf';

					// Add some shadow to the text
					//imagettftext($im, 20, 0, 11, 21, $grey, $font, $hashtagString);

					// Add the text
					imagettftext($im, $FONT_SIZE, 0, $FONT_SIZE/2, $FONT_SIZE*1.5, $white, $font, $StringArray[$i]); // text image done
					imagealphablending($im,true);
					imagecopymerge ($whiteSpace, $im , 5, 5, 0,0, imagesx($im), imagesy($im), 100); // white space updated
					//imagejpeg($whiteSpace);
					$img = $whiteSpace;
					
					imagealphablending($bg,true);
					// CREATE FINAL PHOTO
					if($profilePic === 1) // profile picture goes to bottom left of image
					{
						imagecopymerge ($bg, $img , $length, imagesy($bg) - imagesy($img), 0,0, imagesx($img), imagesy($img), 100); // new photo
						$length += imagesx($img) - 5;
					}
					else // cover photo for going 
					{
						imagecopymerge ($bg, $img , $length - imagesx($img), imagesy($bg) * 2 / 3, 0,0, imagesx($img), imagesy($img), 100); // new photo
						$length -= imagesx($img) - 5;
					}
				}
				$photoID = rand(0,100000); // id the photo
				$pathName = 'photos/' . $photoID . ".jpg";
				
				header("Content-type: image/jpeg");
				imagejpeg($bg);
				//imagejpeg($bg, $pathName);
				/*echo "
				FB.api(
					'/me/photos',
					'POST',
					{
						'url': 'http://megaphone.nicholasrub.in/photos/".$photoID.".jpg'
					},
					function (response) 
					{
						if (response && !response.error) 
						{
							window.location.href = 'http://www.facebook.com/profile.php?preview_cover='+response.id;
						}
					}
				);";					*/
?>
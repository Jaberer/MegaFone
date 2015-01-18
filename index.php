<!doctype html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<<<<<<< Updated upstream
	<h1 id="title" onClick="window.location.reload();">Megaphone</h1>
=======
>>>>>>> Stashed changes
	<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '340364762824610',
			xfbml      : true,
			version    : 'v2.2'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));


	//document.getElementById("login").style.display="block";

	function logIn() {
		FB.login(function(response) {
			checkLoginState();
		}, {scope: 'public_profile,email,user_photos,publish_actions'});
	}

	// This is called with the results from from FB.getLoginStatus().
	function statusChangeCallback(response) {		
		console.log('statusChangeCallback');
		console.log(response);
		// The response object is returned with a status field that lets the
		// app know the current login status of the person.
		// Full docs on the response object can be found in the documentation
		// for FB.getLoginStatus().
		if (response.status === 'connected') {
			document.getElementById("login").style.display="none";
			document.getElementById("logout").style.display="block";
			document.getElementById("getPhotos").style.display="block";
			testAPI();
		} else if (response.status === 'not_authorized') {
			// The person is logged into Facebook, but not your app.
			/*document.getElementById('status').innerHTML = 'Please log ' +
			'into this app.';*/
		} else {
			// The person is not logged into Facebook, so we're not sure if
			// they are logged into this app or not.
			/*document.getElementById('status').innerHTML = 'Please log ' +
			'into Facebook.';*/
		}
	}

	// This function is called when someone finishes with the Login
	// Button.  See the onlogin handler attached to it in the sample
	// code below.
	function checkLoginState() {		
		FB.getLoginStatus(function(response) {						
			statusChangeCallback(response);
		});
	}

	window.fbAsyncInit = function() {
		FB.init({
			appId      : '340364762824610',
			cookie     : true,  // enable cookies to allow the server to access 
			// the session
			xfbml      : true,  // parse social plugins on this page
			version    : 'v2.1' // use version 2.1
		});

		// Now that we've initialized the JavaScript SDK, we call 
		// FB.getLoginStatus().  This function gets the state of the
		// person visiting this page and can return one of three states to
		// the callback you provide.  They can be:
		//
		// 1. Logged into your app ('connected')
		// 2. Logged into Facebook, but not your app ('not_authorized')
		// 3. Not logged into Facebook and can't tell if they are logged into
		//    your app or not.
		//
		// These three cases are handled in the callback function.

		FB.getLoginStatus(function(response) {			
			statusChangeCallback(response);
		});

	};

	// Load the SDK asynchronously
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	// Here we run a very simple test of the Graph API after login is
	// successful.  See statusChangeCallback() for when this call is made.
	function testAPI() {
		console.log('Welcome!  Fetching your information.... ');
		FB.api('/me', function(response) {
			console.log('Successful login for: ' + response.name);
			/*document.getElementById('status').innerHTML =
			'Thanks for logging in, ' + response.name + '!';*/
		});
		/*FB.api(
			'/me/photos',
			'POST',
			{
				'url': 'http://megaphone.nicholasrub.in/photos/40363.jpg'
			},
			function (response) {
				if (response && !response.error) {
					console.log(response);
				}
			}
		);*/
			<?php // creates textbox mini-image
<<<<<<< Updated upstream

	//include('SimpleImage.php');

=======
			
			//error_reporting(0);
			
>>>>>>> Stashed changes
			if(isset($_GET['url'])) {
				
				echo "$('*').hide();";

				$url = rawurldecode($_GET['url']);
<<<<<<< Updated upstream
				$profilePic = ($_GET['profile']); // 1 or 0
				//$profilePic = 0;
				
				//$url = rawurldecode("https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10802084_10202178584064764_8997610770924410470_n.jpg?oh=e5d56a793a552100d1a1af87f426d776&oe=552A498A&__gda__=1428550623_13902483b6901e7a8d3bda315e7767ef");
				//$url = rawurldecode("http://archive.eusa.eu/files/News/2012/photoc-camera_w2.jpg");
				//$url = rawurldecode("http://www.viralspell.com/wp-content/uploads/2014/04/NatGeo-7.jpg");
				
				$characterMap = array(
					"#" => 11,
					"0" => 10, "1" => 10, "2" => 12, "3" => 11, "4" => 11, "5" => 11,
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

				$TagStrings = $_GET['tags']; // #asdf#asdf#asdf
				//$TagStrings = "#asdf#asdf#asdf";
				
				$i;
				$IndexOfHashes = array_keys(str_split($TagStrings, "%23", true)); // 0, 5, 10, ...
				for($i = 0; $i < count($IndexOfHashes) - 1; $i++)
				{
					array_push($StringArray(my_substr_function($TagStrings, $IndexOfHashes[$i], $IndexOfHashes[$i + 1]))); // 05, 510
					
				}
				array_push($StringArray(substr($TagStrings, $IndexOfHashes[$i], count($IndexOfHashes)))); 
				
				for($j = 0; $j < 3; $j++)
				{
					echo $IndexOfHashes[$j];
				}
				
				function my_substr_function($str, $start, $end)
				{
				  return substr($str, $start, $end - $start);
				}
				
				
			//$StringArray[0] = "#" . $_GET['tags']; // don't assign, just push
			//array_push($StringArray, "#AllAreGreen", "#JosephIsBetterThanNick", "#TBT");
			//array_push($StringArray, "#0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
			/*
			array_push($StringArray, "#0123456789");
			array_push($StringArray, "#abcdefghijklmnopqrstuvwxyz");
			array_push($StringArray, "#ABCDEFGHIJKLMNOPQRSTUVWXYZ");
			*/
			// $url_background is initialized earlier
			// $boxes
			$bg = imagecreatefromjpeg($url); // works
			if($profilePic === 1)
			{
				$length = 0;
			}
			else
			{
				$length = imagesx($bg) * 0.95;
			}
			for($i = 0; $i < count($StringArray); $i++)
			{
				$width = 0; // will determine width of image
				//foreach (array_expression as $value)
				$charArray = str_split($StringArray[$i]);
				foreach ($charArray as $value) 
				{
					//$width += mb_strwidth($StringArray[$i]) ;
					$width += $characterMap[$value];
				}
	 
			
	 
				// NEW WAY
				// Create the image
				
				$HEIGHT_OF_BOX = imagesy($bg) * 0.05;
				$FONT_SIZE = $HEIGHT_OF_BOX / 2;
				//$WIDTH_OF_BOX = $width*$HEIGHT_OF_BOX*.04;
				//$WIDTH_OF_BOX = $width*$FONT_SIZE/ (imagesy($bg) / 10.6);
				
				
				list($left,, $right) = imagettfbbox($FONT_SIZE, 0, './OpenSans-Bold.ttf', $StringArray[$i]);
				$width = $right - $left;
				
				$WIDTH_OF_BOX = $width * 21/33;
				
				//$im = imagecreatetruecolor($width + 20, 30); 
				$im = imagecreatetruecolor($WIDTH_OF_BOX * 1.7, imagesy($bg) * 0.05); // 5% height
				$whiteSpace = imagecreatetruecolor($WIDTH_OF_BOX * 1.7 + 10, $HEIGHT_OF_BOX + 10);
=======
				$profile = $_GET['p'];
				$tags = rawurldecode($_GET['tags']);
				$colors = rawurldecode($_GET['colors']);
				
				$tagArray = array();
				$tagArray = explode("#",$tags);
				
				for($j = 0; $j < count($tagArray); $j++) {
					$tagArray[$j] = "#" . $tagArray[$j];
				}
				
				$RGBArray = explode("rgb(",$colors);
				for($jz = 0; $jz < count($RGBArray); $jz++) {
					substr_replace($RGBArray[$jz],"",-1);
				}
				
			// $url_background is initialized earlier
			// $boxes
			$bg = imagecreatefromjpeg($url); // works
	
			if($profile === 1) {
				$length = 0;
			} else {
				$length = imagesx($bg)-($WIDTH_OF_BOX*1.7+10);
			}
			
			$tempIM = imagecreatetruecolor(1,1);
			
			$colorOne = "";
			$colorTwo = "";
			$colorThree = "";
			$RGBarrayfinal = array();
			for($nr = 0; $nr < count($RGBArray); $nr++) {
				$RGBarrayfinal = explode(",",$RGBArray[$nr]);
				//echo "console.log('" . $RGBArray[$nr] . "')";
				if($nr == 1) {
					$colorOne = imagecolorallocate($tempIM, intval($RGBarrayfinal[0]), intval($RGBarrayfinal[1]), intval($RGBarrayfinal[2]));
				} else if($nr == 2) {
					$colorTwo = imagecolorallocate($tempIM, intval($RGBarrayfinal[0]), intval($RGBarrayfinal[1]), intval($RGBarrayfinal[2]));
				} else if($nr == 3) {
					$colorThree = imagecolorallocate($tempIM, intval($RGBarrayfinal[0]), intval($RGBarrayfinal[1]), intval($RGBarrayfinal[2]));
				}
			}
			
			for($i = 1; $i < count($tagArray); $i++) {
 				$HEIGHT_OF_BOX = imagesy($bg) * 0.04;
				$FONT_SIZE = $HEIGHT_OF_BOX / 2;
				
				list($left,,$right) = imagettfbbox($FONT_SIZE, 0, 'OpenSans-Bold.ttf',$tagArray[$i]);
				$width = $right - $left;
				
				$WIDTH_OF_BOX = $width * 61/99;
				
				// NEW WAY
				// Create the image
				$im = imagecreatetruecolor($WIDTH_OF_BOX*1.7+10,imagesy($bg)*0.04);
				$whiteSpace = imagecreatetruecolor($WIDTH_OF_BOX*1.7 + 20,$HEIGHT_OF_BOX + 10);
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
					0 => $emerald, 1 => $river, 2 => $amethyst, 3 => $carrot,
					4 => $alizarin, 5 => $greenSea, 6 => $river, 7 => $amethyst,
					8 => $emerald);


					imagefilledrectangle($im, 0, 0, 4000,  imagesy($bg) * 0.05, $ColorArray[$i]); // lol
=======
					1 => $colorOne, 2 => $colorTwo, 3 => $colorThree);


					imagefilledrectangle($im, 0, 0, 4000, imagesy($bg)*0.04, $ColorArray[$i]);
>>>>>>> Stashed changes
					imagefilledrectangle($whiteSpace, 0, 0, 4000, $HEIGHT_OF_BOX + 10, $white); // finished coloring
	
					// The text to draw

					// Replace path by your own font path
					$font = 'OpenSans-Bold.ttf';

					// Add some shadow to the text
					//imagettftext($im, 20, 0, 11, 21, $grey, $font, $hashtagString);

					// Add the text
<<<<<<< Updated upstream
					imagettftext($im, $FONT_SIZE, 0, $FONT_SIZE/2, $FONT_SIZE*1.5, $white, $font, $StringArray[$i]); // text image done
=======
					imagettftext($im, $FONT_SIZE, 0, $FONT_SIZE/2, $FONT_SIZE*1.5, $white, $font, $tagArray[$i]); // text image done
>>>>>>> Stashed changes
					imagealphablending($im,true);
					imagecopymerge ($whiteSpace, $im , 5, 5, 0,0, imagesx($im), imagesy($im), 100); // white space updated
					//imagejpeg($whiteSpace);
					$img = $whiteSpace;
					
					imagealphablending($bg,true);
<<<<<<< Updated upstream
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
=======
					
					if($profile === 1) {
						imagecopymerge($bg, $img , $length, imagesy($bg)-imagesy($img), 0,0, imagesx($img), imagesy($img), 100);
						$length += imagesx($img) -5;
					} else {
						imagecopymerge($bg, $img , $length-imagesx($img), imagesy($bg)*0.67, 0,0, imagesx($img), imagesy($img), 100);
						$length -= imagesx($img);
					}
				}
				$photoID = rand(0,100000);
				$pathName = 'photos/' . $photoID . ".png";
				imagepng($bg, $pathName, 0);
				echo "
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
					}
				);";					*/
?>
	}
=======
						);";
					} 
				?>
	} 
>>>>>>> Stashed changes
  
	function getPhoto(kind) {
		FB.api('/me/albums?fields=id,name', function(response) {
			for (var i=0; i<response.data.length; i++) {
				var album = response.data[i];
				if (album.name == kind){
					FB.api('/'+album.id+'/photos', function(photos){
						if (photos && photos.data && photos.data.length) {
							var urls = new Array();
							var photo = photos.data[0];
							var image = document.createElement('img');
							image.src = photo.source;
							document.body.appendChild(image);
						}
						/*alert("yo");
						if(num !== 1) {
						var theParent = document.querySelector(".topWrapper");
						for (var i = 0; i < theParent.children.length; i++) {
						var childElement = theParent.children[i];
						var url = childElement.style.backgroundImage;
						var finalURL = url.substring(4, url.length-1);
						childElement.addEventListener("click", function() {
						pickTags(finalURL);
						});
						}
						}*/
					});
					break;
				}
			}
		});
	}

	function getOptions(kind) {
		FB.api('/me/albums?fields=id,name', function(response) {
			for (var i=0; i<response.data.length; i++) {
				var album = response.data[i];
				if (album.name == kind){
					FB.api('/'+album.id+'/photos', function(photos){
						if (photos && photos.data && photos.data.length){
							var urls = new Array();
							for (var j=0; j<photos.data.length; j++) {
								if (photos.data[j]) {
									(function(j){  
										var photo = photos.data[j];						
										var wrapper = document.createElement('div');
										wrapper.className = "topWrapper";
										document.body.appendChild(wrapper);
										var image = document.createElement('div');
										wrapper.appendChild(image);
										image.style.backgroundImage = "url("+photo.source+")";
										//alert(image.style.backgroundImage);
										image.className = "thumb";
										urls[j] = photo.source;
										image.addEventListener("click", function() {
											pickTags(urls[j]);
										});
									})(j);
								}
								//alert(photo.source);
								//var url = photo.source;
								//getURLS(urls[j]);
							}
						}
						/*alert("yo");
						if(num !== 1) {
						var theParent = document.querySelector(".topWrapper");
						for (var i = 0; i < theParent.children.length; i++) {
						var childElement = theParent.children[i];
						var url = childElement.style.backgroundImage;
						var finalURL = url.substring(4, url.length-1);
						childElement.addEventListener("click", function() {
						pickTags(finalURL);
						});
						}
						}*/
					});
					break;
				}
			}
		});
	}

	/*function postPhoto(url) {
	alert("fuk");
	FB.api(
	"/me/photos",
	"POST",
	{
	"url": url
	},
	function (response) {
	if (response && !response.error) {
	console.log("Image posted successfully! Maybe?");
	}
	}
	);
	}*/

	/*FB.getLoginStatus(function(response) {
	statusChangeCallback(response);
	});*/
	</script>
    <h1 id="title" onClick="window.location.reload();"><img src="images/megaphone2.png" id="logo">Megaphone</h1>
	<p id="flavortext">Easily badge your social media profiles with the <br>causes you support. Show your friends what you care about.</p>
	<div id="sampleimage" class="fade"></div>
			<center>
				<button id="logout" onClick="FB.logout();window.location.reload();">Log Out</button>
				<button id="login" onClick="logIn();">Log In</button>
				<button id="getPhotos" onClick="hideButtons();">Get Started!</button>
				<button id="another" onClick="showSelect();">Choose Another</button>
				<button id="yes" onClick="showIssues();">Yes</button>
				<div id="buttonscenter">
					<div id="coverSelect" onClick="findImage('cover', 0);">Cover Photo</div>
					<div id="profileSelect" onClick="findImage('profile', 0);">Profile Photo</div>
				</div>
<<<<<<< Updated upstream
				<p class="tag" onClick="generateTags('AllAreGreen');">#AllAreGreen</p>
				<!--<?php include 'test4.php'; ?>-->
=======
				<!--<p class="tag" onClick="generateTags('FuckJoseph');">#AllAreGreen</p>-->
                <div id="buttonscenter" style="width:600px!important">
                	<div class="hashCategory" id="trendingtag" onClick="viewTag('trending')" style="background-color:#2c3e50">Trending</div>
                    <div class="hashCategory" id="socialtag" onClick="viewTag('social')" style="background-color:#e74c3c">Social Issues</div>
                    <div class="hashCategory" id="politicstag" onClick="viewTag('politics')" style="background-color:#3498db">Politics</div>
                    <div class="hashCategory" id="sportstag" onClick="viewTag('sports')" style="background-color:#9b59b6">Sports</div>
                    <div class="hashCategory" id="entertainmenttag" onClick="viewTag('entertainment')" style="background-color:#f39c12">Entertainment</div>
                    <div class="hashCategory" id="customtag" onClick="viewTag('custom')" style="background-color:#2ecc71">Custom</div>
                </div>
                <div id="buttonscenter" style="width:600px!important">
                	<div class="trending" onClick="toggleTag('#JeSuisCharlie')" style="background-color:#2c3e50">#JeSuisCharlie</div>
                    <div class="trending" onClick="toggleTag('#BlackLivesMatter')" style="background-color:#e74c3c">#BlackLivesMatter</div>
                    <div class="trending" onClick="toggleTag('#BringBackOurGirls')" style="background-color:#3498db">#BringBackOurGirls</div>
                    <div class="trending" onClick="toggleTag('#YesAllWomen')" style="background-color:#9b59b6">#YesAllWomen</div>
                    <div class="trending" onClick="toggleTag('#Ferguson')" style="background-color:#f39c12">#Ferguson</div>
                    <div class="trending" onClick="toggleTag('#HandsUpDontShoot')" style="background-color:#2ecc71">#HandsUpDontShoot</div>
                </div>
                <center>
                    <div id="buttonscenter" class="customAdder" style="width:600px!important">
                        <input class="custom" id="customInput" type="text">
                        <button class="custom" onClick="submitCustom()" id="customSubmit">Add</button>
                    </div>
                </center>
                <div id="buttonscenter" style="width:630px!important">
                	<div class="social" onClick="toggleTag('#MHacksV')" style="background-color:#2c3e50">#MHacksV</div>
                    <div class="social" onClick="toggleTag('#ICantBreathe')" style="background-color:#e74c3c">#ICantBreathe</div>
                    <div class="social" onClick="toggleTag('#Kony2012')" style="background-color:#3498db">#Kony2012</div>
                    <div class="social" onClick="toggleTag('#IndiaVotes')" style="background-color:#9b59b6">#IndiaVotes</div>
                    <div class="social" onClick="toggleTag('#IceBucketChallenge')" style="background-color:#f39c12">#IceBucketChallenge</div>
                    <div class="social" onClick="toggleTag('#MalalaYousaif')" style="background-color:#2ecc71">#MalalaYousaif</div>
                </div>
                <div id="buttonscenter" style="width:600px!important">
                	<div class="politics" onClick="toggleTag('#Obama2012')" style="background-color:#2c3e50">#Obama2012</div>
                    <div class="politics" onClick="toggleTag('#Romney2012')" style="background-color:#e74c3c">#Romney2012</div>
                    <div class="politics" onClick="toggleTag('#Hillary2016')" style="background-color:#3498db">#Hillary2016</div>
                    <div class="politics" onClick="toggleTag('#IVoted')" style="background-color:#9b59b6">#IVoted</div>
                    <div class="politics" onClick="toggleTag('#UmbrellaRevolution')" style="background-color:#f39c12">#UmbrellaRevolution</div>
                    <div class="politics" onClick="toggleTag('#ArabSpring')" style="background-color:#2ecc71">#ArabSpring</div>
                </div>
                <div id="buttonscenter" style="width:600px!important">
                	<div class="sports" onClick="toggleTag('#GoHawks')" style="background-color:#2c3e50">#GoHawks</div>
                    <div class="sports" onClick="toggleTag('#Superbowl')" style="background-color:#e74c3c">#Superbowl</div>
                    <div class="sports" onClick="toggleTag('#GermanyWins')" style="background-color:#3498db">#GermanyWins</div>
                </div>
                <div id="buttonscenter" style="width:600px!important">
                	<div class="entertainment" onClick="toggleTag('#RIPRobinWilliams')" style="background-color:#2c3e50">#RIPRobinWilliams</div>
                    <div class="entertainment" onClick="toggleTag('#Selma')" style="background-color:#e74c3c">#Selma</div>
                    <div class="entertainment" onClick="toggleTag('#Interstellar')" style="background-color:#3498db">#Interstellar</div>
                    <div class="entertainment" onClick="toggleTag('#Oscars2015')" style="background-color:#9b59b6">#Oscars2015</div>
                    <div class="entertainment" onClick="toggleTag('#AmericanSniper')" style="background-color:#f39c12">#AmericanSniper</div>
                    <div class="entertainment" onClick="toggleTag('#GoldenGlobes')" style="background-color:#2ecc71">#GoldenGlobes</div>
                </div>
                <div id="buttonscenter" style="width:370px!important;margin-top:50px;">
                    <div id="backButton" style="float:right" onClick="backCategory()">Back</div>
                    <div id="submitButton" style="float:left;margin-left:20px;background-color:#2ecc71" onClick="generateTags()">Submit</div>
                </div>     
>>>>>>> Stashed changes
			</center>
			<script src="script.js"></script>
			<script>
			function generateTags() {
				var tagBuilder2 = "";
				var colorBuilder = "";
				var categories = ["trending", "social", "politics", "sports", "entertainment", "custom"];
				for(var k = 0; k < categories.length; k++) {
					var hashTags = document.getElementsByClassName(categories[k]);
					for(var j = 0; j < hashTags.length; j++) {
						if(hashTags[j].style.border != "") {
							tagBuilder2 += hashTags[j].innerHTML;
							colorBuilder += hashTags[j].style.backgroundColor;
						}
					}
				}
				window.location.href = "http://megaphone.nicholasrub.in/index.php?p="+ window.profile2 +"&url=" + window.badgeURL + "&tags=" + encodeURIComponent(tagBuilder2) + "&colors=" + encodeURIComponent(colorBuilder); 
				return false;
			}
			</script>
            <div class="cube">
            <div class="plane-1">
                <div class="top-left"></div>
                <div class="top-middle"></div>
                <div class="top-right"></div>
                <div class="middle-left"></div>
                <div class="middle-middle"></div>
                <div class="middle-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-middle"></div>
                <div class="bottom-right"></div>
            </div>
             <div class="plane-2">
                <div class="top-left"></div>
                <div class="top-middle"></div>
                <div class="top-right"></div>
                <div class="middle-left"></div>
                <div class="middle-middle"></div>
                <div class="middle-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-middle"></div>
                <div class="bottom-right"></div>
            </div>
             <div class="plane-3">
                <div class="top-left"></div>
                <div class="top-middle"></div>
                <div class="top-right"></div>
                <div class="middle-left"></div>
                <div class="middle-middle"></div>
                <div class="middle-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-middle"></div>
                <div class="bottom-right"></div>
            </div>
        </div>
		</body>
		</html>
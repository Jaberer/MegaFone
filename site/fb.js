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
	FB.api(
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
	);
}
  
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

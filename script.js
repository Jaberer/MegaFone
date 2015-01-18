function hideButtons() {
	$("#logout").fadeOut();
	$("#getPhotos").fadeOut();
	$("#demo").fadeOut();
	document.getElementById('flavortext').innerHTML = "Badge your profile photo or cover photo?";
	setTimeout(showPhotoOptions, 500);
}

function showPhotoOptions() {
	document.getElementById("title").innerHTML = "Which Photo?";
	$("#coverSelect").fadeIn();
	$("#profileSelect").fadeIn();
}

function showSelect(type) {
	//$("#coverSelect").fadeOut();
	//$("#profileSelect").fadeIn();
	//document.getElementById("title").innerHTML = "Choose one!";
	document.getElementsByTagName("img")[0].style.display = "none";
	if(type == 'cover') {
		findOptions('cover');
	} else {
		findOptions('profile');
	}
}

function findOptions(type) {
	document.getElementById("title").innerHTML = "Select a photo.";
	document.getElementById('flavortext').innerHTML = "From your cover or profile photos album.";
	$("#coverSelect").fadeOut();
	$("#profileSelect").fadeOut();
	$("#anothercover").fadeOut();
	$("#anotherprof").fadeOut();
	$("#yes").fadeOut();
	//$("#yes").fadeIn();
	//document.getElementById("title").innerHTML = "Is This Correct?";
	if(type == "cover") {
		//$("#anothercover").fadeIn();
		getOptions("Cover Photos");
	} else {
		//$("#anotherprof").fadeIn();
		getOptions("Profile Pictures");
	}
}

function findImage(type, num) {
	document.getElementById('flavortext').innerHTML = "Pressing no will let you choose a different photo.";
	$("#coverSelect").fadeOut();
	$("#profileSelect").fadeOut();
	$("#yes").fadeIn();
	document.getElementById("title").innerHTML = "Is This Correct?";
	if(type == "cover") {
		$("#anothercover").fadeIn();
		getPhoto("Cover Photos");
	} else {
		$("#anotherprof").fadeIn();
		getPhoto("Profile Pictures");
	}
}

function pickTags(url) {
	window.badgeURL = url;
	window.badgeURL = encodeURIComponent(window.badgeURL);
	var gridDiv = document.getElementsByClassName("topWrapper");
	document.getElementById("title").innerHTML = "Pick Your Tags";
	for(var i = 0; i < gridDiv.length; i++) {
		gridDiv[i].style.display = "none";
	}
	$("#anothercover").fadeOut();
	$("#anotherprof").fadeOut();
	$("#yes").fadeOut();
	$(".tag").fadeIn();
	var tagCategories = document.getElementsByClassName('hashCategory');
	for(var j = 0; j < tagCategories.length; j++) {
		tagCategories[j].style.display = "inline-block";
	}
}

function pickTagsSingle() {
	var url = document.getElementsByTagName('img')[0].src;
	window.badgeURL = url;
	window.badgeURL = encodeURIComponent(window.badgeURL);
	document.getElementsByTagName('img')[0].style.display="none";
	document.getElementById("title").innerHTML = "Pick Your Tags!";
	document.getElementById('flavortext').innerHTML = "Support the causes that matter most to you.";
	$("#anothercover").fadeOut();
	$("#anotherprof").fadeOut();
	$("#yes").fadeOut();
	$(".tag").fadeIn();
	var tagCategories = document.getElementsByClassName('hashCategory');
	for(var j = 0; j < tagCategories.length; j++) {
		tagCategories[j].style.display = "inline-block";
	}
}

function viewTag(id) {
	var tagButtons = document.getElementsByClassName('hashCategory');
	for(var i = 0; i < tagButtons.length; i++) {
		tagButtons[i].style.display="none";
	}
	var hashTags = document.getElementsByClassName(id);
	for(var j = 0; j < hashTags.length; j++) {
		hashTags[j].style.display = "inline-block";
	}
	document.getElementById('backButton').style.display = "block";
}

function backCategory() {
	var tagButtons = document.getElementsByClassName('hashCategory');
	for(var i = 0; i < tagButtons.length; i++) {
		tagButtons[i].style.display = "inline-block";
	}
	var categories = ["trending", "social", "politics", "sports", "entertainment"];
	for(var k =0; k < categories.length; k++) {
		var hashTags = document.getElementsByClassName(categories[k]);
		for(var j = 0; j < hashTags.length; j++) {
			hashTags[j].style.display = "none";
		}
	}
	document.getElementById('backButton').style.display = "none";
}

window.tagCounter = 0;

function toggleTag(tag) {
	var categories = ["trending", "social", "politics", "sports", "entertainment"];
	for(var k =0; k < categories.length; k++) {
		var hashTags = document.getElementsByClassName(categories[k]);
		for(var j = 0; j < hashTags.length; j++) {
			if(hashTags[j].innerHTML == tag) {
				if(hashTags[j].style.border == "" && window.tagCounter < 3) {
					hashTags[j].style.border = "4px solid black";
					window.tagCounter += 1;
				} else if (hashTags[j].style.border != "") {
					hashTags[j].style.border = "";
					window.tagCounter -= 1;
				} else {
					hashTags[j].style.border = "";
					//$(hashTags[j]).addClass("shake");
					//swal({   title: "Error!",   text: "Here's my error message!",   type: "error",   confirmButtonText: "Cool" });
				}
			}
		}
	}
}
	
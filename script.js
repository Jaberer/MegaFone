function hideButtons() {
	$("#logout").fadeOut();
	$("#getPhotos").fadeOut();
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
	findOptions('cover');
}

function findOptions(type) {
	$("#coverSelect").fadeOut();
	$("#profileSelect").fadeOut();
	$("#another").fadeIn();
	$("#yes").fadeIn();
	document.getElementById("title").innerHTML = "Is This Correct?";
	if(type == "cover") {
		getOptions("Cover Photos");
	} 
}

function findImage(type, num) {
	$("#coverSelect").fadeOut();
	$("#profileSelect").fadeOut();
	$("#another").fadeIn();
	$("#yes").fadeIn();
	document.getElementById("title").innerHTML = "Is This Correct?";
	if(type == "cover") {
		getPhoto("Cover Photos");
	} else {
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
	$("#another").fadeOut();
	$("#yes").fadeOut();
	$(".tag").fadeIn();
}
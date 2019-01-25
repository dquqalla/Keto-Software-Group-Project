var myMenu = new OSREC.superslide
({
    slider: document.getElementById('menu'),
    content: document.getElementById('mainContainer'),
    animation: 'slideLeft',
    allowDrag: true,
    slideContent: true,
    allowContentInteraction: false,
    closeOnBlur: true
});

function openMenu() {
	myMenu.open();
}

document.addEventListener("DOMContentLoaded", function() {
	//Controls the profile picture header
	var firstLetterOfName = document.getElementById("name").innerHTML;
	document.getElementById("nameLetter").innerHTML = firstLetterOfName.charAt(0);
	document.getElementById("nameLetterM").innerHTML = firstLetterOfName.charAt(0);

	//Functions controls the current date in dashboard
	var objToday = new Date(),
	domEnder = function() { var a = objToday; if (/1/.test(parseInt((a + "").charAt(0)))) return "th"; a = parseInt((a + "").charAt(1)); return 1 == a ? "st" : 2 == a ? "nd" : 3 == a ? "rd" : "th" }(),
	dayOfMonth = today + ( objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder : objToday.getDate() + domEnder,
	months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'),
	curMonth = months[objToday.getMonth()],
	curYear = objToday.getFullYear()
	var today = dayOfMonth + " " + curMonth;
	document.getElementById("currentDate").innerHTML = today;
});

$(function() {
  $('#navItemO').hover(function() {
    $('#navItemO > .navMainText').css('color', '#27AC9D');
    $('#navItemO > .navMainText').css('transition', 'all 0.3s ease');
  }, function() {
   	$('#navItemO > .navMainText').css('color', '#777777');
  });
  $('#navItemT').hover(function() {
    $('#navItemT > .navMainText').css('color', '#27AC9D');
    $('#navItemT > .navMainText').css('transition', 'all 0.3s ease');
  }, function() {
   	$('#navItemT > .navMainText').css('color', '#777777');
  });
  $('#navItemTh').hover(function() {
    $('#navItemTh > .navMainText').css('color', '#27AC9D');
    $('#navItemTh > .navMainText').css('transition', 'all 0.3s ease');
  }, function() {
   	$('#navItemTh > .navMainText').css('color', '#777777');
  });
  $('#navItemF').hover(function() {
    $('#navItemF > .navMainText').css('color', '#27AC9D');
    $('#navItemF > .navMainText').css('transition', 'all 0.3s ease');
  }, function() {
   	$('#navItemF > .navMainText').css('color', '#777777');
  });
});

//Initalises tooltips
$(document).ready(function() {
    $('.tooltip').tooltipster();
});

function addWater() {
	var options = {};

	swal({
	    title: "Add Water",
	    type: 'info',
	    inputOptions: options,
	    html: '<p class="modalHeader">How many glasses of water would you like to add? <br>We will assume a glass is 250ml.</p>' +
	    '<div style="" >' +
	    '<form method="post" action="welcome.php" style="padding: 20px 0px;">' +
	    '<select class="waterSelect" name="water">\
		<option value="1">1</option>\
		<option value="2">2</option>\
		<option value="3">3</option>\
		<option value="4">4</option>\
		<option value="5">5</option>\
		<option value="6">6</option>\
		<option value="7">7</option>\
		<option value="8">8</option>\
		</select>' +
	    '<div style="padding-top:30px;"><input class="addBut" type="submit" name="submit" value="Add"> ' +
	    '<input class="cancelBut" value="Cancel" type="button" id="btnC" onclick="swal.close();"></input></form></div></div>', 

	    showConfirmButton: false,
	    onOpen: function(ele) {
	        $(ele).find('.swal2-select').insertBefore($(ele).find('.swal2-content div'));
	    }
	});
}

function addWeight() {
	var options = {};

	swal({
	    title: "Add Weight",
	    type: 'info',
	    inputOptions: options,
	    html: '<p class="modalHeader">Please enter your weight below. We will automatically date-timestamp this for you and add it to your history.</p>' +
	    '<div style="" >' +
	    '<form method="post" action="welcome.php" style="padding: 20px 0px;">' +
	    '<input class="foodInputs weightInputs" type="number" name="weight" min="0" max="200" placeholder="Weight in kg"> <br />' +

	    '<div style="padding-top:30px;"><input class="addBut" type="submit" name="submit" value="Add"> ' +
	    '<input class="cancelBut" value="Cancel" type="button" id="btnC" onclick="swal.close();"></input></form></div></div>', 

	    showConfirmButton: false,
	    onOpen: function(ele) {
	        $(ele).find('.swal2-select').insertBefore($(ele).find('.swal2-content div'));
	    }
	});
}

function addFood() {

	var options = {};

	swal({
	    title: "Add Food",
	    type: 'info',
	    inputOptions: options,
	    html: '<p class="modalHeader">Use our search to find foods or enter food manually.</p>' +
	    '<div style="" >' +
	    '<div style="padding: 20px 0px;"><input class="foodInputs foodSearchInput" type="text" name="intelligentFoodSearch" placeholder="Search (sorry I\'m disabled for now)" disabled></div>' +
	    '<p class="foodInputBreak">- or -</p>' +
	    '<form class="addFoodForm" method="post" action="welcome.php">' +
	    '<input class="foodInputs rName" type="text" name="rName" placeholder="Name of recipe/meal" autocomplete="off">' +
	    '<select class="foodInputs mCat" type="text" name="mCat" placeholder="Meal category, e.g Lunch" autocomplete="off">' +
	    	'<option value="" disabled selected>Meal category, e.g Lunch</option>' +
			'<option value="Breakfast">Breakfast</option>' +
			'<option value="Lunch">Lunch</option>' +
			'<option value="Dinner">Dinner</option>' +
			'<option value="Snack">Snack</option>' +
	    '</select>' +
	    '<input class="foodInputs foodFloatInputs caloriesInput" type="number" name="cal" min="0" placeholder="Calories" autocomplete="off">' +
	    '<input class="foodInputs foodFloatInputs carbsInput" type="number" name="car" min="0" placeholder="Carbs" autocomplete="off">' +
	    '<input class="foodInputs foodFloatInputs fatsInput" type="number" name="pro" min="0" placeholder="Fats" autocomplete="off">' +
	    '<input class="foodInputs foodFloatInputs proteinInput" type="number" name="fat" min="0" placeholder="Protein" autocomplete="off">' +

	    '<div style="padding-top:30px;"><input class="addBut" type="submit" name="submit" value="Add"> ' +

	    '<input value="Cancel" type="button" id="btnC" class="cancelBut" onclick="swal.close();"></input></form></div></div>', 

	    showConfirmButton: false,
	    onOpen: function(ele) {
	        $(ele).find('.swal2-select').insertBefore($(ele).find('.swal2-content div'));
	    }
	});
}

function addPicture() {
	var options = {};

	swal({
	    title: "Change Profile Picture",
	    width: 600,
	    inputOptions: options,
	    html: '<p class="modalHeader">Upload or remove profile picture.</p>' +
	    '<div style="padding-top: 24px;" >' +
	    '<form class="uploadPicture" method="post" action="" enctype="multipart/form-data" style="padding: 20px 0px;">' +
	    '<div><input class="up" type="file" name="file">' +
		'<p class="dragText">Drag your files here or click in this area.</p></div>' +
		'<div class="clearfix">' +
		'<button class="uploadPicBtn" type="submit" name="submit2" name="removePicture">Upload</button></form>' +
		'<p class="orSelection">- or -</p>'+
		'<form action="" method="post"><button class="removePicBtn" type="submit">Remove</button></form></div>' +
	    '<div style="padding: 30px 0px;"><input class="cancelBut" value="Cancel" type="button" id="btnC" onclick="swal.close();"></input></div></div>', 

	    showConfirmButton: false,
	    onOpen: function(ele) {
	        $(ele).find('.swal2-select').insertBefore($(ele).find('.swal2-content div'));
			$('.up').change(function () {
				$('.dragText').text(this.files.length + " file(s) selected. Press the upload button!");
			});
	    }
	});
}

function swalEditWeight() {
	var options = {};

	swal({
	    title: "Edit Goal Weight",
	    type: 'info',
	    inputOptions: options,
	    html: '<p class="modalHeader">Please enter your new target weight.</p>' +
	    '<div style="" >' +
	    '<form method="post" action="welcome.php" style="padding: 20px 0px;">' +
	    '<input class="foodInputs weightInputs" type="number" name="editGoalW" placeholder="Updated goal weight (kg)" required> <br />' +

	    '<div style="padding-top:30px;"><input class="addBut" type="submit" name="updateWeight" value="Update"> ' +
	    '<input class="cancelBut" value="Cancel" type="button" id="btnC" onclick="swal.close();"></input></form></div></div>', 

	    showConfirmButton: false,
	    onOpen: function(ele) {
	        $(ele).find('.swal2-select').insertBefore($(ele).find('.swal2-content div'));
	    }
	});
}

$(document).ready(function() {
	$('.mobileMenuBall').click(function() {
		$(this).toggleClass('active');
	});
});
// Form Validation Test //

$('#coursename').blur(function(){
	if(!$('#coursename').val()){
		$('#coursename').css("border-bottom", "3px solid red");
	};
});

$('#location').blur(function(){
	if(!$('#location').val()){
		$('#location').css("border-bottom", "3px solid red");
	};
});

$('#time').blur(function(){
	if(!$('#time').val()){
		$('#time').css("border-bottom", "3px solid red");
	};
});

$('#minnumber').blur(function(){
	if(!$('#minnumber').val()){
		$('#minnumber').css("border-bottom", "3px solid red");
	};
	if(isNaN($('#minnumber').val())){
		$('#minnumber').css("border-bottom", "3px solid red");
	};
});

$('#maxnumber').blur(function(){
	if(!$('#maxnumber').val()){
		$('#maxnumber').css("border-bottom", "3px solid red");
	};
	if(isNaN($('#maxnumber').val())){
		$('#maxnumber').css("border-bottom", "3px solid red");
	};
	if(parseInt($('#maxnumber').val()) < parseInt($('#minnumber').val())){
		$('#maxnumber').css("border-bottom", "3px solid red");
		$('#minnumber').css("border-bottom", "3px solid red");
	};
});

$('#coursedesc').blur(function(){
	if(!$('#coursedesc').val()){
		$('#coursedesc').css("border", "3px solid red");
	};
});


$(document).ready(function(){
	$('#registerFormWrapper3').hide();
});


// register form

$('#register2').click(function(){
	console.log("whapp");
	// $('#registerFormWrapper1').delay( 500 ).slideUp( 800 );
	$('#registerFormWrapper3').slideDown(800);
	$('#register1').css('visibility', 'hidden');
});


$('#register2').click(function(){
	$('#registerFormWrapper2').fadeOut();
	$('#registerFormWrapper3').fadeIn();
});

$('#show-login').click(function(){
	$('.login').toggle();
	// console.log('works');
});

$("#location_drop").click(function() {
	$("#location_drop_menu").toggle();
});

$("#location").click(function() {
	$("#location_drop").append($("#location").val());
});

$('#register2').click(function(){
	if($("#firstname").val == ""){
		$("#firstname").css("border-bottom", "1px solid red")
	};
});
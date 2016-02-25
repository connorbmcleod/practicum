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
	$("#location_drop").append($("#location").value());
});

$('#register2').click(function(){
	if($("#firstname").val == ""){
		$("#firstname").css("border-bottom", "1px solid red")
	};
});
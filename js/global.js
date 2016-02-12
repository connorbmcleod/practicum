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
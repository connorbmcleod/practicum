$(document).ready(function(){
	$('logged-in').hide();
	$('#registerFormWrapper2').hide();
	$('#registerFormWrapper3').hide();
})


// register form

$('#register1').click(function(){
	$('#registerFormWrapper1').fadeOut();
	$('#registerFormWrapper2').fadeIn();
});


$('#register2').click(function(){
	$('#registerFormWrapper2').fadeOut();
	$('#registerFormWrapper3').fadeIn();
});
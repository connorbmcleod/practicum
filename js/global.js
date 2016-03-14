// Course Creation Form Validation //

$('#location').blur(function(){
	$('#validatelocation').remove();
	if(!$('#location').val()){
		$('#location').css("border-bottom", "3px solid red");
		$("#location").after( "<p id='validatelocation' class='validatemsg'>Please Enter A Location</p>" );
	}
	else{
		$('#location').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatelocation').remove();
	};
});

$('#categories').blur(function(){
	$('#validatecategory').remove();
	if(!$('#categories').val()){
		$('#categories').css("border-bottom", "3px solid red");
		$("#categories").after( "<p id='validatecategory' class='validatetime'>Please Enter A Location</p>" );
	}
	else{
		$('#categories').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatecategory').remove();
	};
});

$('#time').blur(function(){
	$('#validatetime').remove();
	if(!$('#time').val()){
		$('#time').css("border-bottom", "3px solid red");
		$("#time").after( "<p id='validatetime' class='validatetime'>Please Enter A Location</p>" );
	}
	else{
		$('#time').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatetime').remove();
	};
});

$('#minnumber').blur(function(){
	$('#validatemnumber').remove();
	if(!$('#minnumber').val()){
		$('#minnumber').css("border-bottom", "3px solid red");
		$("#minnumber").after( "<p id='validatemnumber' class='validatemsg'>Please Enter A Minimum Number</p>" );
	}
	else if(isNaN($('#minnumber').val())){
		$('#minnumber').css("border-bottom", "3px solid red");
		$("#minnumber").after( "<p id='validatemnumber' class='validatemsg'>Please Enter A Real Number</p>" );
	}
	else{
		$('#minnumber').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatemnumber').remove();
	};
});

$('#maxnumber').blur(function(){
	$('#validatemaxnumber').remove();
	if(!$('#maxnumber').val()){
		$('#maxnumber').css("border-bottom", "3px solid red");
		$("#maxnumber").after( "<p id='validatemaxnumber' class='validatemsg'>Please Enter A Maximum Number</p>" );
	}
	else if(isNaN($('#maxnumber').val())){
		$('#maxnumber').css("border-bottom", "3px solid red");
		$("#maxnumber").after( "<p id='validatemaxnumber' class='validatemsg'>Please Enter A Valid Number</p>" );
	}
	else if(parseInt($('#maxnumber').val()) < parseInt($('#minnumber').val())){
		$('#maxnumber').css("border-bottom", "3px solid red");
		$("#maxnumber").after( "<p id='validatemaxnumber' class='validatemsg'>Please Enter A Higher Number</p>" );
	}
	else {
		$('#maxnumber').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatemaxnumber').remove();
	}
});

$('#coursedesc').blur(function(){
	$('#validatedesc').remove();
	if(!$('#coursedesc').val()){
		$('#coursedesc').css("border", "3px solid red");
		$("#coursedesc").after( "<p id='validatedesc' class='validatemsg'>Please Enter A Description</p>" );
	}
	else {
		$('#coursedesc').css("border", "2px inset rgb(238, 238, 238)");
		$('#validatedesc').remove();
	}
});

$("#firstname").focus(function() {
	$("#firstname").css('border-bottom', '2px solid black');
});

$("#lastname").focus(function() {
	$("#lastname").css('border-bottom', '2px solid black');
});

$("#emails").focus(function() {
	$("#emails").css('border-bottom', '2px solid black');
});

$("#pswrd").focus(function() {
	$("#pswrd").css('border-bottom', '2px solid black');
});

$("#firstname").focus(function() {
	$("#firstname").css('border-bottom', '2px solid black');
});

$("#confirmpswrd").focus(function() {
	$("#confirmpswrd").css('border-bottom', '2px solid black');
});

// $("#coursename").focus(function() {
// 	$("#coursename").css('border-bottom', '2px solid black');
// });

// $("#minnumber").focus(function() {
// 	$("#minnumber").css('border-bottom', '2px solid black');
// });

// $("#maxnumber").focus(function() {
// 	$("#maxnumber").css('border-bottom', '2px solid black');
// });

// $("#objectiveone").focus(function() {
// 	$("#objectiveone").css('border-bottom', '2px solid black');
// });

// $("#objectivetwo").focus(function() {
// 	$("#objectivetwo").css('border-bottom', '2px solid black');
// });

// $("#objectivethree").focus(function() {
// 	$("#objectivethree").css('border-bottom', '2px solid black');
// });

// $("#objectivefour").focus(function() {
// 	$("#objectivefour").css('border-bottom', '2px solid black');
// });

// $("#objectivefive").focus(function() {
// 	$("#objectivefive").css('border-bottom', '2px solid black');
// });

// User Registration Form Validation //
var firstname = false;
var lastname = false;
var emails = false;
var pswrd = false;
var confirmpswrd = false;

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};

$('#firstname').blur(function(){
	$('#validatefname').remove();
	if(!$('#firstname').val()){
		$('#firstname').css("border-bottom", "3px solid red");
		$( "#firstname" ).after( "<p id='validatefname' class='validatemsg'>Please Enter A First Name</p>" );
	}
	else{
		$('#firstname').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatefname').remove();
		firstname = true;
	};
});

$('#lastname').blur(function(){
	$('#validatelname').remove();
	if(!$('#lastname').val()){
		$('#lastname').css("border-bottom", "3px solid red");
		$('#lastname').after( "<p id='validatelname' class='validatemsg'>Please Enter A Last Name</p>" );
	}
	else{
		$('#lastname').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatelname').remove();
		lastname = true;
	}
});

$('#emails').blur(function(){
	$('#validateemail').remove();
	$email = $('#emails').val();
	if(!$email){
		$('#emails').css("border-bottom", "3px solid red");
		$('#emails').after( "<p id='validateemail' class='validatemsg'>Please Enter An Email</p>" );
	}
	else if(!isValidEmailAddress($email)){
		$('#emails').css("border-bottom", "3px solid red");
		$('#emails').after( "<p id='validateemail' class='validatemsg'>Please Enter A Valid Email Address</p>" );
	}
	else {
		$('#emails').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validateemail').remove();
		emails = true;
	}
});

$('#pswrd').blur(function(){
	$('#validatepassword').remove();
	if(!$('#pswrd').val()){
		$('#pswrd').css("border-bottom", "3px solid red");
		$('#pswrd').after( "<p id='validatepassword' class='validatemsg'>Please Enter A Password</p>" );
	}
	else {
		$('#pswrd').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatepassword').remove();
		pswrd = true;
	}
});

$('#confirmpswrd').blur(function(){
	$('#validatecpswrd').remove();
	if(!$('#confirmpswrd').val()){
		$('#confirmpswrd').css("border-bottom", "3px solid red");
		$('#confirmpswrd').after( "<p id='validatecpswrd' class='validatemsg'>Please Confirm Your Password</p>" );
	}
	else if($('#confirmpswrd').val() != $('#pswrd').val()){
		$('#confirmpswrd').css("border-bottom", "3px solid red");
		$('#confirmpswrd').after( "<p class='validatecpswrd'>Your Passwords Don't Match</p>" );
	}
	else {
		$('#confirmpswrd').css("border-bottom", "2px inset rgb(238, 238, 238)");
		$('#validatecpswrd').remove();
		confirmpswrd = true;
	}
});



$(document).ready(function(){
	$('#registerFormWrapper3').hide();
});


// register form

$('#register2').click(function(){
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

// Datepicker

  $(function() {
    $("#datepicker").datepicker();
  });

//Create Course Form Update //

// $("#speed").blur(function(){
// 	if($('#speed').val() == 'Sunshine Coast')
// 


// HEADER STUFF

$(".da_button").click(function() {
	$("#lhead_content").toggle();
	// if($("#show_lhead").css("background-color")=="transparent") {
	// 	$("#show_lhead").css("background-color", "white");
	// }else{
	// 	$("#show_lhead").css("background-color", "transparent");
	// }
});

$(".mini_open").click(function() {
	$(".mini_menu").toggle();
});
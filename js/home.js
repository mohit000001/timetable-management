$(document).ready(function(){
     
    $(".login_button").click(function(){
	
    $("#login_form").css("display","inline-block");
	$(".login_button").css("display","none");
	$(".arrow").css("display","none");
	});
});
function login_error()
{
   $("#login_error").css("display","inline-block");
   $(".login_button").css("display","none");
   $(".arrow").css("display","none");
   $("#login_form").css("display","inline-block");
   $("#login_form").css("padding","30px 50px 10px 50px");

}
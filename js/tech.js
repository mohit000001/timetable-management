/*function get_ttt(str)
{
$(document).ready(function(){ 
	  
	   $.post("get_tt_tea.php",{val:str},function(data,status){document.getElementById("tt").innerHTML=data; });
	  
});
}*/
$(document).ready(function(){ 
	   $(".welcome_mess").click(function(){
	   $(".welcome_mess").css("display","none");
	   $("body").css("opacity","1");
	      });

});
function show_mess()
{
 $(document).ready(function(){ 
	   $(".welcome_mess").css("display","inline-block");
	   $("body").css("opacity","0.6");
	   $(".welcome_mess").css("opacity","1");
	      });  
}
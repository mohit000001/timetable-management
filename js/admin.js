
var status=2;
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
function select_subject()
{
  var sem=document.update_form.sem.value;
  var dep=document.update_form.dep.value;
  var val=document.update_form.teacher.value;
    $(document).ready(function(){ 
	  
	   $.post("get_sub.php",{val:val,sem:sem,dep:dep},function(data,status){document.getElementById("sub").innerHTML=data; });
	  
	  });

}
function show_tt()
{
   var dd=document.getElementById("dep_tt").value;
   var str=document.getElementById("sem_tt").value;
   var sec=document.getElementById("sec_tt").value;
    $(document).ready(function(){ 
	  
	   $.post("get_tt.php",{val:str,dep:dd,sec:sec},function(data,status){document.getElementById("tt").innerHTML=data; });
	  
	  });
  
}
function sel_subject_del()
{
   var dep=document.del_sub.dep.value;
   var sem=document.del_sub.sem.value;
    $(document).ready(function(){ 
	  
	   $.post("get_sub_del.php",{val:sem,dep:dep},function(data,status){document.getElementById("sub_for_del").innerHTML=data; });
	  
	  });
}
function button_man(str)
{
   temp="."+str;
   temp_b="#"+str+"_button";
   $(document).ready(function(){
   
   $(".modification").css("display","none");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","none");
   $(temp).css("display","block");
   $("#modification_button").css("background","rgb(182,185,185)");
   $("#sub_op_button").css("background","rgb(182,185,185)");
   $("#time_table_button").css("background","rgb(182,185,185)");
   $(temp_b).css("background","rgb(222,225,225)");
   });
}
function update_error(str)
{
  window.scroll(400,350);
  if(str.match("success"))
  {
   $(document).ready(function(){  
   $(".success_button").css("display","block");
   $(".modification").css("display","block");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","none");
    }); 
  
  }
  else
  {
   $(document).ready(function(){  
   $(".error_mes").css("display","block");
   $(".error_mes").text(str);
   $(".modification").css("display","block");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","none");
    });
  }	
}
function update_error_add(str)
{
  window.scroll(400,350);
  if(str.match("success"))
  {
   $(document).ready(function(){  
   $(".success_button_add").css("display","block");
   $(".modification").css("display","none");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","block");
    }); 
  
  }
  else
  {
   $(document).ready(function(){  
   $(".error_mes_add").css("display","block");
   $(".error_mes_add").text(str);
   $(".modification").css("display","none");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","block");
    });
  }	
}
function update_error_mod(str)
{
  window.scroll(1500,350);
  if(str.match("success"))
  {
   $(document).ready(function(){  
   $(".success_button_mod").css("display","block");
   $(".modification").css("display","none");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","block");
    }); 
  
  }
  else
  {
   $(document).ready(function(){  
   $(".error_mes_mod").css("display","block");
   $(".error_mes_mod").text(str);
   $(".modification").css("display","none");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","block");
    });
  }	
}
function update_error_del(str)
{
  window.scroll(400,350);
  if(str.match("success"))
  {
   $(document).ready(function(){  
   $(".success_button_del").css("display","block");
   $(".modification").css("display","none");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","block");
    }); 
  
  }
  else
  {
   $(document).ready(function(){  
   $(".error_mes_del").css("display","block");
   $(".error_mes_del").text(str);
   $(".modification").css("display","none");
   $(".time_table").css("display","none");
   $(".sub_op").css("display","block");
    });
  }	
}
function j_axa()
{
  var sem=document.update_form.sem.value;
  var day=document.update_form.day.value;
  var lec=document.update_form.lec.value;
  var sub=document.update_form.sub.value;
  var type=document.update_form.type.value;
  var dep=document.update_form.dep.value;
  var sec=document.update_form.sec.value;
  $(document).ready(function(){ 
       $.post("sub_check.php",{sub:sub,sem:sem,day:day,lec:lec,dep:dep,sec:sec},function(data,status){ window.status=data;});
  
	  });
}
function check_for_sub()
{
  var sem=document.update_form.sem.value;
  var day=document.update_form.day.value;
  var lec=document.update_form.lec.value;
  var sub=document.update_form.sub.value;
  var tech=document.update_form.teacher.value;
  var type=document.update_form.type.value;
  var dep=document.update_form.dep.value;
  var sec=document.update_form.sec.value;
  if(window.status==2)
  { 
    if(sem>0&&sem<7&&tech.length>5&&sub.length>2)
	{
	   if(day==="monday"||day==="tuesday"||day==="wednesday"||day==="thursday"||day==="friday"||$day==="saturday")
	   {
	     if(lec==="l1"||lec==="l2"||lec==="l3"||lec==="l4"||lec==="l5"||lec==="l6") 
		 {
		   if(type==="practical"||type==="theory")
		   {
		     if(dep==="bca"||dep==="bsc it")
			 {
			   if(sec==="a"||sec==="b"||sec==="c")
			   {
			    return true;
			   }
               else
               {
			     			    $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 9");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	  $(".success_button").css("display","none");
    });
			  return false;
			   }			   
			 }
			 else
			 {
			    $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 9");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	  $(".success_button").css("display","none");
    });
			  return false;
			 }
		   }
		   else
		   {
		      $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 8");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
		     return false;
		   }
		 }
		 else
		 {
		    $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 7");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
		  return false;
		 }
		 
	   }
	   else
	   {
	      $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 6");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
	    return false;
	   }
	}
	else
	{
	  $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 5");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
	  return false;
	}
    
  }
  else
  {
     var r=confirm(window.status)
	 if(r==true)
	 {
	   if(sem>0&&sem<7&&tech.length>5&&sub.length>0)
	{
	   if(day==="monday"||day==="tuesday"||day==="wednesday"||day==="thursday"||day==="friday"||$day==="saturday")
	   {
	     if(lec==="l1"||lec==="l2"||lec==="l3"||lec==="l4"||lec==="l5"||lec==="l6") 
		 {
		   if(type==="practical"||type==="theory")
		   {
		     if(dep==="bca"||dep==="bsc it")
			 {
			    if(sec==="a"||sec==="b"||sec==="c")
			   {
			    return true;
			   }
               else
               {
			     			    $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 9");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	  $(".success_button").css("display","none");
    });
			  return false;
			   }			
			   
			 }
			 else
			 {
			    $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 4");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
			  return false;
			 }
		   }
		   else
		   {
		      $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 3");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
		     return false;
		   }
		 }
		 else
		 {
		    $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 2");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
		  return false;
		 }
		 
	   }
	   else
	   {
	      $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
	    return false;
	   }
	}
	else
	{
	  $(document).ready(function(){  
      $(".error_mes").css("display","block");
      $(".error_mes").text("please recheck all values which have you filled ,there may be non-acceptable data in some fields 1");
      $(".modification").css("display","block");
       $(".time_table").css("display","none");
      $(".sub_op").css("display","none");
	   $(".success_button").css("display","none");
    });
	  return false;
	}
	 }
	 else
	 {
	   return false;
	 }
  }	  
	
}	
function get_tt_t(str)
{
      $(document).ready(function(){ 
	  
	   /*$.post("get_tt_tea.php",{val:str},function(data,status){document.getElementById("tt").innerHTML=data; });*/
	   
	   $.ajax({
	      url:"get_tt_tea.php",
		  type:"POST",
		  data:{val:str},
		  beforeSend:function(){$(".loading_button").css("display","inline-block");},
		  complete:function(){ $(".loading_button").css("display","none");},
		  success:function(data){ document.getElementById("tt").innerHTML=data; }
	   });
	  
	  });

}
function show_sub()
{
   var dep=document.getElementById("ss_dep").value;
   var sem=document.getElementById("ss_sem").value;
    $(document).ready(function(){ 
	  
	   $.post("get_sub_ss.php",{sem:sem,dep:dep},function(data,status){document.getElementById("sub_list").innerHTML=data; });
	  
	  });
}
function change_sem(str)
{
  if(str==="e")
  {
     document.getElementById("up_sem").innerHTML='<option value="" selected>semester</option><option value="2">Semester II</option><option value="4">Semester IV</option><option value="6">Semester VI</option>';
  }
  if(str==="o")
  {
      document.getElementById("up_sem").innerHTML='<option value="" selected>semester</option><option value="1">Semester I</option><option value="3">Semester III</option> <option value="5">Semester V</option>';
  
  }


}
function select_subject_for_mod_sub()
{
	var sem=document.mod_sub.sem.value;
    var dep=document.mod_sub.dep.value;
	
	  $(document).ready(function(){ 
	  
	   $.post("get_sub_del.php",{val:sem,dep:dep},function(data,status){document.getElementById("sub_for_mod").innerHTML=data; });
	  
	  });
	
	
}
function add_sub_in_box(str)
{
	
	
	document.add_sub.sub_name.value=str;
	
}

/*function mohitiii()
{
	  var sem=document.add_sub.sem.value;
     var dep=document.add_sub.dep.value;
     var val=document.add_sub.teacher.value;
	 	  var tt=document.add_sub.type.value;
     var ss=document.add_sub.sub_name.value;
     alert(sem+dep+val+tt+ss)
	 return false;
	 
	 
	
	
	
}*/
function shortcutkeys(event)
{
      if (event.altKey) {
	  
        if(event.key==="j")
		{
		    $(".modification").css("display","block");
            $(".time_table").css("display","none");
            $(".sub_op").css("display","none");
			$("#modification_button").css("background","rgb(222,225,225)");
            $("#sub_op_button").css("background","rgb(182,185,185)");
            $("#time_table_button").css("background","rgb(182,185,185)");
		}
		if(event.key==="k")
		{
		     $(".modification").css("display","none");
              $(".time_table").css("display","none");
             $(".sub_op").css("display","block");
			$("#modification_button").css("background","rgb(182,185,185)");
            $("#sub_op_button").css("background","rgb(222,225,225)");
            $("#time_table_button").css("background","rgb(182,185,185)");
		
		}
		if(event.key==="l")
		{
		     $(".modification").css("display","none");
             $(".time_table").css("display","block");
            $(".sub_op").css("display","none");
		    $("#modification_button").css("background","rgb(182,185,185)");
            $("#sub_op_button").css("background","rgb(182,185,185)");
            $("#time_table_button").css("background","rgb(222,225,225)");
		
		}
    } 
	

}
//alert("USE FOLLOWING KEY COMBINATION TO CHANGE OPTIONS:\nAlt+a = update section\nAlt+s = subject section\nAlt+d = time table ")
/*function sub_con(str)
{
  alert(str)
}*/
<?php 
session_start();
require 'login_op.php';
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width" />
  <title>admin page</title>
 
    <link rel="stylesheet" href="css/bootstrap.min.css" media="all" type="text/css"/>
	<script src="js/jquery.min.js"></script>
	
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/admin.js"></script>
    <link rel="stylesheet" href="css/admin.css" type="text/css" media="all"/>  
 </head>
<body onkeyup="shortcutkeys(event)">
<div class="welcome_mess">
this is a program written in php. this is a program written in php.
 this is a program written in php. this is a program written in php.
 this is a program written in php. this is a program written in php.
 this is a program written in php. this is a program written in php.
 <br>-- Click on this message box to terminate this message --
</div>
<?php 

if(isset($_REQUEST["wlc"]))
{
  if($_REQUEST["wlc"]==4)
  {
     echo "<script>show_mess();</script>";
  
  }
}


?>
<div class="top">
<h1><img src="received_2010130275923385.png"  height="60px" width="50px"/> <font size="15">sadabai raisoni women's college</font></h1>

<marquee>this is a time table management project which show time table for teachers and allow admin to change,update,modify time table. to take any action in it you must login first</marquee>     
</div>
<div class="middle">
<ul id="nav_bar">
<li onclick="button_man('modification')" id="modification_button">update - section</li>
<li onclick="button_man('sub_op')" id="sub_op_button">subjects - section</li>
<li onclick="button_man('time_table')" id="time_table_button">time table</li>
</ul>
<a href="logout.php" id="logout">logout</a>
<div class="modification">

<form action="update.php" method="post" name="update_form" id="update_form" onsubmit="return check_for_sub()">
<div class="error_mes"></div>
<div class="success_button">Success <span class="glyphicon glyphicon-ok"></span></div>
<style>
#update_table 
{
 border:none;

}
#update_table tr
{
  
 border:none;
}
#update_table td
{
 border:none;
}
</style>
<table id="update_table">
<tr>
        <td> <span class="head">Select Department :</span><br><br></td><td><select name="dep" onchange="select_subject(),j_axa()">
            <option value="" selected>department</option>
            <option value="bca">BCA</option>
            <option value="bsc it">BSc IT</option>
           </select><br><br></td></tr>
		      
     <tr>  <td> <span class="head">Select Session :</span><br><br></td><td><select name="sess" onchange="change_sem(this.value),j_axa()">
            <option value="" selected>Session</option>
            <option value="e">Even</option>
            <option value="o">Odd</option>
           </select><br><br></td></tr>
		   
        <tr><td> <span class="head">Select Semester :</span><br><br></td><td><select name="sem" onchange="select_subject(),j_axa()"  id="up_sem" >
            <option value="" selected>Semester</option>
   
           </select><br><br></td></tr>
		 <tr>      <td>     <span class="head">Select Section :</span><br><br></td><td><select name="sec" onchange="select_subject(),j_axa()"  id="up_sec" >
            <option value="" selected>Section</option>
			<option value="a" >A</option>
			<option value="b" >B</option>
			<option value="c" >C</option>
           </select><br><br></td></tr>
  <tr><td><span class="head">Day Of Lecture : </span><br><br></td><td> <select name="day" onchange="select_subject(),j_axa()"  id="day">
            <option value="" selected>Day</option>
            <option value="monday">Monday</option>
             <option value="tuesday">Tuesday</option>
			 <option value="wednesday">Wednesday</option>
			  <option value="thursday">Thursday</option> 
			  <option value="friday">Friday</option>
			   <option value="saturday">Saturday</option>
           </select><br><br></td></tr>
   <tr><td> <span class="head">Select Lecture : </span><br><br></td><td> <select onchange="select_subject(),j_axa()" name="lec"  id="lec">
            <option value="" selected>Time</option>
            <option value="l1">9:15 - 10:15</option>
             <option value="l2">10:15 - 11:15</option>
			 <option value="l3">11:30 - 12:30</option>
			  <option value="l4">12:30 - 01:30</option> 
			  <option value="l5">02:00 - 03:00</option>
			  <option value="l6">03:00 - 04:00</option>
     </select><br><br></td></tr>

     <tr> <td> <span class="head">Select Teacher : </span><br><br></td><td> <select onchange="select_subject(),j_axa()" name="teacher"  id="teacher">
            <option value="" selected>Teacher</option>
        <?php 
		$conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		$t_name=array();
		$i=0;
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select name from users";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 {
				   
				   if($row["name"]=="admin")
				   { }
				   else {
				   $t_name[$i]=$row["name"];
			       $i++;
				   	}	 
				 }
				  
			  } 
		}
		sort($t_name);
		foreach($t_name as $nn)
		{
		   echo '<option value="'.$nn.'">'.$nn.'</option>';
		}
		?>		
		
     </select><br><br></td></tr>
	 
  <tr>  <td><span class="head">Select Subject : </span><br><br></td><td> <select onchange="j_axa()" name="sub"  id="sub">
            <option value="" selected >Subject</option>
        
     </select><br><br></td></tr>
<tr><td><span class="head">Subject Type: </span><br><br></td><td><select onchange="j_axa()" name="type">
<option value="" selected>Type</option>
<option value="practical">Practical</option>
<option value="theory">Theory</option>
</select><br><br></td></tr></table>
<button type="submit">Add</button>	 
</form>
</div>
<div class="time_table">
<span class="head" style="font-size:15px;">Select Department : </span><select id="dep_tt" onchange="show_tt()">
            <option value="" selected>Department</option>
            <option value="bca">BCA</option>
            <option value="bsc it">BSc IT</option>
           </select>
         <span class="head" style="font-size:15px;"> Select Semester : </span><select name="sem" onchange="show_tt()"  id="sem_tt" >
            <option value="" selected>Semester</option>
            <option value="1">Semester I</option>
            <option value="2">Semester II</option>
			<option value="3">Semester III</option>
			<option value="4">Semester IV</option>
			<option value="5">Semester V</option>
			<option value="6">Semester VI</option>
           </select>
		   <select name="sec" onchange="show_tt()"  id="sec_tt" >
            <option value="" selected>Sec</option>
			<option value="a" >A</option>
			<option value="b" >B</option>
			<option value="c" >C</option>
           </select>
<span class="head" id="tt_sp_button"> Select Based On Teacher : </span> <select onchange="get_tt_t(this.value)" name="teacher"  id="teacher">
            <option value="" selected>Teacher</option>
       <?php 
		$conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		$t_name=array();
		$i=0;
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select name from users";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 {
				   
				   if($row["name"]=="admin")
				   { }
				   else {
				   $t_name[$i]=$row["name"];
			       $i++;
				   	}	 
				 }
				  
			  } 
		}
		sort($t_name);
		foreach($t_name as $nn)
		{
		   echo '<option value="'.$nn.'">'.$nn.'</option>';
		}
		?>			
		
</select> <img class="loading_button" src="images/3.gif" height="20px" width="20px"/><br><br>
<table id="tt">
</table></div>

<div class="sub_op">

<form action="add_sub.php" method="post" name="add_sub" id="add_sub">
<div class="error_mes_add"></div>
<div class="success_button_add">Success <span class="glyphicon glyphicon-ok"></span></div>
<legend>Subject Add Operation</legend>
<span class="head">Select Department :</span><select name="dep" onchange="select_subject_for_add_sub()">
            <option value="" selected>Department</option>
            <option value="bca">BCA</option>
            <option value="bsc it">BSc IT</option>
           </select><br><br>
         <span class="head">Select Semester :</span><select name="sem" id="sem" onchange="select_subject_for_add_sub()">
            <option value="" selected>Semester</option>
            <option value="1">Semester I</option>
            <option value="2">Semester II</option>
			<option value="3">Semester III</option>
			<option value="4">Semester IV</option>
			<option value="5">Semester V</option>
			<option value="6">Semester VI</option>
           </select><br><br>
		   
<span class="head">Select Teacher : </span> <select name="teacher"  id="teacher" onchange="select_subject_for_add_sub()">
            <option value="" selected>Teacher</option>
      <?php 
		$conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		$t_name=array();
		$i=0;
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select name from users";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 {
				   
				   if($row["name"]=="admin")
				   { }
				   else {
				   $t_name[$i]=$row["name"];
			       $i++;
				   	}	 
				 }
				  
			  } 
		}
		sort($t_name);
		foreach($t_name as $nn)
		{
		   echo '<option value="'.$nn.'">'.$nn.'</option>';
		}
		?>				
		
     </select><br><br>
	 
<span class="head">Subject Type: </span> <select name="type">
<option value="" selected>Type</option>
<option value="practical">Practical</option>
<option value="theory">Theory</option>
</select><br><br>
<!--<span class="head">Select Subject : </span> <br><br> <select name="subbbbbb_name" onchange="add_sub_in_box(this.value)" id="sub_for_add"><br><br>
            <option value="" selected >Subject</option></select><br><br>-->
<span class="head">Subject Name: </span> <input size="50" type="text" name="sub_name">	<br><br>
<span class="head">Subject Code: </span> <input size="20" type="text" name="sub_code">	<br><br>
<button type="submit">Add</button> 
</form>


<form action="del_sub.php" method="post" id="del_sub" name="del_sub">
<div class="error_mes_del"></div>
<div class="success_button_del">Success <span class="glyphicon glyphicon-ok"></span></div>
<legend>Subject delete operation</legend>
<span class="head">select department :</span><select name="dep" onchange="sel_subject_del()">
            <option value="" selected>department</option>
            <option value="BCA">BCA</option>
            <option value="BSc IT">BSc IT</option>
           </select><br><br>
         <span class="head">select semester :</span><select name="sem" id="sem" onchange="sel_subject_del()">
            <option value="" selected>semester</option>
            <option value="1">Semester I</option>
            <option value="2">Semester II</option>
			<option value="3">Semester III</option>
			<option value="4">Semester IV</option>
			<option value="5">Semester V</option>
			<option value="6">Semester VI</option>
           </select><br><br>
    <span class="head">Select Subject : </span> <br><br> <select name="sub_name"  id="sub_for_del"><br><br>
            <option value="" selected >Subject</option>
        
     </select><br><br>	<button type="submit">Delete</button>	 	   
</form>


<form action="mod_sub.php" method="post" name="mod_sub" id="mod_sub">
<div class="error_mes_mod"></div>
<br>
<div class="success_button_mod">Success <span class="glyphicon glyphicon-ok"></span></div>
<legend>Subject modification Operation</legend>
<span class="head">Select Department :</span><select name="dep" onchange="select_subject_for_mod_sub()">
            <option value="" selected>Department</option>
            <option value="bca">BCA</option>
            <option value="bsc it">BSc IT</option>
           </select><br><br>
         <span class="head">Select Semester :</span><select name="sem" id="sem" onchange="select_subject_for_mod_sub()">
            <option value="" selected>Semester</option>
            <option value="1">Semester I</option>
            <option value="2">Semester II</option>
			<option value="3">Semester III</option>
			<option value="4">Semester IV</option>
			<option value="5">Semester V</option>
			<option value="6">Semester VI</option>
           </select><br><br>
		   
<span class="head">Select Teacher : </span> <select name="teacher"  id="teacher" onchange="select_subject_for_mod_sub()">
            <option value="" selected>Teacher</option>
      <?php 
		$conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		$t_name=array();
		$i=0;
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select name from users";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 {
				   
				   if($row["name"]=="admin")
				   { }
				   else {
				   $t_name[$i]=$row["name"];
			       $i++;
				   	}	 
				 }
				  
			  } 
		}
		sort($t_name);
		foreach($t_name as $nn)
		{
		   echo '<option value="'.$nn.'">'.$nn.'</option>';
		}
		?>				
		
     </select><br><br>
	 
<span class="head">Subject Type: </span> <select name="type">
<option value="" selected>Type</option>
<option value="practical">Practical</option>
<option value="theory">Theory</option>
</select><br><br>
<span class="head">Select Subject : </span> <br><br> <select name="sub_name" id="sub_for_mod"><br><br>
            <option value="" selected >Subject</option></select><br><br>
<span class="head">Subject Code: </span> <input size="20" type="text" name="sub_code">	<br><br>
<button type="submit">Modify</button> 
</form>

<div class="show_sub">
<legend>Show Subjects</legend>
<span class="head">Select Department :</span><select name="dep" id="ss_dep" onchange="show_sub()">
            <option value="" selected>Department</option>
            <option value="bca">BCA</option>
            <option value="bsc it">BSc IT</option>
           </select><br><br>
         <span class="head">Select Semester :</span><select name="sem" id="ss_sem" onchange="show_sub()">
            <option value="" selected>Semester</option>
            <option value="1">Semester I</option>
            <option value="2">Semester II</option>
			<option value="3">Semester III</option>
			<option value="4">Semester IV</option>
			<option value="5">Semester V</option>
			<option value="6">Semester VI</option>
           </select><br><br>
<table id="sub_list">
</table>		   
</div>


</div>
</div>

<?php 

  if(isset($_SESSION["error"]))
  { 
    echo "<script>update_error('".$_SESSION["error"]."');</script>";
	unset($_SESSION["error"]);
  }
  if(isset($_SESSION["error_add_sub"]))
  { 
    echo "<script>update_error_add('".$_SESSION["error_add_sub"]."');</script>";
	unset($_SESSION["error_add_sub"]);
  }
  if(isset($_SESSION["error_del_sub"]))
  { 
    echo "<script>update_error_del('".$_SESSION["error_del_sub"]."');</script>";
	unset($_SESSION["error_del_sub"]);
  }
  if(isset($_SESSION["error_mod_sub"]))
  { 
    echo "<script>update_error_mod('".$_SESSION["error_mod_sub"]."');</script>";
	unset($_SESSION["error_mod_sub"]);
  }
  unset($_SESSION["error"]);
  unset($_SESSION["error_add_sub"]);
  unset($_SESSION["error_del_sub"]);
  unset($_SESSION["error_mod_sub"]);

?>
</body>
 </html>
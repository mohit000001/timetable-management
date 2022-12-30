<?php 
if(isset($_COOKIE["pro"]))
{
$host="mysql";
$user="tempuserss";
$pass="saxud3ssssldnbsdfsdf";
$db="college";

$conn=mysqli_connect($host,$user,$pass,$db);
 if(!$conn)
 {
   
	exit();
 }
 $cook=$_COOKIE["pro"];
 $sql="select login_c,user_id from login where login_c='$cook'";
 $r=mysqli_query($conn,$sql);
    if(mysqli_num_rows($r)==1)
	 {

       $row=mysqli_fetch_assoc($r);
 
	 
       if($row["user_id"]=="admin123")
       {
	     header('Location:admin.php');
	     mysqli_close($conn);
		 exit();	
	   }
     
	    else
	   {
	    header('Location:teachers.php');
		mysqli_close($conn);
        exit();		
	   } 
	 }
}  
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width" />
  <title>home page</title>
 
    <link rel="stylesheet" href="css/bootstrap.min.css" media="all" type="text/css"/>
	<script src="js/jquery.min.js"></script>
	
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/home.js"></script>
    <link rel="stylesheet" href="css/home.css" type="text/css" media="all"/>  
 </head>
<body>
<div class="top">
<h1><img src="received_2010130275923385.png"  height="60px" width="50px"/> <font size ="15">sadabai raisoni women's college</font></h1>

<marquee>This is a time table management project which show time table for teachers and allow admin to change, update, modify time table. to take any action in it you must login first.</marquee>     
</div>
<a href="teachers/teacher.html" class="teach_info">Get staff details</a>
<a href="teachers/dep.html" class="dep_info">Get department details</a>
<div class="content">
 
 <div class="dis">

Women are the bright future of the society if they are educated well. 
Sadabai Raisoni Women’s College believes in uplifting women’s power and educating them with latest technology techniques
 and advance learning which will support in increasing contribution of the women in developing standard of the nation.<br><br>
Overview : <br>
Sadabai Raisoni Women's College is situated in Nagpur in Maharashtra state of India. 
Established in 1998, it is accredited from ISO and it is affiliated to Shreemati Nathibai Damodar Thackersey Women's University.
 SRWC, Nagpur offers 4 courses across 2 streams namely IT,andBCA



</div>
<div class="right">

<img class="arrow" src="images/arrow_copy.png" height="100px" width="200px">
 <button class="login_button">login</button>
 
<form action="login_check.php" method="post" name="login_form" id="login_form">
<div id="login_error">username or password wrong or something error, try again</div>
<legend>enter your user name and password and click on login button below</legend>
 <input type="text" name="username" size="40" placeholder="User Name"><br><br><br>
 <input type="password" name="pass" size="40" placeholder="Password"><br><br>
 <button type="submit">login</button>
</form>
</div>
</div>
<?php 
session_start();
 if(isset($_SESSION["login_tech"]))
  {
    if($_SESSION["login_tech"]=="yes")
	{
	  echo "<script>login_error();</script>";
	}
	else
	{
	  unset($_SESSION["login_tech"]);
	}
	
  }
unset($_SESSION["login_tech"]);

?>
 </body>
 </html>
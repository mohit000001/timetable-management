<?php
session_start();

if(isset($_COOKIE["pro"]))
{
$host="mysql";
$user="tempuserss";
$pass="saxud3ssssldnbsdfsdf";
$db="college";

$conn=mysqli_connect($host,$user,$pass,$db);
 if(!$conn)
 {
	EXIT();
 }
 $cook=$_COOKIE["pro"];
 $sql="select user_id from login where login_c='$cook'";
 $r=mysqli_query($conn,$sql);
    if(mysqli_num_rows($r)==1)
	 {
	   setcookie("pro","",time()-84000*30*12,"/");	  
	   $sql="delete from login where login_c='$cook'";
	   mysqli_query($conn,$sql);
	   mysqli_close($conn);
       header('Location:home.php');
	   EXIT();
     }
	 else
	 {
	    header('Location:home.php');
        EXIT();
	 }
}  
else
{
  header('Location:home.php');
  EXIT();
}
EXIT();
?>
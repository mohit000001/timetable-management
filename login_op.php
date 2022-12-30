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
	     mysqli_close($conn);
	   }
     
	    else
	   {
	    header('Location:teachers.php');
        exit();		
	   } 
	 }
	 else
	 { 
	   header('Location:home.php');
       exit();
	 }
}  
 
else
{
 header('Location:home.php');
 exit();
	   
}
?>
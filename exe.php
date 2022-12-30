<?php
$host="mysql";
$user="tempuserss";
$pass="saxud3ssssldnbsdfsdf";
$db="college";

$conn=mysqli_connect($host,$user,$pass,$db);
 if(!$conn)
 {
   
	exit();
 }
$day=array("monday","tuesday","wednesday","thursday","friday","saturday");
$sem=array("1","2","3","4","5","6");
$sec=array("a","b","c");
$dep=array("bca","bsc it");

foreach($dep as $dp)
 {
    foreach($sem as $ss)
	{	   
	   {
	      foreach($sec as $sc)
		  {
		    foreach($day as $dd) 
			{
			 
             $sql="insert into time_table(dep,sem,sec,day) values('$dp','$ss','$sc','$dd')";
             mysqli_query($conn,$sql);
			   
			}
		  
		  }
	   
	   }
	   
	} 
 }
?>
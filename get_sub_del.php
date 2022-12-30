<?php 
require 'login_op_ex.php';
 echo '<option value="">subject</option>';
 $val=$_REQUEST["val"];
 $dd=$_REQUEST["dep"];
 $conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select name,type from subjects where sem='$val' and dep='$dd'";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 { 
				   echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';		 
				 }
				  
			  } 
		}
exit();			
?>
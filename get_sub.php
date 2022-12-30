<?php 
require 'login_op_ex.php';
if(isset($_REQUEST["val"])&&isset($_REQUEST["dep"])&&isset($_REQUEST["sem"]))
{
 echo '<option value="">subject</option>';
 $val=$_REQUEST["val"];
 $ss=$_REQUEST["sem"];
 $dd=$_REQUEST["dep"];
 $conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select name,type from subjects where teacher='$val' and sem='$ss' and dep='$dd'";
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
}
exit();			
?>
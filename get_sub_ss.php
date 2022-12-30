<?php 
require 'login_op_ex.php';
if(isset($_REQUEST["dep"])&&isset($_REQUEST["sem"]))
{

 $sub=array();
 $j=0;
 $i=1;
 $ss=$_REQUEST["sem"];
 $dd=$_REQUEST["dep"];
 $conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select name,type,code from subjects where sem='$ss' and dep='$dd'";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     echo "<tr><th>Sr.no</th><th>subject name</th><th>code</th></tr>";
			     while($row=$result->fetch_assoc())
				 { 
                   $tem=array($row["name"]=>$row["code"]);
       		       $sub=array_merge($sub,$tem);
				 }
				  asort($sub);	
				  foreach($sub as $sw => $sw_value)
				  {
				      $temp1=$sw;
					  $temp2=$sw_value;
   					  echo '<tr><td>'.$i.'</td><td>'.$temp1.'</td><td> [ '.$temp2.' ]</td></tr>';
					  $i++;
			
				  }
				  
			  } 
			  else
			  {
			     echo '<li style="color:rgb(200,0,0);">no subject found for this department and semester</li>';	
			  }
		}
}
exit();			
?>
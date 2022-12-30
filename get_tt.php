<?php 
require 'login_op_ex.php';
$val=$_REQUEST["val"];
$dd=$_REQUEST["dep"];
$sc=$_REQUEST["sec"];

echo "<tr><th>day</th><th>9:15 - 10:15</th><th>10:15 - 11:15</th><th>break</th><th>11:30 - 12:30</th><th>12:30 - 01:30</th><th>break</th><th>02:00 - 03:00</th><th>03:00 - 04:00</th></tr>";
$conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }
		  $sql="select * from time_table where sem='$val' and dep='$dd' and sec='$sc'";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 { 
				    echo "<tr><td style='border:black solid thin;'><div class='day_col'>".$row["day"]."</div></td><td style='border:black solid thin;'><div><span style='font-weight:700;'>".$row["l1"]."</span><br>".$row["l1_s"]." [<span style='font-weight:700; color:rgb(200,0,0);'>".$row["l1_t"]."</span>]</div></td><td style='border:black solid thin;'><div><span style='font-weight:700;'>".$row["l2"]."</span><br>".$row["l2_s"]." [<span style='font-weight:700; color:rgb(200,0,0);'>".$row["l2_t"]."</span>]</div></td><td style='border:black solid thin;'> </td><td><div><span style='font-weight:700;'>".$row["l3"]."</span><br>".$row["l3_s"]." [<span style='font-weight:700; color:rgb(200,0,0);'>".$row["l3_t"]."</span>]</div></td><td style='border:black solid thin;'><div><span style='font-weight:700;'>".$row["l4"]."</span><br>".$row["l4_s"]." [<span style='font-weight:700; color:rgb(200,0,0);'>".$row["l4_t"]."</span>]</div></td><td></td><td style='border:black solid thin;'><div><span style='font-weight:700;'>".$row["l5"]."</span><br>".$row["l5_s"]." [<span style='font-weight:700; color:rgb(200,0,0);'>".$row["l5_t"]."</span>]</div></td><td style='border:black solid thin;'><div><span style='font-weight:700;'>".$row["l6"]."</span><br>".$row["l6_s"]." [<span style='font-weight:700; color:rgb(200,0,0);'>".$row["l6_t"]."</span>]</div></td></tr>";
				    
                 }
			  } 
			  
            }
exit();			
?>

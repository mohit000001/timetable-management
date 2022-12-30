<?php 
require 'login_op_ex.php';
$day=array("monday","tuesday","wednesday","thursday","friday","saturday");
$sem=array("1","2","3","4","5","6");
$lec=array("l1","l2","b","l3","l4","b","l5","l6");
$val=$_REQUEST["val"];
$l_s="";
$l_t="";
$dep=array("bca","bsc it");
echo "<tr><th>day</th><th>9:15 - 10:15</th><th>10:15 - 11:15</th><th>break</th><th>11:30 - 12:30</th><th>12:30 - 01:30</th><th>break</th><th>02:00 - 03:00</th><th>03:00 - 04:00</th></tr>";
$conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
		  echo $conn->connect_error;
		  EXIT();
		 }

					   foreach($day as $dd)
					   {
					     echo "<tr><td>".$dd."</td>";
						 
					     foreach($lec as $ll)
						 { 
						   if($ll=="b")
						   {
						     echo "<td style='padding:2px; border:black thin solid;'></td>";
						   }
						   else
						   {
						     //foreach($dep as $dp)
							 //{
						         get_sub($dd,$ll,$conn,$val); 
								 
							 //}
						   }
						   
					      }
					    echo "</tr>";
					  }
					 
function get_sub($dd,$ll,$conn,$val)
{
   $l_s=$ll."_s";
   $l_t=$ll."_t";
   $sem=array("1","2","3","4","5","6");
   $dep=array("bca","bsc it");
   $sc=array("a","b","c");
   $status="none";
 
     foreach($sem as $ss)
	 {
	   foreach($dep as $dp)
       {
	     foreach($sc as $s)
         {
	      $sql="select $ll,$l_s,$l_t from time_table where sem='$ss' and day='$dd' and dep='$dp' and sec='$s'";
          $result=$conn->query($sql);
	   
         if($result->num_rows==1)	  
         {
	     $row=$result->fetch_assoc();
	     if($row[$ll]==$val)
		 {
			$tep="";
			$tep1="";
		   if($dp==="bca")
		   {
			  $tep="BCA"; 
		   }
		   ELSE
		   {
			  $tep="BSc IT"; 
			   
		   }
		   switch($s)
		   {
		     case "a":$tep1="A"; BREAK;
			 case "b":$tep1="B"; BREAK;
			 case "c":$tep1="C"; BREAK;
			 default:$tep1="EROOR"; BREAK;
		   }
		   echo "<td style='padding:2px; border:black thin solid;'><span style='font-weight:700;'>".$row[$l_s]."[".$row[$l_t]."]</span> <br>[ SECTION ".$tep1." ] <span style='color:red'>semester [".$ss."]</span> <span style='color:blue;'>[ ".$tep." ]</td>";  
		   $status="hh";
		 }
	   }
       else
       {
	     $status="no"; 
	   }
      }	   
	 }
   }
   if($status=="no")
   {
     echo "<td style='padding:2px; border:black thin solid;'>technical error contact web master 1</td>";
   }
   if($status=="none")
   {
     echo "<td style='padding:2px; border:black thin solid;'>--OFF--</td>";
   }
  /*$sql="select $ll,$l_s,$l_t from time_table where sem='1' and day='$dd' and dep='bca'";
   $result=$conn->query($sql);
   if($result->num_rows==1)
	{
	 $row=$result->fetch_assoc();
	 if($row[$ll]!==$val)
	 {
	   $sql="select $ll,$l_s,$l_t from time_table where sem='2' and day='$dd' and dep='bca'";
	   $result=$conn->query($sql);
	   if($result->num_rows==1)
	   {
		 $row=$result->fetch_assoc();
		 if($row[$ll]!==$val)
		 {
		   $sql="select $ll,$l_s,$l_t from time_table where sem='3' and day='$dd' and dep='bca'";
	       $result=$conn->query($sql);
	       if($result->num_rows==1)
	       {
		    $row=$result->fetch_assoc();
		    if($row[$ll]!==$val)
		    {
			  $sql="select $ll,$l_s,$l_t from time_table where sem='4' and day='$dd' and dep='bca'";
			  $result=$conn->query($sql);
			  if($result->num_rows==1)
			  {
			     if($row[$ll]!==$val)
				 {
				    
     			  echo "<td style='padding:2px; border:black thin solid;'>--OFF--</td>";
				 }
				 else
				 {
				   echo "<td style='padding:2px; border:black thin solid;'><span style='font-weight:700;'>".$row[$l_s]."[".$row[$l_t]."]</span> <br><span style='color:red'>semester [3]</span> <span style='color:blue;'>[ BCA ]</td>";
				 }
			  }
              ELSE
              {
			    echo "<td style='padding:2px; border:black thin solid;'>technical error contact web master 3</td>";
			  }			  
		    }
            else
            {
		       echo "<td style='padding:2px; border:black thin solid;'><span style='font-weight:700;'>".$row[$l_s]."[".$row[$l_t]."]</span> <br><span style='color:red'>semester [3]</span> <span style='color:blue;'>[ BCA ]</td>";
	  
		    }		 
		   }
		   	else
            {
	         echo "<td style='padding:2px; border:black thin solid;'>technical error contact web master 3</td>";
	        }
		 } 
         else
         {
		    echo "<td style='padding:2px; border:black thin solid;'><span style='font-weight:700;'>".$row[$l_s]."[".$row[$l_t]."]</span> <br><span style='color:red'>semester [2]</span></td>";
	  
		 }		 
         //echo "<td style='padding:2px; border:black thin solid;'>".$dd.$row[$l_s]."[".$row[$l_t]."] <br>Semester</td>";
	    } 
		 else
         {
	     echo "<td style='padding:2px; border:black thin solid;'>technical error contact web master 2</td>";
	     }
	   }
      else
      {
	    echo "<td style='padding:2px; border:black thin solid;'><span style='font-weight:700;'>".$row[$l_s]."[".$row[$l_t]."]</span> <br><span style='color:red'>semester [1]</span></td>";
	  
	  }	  
	}
	else
   {
	echo "<td style='padding:2px; border:black thin solid;'>technical error contact web master 1</td>";
	}*/								
}	
exit();		
?>
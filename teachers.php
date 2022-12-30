<?php 
if(isset($_COOKIE["pro"]))
{
$host="mysql";
$user="tempuserss";
$pass="saxud3ssssldnbsdfsdf";
$db="college";
$name="";
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
	      $na=$row['user_id'];
	      $sql="select name from users where user_id='$na'";
          $r=mysqli_query($conn,$sql);
		  $row=mysqli_fetch_assoc($r);
		  $name=$row["name"];
		  mysqli_close($conn);
	   } 
	 }
}  
 
else
{
 header('Location:home.php');
 exit();	   
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width" />
  <title>teachers page</title>
 
    <link rel="stylesheet" href="css/bootstrap.min.css" media="all" type="text/css"/>
	<script src="js/jquery.min.js"></script>
	
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/tech.js"></script>
    <link rel="stylesheet" href="css/tech.css" type="text/css" media="all"/>  
 </head>
<body>
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
<h1><img src="received_2010130275923385.png"  height="60px" width="50px"/><font size="15"> sadabai raisoni women's college </font></h1>

<marquee>this is a time table management project which show time table for teachers and allow admin to change,update,modify time tables. to take any action in it you must login fist</marquee>     
</div>
<div class="middle">
<a href="logout.php" class="logout">logout</a>
<h1 style="">Allotted Subjects : </h1>
<table style="margin-bottom:50px; text-transform:uppercase; text-align:justify;">
<tr style='font-weight:700;'><th>subject name</th><th>type</th><th>subject code</th><th>semester</th><th>department</th></tr>
<?php 
$conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
		  echo "there is someting technical error in server error please contact web-master 5";
		  EXIT();
		 }
		  $sql="select * from subjects";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 {
                    if($row["teacher"]==$name)
					{
					  echo "<tr style='font-weight:600;'><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["code"]."</td><td style='color:red;'>[ ".$row["sem"]." ]</td><td>".$row["dep"]."</td></tr>";
					}
       			 }				 
              }
           }
?>

</table>
<table id="tt">
<?php 
$day=array("monday","tuesday","wednesday","thursday","friday","saturday");
$sem=array("1","2","3","4","5","6");
$lec=array("l1","l2","b","l3","l4","b","l5","l6");
$val=$name;
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
?>
</table>
</div>
 </body>
 </html>
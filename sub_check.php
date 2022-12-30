<?php 
require 'login_op_ex.php';
$l="";
$d="";
$se="";
$dd="";
$sc="";
$sub="";
if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    
    if(isset($_REQUEST["sub"])&&isset($_REQUEST["sem"])&&isset($_REQUEST["day"])&&isset($_REQUEST["lec"])&&isset($_REQUEST["sec"]))
	{ 
	  $l=$_REQUEST["lec"];
	  $l_s=$_REQUEST["lec"]."_s";
	  $l_t=$_REQUEST["lec"]."_t";
      $d=$_REQUEST["day"];
      $se=$_REQUEST["sem"];
	  $dd=$_REQUEST["dep"];
	  $sc=$_REQUEST["sec"];
	  $sub=$_REQUEST["sub"];
	  if($se>0&&$se<7&&strlen($d)>0&&strlen($l)>0)
	  {		
        if($d=="monday"||$d=="tuesday"||$d=="wednesday"||$d=="thursday"||$d=="friday"||$d=="saturday")	
          {
		  	if($l=="l1"||$l=="l2"||$l=="l3"||$l=="l4"||$l=="l5"||$l=="l6")
             {
			    if($dd=="bca"||$dd="bsc it")
				{
				  if($sc=="a"||$sc=="b"||$sc=="c")
				  {
				  
				  }
				  else
				  {
				    echo "2";
					exit();
				  }
				}
			   else
			   {
			     echo "2";
		         EXIT();
			   }
			 }
			 else
			 {
			   echo "2";
		       EXIT();
			 }
		  }
		  else
		  {
		   echo "2";
		   EXIT();
		  }
       }
       else
       {
	      echo "2";
		  EXIT();
	   }	   
	   
       $conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		if($conn->connect_error)
		 {
		  echo "2";
		  EXIT();
		 }
		 
		$sql="select $l_s,$l_t,day,sem,dep,sec from time_table where  sem='$se' and day='$d' and dep='$dd' and sec='$sc'";
		if($result=$conn->query($sql))
		   {
		      if($result->num_rows==1)
			  {
			    
			     $row=$result->fetch_assoc();
				 
				 if($row[$l_s]===$sub)
	             {
				  $l=$_REQUEST["lec"];
				  switch($l)
				  {
				   case "l1":echo $row[$l_s]." [".$row[$l_t]."] is set in ".$dd." department on semester ".$se." in section ".$sc." on ".$d." at 9:15 - 10:15.\n  <h5>Do you want to change it and please don't tick below option unless you will not have subject cross checking facility till you refresh page";
				   break;
				   case "l2":echo $row[$l_s]." [".$row[$l_t]."] is set in ".$dd." department on semester ".$se." in section ".$sc." on ".$d." at 10:15 - 11:15.\n  Do you want to change it and please don't tick below option unless you will not have subject cross checking facility till you refresh page";
				   break;
				   case "l3":echo $row[$l_s]." [".$row[$l_t]."] is set in ".$dd." department on semester ".$se." in section ".$sc." on ".$d." at 11:30 - 12:30.\n  Do you want to change it and please don't tick below option unless you will not have subject cross checking facility till you refresh page";
				   break;
				   case "l4":echo $row[$l_s]." [".$row[$l_t]."] is set in ".$dd." department on semester ".$se." in section ".$sc." on ".$d." at 12:30 - 01:30.\n  Do you want to change it and please don't tick below option unless you will not have subject cross checking facility till you refresh page";
				   break;
				   case "l5":echo $row[$l_s]." [".$row[$l_t]."] is set in ".$dd." department on semester ".$se." in section ".$sc." on ".$d." at 02:00 - 03:00.\n  Do you want to change it and please don't tick below option unless you will not have subject cross checking facility till you refresh page";
				   break;
				   case "l6":echo $row[$l_s]." [".$row[$l_t]."] is set in ".$dd." department on semester ".$se." in section ".$sc." on ".$d." at 03:00 - 04:00 .\n Do you want to change it and please don't tick below option unless you will not have subject cross checking facility till you refresh page";
				   break;
				   default: echo "something technical error";
				   break;
				  }
				 }
				 else{echo "2"; EXIT(); }
			  }
			  else
			  {
			     echo "2";
		         EXIT();
			  }
		   }
         else
          {
		   echo "2";
		    EXIT();
		  }		 
    }
	else
	{
	  echo "2";
	  exit();
	}
  }
 else
{
   echo "2";
   EXIT();  
} 

exit();
?>
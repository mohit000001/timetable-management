<?php 
session_start();
require 'login_op.php';
class update
{ 
  protected $sem,$day,$lec,$tech,$sub,$type,$dd,$sec;
  
  function __construct($s,$d,$l,$t,$sb,$ty,$dp,$sc)
  {
    $this->sem=$s;
	$this->day=$d;
	$this->lec=$l;
	$this->tech=$t;
	$this->sub=$sb; 
    $this->type=$ty; 
    $this->dd=$dp;	
	$this->sec=$sc;	
  }
  public function start_validation()
  {
     if($this->sem>0&&$this->sem<7&&strlen($this->sub)>0&&strlen($this->tech)>0)
	  {		
        if($this->day=="monday"||$this->day=="tuesday"||$this->day=="wednesday"||$this->day=="thursday"||$this->day=="friday"||$this->day=="saturday")	
          {
		  	if($this->lec=="l1"||$this->lec=="l2"||$this->lec=="l3"||$this->lec=="l4"||$this->lec=="l5"||$this->lec=="l6")
             {		
                if($this->type=="practical"||$this->type=="theory")
                {
				  if($this->dd=="bca"||$this->dd="bsc it")
				  {
				    if($this->sec=="a"||$this->sec=="b"||$this->sec=="c")
				    { 
				    $this->go();
					}
					else
					{
					 $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 10";
				     header('Location:admin.php');
				     exit();
					}
				  }
				  else
				  {
				  $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 10";
				  header('Location:admin.php');
				  exit();
				  }
				}				
		        else
				{
				  $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 9";
				  header('Location:admin.php');
				  exit();
				}
		      }
		   else
		   {
		      $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 8";
	           header('Location:admin.php');
			   exit();
		   }
		  }
		  else
		  {
		     $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 7";
	         header('Location:admin.php');
			 exit();
		    
		  }
	  }
	  else
	  {
	    $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 6";
	    header('Location:admin.php');
		exit();
	  }
  }
  public function go()
  {
            //echo $this->sem.$this->day.$this->lec.$this->tech.$this->sub;
         $conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
		  $_SESSION["error"]="there is something technical error in server error please contact web-master 5";
		  EXIT();
		 }
		  $sql="select * from time_table";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 { 
				   if($row["sem"]==$this->sem&&$row["dep"]==$this->dd&&$row["sec"]==$this->sec)
                     {
					 
					 }
                    else
                     {
					   if($row["$this->lec"]==$this->tech&&$row["day"]==$this->day)
					   {
					     
					     $_SESSION["error"]="this operation can be not completed becuase, ".$this->tech." is already in section [".$row["sec"]."] on semester ".$row["sem"]." at same lecture on ".$this->day." in ".$row["dep"]." department, please check time table for more details 4";
						 header('Location:admin.php');
						 exit();
					   }
					
					   /*$sql="select subject,teacher from subjects where subject='$this->sub' and teacher='$this->tech'";
					   $result=$conn->query($sql);
					   if($result->num_rows!=1)
					   {
					     echo "the teacher you selected for this subject is not of this subject please another one";
						 exit();
					   }
					    */
					  }					
				 }
				 
				 $tem=$this->lec."_s";
				 $tem1=$this->lec."_t";
				 $sql="update time_table set $this->lec='$this->tech',$tem='$this->sub',$tem1='$this->type' where dep='$this->dd' and sem='$this->sem' and day='$this->day' and sec='$this->sec'";
   				  if($conn->query($sql)===TRUE)
	               {
	                 $_SESSION["error"]="success";
	                 header('Location:admin.php');
					 exit();
	                }
					else
					{
					  $_SESSION["error"]="there is something technical error in server please contact web-master 3";
					  header('Location:admin.php');
					  exit();
					}
			  } 
		   }
  }
}  
if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if(isset($_REQUEST["dep"])&&isset($_REQUEST["sem"])&&isset($_REQUEST["day"])&&isset($_REQUEST["lec"])&&isset($_REQUEST["teacher"])&&isset($_REQUEST["sub"])&&isset($_REQUEST["type"])&&isset($_REQUEST["sec"]))
	{
      $obj=new update($_REQUEST["sem"],$_REQUEST["day"],$_REQUEST["lec"],$_REQUEST["teacher"],$_REQUEST["sub"],$_REQUEST["type"],$_REQUEST["dep"],$_REQUEST["sec"]);
    }
	else
	{
	  $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server please try again or contact web-master 2";
	  header('Location:admin.php');
	  exit();
	}
  }
 else
{
   
   $_SESSION["error"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 1";
   header('Location:admin.php');
   EXIT();
   
} 	
$obj->start_validation();		   
		  	   
?>
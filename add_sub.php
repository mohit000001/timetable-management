<?php 
session_start();
require 'login_op.php';
class add_sub
{ 
  protected $sem,$type,$tech,$sub,$dd,$sub_c;
  
  function __construct($s,$ty,$t,$sb,$d,$sc)
  {
    $this->sem=$s;
	$this->type=$ty;
	$this->tech=$t;
	$this->sub=$sb;
    $this->dd=$d;	
	$this->sub_c=$sc;
  }
  public function start_validation()
  {
     if($this->sem>0&&$this->sem<7&&strlen($this->sub)>0&&strlen($this->tech)>0)
	  {		
        if($this->type=="theory"||$this->type=="practical")	
          {
		    
		  	if(strlen($this->sub)>0&&strlen($this->sub)<100&&strlen($this->sub_c)>0&&strlen($this->sub_c)<30)
             {
               if($this->dd=="bca"||$this->dd="bsc it")	
                {			   
		         $this->go();
				}
				else
				{
			      $_SESSION["error_add_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 7";
			      header('Location:admin.php');
			      exit(); 
				}
		     }
			 
		   else
		   {
		      $_SESSION["error_add_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 6";
			  header('Location:admin.php');
			  exit();
	      
		   }
		  }
		  else
		  {
		      $_SESSION["error_add_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 5";
			  header('Location:admin.php');
			  exit();
		    
		  }
	  }
	  else
	  {
		      $_SESSION["error_add_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 4";
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
		      $_SESSION["error_add_sub"]="there is something technical error in server try again or please contact web-master 3";
			  header('Location:admin.php');
			  exit();
		 }
		  $sql="select name from subjects";
		  $result=$conn->query($sql);
		  while($row=$result->fetch_assoc())
		  {
		    if($row["name"]===$this->sub) 
			{
			  $_SESSION["error_add_sub"]="this subject is already in database, if you want to modify it go through modification facility 15";
			  header('Location:admin.php');
			  exit();
			}
		  }
			$sql="insert into subjects(dep,sem,name,type,teacher,code) values('$this->dd','$this->sem','$this->sub','$this->type','$this->tech','$this->sub_c')";
   			if($conn->query($sql)===TRUE)
	        {
	            $_SESSION["error_add_sub"]="success";
	            header('Location:admin.php');
			    exit();
	        }
			else
			{
			  $_SESSION["error_add_sub"]="there is something technical error in server try again or please contact web-master 2";
			  header('Location:admin.php');
			  exit();
			}
  } 
		 
  
}  
if($_SERVER["REQUEST_METHOD"]=="POST")
  {
  
    $obj=new add_sub($_REQUEST["sem"],$_REQUEST["type"],$_REQUEST["teacher"],$_REQUEST["sub_name"],$_REQUEST["dep"],$_REQUEST["sub_code"]);
  
  }
 else
{
           
		   	$_SESSION["error_add_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master 1";
			  header('Location:admin.php');
			 
			  exit();
} 	
$obj->start_validation();


	  	   
?>
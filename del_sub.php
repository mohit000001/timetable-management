<?php 
session_start();
require 'login_op.php';
class del_sub
{ 
  protected $sem,$sub,$dd;
  
  function __construct($s,$sb,$d)
  {
    $this->sem=$s;
	$this->sub=$sb;   
	$this->dd=$d;
  }
  public function start_validation()
  {
    $sta="";
     if($this->sem>0&&$this->sem<7)
	  {		
        $sta=$this->check_sub();
		 
		 if($sta=="yes")
		 {
		   if($this->dd=="BCA"||$this->dd="BSc IT")	
		   {
		  
		    $this->go();
		   }
		   else
		   {
		     $_SESSION["error_del_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master";
			 header('Location:admin.php');
            exit();
		   }
		 }
		 else
		 {
			$_SESSION["error_del_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master";
			 header('Location:admin.php');
            exit();
		 }
	  }
	  else
	  {
			$_SESSION["error_del_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master";
			 header('Location:admin.php');
            exit();
	  }
  }
  public function check_sub()
  {
     $conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($conn->connect_error)
		 {
			$_SESSION["error_del_sub"]="there is something technical error in server try again or please contact web-master";
			header('Location:admin.php');
            exit();
		 }
		  $sql="select name,type from subjects where sem='$this->sem'";
		  if($result=$conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     while($row=$result->fetch_assoc())
				 { 
				   if($row["name"]==$this->sub)
                    {
					  return "yes";
					  break;
					}				   
				 }
				  
			  } 
			  else
			  {
			   $_SESSION["error_del_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master";
			   header('Location:admin.php');
               exit();
			  }
		   }
		   else
		   {
		    $_SESSION["error_del_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master";
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
			$_SESSION["error_del_sub"]=" there is something technical error in server try again or please contact web-master";
			 header('Location:admin.php');
            exit();
		 }
		  
			$sql="DELETE FROM subjects WHERE sem='$this->sem' AND name='$this->sub' AND dep='$this->dd'";
   			if($conn->query($sql)===TRUE)
	        {

		   	$_SESSION["error_del_sub"]="success";
			 header('Location:admin.php');
			 exit();
	        }
			else
			{
			  
		   	$_SESSION["error_del_sub"]="there is something technical error in server try again or please contact web-master";
			  header('Location:admin.php');
			  exit();
			}
  } 
		 
  
}  
if($_SERVER["REQUEST_METHOD"]=="POST")
  {
  
    $obj=new del_sub($_REQUEST["sem"],$_REQUEST["sub_name"],$_REQUEST["dep"]);
  
  }
 else
{
        
			$_SESSION["error_del_sub"]="you are trying to pass some non-acceptable data or there is something technical error in server try again or please contact web-master";
			 header('Location:admin.php');
            exit();
} 	
$obj->start_validation();		   
	  	   
?>
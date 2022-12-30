<?php 
session_start();

class login
{
  private $conn,$userid,$pass;
  
  function __construct($u,$p)
  {
    $this->userid=$u;
	$this->pass=$p;
  }
  public function check_login()
	  {
	    if(isset($_COOKIE["pro"]))
		{ 
		   header('Location:home.php');
		   exit();
		}
	    if(isset($_COOKIE["pro"]))
		{
		 $this->conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 if($this->conn->connect_error)
		 {
		  EXIT();
		 }
		  $cook=$_COOKIE["pro"];
		  $sql="select login_c from login where login_c='$cook'";
		  if($result=$this->conn->query($sql))
		   {
		      if($result->num_rows==1)
			  {
			     $row=$result->fetch_assoc();
				  {
				    if($row["login_c"]==$_COOKIE["pro"])
					 {
					   header('Location:home.php');
					   $this->conn->close();
					   exit();
					 }
				  }
			  }
		   }
         	  
		}
	
	  }  
  function check_data()
  {
    if($this->userid!=""&&$this->pass!=""&&strlen($this->userid)<40&&strlen($this->pass)>1&&strlen($this->pass)<16)
	{
	  
	    $this->check_login_with_database();
	  
	}
	else
	{
	 $_SESSION["login_tech"]="yes";
     header('Location:home.php');
     exit();
	}
  
  }
  function num()
  {
    $rd=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,25);
	$sql="select login_c from login";
    $ngp=$this->conn->query($sql);
	while($data=$ngp->fetch_assoc())
	{
		if($data["login"]==$rd)
	    {
		  $this->num();
		  break;
	    }
		    
	}
    return $rd;
  }
  function check_login_with_database()
  {
    $this->conn=new mysqli("mysql","tempuserss","saxud3ssssldnbsdfsdf","college");
		 
    if($this->conn->connect_error)
	{
	 $_SESSION["login_tech"]="yes";
	}
    $sql="select user_id,password from users where user_id='$this->userid'";
	
	$ngp=$this->conn->query($sql);
	
	if($ngp->num_rows==1)
	{
	  $data=$ngp->fetch_assoc();
	  if($data["password"]==$this->pass)
	   {
	      
	      $rd_un=$this->num();
	      $sql="insert into login(login_c,user_id) values('$rd_un','$this->userid')";
	      if($this->conn->query($sql))
	      {
		    setcookie("pro",$rd_un,time()+84000*30*12,"/");
			if($this->userid==="admin123")
			{
			  header('Location:admin.php?wlc=4');
			  exit();
			}
			else
			{
			  header('Location:teachers.php?wlc=4');
			  exit();
			}
		  }
		  else
		  {
		    $_SESSION["login_tech"]="yes";
            header('Location:home.php');
			exit(); 
		  
		  }
	   }
	   else
	   {
	      $_SESSION["login_tech"]="yes";
          header('Location:home.php');
		
          exit(); 
	   }
	}
	else
	{
	  $_SESSION["login_tech"]="yes";
      header('Location:home.php');
      exit(); 
	  
	}
  
  
  }
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 if(isset($_POST["username"])&&isset($_POST["pass"]))
 {
  $ngs=new login($_POST["username"],$_POST["pass"]);
  $ngs->check_login();
  $ngs->check_data();
  }
else
 {
   header('Location:home.php');
   exit();
 }
}
ELSE
{
 header('Location:home.php');
 exit();
}
?>
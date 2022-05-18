<?php
    include 'config.php';
session_start();
error_reporting(0);
    if(isset($_POST['signin']))
	{
		if($_POST["type"]=="1")
		{
        $sql = "select * from grievant where email='".$_POST["email"]."' and password='".$_POST["password"]."'";
        
		$result= $conn->query($sql);
        
if ($result->num_rows > 0)

  {
	   while($row = mysqli_fetch_assoc($result)) 
	   {
	   $_SESSION["studid"] = $row['id'];
       $_SESSION["studname"] = $row['name'];
	     $_SESSION["gtype"]=$row['gtype'];
	   }
 header("Location:grievance.php"); 
 
    }
	else
	{
	 header("Location:login.php?check=1"); 	
    }
		}
    if($_POST["type"]=="2")
		{
			
          $sql = "select * from grievant where gtype='staff' and email='".$_POST["staffemail"]."' and password='".$_POST["staffpwd"]."'";
        
		$result= $conn->query($sql);
        
if ($result->num_rows > 0)

  {
	   while($row = mysqli_fetch_assoc($result)) 
	   {
	   $_SESSION["staffid"] = $row['id'];
       $_SESSION["staffname"] = $row['name'];
	   $_SESSION["gtype"]=$row['gtype'];
	   echo $_SESSION["staffid"];
	   echo $_SESSION["staffname"];
	   echo $_SESSION["gtype"];
	   }
 header("Location:grievance.php"); 
 
    }
	else
	{
	 header("Location:login.php?check=1"); 	
    }

  }

    }

    ?>
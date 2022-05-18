
	<?php
    include 'config.php';
	   session_start();
    error_reporting(0);
	if(isset($_POST['register']))
	{
		if($_POST["type"]=="1")
		{
        $sql = "INSERT INTO grievant (name,session,department,year,position_held,email,phone_no,admissionnum,password,gtype)
        VALUES ('".$_POST["name"]."','".$_POST["session"]."','".$_POST["department"]."','".$_POST["year"]."','','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["admissionnum"]."','".$_POST["password"]."','student')";
		
    //    print_r($conn->($sql));die;
if (mysqli_query($conn,$sql) === TRUE)

  {
 header("Location: index.php?submit=1"); 
 
    }
	else
	{
	echo "<script>alert('not inserted')</script>";
	
	 header("Location:index.php?register=1"); 
	}
	
	
    }
    if($_POST["type"]=="2")
		{
	$sql = "INSERT INTO grievant (name,session,department,year,position_held,email,phone_no,admissionnum,password,gtype)
        VALUES ('".$_POST["staffname"]."','','".$_POST["staffdepartment"]."','','".$_POST["position"]."','".$_POST["staffemail"]."','".$_POST["staffphone"]."','','".$_POST["staffpassword"]."','staff')";
		
        
if (mysqli_query($conn,$sql) === TRUE)

  {
 header("Location:index.php?submit=1"); 
 //header("Location: http://localhost/project/admin/login.php"); 
    }
	else
	{
	echo "<script>alert('not inserted')</script>";
	
	}

  }

  }

    
	if(isset($_POST['gsubmit']))
	{
		if($_POST["type"]=="1")
		{
   $sql ="insert into grievance (id,gid,gtype,subject,complaint,status,type,timestamp,reply,reply_timestamp,replier,fwdstatus,replystatus,fwdreply,fwdreplier,fwdreply_timestamp) 
   values ('".$_POST["studid"]."','".$_POST["gid"]."','".$_POST["gtype"]."' ,'".$_POST["subject"]."','".$_POST["description"]."',
          'open','student',now(),'','','','','open','','','')";   
		}
		else
		{
			$sql ="insert into grievance (id,gid,gtype,subject,complaint,status,type,timestamp,reply,reply_timestamp,replier,fwdstatus,replystatus,fwdreply,fwdreplier,fwdreply_timestamp) 
   values ('".$_POST["staffid"]."','".$_POST["gid"]."','".$_POST["gtype"]."' ,'".$_POST["subject"]."','".$_POST["description"]."',
          'open','staff',now(),'',now(),'',0,'open','','',now())";   
		}
			
		   if(mysqli_query($conn,$sql) === TRUE)

  {header("Location:grievance.php?gsubmit=1"); 
    
  }
  else
	  
	  {
	  echo "<script>alert('not inserted')</script>";
	  }
	  
	}

		if(isset($_POST['submitreply']))
	{
		echo $_POST["reply"];
		echo $_POST["studid"];
		echo $_POST["name"];
		echo $_POST["pos"];
		$current_date = date("Y-m-d");
			
		
		if ($_POST["pos"]==1)
		{
			$sql ="update grievance set  replystatus='close',fwdstatus='0', fwdreply='".$_POST["reply"]."' , fwdreplier='".$_POST["name"]."', fwdreply_timestamp=now() where id='".$_POST["studid"]."' and gid='".$_POST["gid"]."'";   
		}
		else
	
	{
		
        
		$sql ="update grievance set reply_timestamp=now(), reply='".$_POST["reply"]."' , status='close',replier='".$_POST["name"]."' where id='".$_POST["studid"]."' and gid='".$_POST["gid"]."'";   
	}	
		   if(mysqli_query($conn,$sql) === TRUE)

  {header("Location:complaint 1.php"); 
    
  }
	}




	if(isset($_POST['reply1']))
	{
		echo $_POST["reply"];
		echo $_POST["studid"];
		echo $_POST["name"];
		echo $_POST["pos"];
		$current_date = date("Y-m-d H:i:s");
			
		
		if ($_POST["pos"]==1)
		{
			$sql ="update grievance set  replystatus='close', fwdstatus='0', fwdreply='".$_POST["reply"]."' , fwdreplier='".$_POST["name"]."', fwdreply_timestamp=now() where id='".$_POST["studid"]."' and gid='".$_POST["gid"]."'";   
		}
		else
	
	{
		
        
		$sql ="update grievance set reply_timestamp=now(), reply='".$_POST["reply"]."' , status='close',replier='".$_POST["name"]."' where id='".$_POST["studid"]."' and gid='".$_POST["gid"]."'";   
	}	
		   if(mysqli_query($conn,$sql) === TRUE)

  {header("Location:complaint.php"); 
    
  }
	}




			if(isset($_POST['addmember']))
	{
		
	
   $sql ="INSERT INTO cellmember(name,designation,department,email,phoneno,password)
        VALUES ('".$_POST["name"]."','".$_POST["designation"]."','".$_POST["department"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["password"]."')";   
		
echo $sql;		  
		  if(mysqli_query($conn,$sql) === TRUE)

  {header("Location:addmember.php?addmember=1");
    
  }
	}
    ?>

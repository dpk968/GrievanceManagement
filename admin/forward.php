<?php include 'config.php';?>
<?php
error_reporting(0);
	if(isset($_POST['forward']))
	{
		$id=$_POST['id'];
	    $gid=$_POST['gid'];
		echo $id;
		echo $gid;
		
 $sql ="update grievance set fwdstatus='fwd' where id='".$_POST["id"]."' and gid='".$_POST["gid"]."'";   
		
		   if($conn->query($sql) === TRUE)

  {header("Location: complaint.php?fwd=1"); 
    
  }
	}
?>

<?php include 'config.php';?>
<?php
error_reporting(0);
	if(isset($_POST['delete']))
	{
		$id=$_POST['id'];
	    $gid=$_POST['gid'];
		
		
 $sql ="delete from cellmember where id='".$_POST["id"]."'";   
		
		   if($conn->query($sql) === TRUE)

  {header("Location: viewcellmembers.php"); 
    
  }
	}
?>
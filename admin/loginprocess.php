<?php
ob_start();
session_start();
error_reporting(0);

     if(isset($_POST["name"])) echo $_POST["name"]; 
    	 include 'config.php';

$name=0;
$pass=0;
if(isset($_POST["name"]))
$name=$_POST["name"];
if(isset($_POST["pass"]))
	echo $_POST["pass"];
//$pass=md5($_POST["pass"]);
$pass=$_POST["pass"];
//echo $name;
//echo $pass;
$sql = "SELECT * FROM user where name='$name' AND password='$pass' ";
$result = mysqli_query($conn,$sql);
echo "<br>";
if ($result->num_rows > 0)
{
	 while($row = mysqli_fetch_assoc($result))
	  {
	  	$_SESSION["id"] = $row["id"];
	  	$_SESSION["name"] = $row["name"];
	  	$_SESSION["password"] = $row["password"];
	  	$_SESSION["status"] = $row["status"];
	  	$_SESSION["position"] = $row["position"];
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. "password " . $row["password"]. "status " . $row["status"]. "position" . $row["position"]. "<br>";
       // print_r($_SESSION) ;
	   header("Location:index.php"); 
            
    }

   
}

else
{
	//echo 'in else';
	//echo $name;
	//echo $pass;
	$sql = "SELECT * FROM cellmember where email='$name' AND password='$pass' ";
	$result = mysqli_query($conn,$sql);
	if ($result->num_rows > 0)
    {
	 while($row = mysqli_fetch_assoc($result))
	  {
	  	$_SESSION["id"] = $row["id"];
	  	$_SESSION["name"] = $row["name"];
	  	$_SESSION["password"] = $row["password"];
	  	$_SESSION["department"] = $row["department"];
		$_SESSION["designation"]=$row["designation"];
			$_SESSION["status"] = 0;
	  	
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. "password " . $row["password"]. "status " . $row["status"]. "position" . $row["position"]. "<br>";
       // print_r($_SESSION) ;
	   header("Location:index1.php"); 
            
    }
	
		

   
}
	
	else
	{
	
	header("Location:login.php?invalid=1");
}
}
$conn->close();
?>
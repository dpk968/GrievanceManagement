<?php
	session_start();
    error_reporting(0);
	?>
<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!--external css-->
</head>

<body>
    <?php
	include('config.php');
        
        
	if ($_SESSION["gtype"]=="student")
	{	
	$studid=$_SESSION["studid"];
	}
	else
	{
	$staffid=$_SESSION["staffid"];
	}
    if ($_SESSION["gtype"]=="student")
	{	
	$sql="select * from grievance where id='$studid'";}
	else
	{
		$sql="select * from grievance where id='$staffid'";
	}
	
    $result = $conn->query($sql);
	 if ($result->num_rows > 0) 	
    {
    $row = mysqli_fetch_assoc($result);
         
	}    
        
    
        if(isset($_POST['upload']))
{
$imgfile=$_FILES["image"]["name"];
move_uploaded_file($_FILES["image"]["tmp_name"],"admin/img/".$imgfile);
$query=mysqli_query($conn,"update grievant set userImage='$imgfile' where id='".$_SESSION['staffid']."'");
if($query)
{
    $successmsg ="Profile photo Successfully !!";
 }
else
{
$errormsg="Profile photo not updated !!";
}
}
?>


    <div class="container register" height="100%" style="width:100%;height:100%;">
        <div class="row">
            <img height="100px" width="100px" style="border-radius:30%;float:left;margin-left:5%;" src="images/logo.jpeg">
            <h3><a href="logout.php" style="float:right;color:#fff;text-decoration:none;margin-right:2%;"><b> LOGOUT</b></a></h3>
            <h3><a href="<?php if($_SESSION['gtype']=='student'){echo 'profile.php';}else{echo 'profile1.php';}?>" style="float:right;color:#fff;text-decoration:none;margin-right:1%;"><b>BACK |</b></a></h3>
        </div>

        <div class="row">
            <div class="col-md-3 register-left">

                <p style="font-size:50px">Grievance Redreassal System</p>
            </div>
            <div class="col-md-9 register-right">






                <section id="main-content" style="margin-left:15%;">
                    <section class="wrapper">
                        <br>
                        <div style="text-align:center;" class="col-sm-8">
                            <?php 
                            $dev="select * from grievant where id='".$_SESSION['staffid']."'";
                            $resul = $conn->query($dev);
                            $row = mysqli_fetch_assoc($resul);
                            /*mysqli_query($conn,$dev);*/
                            $userphoto=$row['userImage'];
                            /*echo $userphoto;*/
if($userphoto==""):
?>
                            <img src="images/noimage.png" width="100px" height="100px" style="border-radius:50%;">

                            <?php else:?>
                            <img src="admin/img/<?php echo htmlentities($userphoto);?>" width="100px" height="100px" style="border-radius:50%;">

                            <?php endif;?>
                            <b>
                                <h2 style="color:#2B55C2;text-align:center;"><?php echo strtoupper($row['name']);?>'s profile</h2>
                            </b>
                        </div>
                        <?php if($successmsg)
                      {?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Well done!</b> <?php echo htmlentities($successmsg);?>
                        </div>
                        <?php }?>

                        <?php if($errormsg)
                      {?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Oh snap!</b> <?php echo htmlentities($errormsg);?>
                        </div>
                        <?php }?>

                        <div class="row">

                            <form class="my-5" method="post" enctype="multipart/form-data" style="float:right;width:60%;margin-right:35%;">

                                <label style="margin-right:70%;">Upload Image</label> <input type="file" name="image" class="form-control">
                                <br>

                                <input type="submit" name="upload" value="UPLOAD" class="btn btn-primary my-3" style="float:right;">
                            </form>
                        </div>





                    </section>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
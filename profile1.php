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

</head>

<body>
    <?php
	include 'config.php';
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
    while($row = mysqli_fetch_assoc($result)) 
         {}
	}
        
        if(isset($_POST['submit']))
{

$contactno=$_POST['phone'];

$query=mysqli_query($conn,"update grievant set phone_no='$contactno' where id='".$_SESSION['staffid']."'");
if($query)
{
$successmsg="Profile Successfully Updated !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
         
  
	?>
    <div class="container register" height="100%" style="width:100%;">
        <div class="row">
            <img height="100px" width="100px" style="border-radius:30%;float:left;margin-left:5%;" src="images/logo.jpeg">
            <h3><a href="logout.php" style="float:right;color:#fff;text-decoration:none;margin-right:2%;"><b> LOGOUT</b></a></h3>
            <h3><a href="grievance.php" style="float:right;color:#fff;text-decoration:none;margin-right:1%;"><b>BACK |</b></a></h3>
        </div>

        <div class="row">
            <div class="col-md-3 register-left">

                <p style="font-size:50px">Grievance Redreassal System</p>
            </div>
            <div class="col-md-9 register-right">


                <?php if($successmsg)
                      {?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Well done!</b> <?php echo htmlentities($successmsg);?>
                </div>
                <?php }

   else if($errormsg)
                      {?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Oh snap!</b> <?php echo htmlentities($errormsg);?>
                </div>
                <?php }?>


                <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div style="margin-left:50px;">
                        <a href="change_pass.php" style="text-align:center;float:right;"><button class="btn btn-primary">Change Password</button></a>
                        <form style="margin-top:7%; " method="post">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <?php 
                                $ret1=mysqli_query($conn,"select * FROM grievant where id='".$staffid."'");
                                while($row=mysqli_fetch_array($ret1))
{
?>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group" style="margin-left:40%;">

                                            <div class="col-sm-4">
                                                <?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
                                                <img src="images/noimage.png" width="100px" height="100px" style="border-radius:50%;">
                                                <a href="upload_image1.php">Change Photo</a>
                                                <?php else:?>
                                                <img src="admin/img/<?php echo htmlentities($userphoto);?>" width="100px" height="100px" style="border-radius:50%;">
                                                <a href="upload_image1.php">Change Photo</a>
                                                <?php endif;?>
                                            </div>

                                        </div>
                                    </td>

                                </tr>



                                <tr>
                                    <td colspan="2"><b>
                                            <h2 style="color:#2B55C2;text-align:center;"><?php echo strtoupper($row['name']);?>'s profile</h2>
                                        </b></td>

                                </tr>


                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr height="50">
                                    <td><b>Position Held:</b></td>
                                    <td><input type="text" value="<?php echo htmlentities($row['position_held']); ?>" name="session" style="border:none;cursor:not-allowed;" readonly></td>
                                </tr>
                                <tr height="50">
                                    <td><b>User Email:</b></td>
                                    <td><input type="text" value="<?php echo htmlentities($row['email']); ?>" style="border:none;cursor:not-allowed;" readonly></td>
                                </tr>


                                <tr height="50">
                                    <td><b>User Contact no:</b></td>
                                    <td><input type="text" value="<?php echo htmlentities($row['phone_no']); ?>" name="phone" style="border:none;background-color:#BBCAD9;"></td>
                                </tr>



                                <tr height="50">
                                    <td><b>Department:</b></td>
                                    <td><input type="text" value="<?php echo htmlentities($row['department']); ?>" style="border:none;cursor:not-allowed;" readonly></td>
                                </tr>

                                <tr height="50">
                                    <td><b>Type:</b></td>
                                    <td><input type="text" value="<?php echo htmlentities($row['gtype']); ?>" style="border:none;cursor:not-allowed;" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center;"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
                                </tr>



                                <?php } 

 
    ?>

                            </table>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>






</body>

</html>
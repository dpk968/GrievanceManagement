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
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.password.value == "") {
                alert("Current Password Filed is Empty !!");
                document.chngpwd.password.focus();
                return false;
            } else if (document.chngpwd.newpassword.value == "") {
                alert("New Password Filed is Empty !!");
                document.chngpwd.newpassword.focus();
                return false;
            } else if (document.chngpwd.confirmpassword.value == "") {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>

</head>

<body>
    <?php
session_start();
error_reporting(0);
include('config.php');
   if(isset($_POST['submit']))
{    
	if ($_SESSION["gtype"]=="student")
	{	
	   $studid=$_SESSION["studid"];
        $sql=mysqli_query($conn,"SELECT password FROM  grievant where password='".$_POST['password']."' && id='".$_SESSION['studid']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $conn=mysqli_query($conn,"update grievant  set password='".$_POST['newpassword']."'where id='".$_SESSION['studid']."'");
$successmsg="Password Changed Successfully !!";
}
else
{
$errormsg="Old Password not match !!";
}
}
	
	else
	{
	$staffid=$_SESSION["staffid"];
        $sql=mysqli_query($conn,"SELECT password FROM  grievant where password='".$_POST['password']."' && id='".$_SESSION['staffid']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $conn=mysqli_query($conn,"update grievant  set password='".$_POST['newpassword']."'where id='".$_SESSION['staffid']."'");
$successmsg="Password Changed Successfully !!";
}
else
{
$errormsg="Old Password not match !!";
}
}
        
	}
    
        

?>

    <div class="container register" style="width:100%;height:100%">
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





                <section id="container">

                    <section id="main-content">
                        <section class="wrapper">
                            <h2 style="color:#2B55C2;text-align:center;"><i class="fa fa-angle-right"></i> Change Password</h2>

                            <!-- BASIC FORM ELELEMNTS -->
                            <div class="row mt">
                                <div class="col-lg-12">
                                    <div class="form-panel">


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


                                        <form class="form-horizontal style-form" method="post" name="chngpwd" onSubmit="return valid();">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Current Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" required="required" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="newpassword" required="required" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="confirmpassword" required="required" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-10" style="padding-left:25% ">
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>



                        </section>
                        <! --/wrapper -->
                    </section><!-- /MAIN CONTENT -->
                </section>



            </div>
        </div>
    </div>






</body>

</html>
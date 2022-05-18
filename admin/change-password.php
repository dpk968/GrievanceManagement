<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['submit']))
{
$sql=mysqli_query($conn,"SELECT password FROM  cellmember where password='".$_POST['password']."' && id='".$_SESSION['id']."'");
    //email='".$_SESSION['email']."'"
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $conn=mysqli_query($conn,"update cellmember  set password='".$_POST['newpassword']."'where id='".$_SESSION['id']."'");
$successmsg="Password Changed Successfully !!";
}
else
{
$errormsg="Old Password not match !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Change Password</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
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

<body style="color:#3833B0">

    <section id="container">
        <?php include("header.php");?>
        <?php include("sidebar1.php");?>
        <section id="main-content" style="margin-left:15%;">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Change Password</h3>

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
                                        <button type="submit" style="float:right;" name="submit" class="btn btn-primary">Submit</button>
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

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom switch-->
    <script src="assets/js/bootstrap-switch.js"></script>

<script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
</body>

</html>
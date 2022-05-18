<?php
session_start();
error_reporting(0);
if(isset($_SESSION["name"],$_SESSION["password"]))
{?>
<?php include 'config.php';?>
<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
</head>

<body style="color:#3833B0;font-weight:bold;">
    <!--main content start-->
    <section id="main-content" style="margin-left:15%;">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <!--<i class="fa fa fa-bars">-->Add Grievance Cell Member
                    </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Add Grievance Cell Member</li>
                        <!-- <li><i class="fa fa-square-o"></i>Pages</li>-->
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <!-- page end-->
        </section>
    </section>

    <div class="row" style="margin-left:20%;">
        <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['addmember'])){echo 'display:block';}else{echo 'display:none';} ?>"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>New Cell Member has been added.<br>
            </strong>

        </div>
        <form class="col-md-12" action="insert.php" name="student_form" onsubmit="return(studentValidate());" method="post">
            <div class="col-md-11">


                <div class="form-group">
                    <label style="font-weight:bold;">Name:</label>
                    <input type="text" class="form-control" placeholder="Name *" name="name" value="" style="border-radius: 20px;">
                </div>
                <div class="form-group">
                    <label style="font-weight:bold;">Designation:</label>
                    <input type="text" class="form-control" placeholder="Designation *" name="designation" value="" style="border-radius: 20px;">
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">Department:</label>
                    <select class="form-control" placeholder="Department *" name="department" style="border-radius: 20px;">
                        <option value="0">Select Department</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="CE">CE</option>
                        <option value="EE">EE</option>
                        <option value="ME">ME</option>
                        <option value="MCA">MCA</option>
                        <option value="MBA">MBA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">Email:</label>
                    <input type="text" class="form-control" placeholder="Your Email *" value="" name="email" style="border-radius: 20px;">
                </div>
                <div class="form-group">
                    <label style="font-weight:bold;">Phone No:</label>
                    <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone Number *" value="" name="phone" style="border-radius: 20px;">

                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">Password:</label>
                    <input type="text" name="password" class="form-control" placeholder="Your password*" value="" name="password" style="border-radius: 20px;">

                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="type" value="1">
                </div>

                <input type="submit" class="btnRegister" style="width:15%;color:#fff;background-color:#3833B0;float:right;border-radius:45%;line-height:3em;" name="addmember" value="ADD">
            </div>


        </form>

    </div>
    <!--main content end-->
    <div class="text-right">
        <div class="credits">

        </div>
    </div>

    <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--custome script for all page-->
    <script src="js/scripts.js"></script>



</body>
<?php }
else
{
	header("Location:login.php");
}?>

</html>
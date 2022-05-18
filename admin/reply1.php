<?php
session_start();
if(isset($_SESSION["name"],$_SESSION["password"]))
{?>
<?php include 'config.php';?>
<?php include 'header.php';?>
<?php include 'sidebar1.php';?>
<?php
$sql = "SELECT * FROM grievance";
$result = mysqli_query($conn, $sql);
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
</head>

<body style="color:#3833B0">
    <!--main content start-->
    <section id="main-content" style="margin-left:15%;">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <!--<i class="fa fa fa-bars">-->Grievances
                    </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Grievances</li>
                        <!-- <li><i class="fa fa-square-o"></i>Pages</li>-->
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <?php
	if ($_POST['reply'] && $_POST['id']) {
  if ($_POST['reply'] == 'reply') {
    
	$id=$_POST['id'];
	$gid=$_POST['gid'];
	$pos=$_POST['pos'];
	
  }
}
?>
            <form method="post" action="insert.php">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label type="text" name="id"><strong>Grievant ID</strong></label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label type="text" name="id"><?php echo $id?></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label type="text" name="id"><strong>Grievance ID</strong></label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label type="text" name="id"><?php echo $gid?></label>
                        </div>
                    </div>
                </div>
                <div class="row col-lg-8">
                    <div class="form-group">
                        <textarea rows="5" cols="95" name="reply" class="form-control" placeholder="Post Reply *" style="border-radius: 20px;" required></textarea>
                    </div>

                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="studid" value="<?php echo $id;?>" />
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="gid" value="<?php echo $gid;?>" />
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="name" value="<?php echo $_SESSION["name"]?>" />
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="pos" value="<?php echo $pos;?>" />
                </div>

                <br>
                <br>
                <br><br><br><br>


                <input type="submit" name="reply1" value="submit" class="btnRegister" style="width:15%;color:#fff;background-color:#3833B0;margin-right:35%;float:right;border-radius:45%;line-height:3em;">

            </form>
            <!-- page end-->
        </section>
    </section>
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

    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>

</body>
<?php }
else
{
	header("Location:login.php");
}?>

</html>
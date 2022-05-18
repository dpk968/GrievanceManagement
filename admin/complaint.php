<?php
session_start();
error_reporting(0);
$position=0;
if(isset($_SESSION["name"],$_SESSION["password"]))
{?>
<?php include 'config.php';?>
<?php include 'header.php';?>
<?php include 'sidebar1.php';?>
<?php

if ($_SESSION["status"]==1)
{
    $sql = "SELECT * FROM grievance";
}
elseif($_SESSION['id']==10)
{
    $position=1;
    $sql = "SELECT * FROM grievance where fwdstatus='fwd' or type='staff'";	
}
else
{
     $department=$_SESSION["department"];
     $sql = "SELECT * FROM grievance where id in(SELECT id FROM grievant where department='".$department."') and type='student'";	
}
$result = mysqli_query($conn, $sql);
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
</head>

<body style="color:#3833B0">
    <!--main content start-->
    <section style="margin-left:15%;" id="main-content">
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
            <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['fwd'])){echo 'display:block';}else{echo 'display:none';} ?>">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Grievance request has been forwarded to higher authority.<br>
                </strong>

            </div>
            <div class="wrapper">
                <div class="container">
                    <div class="row">

                        <div class="span9">
                            <div class="content">

                                <div class="module">

                                    <div class="module-body table">
                                        <table id="table1" class="display" align="center" border="1">
                                            <thead>
                                                <tr>
                                                    <th>Grievance No</th>
                                                    <th> Subject</th>
                                                    <th>Reg Date</th>
                                                    <th>Action</th>

                                                    <?php if($position==1)
											{?>

                                                    <th>Forward By</th>
                                                    <th>Prev Reply</th>
                                                    <?php }
											else {?>
                                                    <th>Status</th>
                                                    <th>Forward</th>
                                                    <?php }?>
                                                    <th>Reply</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
 $department=$_SESSION['department'];
 if($position==1)
 {
  $query=mysqli_query($conn,"SELECT * FROM grievance where fwdstatus='fwd' or type='staff'");   
 }
 else
 {
$query=mysqli_query($conn,"SELECT * FROM grievance where id in(SELECT id FROM grievant where department='".$department."') and type='student'");
 }
while($row=mysqli_fetch_array($query))
{
    
?>
                                                <tr>
                                                    <td><?php echo htmlentities($row['gid']);?></td>
                                                    <td><?php echo htmlentities($row['subject']);?></td>
                                                    <td><?php echo htmlentities($row['timestamp']);?></td>
                                                    <td> <a href="view.php?gid=<?php echo htmlentities($row['gid']);?>"> View Details</a> </td>

                                                    <?php if ($position==1)
		                                                  {?>
                                                    <td><?php echo $row['replier']; ?></td>
                                                    <td><?php echo $row['reply']; ?></td>
                                                    <?php }
                                                    else{?>
                                                    <td><?php echo htmlentities($row['status']);?></td>
                                                    <td>
                                                        <form method="post" action="forward.php">
                                                            <input type="submit" name="forward" value="forward" class="btnRegister">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                            <input type="hidden" name="gid" value="<?php echo $row['gid']; ?>" />
                                                        </form>
                                                    </td>
                                                    <?php }
                                                    ?>

                                                    <td>
                                                        <form method="post" action="reply1.php">
                                                            <input type="submit" name="reply" value="reply" class="btnRegister">

                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                            <input type="hidden" name="gid" value="<?php echo $row['gid']; ?>" />
                                                            <?php if ($position==1)
		 {?>
                                                            <input type="hidden" name="pos" value="<?php echo $position; ?>" />
                                                            <?php }
else{	   ?>
                                                            <input type="hidden" name="pos" value="0" />
                                                            <?php }?>
                                                        </form>
                                                    </td>



                                                </tr>


                                                <?php }
     
     ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->


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
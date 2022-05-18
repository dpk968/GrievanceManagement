<?php
session_start();
error_reporting(0);
if(isset($_SESSION["name"],$_SESSION["password"]))
{?>
<?php include 'config.php';?>
<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
$sql = "SELECT * FROM cellmember";
$result = mysqli_query($conn, $sql);
?>
<html>
<head>
    <link href="http://localhost:8080/project/style.css" rel="stylesheet">
</head>

<body style="color:#3833B0">
    <!--main content start-->
    <section style="margin-left:15%;" id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <!--<i class="fa fa fa-bars">-->View Grevience Cell Member
                    </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>View Grevience Cell Member</li>
                        <!-- <li><i class="fa fa-square-o"></i>Pages</li>-->
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <table id="table1" class="display" align="center" border="1">
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>

                        <th>email</th>
                        <th>phone_no</th>
                        <th>Delete</th>
                        <!-- <th>Type</th>-->
                        <!--<th>Timestamp</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
    if ($result->num_rows > 0) 
    {
    // output data of each row
         while($row = mysqli_fetch_assoc($result)) 
         {?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['designation']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['email']; ?></td>


                        <td><?php echo $row['phoneno']; ?></td>

                        <td>
                            <form method="post" action="delete.php">
                                <input type="submit" name="delete" value="Delete" class="btnRegister">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <input type="hidden" name="gid" value="<?php echo $row['gid']; ?>" />
                            </form>
                        </td>
                    </tr>


                    <?php }
    } 
     ?>
                </tbody>
            </table>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <div class="text-right">
        <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
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
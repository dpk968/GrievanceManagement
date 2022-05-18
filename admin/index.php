<?php
session_start();
error_reporting(0);
if(isset($_SESSION["name"],$_SESSION["password"]))
{?>
<?php include 'header.php'?>
    <!--header end-->
<?php include'sidebar.php'?>
<html>
    <body >
    <!--main content start         style="background:linear-gradient(to right, #3833B0 0%,#01C5FF 100%);color:#fff;"-->
   
    <section id="main-content" style="margin-left:15%;">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header" style="color:#3833B0;"><i class="fa fa-laptop" style="color:#3833B0;"></i> Dashboard</h3>
            <ol class="breadcrumb" style="color:#3833B0;">
              <li><i class="fa fa-home" style="color:#3833B0;"></i><a href="index.php" style="color:#3833B0;">Home</a></li>
              <li><i class="fa fa-laptop" style="color:#3833B0;"></i>Dashboard</li>
            </ol>
          </div>
        </div>
        <center>
        <h1 style="color:#3833B0;"> Welcome To Admin Dashboard</h1>
</center>
        </section>
       
            </section> 
        <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    </body>
<?php }
else
{
  header("Location:login.php");
}?>

</html>

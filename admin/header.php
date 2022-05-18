<?php
    //check if the get variable exists
include('config.php');
error_reporting(0);
    if (isset($_GET['logout']))
    {
        print_r("successfully logged out!");
        logout();
  }
?>
<?php function logout()
{
  
  session_destroy();
  header("Location:login.php?loggedout=1");
  
}
  ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin | Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

</head>

<body>

    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->

        <header class="header dark-bg" style="background:#1B81DB;">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="#" class="logo" style="color:#000">Admin <span style="color:#fff" ;>Panel</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <?php 
                                if($_SESSION['name']=='admin')
                                {
                                    $dev="select * from user where id='".$_SESSION['id']."'";
                                }
                                else{
                            $dev="select * from cellmember where id='".$_SESSION['id']."'";
                                }
                            $resul = $conn->query($dev);
                                //mysqli_query($conn,$dev)
                            $row = mysqli_fetch_assoc($resul);
                            $userphoto=$row['memberImage'];
                           ?>
                                <img alt="" height="40px" width="40px" src="img/<?php echo htmlentities($userphoto);?>" >
                            </span>
                            <span class="username" style="color:#fff;"><?php echo strtoupper($_SESSION["name"]);?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="?logout=1"><i class="icon_key_alt"></i> Log Out</a>
                            </li>


                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>

            </div>
        </header>
        <!--header end-->
    </section>
</body>

</html>
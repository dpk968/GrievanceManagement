<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login | Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    
</head>

<body class="login-img3-body">
    <div class="alert alert-success" style="<?php if(isset($_GET['loggedout'])){echo 'display:block;width:40%;margin-top:5%;margin-left:30%;margin-bottom:-10%;padding-left:10% ';}else{echo 'display:none';} ?>">
        <strong>Done!You logged out successfully!</strong>
    </div>
    <div class="alert alert-danger" style="<?php if(isset($_GET['invalid'])){echo 'display:block;width:40%;margin-top:5%;margin-left:30%;margin-bottom:-10%;padding-left:10% ';}else{echo 'display:none';} ?>">
        <strong>Oops!Invalid username or password!</strong>
    </div>


    <div class="container">

        <form class="login-form" action="loginprocess.php" method="post">
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" class="form-control" placeholder="Username" name="name" autofocus>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
              
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>-->
            </div>
        </form>
        <div class="text-right">
            <div class="credits">
                
            </div>
        </div>
    </div>


</body>

</html>
<?php
	session_start();
error_reporting(0);
	?>
<html lang="en">

<head>
    <link href="http://localhost/project/style.css" rel="stylesheet">
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
	
	if ($_POST['view'] && $_POST['gid']) 
     {
    
	$gid=$_POST['gid'];
	  }

    if ($_SESSION["gtype"]=="student")
	{	
	$sql="select * from grievance where id='$studid' and gid='$gid'";}
	else
	{
		$sql="select * from grievance where id='$staffid' and gid='$gid'";
	}
	$result = $conn->query($sql);
	 if ($result->num_rows > 0) 	
    {
    // output data of each row
         while($row = mysqli_fetch_assoc($result)) 
         {
			 $gid=$row['gid'];
         $gtype=$row['gtype']; 
         $subject=$row['subject']; 
          $description=$row['complaint'];
		  $reply=$row['reply'];
		  $replier=$row['replier'];
		  $fwdreply=$row['fwdreply'];
		  $fwdreplier=$row['fwdreplier'];
		  $fwdstatus=$row['fwdstatus'];
		 }
	}
         
  
	?>
    <div class="container register" height="100%" style="width:100%;">
        <div class="row">
            <img height="100px" width="100px" style="border-radius:30%;float:left;margin-left:5%;" src="images/logo.jpeg">
            <h3><a href="logout.php" style="float:right;color:#fff;text-decoration:none;margin:right:2%;"><b>LOGOUT</b></a></h3>
        </div>

        <div class="row">
            <div class="col-md-3 register-left">

                <p style="font-size:50px">Grievance Redreassal System</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h2 class="register-heading" style="color:#2B55C2;">View Grievance</h2>
                        <div class="row register-form">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label type="text">Grievance ID</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label type="text"><?php echo $gid;?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label type="text">Grievance Type</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label type="text"><?php echo $gtype;?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label type="text">Grievance Subject</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label type="text"><?php echo $subject;?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label type="text">Grievance Description</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label type="text"><?php echo $description;?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5 align="center"><strong>Grievance Reply Status</strong></h5>
                                <?php if ($reply=='' && $replier=='' && $fwdreply=='' && $fwdreplier=='')
									  {?>
                                <h5 align="center">Your Grievance will be processed soon.</h5>
                                <?php }
									  else
									  { ?>
                                <table border="2" width="80%" height="10%" align="center">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Grievance Reply</th>
                                        <th>Reply By</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $reply;?></td>
                                        <td><?php echo $replier;?></td>
                                    </tr>
                                    <?php if ($fwdreply<>'' && $fwdreplier<>'')
									  {?>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo $fwdreply;?></td>
                                        <td><?php echo $fwdreplier;?></td>
                                    </tr>
                                    <?php }
									  else
									  {
										 if ($fwdstatus=='fwd') 
										 {?>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <h5 align="center">Your Grievance request has been forwarded to higher authority.</h5>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php
										 }										
											 
									  } ?>

                                </table>
                                <?php } ?>
                            </div>



                           


                            <h3><a href="grievance.php" style="text-decoration:none; color:#2B55C2;">Back</a></h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
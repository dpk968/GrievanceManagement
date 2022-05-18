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
        function studentValidate() {


            if (document.student_form.gtype.value == '0') {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please choose grievance type";
                return false;
            } else if (document.student_form.subject.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter grievance Subject";
                return false;
            } else if (document.student_form.description.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter grievance Details";
                return false;
            } else {
                document.getElementById("student_error").style.display = "none";
                return true;
            }
        }

        function staffValidate() {
            if (document.staff_form.staffname.value == "") {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please enter Name";

                return false;
            } else if (document.staff_form.staffemail.value == "") {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please Enter Email Address";
                return false;
            } else if (!document.staff_form.staffemail.value.match(reg)) {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please Enter Valid Email address";
                return false;
            } else if (document.staff_form.staffdepartment.value == "0") {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please Select Department";
                return false;
            } else if (document.staff_form.staffphone.value == "") {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please Enter Phone Number";
                return false;
            } else if (!document.staff_form.staffphone.value.match(phoneno)) {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please Enter Phone Number";
                return false;
            } else if (document.staff_form.staffposition.value == "") {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please Enter Position";
                return false;
            } else if (document.staff_form.staffdescription.value == "") {
                document.getElementById("staff_error").style.display = "block";
                document.getElementById("staff_error").innerHTML = "Please Enter Your Complaint";
                return false;
            } else {
                document.getElementById("staff_error").style.display = "none";
                return true;
            }
        }
    </script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <?php
//	session_start();
	include 'config.php';
	if ($_SESSION["gtype"]=='student')
	{
	$studid=$_SESSION["studid"];
	$sql="select * from grievance where id='$studid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
    {
		$sql1=("select max(gid) as max from grievance where id='$studid'");
		$result1 = $conn->query($sql1);
    // output data of each row
         while($row1 = mysqli_fetch_assoc($result1)) 
         {
			  $count=$row1['max']+1;
		 }
	}
	else
	{
    $count=$studid."11";
	}
	}
	else
	{
			$staffid=$_SESSION["staffid"];
	$sql="select * from grievance where id='$staffid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
    {
		$sql1=("select max(gid) as max from grievance where id='$staffid'");
		$result1 = $conn->query($sql1);
    // output data of each row
         while($row1 = mysqli_fetch_assoc($result1)) 
         {
			  $count=$row1['max']+1;
		 }
	}
	else
	{
    $count=$staffid."11";
	}
	}
	?>
    <div class="container register" style="width:100%;height:100%;">
        <div class="row">
            <img height="100px" width="100px" style="border-radius:30%;float:left;margin-left:5%;" src="images/logo.jpeg">
            <h3><a href="logout.php" style="float:right;color:#fff;text-decoration:none;margin-right:2%;"><b> | LOGOUT </b></a><a href="<?php if($_SESSION['gtype']=='student'){echo 'profile.php';}else{echo 'profile1.php';}?>" style="float:right;color:#fff;text-decoration:none;margin-right:2%;"><b>PROFILE</b></a></h3>
        </div>
        <div class="row">
            <div class="col-md-3 register-left">

                <p style="font-size:50px">Grievance Redreassal System</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" aria-expanded="true">PostGrievance</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" aria-expanded="false">MyGrievance</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <?php if ($_SESSION["gtype"]=='student')
								{ ?>
                    <h3 class="register-heading" style="color:#2B55C2;">Welcome <?php echo $_SESSION["studname"]; ?></h3>
                    <?php }
								else{ ?>
                    <h3 class="register-heading" style="color:#2B55C2">Welcome <?php echo $_SESSION["staffname"]; ?></h3>
                    <?php } ?>
                    <?php 
								//$gid=$_SESSION["studid"]."g".$count ;
								$gid=$count ;
								?>
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <h3 class="register-heading"><b>Post Your Grievance</b></h3>
                        <div class="row register-form">
                            <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['gsubmit'])){echo 'display:block';}else{echo 'display:none';} ?>"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Thanks!Your Grievance is Successfully submitted.Action will be taken soon.<br>
                                </strong>

                            </div>

                            <p id="student_error" style="color:red;display:none;"></p>
                            <form action="insert.php" name="student_form" onsubmit="return(studentValidate());" method="post">
                                <div class="col-md-10">
                                    <?php 
										  if ($_SESSION["gtype"]=="student")
										  
										  {?>
                                    <div class="form-group">
                                        <select name="gtype" class="form-control" value="" style="border-radius: 20px;" required>
                                            <option value="0">Choose Grievance Type</option>
                                            <option value="Issues about Fee related matter">Issues about Fee related matter</option>
                                            <option value="Issues about Faculty Performance or Faculty Behaviour">Issues about Faculty Performance or Faculty Behaviour</option>
                                            <option value="Issues regarding Discrimination or Harrasment">Issues regarding Discrimination or Harrasment</option>
                                            <option value="Issues regarding Schlorship">Issues regarding Schlorship</option>
                                            <option value="Issues about grades,Exam Procedures,Evaluation Process">Issues about grades,Exam Procedures,Evaluation Process</option>
                                            <option value="Issues about Academic Suspensions,Violation of rules">Issues about Academic Suspensions,Violation of rules</option>
                                            <option value="Issues about Attendance">Issues about Attendance</option>
                                        </select>
                                    </div>
                                    <?php } 
										  else
										  {
										  ?>
                                    <div class="form-group">
                                        <select name="gtype" class="form-control" value="" style="border-radius: 20px;" required>
                                            <option value="0">Choose Grievance Type</option>
                                            <option value="Issues about Work Load">Issues about Work Load</option>
                                            <option value="Issues about Maintenance of Department">Issues about Maintenance of Department</option>
                                            <option value="Issues regarding Discrimination or Harrasment">Issues regarding Discrimination or Harrasment</option>
                                            <option value="Issues regarding Salary">Issues regarding Salary</option>
                                            <option value="Issues about Promotions">Issues about Promotions</option>

                                        </select>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject*" value="" style="border-radius: 20px;" required>

                                    </div>
                                    <div class="form-group">
                                        <textarea rows="5" cols="95" name="description" value="" class="form-control" placeholder="Description *" style="border-radius: 20px;" required></textarea>
                                    </div>
                                    <?php 
										  if ($_SESSION["gtype"]=="student")
										  
										  {?>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="type" value="1">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="studid" value="<?php echo $_SESSION["studid"]?>">
                                    </div>
                                    <?php }
											else
											{ ?>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="type" value="2">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="staffid" value="<?php echo $_SESSION["staffid"]?>">
                                    </div>

                                    <?php } ?>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="gid" value="<?php echo $gid?>">
                                    </div>
                                </div>


                                <input type="submit" class="btnRegister" name="gsubmit" value="SUBMIT">
                            </form>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading"><b>My Grievance</b></h3>
                        <div class="row register-form">
                            <table class="table" align="center" border="1">
                                <thead>

                                    <tr>
                                        <th>Grievance Id</th>
                                        <th>Grievance Type</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
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
                                        <td><?php echo $row['gid']; ?></td>
                                        <td><?php echo $row['gtype']; ?></td>
                                        <td><?php echo $row['subject']; ?></td>

                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['timestamp'];?></td>
                                        <td>
                                            <form method="post" action="viewreply.php">
                                                <input type="submit" name="view" value="view" style="background-color:#0062CC;border-radius:30%;font-weight:bold;color:#fff;">
                                                <input type="hidden" name="gid" value="<?php echo $row['gid']; ?>" />
                                            </form>
                                        </td>
                                    </tr>


                                    <?php }
    } 
     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>



</body>

</html>
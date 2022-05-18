<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        function studentValidate() {

            if (document.student_form.email.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter Email Address";
                return false;
            } else if (!document.student_form.email.value.match(reg)) {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter Valid Email address";
                return false;


            } else if (document.student_form.password.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter Your Password";
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

</head>

<body>
    <div class="container register" style="width:100%;height:100%;">
        <div class="row">
            <img height="100px" width="100px" style="border-radius:30%;float:left;margin-left:5%;" src="images/logo.jpeg">
            <h2><a href="logout.php" style="float:right;color:#fff;text-decoration:none;margin-right:30%;"><b>Grievance Redreassal System</b></a></h2>
        </div>
        <div class="row">
            <div class="col-md-3 register-left">

            </div>
            <div class="col-md-9 register-right">
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" aria-expanded="true">Student</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" aria-expanded="false">Staff</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading" style="color:#2B55C2;"><b>Student Grievance Section</b></h3>
                        <div class="row register-form">
                            <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['check'])){echo 'display:block';}else{echo 'display:none';} ?>"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Please register first!!<br>
                                    If already registered, check your Username or Password
                                </strong>

                            </div>

                            <p id="student_error" style="color:red;display:none;"></p>
                            <form action="checklogin.php" name="student_form" onsubmit="return(studentValidate());" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Email *" value="" name="email" style="border-radius: 20px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Your password*" value="" name="password" style="border-radius: 20px;">

                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="type" value="1">
                                    </div>

                                </div>
                                <!--<div class="form-group">
                                            <textarea rows="5" cols="95" name="description" class="form-control" placeholder="Enter your problem here *" style="border-radius: 20px;"></textarea>
                                            </div>-->
                                <input type="submit" class="btnRegister" name="signin" value="SIGN-IN">

                            </form>
                            <input type="button" class="btnRegister" name="register" value="Register" onclick="window.location.href = 'index1.php';">
                        </div>
                    </div>
                    <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading" style="color:#2B55C2;"><b>Staff Grievance Section</b></h3>
                        <div class="row register-form">
                            <p id="staff_error" style="color:red;display:none;">**required some missing data </p>
                            <form action="checklogin.php" method="post" name="staff_form" onsubmit="return(staffValidate());">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your email *" name="staffemail" value="" style="border-radius: 20px;">
                                    </div>

                                </div>
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Your password *" value="" name="staffpwd" style="border-radius: 20px;">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="type" value="2">
                                    </div>

                                </div>

                                <input type="submit" class="btnRegister" name="signin" value="SIGN-IN">
                            </form>
                            <input type="button" class="btnRegister" name="register" value="Register" onclick="window.location.href = 'index1.php';">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>

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
        var phoneno = /^\d{10}$/;

        function studentValidate() {

            if (document.student_form.name.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please enter Name";
                return false;
            } else if (document.student_form.email.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter Email Address";
                return false;
            } else if (!document.student_form.email.value.match(reg)) {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter Valid Email address";
                return false;
            } else if (document.student_form.session.value == "0") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Select Session";
                return false;
            } else if (document.student_form.phone.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter Phone Number";
                return false;
            } else if (!document.student_form.phone.value.match(phoneno)) {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter Valid Phone Number";
                return false;
            } else if (document.student_form.department.value == "0") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Select Department";
                return false;
            } else if (document.student_form.admissionnum.value == "") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Enter University Roll Number";
                return false;
            } else if (document.student_form.year.value == "0") {
                document.getElementById("student_error").style.display = "block";
                document.getElementById("student_error").innerHTML = "Please Select Year";
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
    <!------ Include the above in your HEAD tag ---------->
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
                        <h3 class="register-heading" style="color:#2B55C2;font-weight:bold;">Student Register Section</h3>
                        <div class="row register-form">
                            <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['submit'])){echo 'display:block';}else{echo 'display:none';} ?>"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Thanks!Successfully Registered.<br>
                                    Your Username is registered email-id and password is registered password.
                                </strong>
                            </div>
                            <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['register'])){echo 'display:block';}else{echo 'display:none';} ?>"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Oops! Already Registered.<br>
                                    Please Sign-in. Your Username is registered email-id and password is registered password.
                                </strong>
                            </div>
                            <p id="student_error" style="color:red;display:none;"></p>
                            <form action="insert.php" name="student_form" onsubmit="return(studentValidate());" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name *" name="name" value="" style="border-radius: 20px;">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" placeholder="Session *" name="session" style="border-radius: 20px;">
                                            <option value="0">Select Session</option>
                                            <option value="2017-18">2017-18</option>
                                            <option value="2018-19">2018-19</option>
                                            <option value="2019-20">2019-20</option>
                                            <option value="2020-21">2020-21</option>
                                            <option value="2021-22">2021-22</option>
                                            <option value="2022-23">2022-23</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" placeholder="Department *" name="department" style="border-radius: 20px;">
                                            <option value="0">Select Department</option>
                                            <option value="CSE">CSE</option>
                                            <option value="ECE">ECE</option>
                                            <option value="CE">CE</option>
                                            <option value="EE">EE</option>
                                            <option value="ME">ME</option>
                                            <option value="MCA">MCA</option>
                                            <option value="MBA">MBA</option>
                                            <option value="Polytechnic">Polytechnic</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" placeholder="Year *" name="year" style="border-radius: 20px;">
                                            <option value="0">Select Year</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                                <select class="form-control" placeholder="type *" name="type" style="border-radius: 20px;" >
                                                 <option value="0">Select Type</option>
                                                <option value="student">Student</option>
                                                <option value="staff">Staff</option>
                                                 </select>                                                            
                                            </div>-->

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" style="border-radius: 20px;" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" name="phone" class="form-control" placeholder="Your Phone Number *" value="" name="phone" style="border-radius: 20px;">

                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="admissionnum" class="form-control" placeholder="Your University Roll Number *" value="" name="admissionnum" style="border-radius: 20px;">

                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="password" class="form-control" placeholder="Your password*" value="" name="password" style="border-radius: 20px;" required>

                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="type" value="1">
                                    </div>

                                </div>
                                <!--<div class="form-group">
                                            <textarea rows="5" cols="95" name="description" class="form-control" placeholder="Enter your problem here *" style="border-radius: 20px;"></textarea>
                                            </div>-->
                                <input type="submit" class="btnRegister" name="register" value="Register">
                            </form>
                            <a href="index.php"><strong>Go to Home Page</strong></a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading" style="color:#2B55C2;font-weight:bold;">Staff Register Section</h3>
                        <div class="row register-form">
                            <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['submit'])){echo 'display:block';}else{echo 'display:none';} ?>"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Thanks!Successfully Registered.<br>
                                    Your Username is registered email-id and password is registered password.
                                </strong>
                            </div>
                            <div class="alert alert-success alert-dismissible fade in" style="<?php if(isset($_GET['register'])){echo 'display:block';}else{echo 'display:none';} ?>"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Oops! Already Registered.<br>
                                    Please Sign-in. Your Username is registered email-id and password is registered password.
                                </strong>
                            </div>
                            <p id="staff_error" style="color:red;display:none;"></p>
                            <form action="insert.php" name="staff_form" onsubmit="return(staffValidate());" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name *" name="staffname" value="" style="border-radius: 20px;">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" placeholder="Position Held *" name="position" style="border-radius: 20px;">
                                            <option value="0">Select Position</option>
                                            <option value="HOD">HOD</option>
                                            <option value="Associate Professor">Associate Professor</option>
                                            <option value="Assistent Professor">Assistent Professor</option>
                                            <option value="Laboratory Technician">Laboratory Technician</option>
                                            <option value="Non Technical">Non Technical</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" placeholder="Department *" name="staffdepartment" style="border-radius: 20px;">
                                            <option value="0">Select Department</option>
                                            <option value="CSE">CSE</option>
                                            <option value="ECE">ECE</option>
                                            <option value="CE">CE</option>
                                            <option value="EE">EE</option>
                                            <option value="ME">ME</option>
                                            <option value="MCA">MCA</option>
                                            <option value="MBA">MBA</option>
                                            <option value="Polytechnic">Polytechnic</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" value="" name="staffemail" style="border-radius: 20px;" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" name="staffphone" class="form-control" placeholder="Your Phone Number *" value="" name="phone" style="border-radius: 20px;">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your password*" name="staffpassword" style="border-radius: 20px;" required>

                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="type" value="2">
                                    </div>
                                </div>
                                <input type="submit" class="btnRegister" name="register" value="Register">
                            </form>
                            <a href="index.php"><strong>Go to Home Page</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
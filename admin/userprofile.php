<?php
session_start();
error_reporting(0);
include('config.php');


 ?>
<script language="javascript" type="text/javascript">
    function f2() {
        window.close();
    }
    ser

    function f3() {
        window.print();
    }
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>User Profile</title>
    
</head>

<body>

    <div style="margin-left:50px;">
        <form name="updateticket" id="updateticket" method="post">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php 

$ret1=mysqli_query($conn,"select * FROM grievant where id='".$_GET['id']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

                <tr>
                    <td colspan="2"><b style="color:blue;text-align:center;"><?php echo strtoupper($row['name']);?>'s profile</b></td>

                </tr>


                <tr>
                    <td colspan="2">
                        <div style="text-align:center;" class="col-sm-8">
                            <?php 
                            $dev="select * from grievant where id='".$row['id']."'";
                            $resul = $conn->query($dev);
                            $row = mysqli_fetch_assoc($resul);
                            /*mysqli_query($conn,$dev);*/
                            $userphoto=$row['userImage'];
                            /*echo $userphoto;*/
if($userphoto==""):
?>
                            <img src="img/noimage.png" width="100px" height="100px" style="border-radius:50%;">

                            <?php else:?>
                            <img src="img/<?php echo htmlentities($userphoto);?>" width="100px" height="100px" style="border-radius:50%;">

                            <?php endif;?>

                        </div>
                    </td>

                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <?php 
    if($row['session']!="")
     {?>
                <tr height="50">
                    <td><b>Session:</b></td>
                    <td><?php echo htmlentities($row['session']); ?></td>
                </tr>
                <?php };?>
                <tr height="50">
                    <td><b>User Email:</b></td>
                    <td><?php echo htmlentities($row['email']); ?></td>
                </tr>


                <tr height="50">
                    <td><b>User Contact no:</b></td>
                    <td><?php echo htmlentities($row['phone_no']); ?></td>
                </tr>



                <tr height="50">
                    <td><b>Department:</b></td>
                    <td><?php echo htmlentities($row['department']); ?></td>
                </tr>


                <?php 
    if($row['year']!="")
     {?>
                <tr height="50">
                    <td><b>Year:</b></td>
                    <td><?php echo htmlentities($row['year']); ?></td>
                </tr>
                <?php };?>

                <?php 
    if($row['admissionnum']!="")
     {?>
                <tr height="50">
                    <td><b>Roll No:</b></td>
                    <td><?php echo htmlentities($row['admissionnum']); ?></td>
                </tr>
                <?php };?>

                <?php 
    if($row['position_held']!="")
     {?>
                <tr height="50">
                    <td><b>Position Held:</b></td>
                    <td><?php echo htmlentities($row['position_held']); ?></td>
                </tr>
                <?php };?>
                <tr height="50">
                    <td><b>Type:</b></td>
                    <td><?php echo htmlentities($row['gtype']); ?></td>
                </tr>




                <tr>

                    <td colspan="2">
                        <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;" />
                    </td>
                </tr>

                <?php } 

 
    ?>

            </table>
        </form>
    </div>

</body>

</html>
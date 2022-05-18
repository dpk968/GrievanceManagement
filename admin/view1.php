<?php
session_start();
error_reporting(0);
include('config.php');
include('header.php');
 include('sidebar.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Complaint Details</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>

</head>

<body>

    <div class="wrapper">
        <div class="container">
            <div class="row">

                <div class="span9">
                    <div class="content">




                        <div class="module" style="margin-left:8%;">
                            <div class="module-head">
                                <h1>Complaint Details</h1>
                            </div><br>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">

                                    <tbody>


                                        <?php 
$query=mysqli_query($conn,"select * from grievance where gid='".$_GET['gid']."'");
while($row=mysqli_fetch_array($query))
{

?>
                                        <tr>
                                            <td><b>Complaint Number</b></td>
                                            <td><?php echo htmlentities($row['gid']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Complainant Name</b></td>
                                            <td> <?php echo htmlentities($row['subject']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Reg Date</b></td>
                                            <td><?php echo htmlentities($row['timestamp']);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Reply</b></td>
                                            <td><?php echo htmlentities($row['reply']);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Replier</b></td>
                                            <td><?php echo htmlentities($row['replier']);?>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td><b>Complaint Details </b></td>

                                            <td colspan="5"> <?php echo htmlentities($row['complaint']);?></td>

                                        </tr>





                                        <tr>
                                            <td><b>Final Status</b></td>

                                            <td colspan="5"><?php if($row['status']=="")
											{ echo "Not Process Yet";
} else {
										 echo htmlentities($row['status']);
										 }?></td>

                                        </tr>

                                        <?php $ret=mysqli_query($conn,"select * from grievance where gid='".$_GET['gid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>



                                        <?php }?>





                                        <tr>

                                            <td colspan="4">
                                                <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?id=<?php echo htmlentities($row['id']);?>');" title="Update order">
                                                    <button type="button" class="btn btn-primary" style="float:right;">View User Detials</button></a>
                                            </td>

                                        </tr>
                                        <?php  } ?>

                                </table>
                            </div>
                        </div>



                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->


    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatable-1').dataTable();
            $('.dataTables_paginate').addClass("btn-group datatable-pagination");
            $('.dataTables_paginate > a').wrapInner('<span />');
            $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
            $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
        });
    </script>
</body>
<?php  ?>

</html>
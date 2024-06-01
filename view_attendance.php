<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
// Debug: Output the mentor ID stored in the session variable
//echo "Mentor ID from session: ".$_SESSION['id']."<br>";
if(isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $adn = "delete from attendance where id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('Data Deleted');</script>";
}

$mentor_id = $_SESSION['id']; // Assuming 'id' is the identifier for the mentor

$ret = "SELECT a.*, r.firstName, r.lastName, r.prnno, r.contactno, r.year, r.emailid 
        FROM attendance a 
        JOIN registration r ON a.prnno = r.prnno 
        JOIN userregistration u ON r.prnno = u.prnno 
        WHERE u.mentor_id = ?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $mentor_id);
$stmt->execute();
$res = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Meta tags and title -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Students Attendance</title>
    
    <!-- CSS stylesheets -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- JavaScript scripts -->
    <script language="javascript" type="text/javascript">
        var popUpWin=0;
        function popUpWindow(URLStr, left, top, width, height) {
            if(popUpWin) {
                if(!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
        }
    </script>
    <style>
        .custom-heading {
            margin-top: 60px; /* Adjust this value as needed to move the heading down */
        }
        
    </style>
</head>
<body>
<body>
    <?php include('mentor/header.php'); ?>
    <div class="ts-main-content">
        <?php include('mentor/mentor_sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title custom-heading">Mentee Attendance</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">All Mentee Details</div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Mentee Name</th>
                                            <th>PRN no</th>
                                            <th>Contact no</th>
                                            <th>Year</th>
                                            <th>Attendance</th>
                                            <th>Email</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Mentee Name</th>
                                            <th>PRN no</th>
                                            <th>Contact no</th>
                                            <th>Year</th>
                                            <th>Attendance</th>
                                            <th>Email</th>
                                           
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php

                                        $cnt = 1;
                                        while ($row = $res->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt;;?></td>
                                            <td><?php echo $row->firstName . ' ' . $row->lastName;?></td>
                                            <td><?php echo $row->prnno;?></td>
                                            <td><?php echo $row->contactno;?></td>
                                            <td><?php echo $row->year;?></td>
                                            <td><?php echo $row->attendance;?></td>
                                            <td><?php echo $row->emailid;?></td>
                                            <td>
                                                <!-- Add your action buttons here -->
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Print button placed at the bottom -->
    <div class="text-center no-print"  style="margin-left 20px;">
        <button class="btn btn-primary print-button" onclick="window.print()">Print Data</button>
    </div>
    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php
session_start();
//include('../../includes/config.php');
include('includes/config.php');

include('includes/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Manage Mentees</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container-fluid {
            margin-top: 30px;
        }

        .panel-heading {
            background-color: #3e454c;
            color: #fff;
        }

        .panel-body {
            background-color: #f8f9fa;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle !important;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <?php include('mentor/header.php'); ?>

    <div class="ts-main-content">
        <?php include('mentor/mentor_sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Manage Mentees</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">All Mentee Details</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Mentee Name</th>
                                                <th>Reg no</th>
                                                <th>Contact no</th>
                                                <th>Year</th>
                                                <th>Semister</th>
                                                <th>CGPA</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                         // Retrieve the logged-in mentor's ID
                                         $mentor_id = $_SESSION['id'];

                                         // Prepare the SQL query to retrieve mentee details associated with the mentor
                                         $query = "SELECT * FROM userregistration WHERE mentor_id = ?";
                                         $stmt = $mysqli->prepare($query);
                                         $stmt->bind_param('i', $mentor_id);
                                         $stmt->execute();
                                         $res = $stmt->get_result();
                                         $cnt = 1;
                                         while ($row = $res->fetch_object()) {
                                            // Fetch additional details from the registration table
                                            $reg_query = "SELECT * FROM registration WHERE prnno = ?";
                                            $stmt_reg = $mysqli->prepare($reg_query);
                                            $stmt_reg->bind_param('s', $row->prnno);
                                            $stmt_reg->execute();
                                            $res_reg = $stmt_reg->get_result();
                                            $row_reg = $res_reg->fetch_object();

                                            // Display mentee details
                                                ?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->firstName . ' ' . $row->middleName . ' ' . $row->lastName; ?></td>
                                                    <td><?php echo $row->prnno; ?></td>
                                                    <td><?php echo $row->contactNo; ?></td>
                                                    <td><?php echo isset($row_reg->year) ? $row_reg->year : ''; ?></td>
                                                    <td><?php echo isset($row_reg->sem) ? $row_reg->sem : ''; ?></td>
                                                    <td><?php echo isset($row_reg->cgpa) ? $row_reg->cgpa : ''; ?></td>
                                                    <!-- <td><?php echo $row->year; ?></td>
                                                    <td><?php echo $row->sem; ?></td>
                                                    <td><?php echo $row->cgpa; ?></td> -->
                                                    <!-- <td>
                                                        <a href="javascript:void(0);" onClick="popUpWindow('http://localhost/code/admin/full-profile.php?id=<?php echo $row->id; ?>');" title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
                                                        <a href="manage-students.php?del=<?php echo $row->id; ?>" title="Delete Record" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
                                                    </td> -->
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
<?php
// Check if session is set before starting it
if (!isset($_SESSION)) {
    session_start();
}
?><!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Mentor Details</title>
    <!-- CSS Styles -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Additional CSS Styles from mentor_mentee_matching -->
    <style>
        body {
            margin-top: 30px;
        }
        .mentor-details-title {
    margin-top: 60px;
}
        .container-fluid th,
        .container-fluid td {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Mentor Details Content -->
                        <?php
                       
                        include('includes/config.php');
                        include('includes/checklogin.php');
                        check_login();

                        if(isset($_SESSION['login'])) {
                            $mentee_id = $_SESSION['login'];

                            // Retrieve mentor details based on mentee's mentor ID
                            $query = "SELECT m.mentor_name, m.domain, m.year, m.divs, m.email
                                      FROM userregistration u
                                      INNER JOIN mentors m ON u.mentor_id = m.id
                                      WHERE u.email = ?";
                            
                            $stmt = $mysqli->prepare($query);
                            $stmt->bind_param('s', $mentee_id);
                            $stmt->execute();
                            $stmt->store_result();
                            
                            // Check if mentor details are found
                            if($stmt->num_rows > 0) {
                                $stmt->bind_result($mentor_name, $domain, $year, $divs, $email);
                                $stmt->fetch();
                                ?>
                                <h2  class="mentor-details-title">Mentor Details</h2>
                                <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Mentor Name</th>
                                            <th>Mentor Domain</th>
                                            <th>Year</th>
                                            <th>Division</th>
                                            <th>Email</th> <!-- New column for email -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $mentor_name; ?></td>
                                            <td><?php echo $domain; ?></td>
                                            <td><?php echo $year; ?></td>
                                            <td><?php echo $divs; ?></td>
                                            <td><?php echo $email; ?></td> <!-- Display mentor's email -->
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "No mentor details found.";
                            }

                            $stmt->close();
                        } else {
                            echo "User is not logged in.";
                        }
                        ?>
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

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Mentor-Mentee Allocations</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    body {
        margin-top: 30px;
    }

    .container-fluid th,
    .container-fluid td {
        text-align: center;
    }
</style>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Mentor-Mentee Allocations</h2>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">Assigned Mentors for the Mentees</div>
                            <div class="panel-body">
                                
                                <?php
                                // Include necessary files
                                include('includes/config.php');

                                // Retrieve mentor-mentee relationships along with domain information and the most recent assignment date
                                $query = "SELECT m.mentor_name AS mentor_name, u.firstname AS mentee_firstname, u.lastname AS mentee_lastname, u.domain AS domain, 
                                          MAX(ma.assigneddate) AS assignment_date
                                          FROM userregistration u 
                                          JOIN mentor_assignments ma ON u.id = ma.mentee_id 
                                          JOIN mentors m ON ma.mentor_id = m.id
                                          GROUP BY m.mentor_name, u.firstname, u.lastname, u.domain";
                                $result = $mysqli->query($query);

                                // Check if any relationships were found
                                if ($result->num_rows > 0) {
                                    // Display the relationships in a formatted table
                                    echo "<table class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>";
                                    echo "<thead><tr><th>Mentor Name</th><th>Mentee Name</th><th>Domain</th><th>Assignment Date</th></tr></thead>";
                                    echo "<tbody>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . ($row['mentor_name'] ?? '') . "</td>";
                                        echo "<td>" . ($row['mentee_firstname'] ?? '') . " " . ($row['mentee_lastname'] ?? '') . "</td>";
                                        echo "<td>" . ($row['domain'] ?? '') . "</td>";
                                        echo "<td>" . ($row['assignment_date'] ?? '') . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                } else {
                                    // No relationships found
                                    echo "No mentor-mentee relationships found.";
                                }

                                // Close the database connection
                                $mysqli->close();
                                ?>
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

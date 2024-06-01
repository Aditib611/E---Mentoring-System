<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();


?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>DashBoard</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <style>

    .my-profile-panel, .my-mentor-panel {
      /*  width: calc(50% - 0.75px); /* Adjust as needed */
        width:270px;
        margin-top: 50px;
       /* margin-right: 0px; /* Adjust as needed */
        display: inline-block;
    }
       /* Add custom styles here */
       .container-fluid {
        padding-left: 10px;  /* Adjust as needed */
        padding-right: 10px; /* Adjust as needed */
    }

    .content-wrapper {
        overflow-x: hidden; /* Hide horizontal overflow */
    }
</style>


</head>


<body>
    <?php include("includes/header.php");?>

    <div class="ts-main-content">
    <?php include("includes/sidebar.php");?>
    <div class="content-wrapper">
        <div class="container-fluid" >
            <div class="row">
            <div class="row">
    <div class="col-md-3">
        <div class="container">
            <div class="panel panel-default my-profile-panel">
                <div class="panel-body bk-primary text-light">
                    <div class="stat-panel text-center">
                        <div class="stat-panel-number h2">My Profile</div>
                    </div>
                </div>
                <a href="my-profile.php" class="block-anchor panel-footer">Update Profile <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="container">
            <div class="panel panel-default my-mentor-panel">
                <div class="panel-body bk-primary text-light">
                    <div class="stat-panel text-center">
                        <div class="stat-panel-number h2">My Mentor</div>
                    </div>
                </div>
                <a href="mentor_detail.php" class="block-anchor panel-footer">View Mentor <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="container">
            <div class="panel panel-default my-mentor-panel">
                <div class="panel-body bk-primary text-light">
                    <div class="stat-panel text-center">
                        <div class="stat-panel-number h2">Help</div>
                    </div>
                </div>
                <a href="help.php" class="block-anchor panel-footer">Add Query<i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="container">
            <div class="panel panel-default my-mentor-panel">
                <div class="panel-body bk-primary text-light">
                    <div class="stat-panel text-center">
                        <div class="stat-panel-number h2">My Details</div>
                    </div>
                </div>
                <a href="student-details.php" class="block-anchor panel-footer">Complete Details <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title"  style="margin-left: 10px;"> Event Posted</h2>
        <div class="table-responsive"  style="margin-left: 10px; margin-right: 10px;"> <!-- Adjust margins here -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Event Title</th>
                        <th>Event Description</th>
                        <th>Posted Date and Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $mysqli->prepare("SELECT event_name, event_disct, posted_datetime FROM event ORDER BY posted_datetime DESC");
                    $stmt->execute();
                    $stmt->bind_result($event_name, $event_description, $posted_datetime);

                    while ($stmt->fetch()) {
                        // Check if the event was posted within the last 24 hours
                        $recentTime = strtotime('-24 hours');
                        $postedTime = strtotime($posted_datetime);
                        $isRecentEvent = ($postedTime >= $recentTime);

                        // Apply custom CSS class for recent events
                        $cssClass = ($isRecentEvent) ? 'recent-event' : '';

                        echo "<tr class='$cssClass'>";
                        echo "<td>$event_name</td>";
                        echo "<td>$event_description</td>";
                        echo "<td>$posted_datetime</td>";
                        echo "</tr>";
                    }

                    $stmt->close();
                    $mysqli->close();
                    ?>
                </tbody>
            </table>
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

    <style>
        .recent-event {
            background-color: yellow;
        }
    </style>
</body>

</html>
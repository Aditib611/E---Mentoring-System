<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Verify if the session variable is set
if(isset($_SESSION['email'])) {
    // Get the logged-in mentee's email from the login process
    $mentee_email = $_SESSION['mentee_email'];

    // Fetch all details from the achievements table for the logged-in mentee
    $stmt = $mysqli->prepare("SELECT 'Achievements' as type, achiv_name as name, achiv_date as date, achiv_disc as description FROM achivements WHERE mentee_email = ? 
                              UNION ALL 
                              SELECT 'Course' as type, cour_name as name, cour_date as date, cour_disc as description FROM achivements WHERE mentee_email = ? 
                              UNION ALL 
                              SELECT 'Internship' as type, inter_name as name, inter_date as date, inter_disc as description FROM achivements WHERE mentee_email = ?");
    $stmt->bind_param('sss', $mentee_email, $mentee_email, $mentee_email);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Get the result
        $result = $stmt->get_result();
        
        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Process and display the data
            // Your code to display the achievements goes here
        } else {
            // No achievements found for this mentee
            echo "No achievements found for this mentee.";
        }
    } else {
        // Error executing the statement
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Session variable 'email' is not set
    echo "Session variable 'email' is not set.";
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Add your meta tags, title, and CSS links here -->
</head>
<body>
    <!-- Add your header and other HTML elements here -->
    <div class="ts-main-content">
        <!-- Add your sidebar and content wrapper here -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Your Achievements, Courses, and Internships</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <!-- Add more columns here if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= $row['type'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['date'] ?></td>
                                            <td><?= $row['description'] ?></td>
                                            <!-- Add more columns here if needed -->
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add your JavaScript files here -->
</body>
</html>


<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Mentee Achievements</title>
    <!-- CSS Styles -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Additional CSS Styles -->
    <style>
        body {
    margin-top: 30px;
}

.ts-main-content {
    margin-left: 0; /* Change to 0 to move the sidebar to the left */
}

.content-wrapper {
    padding: 20px;
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
                    <h2 class="page-title">Your Achievements, Courses, and Internships</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <!-- Add more columns here if needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $row['type'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['date'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <!-- Add more columns here if needed -->
                                    </tr>
                                <?php endwhile; ?>
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
</body>
</html>
<?php

<?php
session_start();
include('../includes/config.php');
include('../includes/checklogin.php');
check_login();

// Initialize variables for mentor and domain filters
$mentor_filter = '';
$domain_filter = '';

// Check if mentor filter is set
if (isset($_POST['mentor_filter'])) {
    $mentor_filter = $_POST['mentor_filter'];
}

// Check if domain filter is set
if (isset($_POST['domain_filter'])) {
    $domain_filter = $_POST['domain_filter'];
}

// SQL query to retrieve feedback responses based on filters
$query = "SELECT q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16
          FROM feedback";

// Add conditions based on mentor and domain filters
if (!empty($mentor_filter)) {
    $query .= " WHERE mentor = '$mentor_filter'";
    // If mentor is selected, update domain filter based on mentor
    $query_domains = "SELECT DISTINCT domain FROM feedback WHERE mentor = '$mentor_filter'";
    $result_domains = $mysqli->query($query_domains);
} elseif (!empty($domain_filter)) {
    $query .= " WHERE domain = '$domain_filter'";
}

$result = $mysqli->query($query);

// SQL query to retrieve mentor names for filtering
$query_mentors = "SELECT DISTINCT mentor FROM feedback";
$result_mentors = $mysqli->query($query_mentors);

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
    <title>View Feedback</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            margin-top: 30px;
        }

        .container-fluid th,
        .container-fluid td {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header and sidebar -->
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">View Feedback</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">Feedback Responses</div>
                            <div class="panel-body">
                              <!-- Form for mentor and domain filters -->
<form action="#" method="post">
    <label for="mentor_filter">Filter by Mentor:</label>
    <select name="mentor_filter" id="mentor_filter">
        <option value="">Select Mentor</option>
        <?php 
            // Query to fetch mentors from the mentors table
            $query_mentors = "SELECT mentor_name, domain FROM mentors";
            $result_mentors = $mysqli->query($query_mentors);

            // Display mentors as options in the dropdown
            while ($row = $result_mentors->fetch_assoc()): 
        ?>
            <option value="<?php echo $row['mentor_name']; ?>"><?php echo $row['mentor_name']; ?> - <?php echo $row['domain']; ?></option>
        <?php endwhile; ?>
    </select>
    
    <button type="submit">Apply Filter</button>
</form>

                                <!-- Display feedback responses -->
                                <?php if ($result->num_rows > 0): ?>
                                    <!-- Feedback table -->
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                   <!-- Question headings -->
                                                <th>Is the mentor accessible to you?</th>
                                                <th>Does the mentor communicate with you very often?</th>
                                                <th>Does the mentor listen to your personal problems?</th>
                                                <th>Does the mentor help you in finding solutions to your personal problems?</th>
                                                <th>Does the mentor inform you about various competitions, training programs, and placement activities?</th>
                                                <th>Does the mentor encourage you to participate in co-curricular and extra-curricular activities?</th>
                                                <th>Are the mentor meetings conducted regularly by the mentor?</th>
                                                <th>Are the mentor meetings interactive, and sufficient time is devoted to addressing the mentee related issues?</th>
                                                <th>Are the mentor meetings beneficial to you?</th>
                                                <th>Is the mentor available for guidance beyond regular mentor meetings?</th>
                                               
                                                <th>Is the institute's environment conducive for learning?</th>
                                                <th>Are the faculties knowledgeable and experienced?</th>
                                                <!-- <th>Are the faculties available and accessible to the students beyond regular class hours?</th> -->
                                                <!-- <th>Are the classes conducted regularly and as per the timetable?</th>
                                                <th>Are the classes interactive, and sufficient time is devoted to addressing the student's doubts?</th> -->
                                                <th>Are the teaching methodologies employed by the faculties effective and innovative?</th>
                                                <th>Is the institute well-equipped with modern infrastructure and facilities?</th>
                                                <!-- <th>Are the laboratories and library well-maintained and accessible to the students?</th>
                                                <th>Does the institute provide ample opportunities for overall personality development and co-curricular activities?</th> -->
                                                <th>Is the institute supportive in terms of placement and internship opportunities?</th>
                                                <th>How satisfied are you with your overall experience at the institute?</th>
                                                <!-- <th>Would you recommend the institute to others?</th> -->
                                               <!-- <th>Any suggestions or additional comments:</th>
                                                <th>Timestamp</th>-->

                                              

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <tr>
                                                 
                                                    <td><?php echo $row['q1']; ?></td>
                                                    <td><?php echo $row['q2']; ?></td>

                                                    <td><?php echo $row['q3']; ?></td>
                                                    <td><?php echo $row['q4']; ?></td>
                                                    <td><?php echo $row['q5']; ?></td>
                                                    <td><?php echo $row['q6']; ?></td>
                                                    <td><?php echo $row['q7']; ?></td>
                                                    <td><?php echo $row['q8']; ?></td>
                                                    <td><?php echo $row['q9']; ?></td>
                                                    <td><?php echo $row['q10']; ?></td>
                                                    <td><?php echo $row['q11']; ?></td>
                                                    <td><?php echo $row['q12']; ?></td>
                                                    <td><?php echo $row['q13']; ?></td>
                                                    <td><?php echo $row['q14']; ?></td>
                                                    <td><?php echo $row['q15']; ?></td>
                                                    <td><?php echo $row['q16']; ?></td>
                                                    <!-- <td><?php echo $row['q17']; ?></td>
                                                    <td><?php echo $row['q18']; ?></td>
                                                    <td><?php echo $row['q19']; ?></td>
                                                    <td><?php echo $row['q20']; ?></td>
                                                    <td><?php echo $row['q21']; ?></td>
                                                    <td><?php echo $row['q22']; ?></td> -->
                                                  <!-- <td><?php echo $row['comments']; ?></td>
                                                    <td><?php echo $row['timestamp']; ?></td>-->

                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p>No feedback data available.</p>
                                <?php endif; ?>

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

<?php
// Close the database connection
$mysqli->close();
?>



<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Establish the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mentoring";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    <title>Assigned Mentors</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>


    <script type="text/javascript" src="js/validation.min.js"></script>
</head>
<style>
    body
    {
        margin-top: 30px;
    }
</style>

<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Assigned Mentors</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <?php
                                        // Get all the mentors
                                        $mentors = array();
                                        $sql = "SELECT * FROM mentors";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $mentors[] = $row;
                                            }
                                            // Render the dropdown to select a mentor
                                            echo "<form action='' method='POST'>";
                                            echo "<label for='mentor'>Select Mentor:</label>";
                                            echo "<select  class='select2' name='mentor' id='mentor' onchange='this.form.submit()'>";
                                            echo "<option value=''>Select Mentor</option>";

                                            // Populate the dropdown options with mentor names
                                            foreach ($mentors as $mentor) {
                                                $mentor_name = $mentor["mentor_name"];
                                                echo "<option value='$mentor_name'>$mentor_name</option>";
                                            }

                                            echo "</select>";
                                            echo "</form>";
                                        }

                                        // Check if a mentor is selected
                                        if (isset($_POST['mentor']) && !empty($_POST['mentor'])) {
                                            $selected_mentor = $_POST['mentor'];

                                            // Find the selected mentor
                                            $selected_mentor_data = array();
                                            foreach ($mentors as $mentor) {
                                                if ($mentor["mentor_name"] === $selected_mentor) {
                                                    $selected_mentor_data = $mentor;
                                                    break;
                                                }
                                            }

                                            // Display the assigned students for the selected mentor
                                            echo "<h3>Assigned Students for Mentor $selected_mentor:</h3>";
                                            echo "<button onclick=\"printData('mentors', '$selected_mentor')\">Print Data</button>";
                                            echo "<table id='mentors' class='table table-striped' border='1'>";
                                            echo "<thead><tr><th>Sr. No.</th><th>Full Name</th><th>PRN No.</th><th>Year</th><th>emailid</th><th>contactno</th><th>Domain Name</th><th>Assigned Date</th></tr></thead>";
                                            echo "<tbody>";
                                            $i = 1;
$mentor_name = $selected_mentor_data["mentor_name"];
$sql = " SELECT u.*, r.year, r.emailid, r.contactno, m.assigneddate, u.domain AS mentor_domain,
CONCAT(u.firstName, ' ', u.middleName, ' ', u.lastName) AS full_name
FROM userregistration u 
JOIN mentor_assignments m ON u.id = m.mentee_id 
JOIN registration r ON u.prnno = r.prnno
WHERE u.mentor_id = (SELECT id FROM mentors WHERE mentor_name = '$mentor_name')";
$result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>".$i."</td>";
                                                    echo "<td>".$row["full_name"]."</td>";
                                                    echo "<td>".$row["prnno"]."</td>";
                                                    echo "<td>".$row["year"]."</td>";
                                                    echo "<td>".$row["emailid"]."</td>";
                                                    echo "<td>".$row["contactno"]."</td>";
                                                   // echo "<td>".$selected_mentor."</td>";
                                                    echo "<td>".$row["domain"]."</td>";
                                                    echo "<td>".$row["assigneddate"]."</td>";
                                                    echo "</tr>";
                                                    $i++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='8'>No students assigned to the selected mentor.</td></tr>";
                                            }
                                        } else {
                                            echo "<p>Select a mentor to view assigned students.</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>

    <!-- Move this script tag to the end -->
    <script>
      function printData(tableId, mentorName) {
        var printContents = document.getElementById(tableId).outerHTML;
        var originalContents = document.body.innerHTML;
        var updatedContents = "<h3>Assigned Students for Mentor " + mentorName + ":</h3>" + printContents;

        // Add footer
        updatedContents += "<footer style='text-align: center; margin-top: 20px;'>Designed and Developed by Group id 10</footer>";

        document.body.innerHTML = updatedContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>
    <script>
$(document).ready(function() {
    console.log("Document ready!");
    $('#mentor').select2();
});
</script>

</body>
</html>

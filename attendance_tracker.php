<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attendance'])) {
    $prnnoArray = $_POST['prnno'];
    $attendanceArray = $_POST['attendance'];
    $count = count($prnnoArray);

    // Loop through the submitted attendance data
    for ($i = 0; $i < $count; $i++) {
        // Check if the attendance value is not empty
        if (!empty($attendanceArray[$i])) {
            $prnno = $prnnoArray[$i];
            $attendance = $attendanceArray[$i];

            // Prepare and execute the SQL query to insert attendance data into the attendance table
            $query = "INSERT INTO attendance (prnno, attendance) VALUES (?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('ss', $prnno, $attendance); // Change 'is' to 'ss'
            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            }
        }
    }
    echo "<script>alert('Attendance updated successfully.');</script>";
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
    <title>Add Attendance</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 510 + ',height=' + 430 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>

</head>
<style>
    .container-fluid {
        margin-top: 35px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }
</style>

<body>
    <?php include('mentor/header.php'); ?>

    <div class="ts-main-content">
        <?php include('mentor/mentor_sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Add Attendance</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">All Mentee Details</div>
                            <form action="attendance_tracker.php" method="post">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>PRN No.</th>
                                            <th>Name</th>
                                            <th>Year</th>
                                            <th>Contact No.</th>
                                            <th>Email</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Retrieve the logged-in mentor's ID
                                        $mentor_id = $_SESSION['id'];

                                        // Prepare the SQL query to retrieve mentee details associated with the mentor
                                        $query = "SELECT r.prnno, CONCAT(r.firstName, ' ', r.lastName) AS name, r.year, r.contactno, r.emailid FROM registration r INNER JOIN userregistration u ON r.prnno = u.prnno WHERE u.mentor_id = ?";
                                        $stmt = $mysqli->prepare($query);
                                        $stmt->bind_param('i', $mentor_id);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                // Print a row for each Mentee with an input box for entering attendance
                                                echo "<tr>";
                                                echo "<td>" . $row['prnno'] . "<input type='hidden' name='prnno[]' value='" . $row['prnno'] . "'></td>";
                                                echo "<td>" . $row['name'] . "<input type='hidden' name='name[]' value='" . $row['name'] . "'></td>";
                                                echo "<td>" . $row['year'] . "<input type='hidden' name='year[]' value='" . $row['year'] . "'></td>";
                                                echo "<td>" . $row['contactno'] . "<input type='hidden' name='contactno[]' value='" . $row['contactno'] . "'></td>";
                                                echo "<td>" . $row['emailid'] . "<input type='hidden' name='email[]' value='" . $row['emailid'] . "'></td>";
                                                echo "<td><input type='text' name='attendance[]'></td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <input type="submit" value="Submit">
                            </form>
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
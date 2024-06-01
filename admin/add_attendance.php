<?php

session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the MySQL database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'sanjivani';
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the attendance data from the POST request
    $attendance = $_POST['attendance'];

    // Loop through each Mentee and update the attendance data
    foreach ($attendance as $index => $value) {
        $id = $index + 1; // The Mentee ID is the array index plus 1
        $attendanceValue = $value;
        $sql = "UPDATE attendance SET attendance = '$attendanceValue' WHERE id = '$id'";
        $conn->query($sql);
    }

    // Close the database connection
    $conn->close();

    // Redirect the user back to the attendance tracker page
    header('Location: attendance_tracker.php');
    exit();
}
?>

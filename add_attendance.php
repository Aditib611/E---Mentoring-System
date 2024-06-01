<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attendance'])) {
    // Connect to the database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'mentoring';
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement for inserting attendance data
    $stmt = $conn->prepare("INSERT INTO attendance (prnno, name, year, contactno, email, attendance) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $prnno, $name, $year, $contactno, $email, $attendance);

    // Loop through the submitted attendance data
    foreach ($_POST['attendance'] as $key => $attend) {
        // Get PRN No., name, year, contactno, and email from the form
        $prnno = $_POST['prnno'][$key] ?? '';
        $name = $_POST['name'][$key] ?? '';
        $year = $_POST['year'][$key] ?? '';
        $contactno = $_POST['contactno'][$key] ?? '';
        $email = $_POST['email'][$key] ?? '';

        // Check if the name value is not empty
        if (!empty($name)) {
            // Prepare and execute the SQL query to insert attendance data into the attendance table
            $query = "INSERT INTO attendance (prnno, name, year, contactno, email, attendance) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($query);
            $stmtInsert->bind_param('ssssss', $prnno, $name, $year, $contactno, $email, $attend);
            if (!$stmtInsert->execute()) {
                echo "Error: " . $stmtInsert->error;
            }
        } else {
            // Handle the case where the name value is empty
            echo "Error: Name cannot be empty.";
        }
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    echo "<script>alert('Attendance submitted successfully');</script>";
}
?>

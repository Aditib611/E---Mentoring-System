<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_POST['event_title']) && isset($_POST['event_description'])) {
    $eventTitle = $_POST['event_title'];
    $eventDescription = $_POST['event_description'];
    $postedDateTime = date("Y-m-d H:i:s"); // Get the current date and time

    // Prepare and execute the SQL statement to insert the event into the database
    $stmt = $mysqli->prepare("INSERT INTO event (event_name, event_disct, posted_datetime) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $eventTitle, $eventDescription, $postedDateTime);
    $stmt->execute();
    $stmt->close();

    // Redirect to the event_posted.php page with the event details
    header("Location: admin/event_posted.php?title=$eventTitle&description=$eventDescription&postedDateTime=$postedDateTime");
    exit();
}
?>

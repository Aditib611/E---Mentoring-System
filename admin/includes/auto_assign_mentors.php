<?php
// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files
include('includes/config.php');
//include('includes/checklogin.php');
//check_login(); // You can comment out this line if it's causing issues or not needed

// Define the maximum number of students per mentor
$max_students_per_mentor = 5;

// Retrieve all unassigned mentees
$query = "SELECT * FROM userregistration WHERE mentor_id IS NULL";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$res = $stmt->get_result();

// Iterate through unassigned mentees
while ($mentee_row = $res->fetch_assoc()) {
    // Get the domain of the mentee
    $domain = $mentee_row['domain'];

    // Retrieve mentors with matching domains and available slots
    $query = "SELECT * FROM mentors WHERE domain = ? AND assignedstudents < ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('si', $domain, $max_students_per_mentor);
    $stmt->execute();
    $mentor_res = $stmt->get_result();

    // Check if mentors with matching domains and available slots are found
    if ($mentor_res->num_rows > 0) {
        // Get the first available mentor
        $mentor_row = $mentor_res->fetch_assoc();
        
        // Assign the mentor to the mentee
        $mentor_id = $mentor_row['id'];
        $mentee_id = $mentee_row['id'];

        // Update the userregistration table to assign the mentor
        $update_query = "UPDATE userregistration SET mentor_id = ? WHERE id = ?";
        $update_stmt = $mysqli->prepare($update_query);
        $update_stmt->bind_param('ii', $mentor_id, $mentee_id);
        $update_stmt->execute();

        // Insert mentor assignment into mentor_assignments table
        $insert_assignment_query = "INSERT INTO mentor_assignments (mentee_id, mentor_id) VALUES (?, ?)";
        $insert_assignment_stmt = $mysqli->prepare($insert_assignment_query);
        $insert_assignment_stmt->bind_param('ii', $mentee_id, $mentor_id);
        $insert_assignment_stmt->execute();

        // Update the assignedstudents count for the mentor
        $assigned_students = $mentor_row['assignedstudents'] + 1;
        $update_mentor_query = "UPDATE mentors SET assignedstudents = ? WHERE id = ?";
        $update_mentor_stmt = $mysqli->prepare($update_mentor_query);
        $update_mentor_stmt->bind_param('ii', $assigned_students, $mentor_id);
        $update_mentor_stmt->execute();
    }
}

echo "Mentors assigned successfully.";

// // Retrieve mentor information for each mentee and display
// $res->data_seek(0); // Reset the result set pointer
// while ($mentee_row = $res->fetch_assoc()) {
//     // Retrieve mentor_id for the mentee
//     $mentee_id = $mentee_row['id'];
//     $mentor_query = "SELECT mentor_id FROM mentor_assignments WHERE mentee_id = ?";
//     $mentor_stmt = $mysqli->prepare($mentor_query);
//     $mentor_stmt->bind_param('i', $mentee_id);
//     $mentor_stmt->execute();
//     $mentor_result = $mentor_stmt->get_result();
//     $mentor_row = $mentor_result->fetch_assoc();
//     $mentor_id = $mentor_row['mentor_id'];

//     // Retrieve mentor information using mentor_id
//     $mentor_info_query = "SELECT * FROM mentors WHERE id = ?";
//     $mentor_info_stmt = $mysqli->prepare($mentor_info_query);
//     $mentor_info_stmt->bind_param('i', $mentor_id);
//     $mentor_info_stmt->execute();
//     $mentor_info_result = $mentor_info_stmt->get_result();
//     $mentor_info = $mentor_info_result->fetch_assoc();

//     // Display mentor information
//     echo "Mentee ID: " . $mentee_id . "<br>";
//     echo "Assigned Mentor: " . $mentor_info['mentor_name'] . "<br>";
//     //echo "Email: " . $mentor_info['mentor_email'] . "<br><br>";
//     // Add more fields as needed
// }

?>

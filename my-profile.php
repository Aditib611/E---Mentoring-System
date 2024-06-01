<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
$aid = $_SESSION['id'];

if (isset($_POST['update'])) {
    $prnno = $_POST['prnno'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contact'];
   // $domain = $_POST['domain'];// New domain field
    $udate = date('d-m-Y h:i:s', time());
    //$query = "UPDATE userRegistration SET prnno=?, firstName=?, middleName=?, lastName=?, gender=?, contactNo=?, updationDate=?, domain=? WHERE id=?";
    $query = "UPDATE userRegistration SET prnno=?, firstName=?, middleName=?, lastName=?, gender=?, contactNo=?, updationDate=? WHERE id=?";
    $stmt = $mysqli->prepare($query);
   // $stmt->bind_param('sssssissi', $prnno, $fname, $mname, $lname, $gender, $contactno, $udate, $domain, $aid);
   $stmt->bind_param('sssssisi', $prnno, $fname, $mname, $lname, $gender, $contactno, $udate, $aid);
    $stmt->execute();

    // Update values in the registration table
    $query_registration = "UPDATE registration SET prnno=?, firstName=?, middleName=?, lastName=?, gender=?, contactNo=?, updationDate=? WHERE id=?";
    //$query_registration = "UPDATE registration SET prnno=?, firstName=?, middleName=?, lastName=?, gender=?, contactNo=?, updationDate=?, domain=? WHERE id=?";
    $stmt_registration = $mysqli->prepare($query_registration);
   // $stmt_registration->bind_param('sssssissi', $prnno, $fname, $mname, $lname, $gender, $contactno, $udate, $domain, $aid);
   $stmt_registration->bind_param('sssssisi', $prnno, $fname, $mname, $lname, $gender, $contactno, $udate, $aid);
   $stmt_registration->execute();

// // Retrieve the previous domain and mentor ID of the mentee
// $query_prev_data = "SELECT domain, mentor_id FROM userregistration WHERE id = ?";
// $stmt_prev_data = $mysqli->prepare($query_prev_data);
// $stmt_prev_data->bind_param('i', $aid);
// $stmt_prev_data->execute();
// $result_prev_data = $stmt_prev_data->get_result();
// $row_prev_data = $result_prev_data->fetch_assoc();
// $prev_domain = $row_prev_data['domain'];
// $prev_mentor_id = $row_prev_data['mentor_id'];

// // Update the assigned students count for the previous mentor and domain
// if ($prev_domain != $domain && !empty($prev_domain) && !empty($prev_mentor_id)) {
//     $update_assigned_students_query = "UPDATE mentors SET assignedstudents = assignedstudents - 1 WHERE id = ? AND domain = ?";
//     $stmt_update_assigned_students = $mysqli->prepare($update_assigned_students_query);
//     $stmt_update_assigned_students->bind_param('is', $prev_mentor_id, $prev_domain);
//     $stmt_update_assigned_students->execute();
// }

// Include the script to auto assign mentors based on the new domain
//include('admin/includes/auto_assign_mentors.php');

// Retrieve the new mentor ID of the mentee
// $query_new_mentor = "SELECT mentor_id FROM userregistration WHERE id = ?";
// $stmt_new_mentor = $mysqli->prepare($query_new_mentor);
// $stmt_new_mentor->bind_param('i', $aid);
// $stmt_new_mentor->execute();
// $result_new_mentor = $stmt_new_mentor->get_result();
// $row_new_mentor = $result_new_mentor->fetch_assoc();
// $new_mentor_id = $row_new_mentor['mentor_id'];

// // If a new mentor is assigned, update the assigned students count for the new mentor and domain
// if ($new_mentor_id != $prev_mentor_id) {
//     $update_assigned_students_query = "UPDATE mentors SET assignedstudents = assignedstudents + 1 WHERE id = ? AND domain = ?";
//     $stmt_update_assigned_students = $mysqli->prepare($update_assigned_students_query);
//     $stmt_update_assigned_students->bind_param('is', $new_mentor_id, $domain);
//     $stmt_update_assigned_students->execute();
// }
// // Delete previous mentor-mentee assignments for the mentee
// $delete_previous_assignments_query = "DELETE FROM mentor_assignments WHERE mentee_id = ?";
// $stmt_delete_previous_assignments = $mysqli->prepare($delete_previous_assignments_query);
// $stmt_delete_previous_assignments->bind_param('i', $aid);
// $stmt_delete_previous_assignments->execute();

// // Insert mentor assignment into mentor_assignments table
// $insert_assignment_query = "INSERT INTO mentor_assignments (mentee_id, mentor_id, assigneddate) VALUES (?, ?, NOW())";
// $insert_assignment_stmt = $mysqli->prepare($insert_assignment_query);
// $insert_assignment_stmt->bind_param('ii', $aid, $new_mentor_id);
// $insert_assignment_stmt->execute();

// // Update the assignedstudents count for the new mentor
// $update_assigned_students_query = "UPDATE mentors SET assignedstudents = (SELECT COUNT(*) FROM mentor_assignments WHERE mentor_id = ?) WHERE id = ?";
// $stmt_update_assigned_students = $mysqli->prepare($update_assigned_students_query);
// $stmt_update_assigned_students->bind_param('ii', $new_mentor_id, $new_mentor_id);
// $stmt_update_assigned_students->execute();

echo "<script>alert('Profile updated successfully');</script>";
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
    <title>Profile Updation</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .custom-heading {
            margin-top: 60px; /* Adjust this value as needed to move the heading down */
        }
        .btn {
            font-size: 13px; /* Adjust the font size as needed */
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <?php
                $aid = $_SESSION['id'];
                $ret = "SELECT * FROM userregistration WHERE id=?";
                $stmt = $mysqli->prepare($ret);
                $stmt->bind_param('i', $aid);
                $stmt->execute();
                $res = $stmt->get_result();
                while ($row = $res->fetch_object()) {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-title custom-heading"><?php echo $row->firstName; ?>'s Profile </h2>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Last Updated On: &nbsp; <?php echo $row->updationDate; ?>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											<div class="form-group">
                                                    <label class="col-sm-2 control-label">Profile Image: </label>
                                                    <div class="col-sm-8">
                                                        <?php if (!empty($row->profileImage)) { ?>
                                                            <img src="<?php echo $row->profileImage; ?>" alt="Profile Image" style="max-width: 200px; max-height: 200px;">
                                                        <?php } else { ?>
                                                            <p>No profile image found.</p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Registration No : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prnno" id="prnno" class="form-control" required="required" value="<?php echo $row->prnno; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">First Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row->firstName; ?>" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Middle Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="mname" id="mname" class="form-control" value="<?php echo $row->middleName; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Last Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row->lastName; ?>" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Gender : </label>
                                                    <div class="col-sm-8">
                                                        <select name="gender" class="form-control" required="required">
                                                            <option value="<?php echo $row->gender; ?>"><?php echo $row->gender; ?></option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Contact No : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="contact" id="contact" class="form-control" maxlength="10" value="<?php echo $row->contactNo; ?>" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email id: </label>
                                                    <div class="col-sm-8">
                                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email; ?>" readonly>
                                                        <span id="user-availability-status" style="font-size:12px;"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
    <!-- <label class="col-sm-2 control-label">Domain:</label>
    <div class="col-sm-8">
        <select name="domain" id="domain" class="form-control" required>
            <option value="">Select Domain</option>
            <option value="Web Technology" <?php if ($row->domain == "Web Technology") echo "selected"; ?>>Web Technology</option>
            <option value="Machine Learning" <?php if ($row->domain == "Machine Learning") echo "selected"; ?>>Machine Learning</option>
            <option value="Cyber Security" <?php if ($row->domain == "Cyber Security") echo "selected"; ?>>Cyber Security</option>
            <option value="Software Development" <?php if ($row->domain == "Software Development") echo "selected"; ?>>Software Development</option>
            <option value="Software Testing" <?php if ($row->domain == "Software Testing") echo "selected"; ?>>Software Testing</option>
            <option value="Data Science" <?php if ($row->domain == "Data Science") echo "selected"; ?>>Data Science</option>
            <option value="Cloud Computing" <?php if ($row->domain == "Cloud Computing") echo "selected"; ?>>Cloud Computing</option>
            <option value="Blockchain Technology" <?php if ($row->domain == "Blockchain Technology") echo "selected"; ?>>Blockchain Technology</option>
            <option value="Artificial Intelligence" <?php if ($row->domain == "Artificial Intelligence") echo "selected"; ?>>Artificial Intelligence</option>
            <option value="Database Management" <?php if ($row->domain == "Database Management") echo "selected"; ?>>Database Management</option>
            <option value="Android Development" <?php if ($row->domain == "Android Development") echo "selected"; ?>>Android Development</option>
            <option value="" <?php if ($row->domain == "Internet Of Things") echo "selected"; ?>>Internet Of Things</option>
            <option value="Computer Networking" <?php if ($row->domain == "Computer Networking") echo "selected"; ?>>Computer Networking</option>
        </select>
    </div> -->
    <div class="form-group">
    <label class="col-sm-2 control-label">Domain:</label>
    <div class="col-sm-8">
        <input type="text" name="domain" id="domain" class="form-control" value="<?php echo $row->domain; ?>" readonly>
    </div>
</div>
</div>

    </div>
                                                

                                                <div class="col-sm-6 col-sm-offset-4">
                                                    <input type="submit" name="update" Value="Update Profile" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
</body>

</html>

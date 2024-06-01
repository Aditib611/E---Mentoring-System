<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Code for adding mentors
if(isset($_POST['submit'])) {
    $year = $_POST['year'];
    $mentorname = $_POST['mentor'];
    $divs = $_POST['div'];

    $sql = "SELECT mentor_name FROM mentors WHERE mentor_name = ?";
    $stmt1 = $conn->prepare($sql);
    $stmt1->bind_param('s', $mentorname);
    $stmt1->execute();
    $stmt1->store_result();
    $row_cnt = $stmt1->num_rows;

    if($row_cnt > 0) {
        echo "<script>alert('Mentor already exists');</script>";
    } else {
        $query = "INSERT INTO mentors (year, mentor_name, divs) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $year, $mentorname, $divs);
        $stmt->execute();
        echo "<script>alert('Mentor has been added successfully');</script>";
    }
}

// Code for assigning students to mentors
if(isset($_POST['assign_students'])) {
    $mentors = array();
    $students = array();

    // Fetch mentors from the mentors table
    $sql = "SELECT * FROM mentors";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mentors[] = $row;
        }
    }

    // Fetch students from the registration table
    $sql = "SELECT * FROM registration";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    // Assign 20 students to each mentor
    $mentor_count = count($mentors);
    $student_count = count($students);

    if ($mentor_count > 0 && $student_count > 0) {
        $assigned_student_count = 0;

        for ($i = 0; $i < $mentor_count; $i++) {
            $mentor_id = $mentors[$i]['mentor_id'];
            $mentor_name = $mentors[$i]['mentor_name'];

            for ($j = 0; $j < 20; $j++) {
                $student_index = ($i * 20 + $j) % $student_count;
                $student_id = $students[$student_index]['student_id'];
                $student_name = $students[$student_index]['student_name'];

                // Insert assigned Mentee data into assigned_students table
                $query = "INSERT INTO assigned_students (mentor_id, mentor_name, student_id, student_name) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('isss', $mentor_id, $mentor_name, $student_id, $student_name);
                $stmt->execute();

                $assigned_student_count++;
            }
        }

        echo "<script>alert('$assigned_student_count students have been assigned to mentors');</script>";
    }
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
    <title>Create Mentor</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Add a Mentor</div>
                                    <div class="panel-body">
                                        <!-- Add Mentor Form -->
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Assign Students to Mentors</div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal">
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <input class="btn btn-primary" type="submit" name="assign_students" value="Assign Students">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Print button placed at the bottom -->
    <div class="text-center no-print"  style="margin-left 20px;">
        <button class="btn btn-primary print-button" onclick="window.print()">Print Data</button>
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

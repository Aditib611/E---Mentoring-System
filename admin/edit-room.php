<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $year = $_POST['year'];
    $mentorname = $_POST['mentor'];
    $divs = $_POST['div'];
    $domain = $_POST['domain'];
    
    $query = "UPDATE mentors SET year=?, mentor_name=?, divs=?, domain=? WHERE id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssi', $year, $mentorname, $divs, $domain, $id);
    if($stmt->execute()) {
        echo "<script>alert('Mentor updated successfully');</script>";
        // Redirect to manage mentors dashboard
        echo "<script>window.location.href='manage-mentors.php';</script>";
    } else {
        echo "<script>alert('Failed to update mentor');</script>";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM mentors WHERE id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $year = $row['year'];
        $mentorname = $row['mentor_name'];
        $divs = $row['divs'];
        $domain = $row['domain'];
    } else {
        echo "<script>alert('Mentor not found');</script>";
        exit;
    }
} else {
    echo "<script>alert('Mentor ID not specified');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mentor</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title custom-heading">Edit Mentor</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit Mentor Details</div>
                            <div class="panel-body">
                                <form method="post" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Year:</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="year" required>
                                                <option value="">Select Year</option>
                                                <option value="FE" <?php if ($year == "FE") echo "selected"; ?>>First Year (FE)</option>
                                                <option value="SE" <?php if ($year == "SE") echo "selected"; ?>>Second Year (SE)</option>
                                                <option value="TE" <?php if ($year == "TE") echo "selected"; ?>>Third Year (TE)</option>
                                                <option value="BE" <?php if ($year == "BE") echo "selected"; ?>>Last Year (BE)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Mentor Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="mentor" value="<?php echo $mentorname; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Division</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="div" value="<?php echo $divs; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
    <label class="col-sm-2 control-label">Domain</label>
    <div class="col-sm-8">
        <select class="form-control" name="domain" required>
            <option value="">Select Domain</option>
            <option value="Career Planning and Progression"<?php if ($domain == "Career Planning and Progression") echo " selected"; ?>>Career Planning and Progression</option>
            <option value="Confidence Building"<?php if ($domain == "Confidence Building") echo " selected"; ?>>Confidence Building</option>
            <option value="Work-Life Balance"<?php if ($domain == "Work-Life Balance") echo " selected"; ?>>Work-Life Balance</option>
            <option value="Emotional Intelligence"<?php if ($domain == "Emotional Intelligence") echo " selected"; ?>>Emotional Intelligence</option>
            <option value="Business Planning"<?php if ($domain == "Business Planning") echo " selected"; ?>>Business Planning</option>
            <option value="Startup Guidance"<?php if ($domain == "Startup Guidance") echo " selected"; ?>>Startup Guidance</option>
            <option value="Team Building"<?php if ($domain == "Team Building") echo " selected"; ?>>Team Building</option>
            <option value="Innovation and Creativity"<?php if ($domain == "Innovation and Creativity") echo " selected"; ?>>Innovation and Creativity</option>
            <option value="Web Technology"<?php if ($domain == "Web Technology") echo " selected"; ?>>Web Technology</option>
            <option value="Machine Learning"<?php if ($domain == "Machine Learning") echo " selected"; ?>>Machine Learning</option>
            <option value="Cyber Security"<?php if ($domain == "Cyber Security") echo " selected"; ?>>Cyber Security</option>
            <option value="Software Development"<?php if ($domain == "Software Development") echo " selected"; ?>>Software Development</option>
            <option value="Software Testing"<?php if ($domain == "Software Testing") echo " selected"; ?>>Software Testing</option>
            <option value="Data Science"<?php if ($domain == "Data Science") echo " selected"; ?>>Data Science</option>
            <option value="Cloud Computing"<?php if ($domain == "Cloud Computing") echo " selected"; ?>>Cloud Computing</option>
            <option value="Blockchain Technology"<?php if ($domain == "Blockchain Technology") echo " selected"; ?>>Blockchain Technology</option>
            <option value="Artificial Intelligence"<?php if ($domain == "Artificial Intelligence") echo " selected"; ?>>Artificial Intelligence</option>
            <option value="Database Management"<?php if ($domain == "Database Management") echo " selected"; ?>>Database Management</option>
            <option value="Android Development"<?php if ($domain == "Android Development") echo " selected"; ?>>Android Development</option>
            <option value="Internet Of Things"<?php if ($domain == "Internet Of Things") echo " selected"; ?>>Internet Of Things</option>
            <option value="Computer Networking"<?php if ($domain == "Computer Networking") echo " selected"; ?>>Computer Networking</option>
        </select>
    </div>
</div>

                                    <div class="col-sm-8 col-sm-offset-2">
                                    <a href="manage-mentors.php" class="btn btn-default">Back</a>
                                        <input class="btn btn-primary" type="submit" name="update" value="Update Mentor">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
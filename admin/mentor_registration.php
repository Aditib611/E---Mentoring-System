<?php
session_start();
include('../includes/config.php'); // Adjust the path to point to the correct location of config.php
include('../includes/checklogin.php');
check_login();
//code for add courses
if(isset($_POST['submit'])){

$year=$_POST['year'];
$mentorname=$_POST['mentor'];
$email=$_POST['email'];
$password=$_POST['password'];
$divs=$_POST['div'];
$domain = $_POST['domain'];
$sql="SELECT mentor_name FROM mentors where mentor_name=?";
$stmt1 = $mysqli->prepare($sql);
$stmt1->bind_param('s',$mentorname);
$stmt1->execute();
$stmt1->store_result(); 
$row_cnt=$stmt1->num_rows;;
if($row_cnt>0)
{
echo"<script>alert('Mentor already exists');</script>";
}
else
{
$query="INSERT INTO mentors ( year,email, password, mentor_name, divs, domain) VALUES (?, ?, ?, ?, ? ,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssss',$year, $email, $password,$mentorname,$divs, $domain);
if($stmt->execute()) {
	// Mentor added successfully
	echo "<script>alert('Mentor has been added successfully');</script>";
	echo "<script>window.location.href='manage-mentors.php';</script>";
} else {
	// Error adding mentor
	echo "<script>alert('Error adding mentor: " . $mysqli->error . "');</script>";
}
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
					
						<h2 class="page-title custom-heading">Add a Mentor </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add a Mentor</div>
									<div class="panel-body">
									<?php if(isset($_POST['submit']))
{ ?>
<?php } ?>
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Select year  </label>
												<div class="col-sm-8">
												<Select name="year" class="form-control" required>
													<option value="">Select year</option>
													<option value="FY">First year</option>
													<option value="SY">Second year</option>
													<option value="TY">Third year</option>
													<option value="B-Tech">Last year</option>

												</Select>
											</div>
											</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">Email id: </label>
										<div class="col-sm-8">
										<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
										<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
										</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">Password: </label>
										<div class="col-sm-8">
										<input type="password" name="password" id="password"  class="form-control" required="required">
										</div>
										</div>


										<div class="form-group">
										<label class="col-sm-2 control-label">Mentor Name</label>
										<div class="col-sm-8">
										<input type="text" class="form-control" name="mentor" id="mentor" value="" required="required">
										</div>
										</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">division</label>
										<div class="col-sm-8">
										<input type="text" class="form-control" name="div" id="div" value="" required="required">
										</div>


										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Domain</label>
											<div class="col-sm-8">
												<select class="form-control" name="domain" id="domain" required="required">
													<option value="">Select Domain</option>
													<option value="Web Technology">Web Technology</option>
													<option value="Machine Learning">Machine Learning</option>
													<option value="Cyber Security">Cyber Security</option>
													<option value="Software Development">Software Development</option>
													<option value="Software Testing">Software Testing</option>
													<option value="Data Science">Data Science</option>
													<option value="Cloud Computing">Cloud Computing</option>
													<option value="Blockchain Technology">Blockchain Technology</option>
													<option value="Artificial Intelligence">Artificial Intelligence</option>
													<option value="Database Management">Database Management</option>
													<option value="Android Development">Android Development</option>
													<option value="Internet Of Things">Internet Of Things</option>
													<option value="Computer Networking">Computer Networking</option>
												</select>
											</div>
										</div>

										<div class="col-sm-8 col-sm-offset-2">
										<a href="manage-mentors.php" class="btn btn-default">Back</a>
										<input class="btn btn-primary" type="submit" name="submit" value="Create Mentor ">
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
</script>
</body>

</html>
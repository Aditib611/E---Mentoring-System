<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Fetch domain and mentor name for the logged-in user
$query = "SELECT u.domain, m.mentor_name 
FROM userregistration u 
INNER JOIN mentors m ON u.mentor_id = m.id 
WHERE u.id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $_SESSION['id']); // Use $_SESSION['id'] directly here
$stmt->execute();
$stmt->store_result();

// Initialize variables for domain and mentor name
$domain = "Unknown";
$mentor = "Unknown";

if ($stmt->num_rows > 0) {
    $stmt->bind_result($domain, $mentor);
    $stmt->fetch();
}
$stmt->close();

//code for registration
if(isset($_POST['submit'])) {
    // Retrieve mentee ID from session
    $mentee_id = $_SESSION['id'];

    // Retrieve form data
   // $q1 = $_POST['q1'];
 // Retrieve form data
$q1 = isset($_POST['q1']) ? $_POST['q1'] : '';
$q2 = isset($_POST['q2']) ? $_POST['q2'] : '';
$q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
$q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
$q5 = isset($_POST['q5']) ? $_POST['q5'] : '';
$q6 = isset($_POST['q6']) ? $_POST['q6'] : '';
$q7 = isset($_POST['q7']) ? $_POST['q7'] : '';
$q8 = isset($_POST['q8']) ? $_POST['q8'] : '';
$q9 = isset($_POST['q9']) ? $_POST['q9'] : '';
$q10 = isset($_POST['q10']) ? $_POST['q10'] : '';
$q11 = isset($_POST['q11']) ? $_POST['q11'] : '';
$q12 = isset($_POST['q12']) ? $_POST['q12'] : '';
$q13 = isset($_POST['q13']) ? $_POST['q13'] : '';
$q14 = isset($_POST['q14']) ? $_POST['q14'] : '';
$q15 = isset($_POST['q15']) ? $_POST['q15'] : '';
$q16 = isset($_POST['q16']) ? $_POST['q16'] : '';
// $q17 = isset($_POST['q17']) ? $_POST['q17'] : '';
// $q18 = isset($_POST['q18']) ? $_POST['q18'] : '';
// $q19 = isset($_POST['q19']) ? $_POST['q19'] : '';
// $q20 = isset($_POST['q20']) ? $_POST['q20'] : '';
// $q21 = isset($_POST['q21']) ? $_POST['q21'] : '';
// $q22 = isset($_POST['q22']) ? $_POST['q22'] : '';

// Retrieve comments from form data
$comments = isset($_POST['comments']) ? $_POST['comments'] : '';

// Get the current timestamp
$current_timestamp = date('Y-m-d H:i:s');

   // Insert feedback data into the database
$query = "INSERT INTO feedback (mentee_id, domain, mentor, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, comments, timestamp) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('issssssssssssssssssss', $mentee_id, $domain, $mentor, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, $q12, $q13, $q14, $q15, $q16, $comments, $current_timestamp);
if ($stmt->execute()) {
    echo "<script>alert('Feedback submitted successfully');</script>";
} else {
    echo "<script>alert('Error in submitting feedback');</script>";
}
$stmt->close();
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
	<title>Mentee Feedback</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
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
					
						<h2 class="page-title">Feedback</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										 <!-- Display domain and mentor name -->
										 <div class="form-group">
                                            <label for="domain">Domain:</label>
                                            <input type="text" class="form-control" id="domain" name="domain" value="<?php echo $domain; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="mentor">Mentor:</label>
                                            <input type="text" class="form-control" id="mentor" name="mentor" value="<?php echo $mentor; ?>" readonly>
                                        </div>
									<?php
    // Assuming you have already established a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mentoring";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Retrieve logged-in user's ID from the session
$loggedInUserId = $_SESSION['id'];

// Fetch logged-in user's details from the registration table
$sql = "SELECT firstName, lastName, prnno, emailid, domain, mentor FROM registration WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $loggedInUserId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $prnno = $row["prnno"];
    $emailid = $row["emailid"];
    $domain = $row["domain"];
    $mentor = $row["mentor"];

    // Combine first name and last name
    $studentName = $firstName . " " . $lastName;

    // Display logged-in user's details
    echo '<div class="alert alert-info" role="alert">';
    echo 'Mentee Name: ' . $studentName . '<br>';
    echo 'PRN No: ' . $prnno . '<br>';
    echo 'Email ID: ' . $emailid . '<br>';
    // echo 'Domain: ' . $domain . '<br>';
    // echo 'Mentor: ' . $mentor . '<br>';
    echo '</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">No Mentee details found!</div>';
}

$stmt->close();
$conn->close();
?>

										<form method="post">
	

											<div class="form-group">
												<label>Q1. Is the mentor accessible to you?</label><br>
												<input type="radio" name="q1" value="Very much accessible"> Very much accessible<br>
												<input type="radio" name="q1" value="Fairly accessible"> Fairly accessible<br>
												<input type="radio" name="q1" value="Rarely accessible"> Rarely accessible<br>
												<input type="radio" name="q1" value="Very rarely accessible"> Very rarely accessible
											</div>

											<div class="form-group">
												<label>Q2. Does the mentor communicate with you very often?</label><br>
												<input type="radio" name="q2" value="Communicates regularly"> Communicates regularly<br>
												<input type="radio" name="q2" value="Communicates when there are some important issues"> Communicates when there are some important issues<br>
												<input type="radio" name="q2" value="Communicates once in a while"> Communicates once in a while<br>
												<input type="radio" name="q2" value="Only forward messages"> Only forward messages
											</div>

											<div class="form-group">
												<label>Q3. Does the mentor listen to your personal problems?</label><br>
												<input type="radio" name="q3" value="Always ready to listen"> Always ready to listen<br>
												<input type="radio" name="q3" value="Listens on certain occasions"> Listens on certain occasions<br>
												<input type="radio" name="q3" value="Rarely listens"> Rarely listens<br>
												<input type="radio" name="q3" value="Does not listen at all"> Does not listen at all
											</div>

											<div class="form-group">
												<label>Q4. Does the mentor help you in finding solutions to your personal problems?</label><br>
												<input type="radio" name="q4" value="Always ready"> Always ready<br>
												<input type="radio" name="q4" value="Helps sometimes"> Helps sometimes<br>
												<input type="radio" name="q4" value="Rarely helps"> Rarely helps<br>
												<input type="radio" name="q4" value="Does not help"> Does not help
											</div>

											<div class="form-group">
												<label>Q5. Does the mentor inform you about various competitions, training programs, and placement activities?</label><br>
												<input type="radio" name="q5" value="Regularly informs"> Regularly informs<br>
												<input type="radio" name="q5" value="Informs sometimes"> Informs sometimes<br>
												<input type="radio" name="q5" value="Rarely informs"> Rarely informs<br>
												<input type="radio" name="q5" value="Does not inform"> Does not inform
											</div>

											<div class="form-group">
												<label>Q6. Does the mentor encourage you to participate in co-curricular and extra-curricular activities?</label><br>
												<input type="radio" name="q6" value="Always encourages"> Always encourages<br>
												<input type="radio" name="q6" value="Occasionally encourages"> Occasionally encourages<br>
												<input type="radio" name="q6" value="Rarely encourages"> Rarely encourages<br>
												<input type="radio" name="q6" value="Does not encourage"> Does not encourage
											</div>

											<div class="form-group">
												<label>Q7. Are the mentor meetings conducted regularly by the mentor?</label><br>
												<input type="radio" name="q7" value="Conducted strictly as per the timetable"> Conducted strictly as per the timetable<br>
												<input type="radio" name="q7" value="Conducted most of the times"> Conducted most of the times<br>
												<input type="radio" name="q7" value="Conducted once in a while"> Conducted once in a while<br>
												<input type="radio" name="q7" value="Not conducted"> Not conducted
											</div>

											<div class="form-group">
												<label>Q8. Are the mentor meetings interactive, and sufficient time is devoted to addressing the mentee related issues?</label><br>
												<input type="radio" name="q8" value="Highly interactive"> Highly interactive<br>
												<input type="radio" name="q8" value="Fairly interactive"> Fairly interactive<br>
												<input type="radio" name="q8" value="Little interactive"> Little interactive<br>
												<input type="radio" name="q8" value="Not interactive"> Not interactive
											</div>

											<div class="form-group">
												<label>Q9. Are the mentor meetings beneficial to you?</label><br>
												<input type="radio" name="q9" value="Highly beneficial"> Highly beneficial<br>
												<input type="radio" name="q9" value="Beneficial"> Beneficial<br>
												<input type="radio" name="q9" value="Not much beneficial"> Not much beneficial<br>
												<input type="radio" name="q9" value="Not beneficial at all"> Not beneficial at all
											</div>

											<div class="form-group">
												<label>Q10. Is the mentor available for guidance beyond regular mentor meetings?</label><br>
												<input type="radio" name="q10" value="Available always"> Available always<br>
												<input type="radio" name="q10" value="Available on most occasions"> Available on most occasions<br>
												<input type="radio" name="q10" value="Available rarely"> Available rarely<br>
												<input type="radio" name="q10" value="Not available"> Not available
											</div>

											<hr>

											<h3>Institute Evaluation</h3>
											<div class="form-group">
												<label>Q11. Is the institute's environment conductive for learning?</label><br>
												<input type="radio" name="q11" value="Highly conductive"> Highly conducive<br>
												<input type="radio" name="q11" value="Conductive"> Conducive<br>
												<input type="radio" name="q11" value="Not much conductive"> Not much conducive<br>
												<input type="radio" name="q11" value="Not conductive at all"> Not conducive at all
											</div>

											<div class="form-group">
												<label>Q12. Are the faculties knowledgeable and experienced?</label><br>
												<input type="radio" name="q12" value="Highly knowledgeable and experienced"> Highly knowledgeable and experienced<br>
												<input type="radio" name="q12" value="Knowledgeable and experienced"> Knowledgeable and experienced<br>
												<input type="radio" name="q12" value="Not much knowledgeable and experienced"> Not much knowledgeable and experienced<br>
												<input type="radio" name="q12" value="Not knowledgeable and experienced at all"> Not knowledgeable and experienced at all
											</div>
<!-- 
											<div class="form-group">
												<label>Q13. Are the faculties available and accessible to the students beyond regular class hours?</label><br>
												<input type="radio" name="q13" value="Available always"> Available always<br>
												<input type="radio" name="q13" value="Available on most occasions"> Available on most occasions<br>
												<input type="radio" name="q13" value="Available rarely"> Available rarely<br>
												<input type="radio" name="q13" value="Not available"> Not available
											</div> -->

											<!-- <div class="form-group">
												<label>Q14. Are the classes conducted regularly and as per the timetable?</label><br>
												<input type="radio" name="q14" value="Classes conducted strictly as per the timetable"> Classes conducted strictly as per the timetable<br>
												<input type="radio" name="q14" value="Classes conducted most of the times"> Classes conducted most of the times<br>
												<input type="radio" name="q14" value="Classes conducted once in a while"> Classes conducted once in a while<br>
												<input type="radio" name="q14" value="Classes not conducted regularly"> Classes not conducted regularly
											</div>

											<div class="form-group">
												<label>Q15. Are the classes interactive, and sufficient time is devoted to addressing the student's doubts?</label><br>
												<input type="radio" name="q15" value="Highly interactive"> Highly interactive<br>
												<input type="radio" name="q15" value="Fairly interactive"> Fairly interactive<br>
												<input type="radio" name="q15" value="Little interactive"> Little interactive<br>
												<input type="radio" name="q15" value="Not interactive"> Not interactive
											</div> -->

											<div class="form-group">
												<label>Q13. Are the teaching methodologies employed by the faculties effective and innovative?</label><br>
												<input type="radio" name="q13" value="Highly effective and innovative"> Highly effective and innovative<br>
												<input type="radio" name="q13" value="Effective and innovative"> Effective and innovative<br>
												<input type="radio" name="q13" value="Not much effective and innovative"> Not much effective and innovative<br>
												<input type="radio" name="q13" value="Not effective and innovative at all"> Not effective and innovative at all
											</div>

											<div class="form-group">
												<label>Q14. Is the institute well-equipped with modern infrastructure and facilities?</label><br>
												<input type="radio" name="q14" value="Highly equipped"> Highly equipped<br>
												<input type="radio" name="q14" value="Equipped"> Equipped<br>
												<input type="radio" name="q14" value="Not much equipped"> Not much equipped<br>
												<input type="radio" name="q14" value="Not equipped at all"> Not equipped at all
											</div>

											<!-- <div class="form-group">
												<label>Q18. Are the laboratories and library well-maintained and accessible to the students?</label><br>
												<input type="radio" name="q18" value="Well-maintained and accessible"> Well-maintained and accessible<br>
												<input type="radio" name="q18" value="Maintained and accessible"> Maintained and accessible<br>
												<input type="radio" name="q18" value="Not much maintained and accessible"> Not much maintained and accessible<br>
												<input type="radio" name="q18" value="Not maintained and accessible at all"> Not maintained and accessible at all
											</div>

											<div class="form-group">
												<label>Q19. Does the institute provide ample opportunities for overall personality development and co-curricular activities?</label><br>
												<input type="radio" name="q19" value="Provides ample opportunities"> Provides ample opportunities<br>
												<input type="radio" name="q19" value="Provides some opportunities"> Provides some opportunities<br>
												<input type="radio" name="q19" value="Provides few opportunities"> Provides few opportunities<br>
												<input type="radio" name="q19" value="Does not provide any opportunity"> Does not provide any opportunity
											</div> -->

											<div class="form-group">
												<label>Q15. Is the institute supportive in terms of placement and internship opportunities?</label><br>
												<input type="radio" name="q15" value="Highly supportive"> Highly supportive<br>
												<input type="radio" name="q15" value="Supportive"> Supportive<br>
												<input type="radio" name="q15" value="Not much supportive"> Not much supportive<br>
												<input type="radio" name="q15" value="Not supportive at all"> Not supportive at all
											</div>

											<hr>

											<h3>General Feedback</h3>
											<div class="form-group">
												<label>Q16. How satisfied are you with your overall experience at the institute?</label><br>
												<input type="radio" name="q16" value="Highly satisfied"> Highly satisfied<br>
												<input type="radio" name="q16" value="Satisfied"> Satisfied<br>
												<input type="radio" name="q16" value="Not much satisfied"> Not much satisfied<br>
												<input type="radio" name="q16" value="Not satisfied at all"> Not satisfied at all
											</div>

											<!-- <div class="form-group">
												<label>Q22. Would you recommend the institute to others?</label><br>
												<input type="radio" name="q22" value="Definitely recommend"> Definitely recommend<br>
												<input type="radio" name="q22" value="Probably recommend"> Probably recommend<br>
												<input type="radio" name="q22" value="Probably not recommend"> Probably not recommend<br>
												<input type="radio" name="q22" value="Definitely not recommend"> Definitely not recommend
											</div> -->

											<div class="form-group">
												<label>Q17. Any suggestions or additional comments:</label><br>
												<textarea name="comments" class="form-control" rows="5"></textarea>
											</div>

											<div class="form-group">
												<button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/fileinput.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>

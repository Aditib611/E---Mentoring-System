<!-- <div class="brand clearfix">
		<a href="#" class="logo" style="font-size:16px;">Mentor Management System</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/user.png" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="admin-profile.php">My Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div> -->

	<?php
    // include($_SERVER['DOCUMENT_ROOT'] . '/code/admin/includes/config.php');
// Check if a session is not already active
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Include necessary files
 //include('includes/config.php'); // Include the correct path to config.php
//include('../../admin/query/config.php');
//include('includes/admin/includes/config.php'); 

include('../../includes/config.php');


// Check if 'id' session variable is set
if(isset($_SESSION['id'])) {
    $mentor_id = $_SESSION['id'];

    // Query to fetch mentor's profile image path and name
    $query = "SELECT mentor_name  FROM mentors WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $mentor_id);
    $stmt->execute();
    $stmt->bind_result($mentor_name);
    $stmt->fetch();
    $stmt->close();
} else {
    // Default values if mentor is not logged in
    // $default_image = "img/mentorimg.jpg"; // Default profile image path
    $mentor_name = ""; // No default mentor name
}
?>

<div class="brand clearfix">
    <a href="#" class="logo" style="font-size:16px;">E-Mentoring System</a>
    <span class="menu-btn"><i class="fa fa-bars"></i></span>
    
    <?php if(isset($_SESSION['id'])): ?>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#">
                    <!-- <img src="<?php echo $default_image; ?>" class="ts-avatar hidden-side" alt=" "> -->
                    <?php echo $mentor_name; ?> <i class="fa fa-angle-down hidden-side"></i>
                </a>
                <ul>
                    <li><a href="mentor-my-profile.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    <?php else: ?>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#">
                    Account <i class="fa fa-angle-down hidden-side"></i>
                </a>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Register</a></li>
                </ul>
            </li>
        </ul>
    <?php endif; ?>
</div>
<!-- 
<?php if($_SESSION['id'])
{ ?><div class="brand clearfix">
		<a href="#" class="logo" style="font-size:16px;">E-Mentoring System</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/user.png" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="my-profile.php">My Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

<?php
} else { ?>
<div class="brand clearfix">
		<a href="#" class="logo" style="font-size:16px;">E-Mentoring System</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		
	</div>
	<?php } ?>  -->
<!--------------------------------------------------------------------------------------------------------------------------------------->
<?php
// Check if a session is not already active
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Include necessary files
include('includes/config.php'); // Include the correct path to config.php

// Check if 'id' session variable is set
if(isset($_SESSION['id'])) {
    $mentee_id = $_SESSION['id'];

    // Query to fetch mentee's profile image path and first name
    $query = "SELECT profileImage, firstName FROM userregistration WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $mentee_id);
    $stmt->execute();
    $stmt->bind_result($profileImage, $firstName);
    $stmt->fetch();
    $stmt->close();
} else {
    // Default values if mentee is not logged in
    $profileImage = "img/user.png"; // Default profile image path
    $firstName = ""; // No default first name
}
?>

<div class="brand clearfix">
    <a href="#" class="logo" style="font-size:16px;">E-Mentoring System</a>
    <span class="menu-btn"><i class="fa fa-bars"></i></span>
    
    <?php if(isset($_SESSION['id'])): ?>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#">
                    <img src="<?php echo $profileImage; ?>" class="ts-avatar hidden-side" alt="Profile Image">
                    <?php echo $firstName; ?> <i class="fa fa-angle-down hidden-side"></i>
                </a>
                <ul>
                    <li><a href="my-profile.php">My Account</a></li>
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

<!--------------------------------------------------------------------------------------------------------------------------------------->

	<!-- <div class="brand clearfix">
    <a href="#" class="logo" style="font-size:16px;">E-Mentoring System</a>
    <span class="menu-btn"><i class="fa fa-bars"></i></span>
    <?php if(isset($_SESSION['mentee_id'])) { ?>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <?php
                // Start session and include necessary files
                session_start();
                include('includes/config.php'); // Include the correct path to config.php

                // Check if mentee is logged in
                if(isset($_SESSION['mentee_id'])) {
                    $mentee_id = $_SESSION['mentee_id'];

                    // Query to fetch mentee's profile image path and first name
                    $query = "SELECT profileImage, firstName FROM userregistration WHERE id = ?";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param('i', $mentee_id);
                    $stmt->execute();
                    $stmt->bind_result($profileImage, $firstName);
                    $stmt->fetch();
                    $stmt->close();
                } else {
                    // Default values if mentee is not logged in
                    $profileImage = "img/user.png";
                    $firstName = "Account";
                }
                ?>
                <a href="#">
                    <img src="<?php echo $profileImage; ?>" class="ts-avatar hidden-side" alt="Profile Image">
                    <?php echo $firstName; ?> <i class="fa fa-angle-down hidden-side"></i>
                </a>
                <ul>
                    <li><a href="my-profile.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    <?php } ?>
</div> -->

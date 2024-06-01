<div class="brand clearfix">
		<a href="#" class="logo" style="font-size:16px;">E-Mentoring System</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/user.png" class="ts-avatar hidden-side" alt=""> Admin <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="admin-profile.php">My Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
    <!-- <div class="brand clearfix">
    <a href="#" class="logo" style="font-size:16px;">E-Mentoring System</a>
    <span class="menu-btn"><i class="fa fa-bars"></i></span>
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
                <li><a href="admin-profile.php">My Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

 -->

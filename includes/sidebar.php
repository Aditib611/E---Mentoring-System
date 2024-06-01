<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
<li><a href="change-password.php"><i class="fa fa-key"></i>Change Password</a></li>
<li><a href="std-registration.php"><i class="fa fa-check-circle"></i>Complete Profile</a></li>
<li><a href="student-details.php"><i class="fa fa-list"></i>Details</a></li>
<li><a href="achivements.php"><i class="fa fa-star"></i>Achievements</a></li>
<!-- <li><a href="meet.php"><i class="fa fa-file-o"></i>Meet</a></li> -->
<li><a href="https://meet.google.com/?hs=193&pli=1"><i class="fa fa-video-camera"></i>Meet</a></li>
<li><a href="help.php"><i class="fa fa-question-circle"></i>Help</a></li>
<li><a href="feedback.php"><i class="fa fa-comments"></i>Feedback</a></li>

<!-- <li><a href="access-log.php"><i class="fa fa-file-o"></i>Access log</a></li> -->
<?php } else { ?>
				
				<li><a href="registration.php"><i class="fa fa-user-plus"></i> Mentee Registration</a></li>
				<li><a href="login.php"><i class="fa fa-sign-in"></i> Mentee Login</a></li>
				<li><a href="admin/index.php"><i class="fa fa-lock"></i> Admin Login</a></li>
				<li><a href="mentor_login.php"><i class="fa fa-user"></i> Mentor Login</a></li>
				<?php } ?>

			</ul>
		</nav>
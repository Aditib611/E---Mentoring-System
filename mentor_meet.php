<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
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
	<title>Meet</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		.container-fluid {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			margin-top : 15px;


		}

		#meet-frame {
			width: 100%;
			height: 85%;
			border: none;
		}

		#fullscreen-btn {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('mentor/mentor_sidebar.php');?>
		<div class="container-fluid">
			<!-- <iframe src="https://apps.google.com/meet/" id="meet-frame" scrolling = "no"></iframe> -->
				<iframe src="https://zoom.us/join" id="meet-frame" scrolling = "no"></iframe>
			<button id="fullscreen-btn" onclick="toggleFullscreen()">Fullscreen</button>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	<script>
		function toggleFullscreen() {
			const elem = document.getElementById("meet-frame");
			if (document.fullscreenElement) {
				document.exitFullscreen();
			} else {
				elem.requestFullscreen();
			}
		}
	</script>
</body>
</html>

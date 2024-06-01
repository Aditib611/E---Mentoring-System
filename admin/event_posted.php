<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="DELETE FROM mentors WHERE id=?";
	$stmt = $mysqli->prepare($adn);
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$stmt->close();	   
	echo "<script>alert('Data Deleted');</script>";
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
	<title>Manage mentors</title>
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
		margin-top: 35px;
	}

	.table-striped tbody tr:nth-of-type(odd) {
		background-color: rgba(0, 0, 0, 0.05);
	}

	.print-button {
		margin-top: 10px;
	}

	@media print {
		.no-print {
			display: none !important;
		}

		body {
			font-size: 12px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 5px;
			border: 1px solid #000;
		}

		.table-striped tbody tr:nth-of-type(odd) {
			background-color: transparent !important;
		}
        @media print {
  .footer-text {
    font-size: 12px;
    margin-top: 20px;
    text-align: center;
  }
}

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
						<h2 class="page-title">Event Posted</h2>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Event Title</th>
												<th>Event Description</th>
												<th>Posted Date and Time</th>
											</tr>
										</thead>
										<tbody>
											<?php
											// Fetch all events from the database
											$stmt = $mysqli->prepare("SELECT event_name, event_disct, posted_datetime FROM event");
											$stmt->execute();
											$stmt->bind_result($event_name, $event_disct, $posted_datetime);

											// Loop through each event and display them in table rows
											while ($stmt->fetch()) {
												echo "<tr>";
												echo "<td>$event_name</td>";
												echo "<td>$event_disct</td>";
												echo "<td>$posted_datetime</td>";
												echo "</tr>";
											}

											$stmt->close();
											$mysqli->close();
											?>
										</tbody>
									</table>
									<div class="text-center no-print">
										<button class="btn btn-primary print-button" onclick="window.print()">Print Data</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                
			</div>
            <!-- Footer -->
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

</body>

</html>

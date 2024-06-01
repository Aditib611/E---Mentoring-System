
<?php

session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from registration where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Data Deleted');</script>" ;
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
	<title>Attendance Tracker</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>

</head>
<style>
	.container-fluid
	{
		margin-top : 35px;
	}
    table, th, td 
    {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
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
						<h2 class="page-title">Attendance Tracker</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Mentee Details</div>
							<form action="add_attendance.php" method="post">
        <table>
        <thead>
    <tr>
        <th>PRN No.</th>
        <th>Name</th>
        <th>Year</th>
        <th>Contact No.</th>
        <th>Email</th>
        <th>Attendance</th>
    </tr>
</thead>

            <tbody>
                <?php
                // Connect to the MySQL database
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $dbname = 'sanjivani';
                $conn = new mysqli($host, $user, $pass, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // Fetch PRN No. and contact details from the database
                $sql = "SELECT prnno, name, year, contactno, email FROM attendance";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Print a row for each Mentee with an input box for entering attendance
                        echo "<tr>";
                        echo "<td>" . $row['prnno'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['year'] . "</td>";                        
                        echo "<td>" . $row['contactno'] . "</td>";                       
                         echo "<td>" . $row['email'] . "</td>";
                        echo "<td><input type='text' name='attendance[]'></td>";
                        echo "</tr>";

                    }
                }
                
                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
        <input type="submit" value="Submit">
    </form>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
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




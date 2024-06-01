<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
		 
    // Delete mentor assignments for the mentee
    $delete_assignments_query = "DELETE FROM mentor_assignments WHERE mentee_id=?";
    $stmt_delete_assignments = $mysqli->prepare($delete_assignments_query);
    $stmt_delete_assignments->bind_param('i', $id);
    if (!$stmt_delete_assignments->execute()) {
        echo "Error deleting mentor assignments: " . $stmt_delete_assignments->error;
        exit;
    }

    // Retrieve mentor ID for the mentee
    $retrieve_mentor_query = "SELECT mentor_id FROM userregistration WHERE id=?";
    $stmt_retrieve_mentor = $mysqli->prepare($retrieve_mentor_query);
    $stmt_retrieve_mentor->bind_param('i', $id);
    if (!$stmt_retrieve_mentor->execute()) {
        echo "Error retrieving mentor ID: " . $stmt_retrieve_mentor->error;
        exit;
    }
    $result_retrieve_mentor = $stmt_retrieve_mentor->get_result();
    $row_mentor = $result_retrieve_mentor->fetch_assoc();
    $mentor_id = $row_mentor['mentor_id'];

    // Decrease count of assigned mentees for the mentor
    $decrease_count_query = "UPDATE mentors SET assignedstudents = assignedstudents - 1 WHERE id=?";
    $stmt_decrease_count = $mysqli->prepare($decrease_count_query);
    $stmt_decrease_count->bind_param('i', $mentor_id);
    if (!$stmt_decrease_count->execute()) {
        echo "Error decreasing count in mentors table: " . $stmt_decrease_count->error;
        exit;
    }

    // Delete the mentee from the registration table
    $delete_mentee_query = "DELETE FROM registration WHERE id=?";
    $stmt_delete_mentee = $mysqli->prepare($delete_mentee_query);
    $stmt_delete_mentee->bind_param('i', $id);
    if (!$stmt_delete_mentee->execute()) {
        echo "Error deleting mentee: " . $stmt_delete_mentee->error;
        exit;
    }

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
	<title>Manage Mentees</title>
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
		margin-top : 30px;
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
						<h2 class="page-title">Manage Mentees</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Mentee Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Mentee Name</th>
											<th>Reg no</th>
											<th>Contact no </th>
											<th>Year</th>
											<th>Semister </th>
											<th>CGPA </th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Mentee Name</th>
											<th>Reg no</th>
											<th>Contact no</th>
											<th>Year  </th>
											<th>Semister </th>
											<th>CGPA</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from registration";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->firstName . ' ' . $row->middleName . ' ' . $row->lastName;?></td>
<td><?php echo $row->prnno;?></td>
<td><?php echo $row->contactno;?></td>
<td><?php echo $row->year;?></td>
<td><?php echo $row->sem;?></td>
<td><?php echo $row->cgpa;?></td>
<td>
<a href="javascript:void(0);"  onClick="popUpWindow('http://localhost/code/admin/full-profile.php?id=<?php echo $row->id;?>');" title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
<a href="manage-students.php?del=<?php echo $row->id;?>" title="Delete Record" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>

    <!-- Print button placed at the bottom -->
    <div class="text-center no-print"  style="margin-left 20px;">
        <button class="btn btn-primary print-button" onclick="window.print()">Print Data</button>
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

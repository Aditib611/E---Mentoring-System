<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Fetch the profile image of the current user
$aid = $_SESSION['login'];
$ret = "SELECT profileImage FROM userregistration WHERE email = ?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('s', $aid);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$profileImage = $row['profileImage'];
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
    <title>Mentee Details</title>
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
    .container-fluid {
        margin-top: 25px;
    }
    .profile-image {
        width: 70px; /* Increased width */
        height: 70px; /* Increased height */
        border-radius: 50%;
        object-fit: cover;
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
                        <h2 class="page-title">Mentee Details</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">Mentee Details</div>
                            <div class="panel-body">
                                <table id="zctb" class="table table-bordered" cellspacing="0" width="100%">
                                    <tbody>
                                        <?php
                                        $aid = $_SESSION['login'];
                                        $ret = "SELECT * FROM registration WHERE emailid=?";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->bind_param('s', $aid);
                                        $stmt->execute();
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($row = $res->fetch_object()) {
                                            ?>

                                            <tr>
                                                <td colspan="4"><h4>Academic Related Info</h4></td>
                                                <td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/code/full-profile.php?id=<?php echo $row->emailid;?>');" title="View Full Details">Print Data</a></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><b>PRN no. :<?php echo $row->prnno;?></b></td>
                                            </tr>

<tr>
<td><b>SSC Marks</b></td>
<td><?php echo $row->sscper;?></td>
<td><b>SSC School:</b></td>
<td><?php echo $row->sscschool;?></td>
<td><b>SSC Passing Year :</b></td>
<td><?php echo $row->sscyear;?></td>
</tr>

<tr>
<td><b>HSC Marks</b></td>
<td><?php echo $row->hscper;?></td>
<td><b>HSC College:</b></td>
<td><?php echo $row->hsccollege;?></td>
<td><b>HSC Passing Year :</b></td>
<td><?php echo $row->hscyear;?></td>
</tr>

<tr>
<td><b>Year Gap :</b></td>
<td colspan="6"><?php echo $row->yeargap;?></td>
</tr>


<tr>
<td><b>Current Year :</b></td>
<td><?php echo $row->year;?></td>
<td><b>semister :</b></td>
<td td colspan="4"><?php echo $row->sem;?></td>
<!-- <td><b>Mentor :</b></td>
<td><?php echo $mentor=$row->mentor;?></td> -->
</tr>

<tr>
<td><b>hostel Status:</b></td>
<td>
<?php if($row->hostelstatus==0)
{
echo "Regular";
}
else
{
echo "Hostelier";
}
;?></td>
<td><b>Birthday :</b></td>
<td><?php echo $row->bday;?></td>
<td><b>Overall CGPA:</b></td>
<td><?php echo $dr=$row->cgpa;?> CGPA</td>
</tr>

<tr>
</tr>
<tr>
<td colspan="6"><h4>Personal Info Info</h4></td>
</tr>

<tr>
<td><b>PRN No. :</b></td>
<td><?php echo $row->prnno;?></td>
<td><b>Full Name :</b></td>

<td><?php echo $row->firstName . ' ' . $row->middleName . ' ' . $row->lastName;?></td>

<td><b>Email :</b></td>
<td><?php echo $row->emailid;?></td>
</tr>


<tr>
<td><b>Contact No. :</b></td>
<td><?php echo $row->contactno;?></td>
<td><b>Gender :</b></td>
<td><?php echo $row->gender;?></td>
<td><b>Course :</b></td>
<td><?php echo $row->course;?></td>
</tr>


<tr>
<td><b>Emergency Contact No. :</b></td>
<td><?php echo $row->egycontactno;?></td>
<td><b>Guardian Name :</b></td>
<td><?php echo $row->guardianName;?></td>
<td><b>Guardian Relation :</b></td>
<td><?php echo $row->guardianRelation;?></td>
</tr>

<tr>
    <td><b>Guardian Contact No. :</b></td>
    <td><?php echo $row->guardianContactno;?></td>
    <td><b>Domain:</b></td>
    <td colspan="4"><?php echo $row->domain;?></td>
</tr>



<tr>
<td colspan="6"><h4>Addresses</h4></td>
</tr>
<tr>
<td><b>Correspondense Address</b></td>
<td colspan="2">
<?php echo $row->corresAddress;?><br />
<?php echo $row->corresCIty;?>, <?php echo $row->corresPincode;?><br />
<?php echo $row->corresState;?>


</td>
<td><b>Permanent Address</b></td>
<td colspan="2">
<?php echo $row->pmntAddress;?><br />
<?php echo $row->pmntCity;?>, <?php echo $row->pmntPincode;?><br />
<?php echo $row->pmnatetState;?>	

</td>
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
<!-- Display the profile image in the top right corner -->
<div style="position: fixed; top: 40px; right: 20px;">
        <img src="<?php echo $profileImage; ?>" alt="Profile Image" class="profile-image">
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

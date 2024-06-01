<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Code for handling form submission
if(isset($_POST['submit']))
{
    $prnno = $_POST['prnno'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $emailid = $_POST['emailid'];
    $econtact = $_POST['econtact'];
    $ques = $_POST['ques'];

    // Add the code snippet here to fetch mentor_id and insert it into the help table
    $stmt = $mysqli->prepare("SELECT mentor_id FROM userregistration WHERE prnno = ?");
    $stmt->bind_param('s', $prnno);
    $stmt->execute();
    $stmt->bind_result($mentor_id);
    $stmt->fetch();
    $stmt->close();

    // Inserting the query along with the mentor_id into the help table
    $query = "INSERT INTO help (prnno, firstName, lastName, contactno, emailid, egycontactno, ques, mentor_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssi', $prnno, $fname, $lname, $contactno, $emailid, $econtact, $ques, $mentor_id);
    
    if($rc === false) {
        // Handle binding error
        die('Binding parameters failed: ' . htmlspecialchars($stmt->error));
    }

    if ($stmt->execute()) {
        echo "<script>alert('Mentee submission has been recorded!');</script>";
    } else {
        echo "<script>alert('Error while inserting data. Please try again.');</script>";
    }
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
    <title>Need Help </title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

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
                    
                        <h2 class="page-title">Need Help ? </h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Post a Query</div>
                                    <div class="panel-body">
                                        <form method="post" action="" class="form-horizontal">
                            <?php
$uid=$_SESSION['login'];
                             $stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? ");
                $stmt->bind_param('s',$uid);
                $stmt->execute();
                $stmt -> bind_result($email);
                $rs=$stmt->fetch();
                $stmt->close();
                if($rs)
                { ?>
            <h3 style="color: green" align="left">Query has been sent to Mentor !</h3>
                <?php }
                else{
                            echo "";
                            }           
                            ?>          

    
<?php    
$aid = $_SESSION['id'];
$ret = "SELECT prnno, firstName, lastName, contactNo, email FROM userregistration WHERE id=?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $aid);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
?>

<div class="form-group">
    <label class="col-sm-2 control-label">PRN No : </label>
    <div class="col-sm-8">
        <input type="text" name="prnno" id="prnno" class="form-control" value="<?php echo $row['prnno']; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">First Name : </label>
    <div class="col-sm-8">
        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['firstName']; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Last Name : </label>
    <div class="col-sm-8">
        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row['lastName']; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Contact No : </label>
    <div class="col-sm-8">
        <input type="text" name="contactno" id="contactno" class="form-control" value="<?php echo $row['contactNo']; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Email id : </label>
    <div class="col-sm-8">
        <input type="email" name="emailid" id="emailid" class="form-control" value="<?php echo $row['email']; ?>" readonly>
    </div>
</div>

<?php } ?>

<div class="form-group">
    <label class="col-sm-2 control-label">Emergency Contact: </label>
    <div class="col-sm-8">
        <input type="text" name="econtact" id="econtact" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label"><h4 style="color: green" align="left">Enter your Query to mentor </h4> </label>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Write Query Here : </label>
    <div class="col-sm-8">
        <textarea rows="5" name="ques" id="ques" class="form-control" required="required"></textarea>
    </div>
</div>

</div>

<div class="col-sm-6 col-sm-offset-4">
    <button class="btn btn-default" type="submit">Cancel</button>
    <input type="submit" name="submit" Value="Send" class="btn btn-primary">
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
            </div>
        </div>
    </div>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
    <script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


<script type="text/javascript">

$(document).ready(function() {
    $('#duration').keyup(function(){
        var fetch_dbid = $(this).val();
        $.ajax({
        type:'POST',
        url :"ins-amt.php?action=userid",
        data :{userinfo:fetch_dbid},
        success:function(data){
        $('.result').val(data);
        }
        });
        

})});
</script>

</html>

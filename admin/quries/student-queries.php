<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
require 'vendor/autoload.php'; // Include Composer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

check_login();

// Code for retrieving Mentee queries
$query = "SELECT * FROM help";
$result = $mysqli->query($query);
$rows = $result->fetch_all(MYSQLI_ASSOC);
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
    <title>Mentees Queries</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    body {
        margin-top: 30px;
    }
</style>
<body>
<?php include('includes/header.php'); ?>
<div class="ts-main-content">
    <?php include('includes/sidebar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Mentees Queries</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Mentees Queries</div>
                                <div class="panel-body">
                                    <table class="table table-striped" border="1">
                                        <thead>
                                        <tr>
                                            <th>PRN No</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Email ID</th>
                                            <th>Emergency Contact</th>
                                            <th>Queries</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (count($rows) > 0) {
                                            foreach ($rows as $row) {
                                                echo "<tr>";
                                                echo "<td>" . $row['prnno'] . "</td>";
                                                echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";
                                                echo "<td>" . $row['contactno'] . "</td>";
                                                echo "<td>" . $row['emailid'] . "</td>";
                                                echo "<td>" . $row['egycontactno'] . "</td>";
                                                echo "<td>" . $row['ques'] . "</td>";
                                                echo "<td><button class='btn btn-primary btn-reply' data-toggle='modal' data-target='#emailModal' data-email='" . $row['emailid'] . "' data-name='" . $row['firstName'] . " " . $row['lastName'] . "'>Reply</button></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No data found</td></tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Email Modal -->
    <div id="emailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="emailForm" method="post" action="">
                    <div class="modal-header">
                        <h4 class="modal-title" id="emailModalLabel">Send Email</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipientName">Recipient Name:</label>
                            <input type="text" class="form-control" id="recipientName" name="recipientName" readonly>
                        </div>
                        <div class="form-group">
                            <label for="recipientEmail">Recipient Email:</label>
                            <input type="email" class="form-control" id="recipientEmail" name="recipientEmail"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Email Modal -->

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
<script>
    $(document).ready(function () {
        $('.btn-reply').click(function () {
            var email = $(this).data('email');
            var name = $(this).data('name');
            $('#recipientName').val(name);
            $('#recipientEmail').val(email);
        });

        $('#emailForm').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting
            var recipientName = $('#recipientName').val();
            var recipientEmail = $('#recipientEmail').val();
            var subject = $('#subject').val();
            var message = $('#message').val();

            // Send Email
            $.ajax({
                type: "POST",
                url: "send_email.php",
                data: {
                    recipientName: recipientName,
                    recipientEmail: recipientEmail,
                    subject: subject,
                    message: message
                },
                success: function (response) {
                    alert('Email sent to ' + recipientName + ' (' + recipientEmail +                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            // Display success message or perform any other actions
            alert('Email sent to ' + recipientName + ' (' + recipientEmail + ')');
            $('#emailModal').modal('hide');
        });
    });
</script>
</body>
</html>



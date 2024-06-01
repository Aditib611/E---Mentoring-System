<?php
session_start();
include('config.php');
include('checklogin.php');
check_login();

// Include PHPMailer library
require 'phpmailer-master/src/PHPMailer.php';
require 'phpmailer-master/src/SMTP.php';
require 'phpmailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Code for retrieving Mentee queries
$query = "SELECT * FROM help";
$result = $mysqli->query($query);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// Function to send email using SMTP
function send_mail($recipients, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        // Enable SMTP debugging (if needed)
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        // Set up SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mentorscoe@gmail.com';
        $mail->Password = 'bianlalrjptdmoba';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set up email content
        $mail->setFrom('mentorscoe@gmail.com', 'Mentor MET');
        $mail->addAddress($recipients);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

$error = ""; // Initialize the $error variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipients = $_POST['recipient_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate the input fields (you can add your own validation logic here)
    if (empty($recipients) || empty($subject) || empty($message)) {
        $error = "Please fill in all the fields.";
    } else {
        $result = send_mail($recipients, $subject, $message);

        if ($result) {
            echo "<script>alert('Email sent successfully.');</script>";
        } else {
            echo "<script>alert('Error while sending email. Please try again.');</script>";
        }
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
    <?php include('header.php'); ?>
    <div class="ts-main-content">
        <?php include('sidebar.php'); ?>
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
    </div>

    <!-- Email Modal -->
    <div id="emailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="emailForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="modal-header">
                        <h4 class="modal-title" id="emailModalLabel">Send Email</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipientName">Recipient Name:</label>
                            <input type="text" class="form-control" id="recipientName" name="recipient_name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="recipientEmail">Recipient Email:</label>
                            <input type="email" class="form-control" id="recipientEmail" name="recipient_email"
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Set the recipient name and email in the email modal
            $('.btn-reply').click(function () {
                var name = $(this).data('name');
                var email = $(this).data('email');
                $('#recipientName').val(name);
                $('#recipientEmail').val(email);
            });

            // Submit the email form
            $('#emailForm').submit(function () {
                var form = $(this);
                var button = form.find('button[type=submit]');
                button.prop('disabled', true);
                button.html('Sending...');

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    success: function (response) {
                        alert("Email sent successfully.");
                        button.prop('disabled', false);
                        button.html('Send');
                        $('#emailModal').modal('hide');
                    },
                    error: function () {
                        alert('Error while sending email. Please try again.');
                        button.prop('disabled', false);
                        button.html('Send');
                    }
                });

                return false;
            });
        });
    </script>
</body>

</html>

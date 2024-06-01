<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
// code for add courses

$error = ""; // Initialize the $error variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipients = $_POST['recipients'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate the input fields (you can add your own validation logic here)
    if (empty($recipients) || empty($subject) || empty($message)) {
        $error = "Please fill in all the fields.";
    } else {
        // Call the send_mail function
        require('mail.php');
        $result = send_mail($recipients, $subject, $message);

        if ($result) {
            $success = "Email sent successfully.";
        } else {
            $error = "Error while sending email. Please try again.";
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
    <title>Send Email</title>
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
    <style>
        .form-wrapper {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0px 0px 10px #aaa;
            border-radius: 10px;
        }

        .form-wrapper h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            height: 40px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            width: 100%;
            height: 40px;
            font-size: 16px;
        }

        .alert {
            margin-bottom: 20px;
        }
        .form-wrapper {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 0px 0px 10px #aaa;
        border-radius: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    </style>
</head>
<body>
    <?php include('../mentor/header.php');?>
    <div class="ts-main-content">
        
       
       
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="form-wrapper">
                    <h3>Send Email</h3>
                    <div>
                        <?php
                        if ($error != "") {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $error;
                            echo '</div>';
                        }

                        if (isset($success) && $success != "") {
                            echo '<div class="alert alert-success" role="alert">';
                            echo $success;
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label for="recipients">Recipients</label>
                            <input type="text" class="form-control" name="recipients" id="recipients" placeholder="Recipients" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Send</button>
                    </form>
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
</html>



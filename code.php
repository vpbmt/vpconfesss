<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function is_vpkbiet_email($email) {
    $domain = explode('@', $email)[1];
    return strtolower($domain) === 'vpkbiet.org';
}

function sendemail_verify($email, $verify_token) {
    if (!is_vpkbiet_email($email)) {
        echo 'Please register using your official email ID.';
        return; 
    }

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "vpbmtverify@gmail.com";
    $mail->Password = "hbdkcprvrepcysvs"; 
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->setFrom("vpbmtverify@gmail.com");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Email Verification from VPC Community";
    $email_template = "
    <h2>You have Registered with VPC Community</h2>
    <h3>Verify your email address to Login with the below given link</h3>
    <a href='https://vpbmt.github.io/vpconfesss/verify-email.php?token=$verify_token'> Click Me </a>
    ";
    $mail->Body = $email_template;

    if ($mail->send()) {
        echo 'Message has been sent';
    } else {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    }
}

if (isset($_POST['register_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $verify_token = md5(rand());

    if (!is_vpkbiet_email($email)) {
        $_SESSION['status'] = 'Please register using your official email ID.';
        header("Location: register.php");
        exit(); 
    }

    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email Id already Exists please login";
        header("Location: login.php");
    } else {
        $query = "INSERT INTO users (email, password, verify_token) VALUES ('$email', '$password','$verify_token')";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            sendemail_verify($email, $verify_token);

            $_SESSION['status'] = "Verification link sent, PLEASE CHECK SPAM/TRASH MAIL ALSO !!";
            header("Location: register.php");
        } else {
            $_SESSION['status'] = "Registration Failed";
            header("Location: register.php");
        }
    }
}

<?php
session_start();

unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);
$_SESSION['status']="You Logged Out Succesfully";
header("Location: login.php");

?>
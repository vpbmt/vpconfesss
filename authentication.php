<?php
session_start();

if(!isset($_SESSION['authenticated'])) 
{
    $_SESSION['status'] = "Please Login to Access User Confession Page"; 
    header('Location: login.php'); 
    exit(0);
}
?>
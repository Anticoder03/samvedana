<?php
session_start(); // Start the session

// Destroy the session to log out the admin
session_destroy();

// Redirect to login page
header("Location: login.php");
exit;
?>

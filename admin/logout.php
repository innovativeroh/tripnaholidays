<?php
session_start(); // Start the session if it's not already started

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a logout page or back to the login page
header("Location: login.php"); // You can change "logout.php" to the page you want to redirect to

exit(); // Make sure to exit to prevent further execution of code

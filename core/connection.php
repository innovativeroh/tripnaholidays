<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tripnaholidays";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
date_default_timezone_set("Asia/Calcutta");
if (!$conn == true) {
    echo "Database Error!";
}

$global_user_email = "";
//Checking User Session
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
    $sql = "SELECT * FROM `users` WHERE `user_email`='$user'";
    $query = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($query);
    $global_user_id = $r['id'];
    $global_user_email = $r['user_email'];
}
$global_user_email;
?>
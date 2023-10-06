<?php
session_start();
include('./db_connection.php');

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
  header('Location: ./login.php');
} elseif (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirmpassword'];

  if ($password === $confirm_password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
        $insertion_sql = $connection->prepare('INSERT INTO admin_users (email, password, type) VALUES (?, ?, ?)');
        $type = 1;
        $insertion_sql->bind_param('ssi', $email, $hashed_password, $type);
        $insertion_sql->execute();
        if ($insertion_sql->affected_rows > 0) {
          echo '<script>alert("Subadmin Added.")</script>';
        } else {
          echo '<script>alert("An error Orrcured while Creating an Subadmin.")</script>';
        }
    } else {
      echo '<script>alert("Permission Denied, you don\'t have the correct access rights to do this action.")</script>';
      header('Location: ./login.php');
    }
  } else {
    echo '<script>alert("Password and Confirm Password doesn\'t match")</script>';
  }
}

<?php
session_start();
include('./db_connection.php');

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
  header('Location: ./login.php');
} elseif (isset($_GET['userid'])) {
  $userId = $_GET['userid'];

  if ((isset($_SESSION['admin']) && $_SESSION['admin'] === true) || (isset($_SESSION['subadmin']) && $_SESSION['subadmin'] === true)) {
    $sql =  $connection->prepare('DELETE FROM users WHERE id = ?');
    $sql->bind_param('i', $userId);
    $sql->execute();
    if ($sql->affected_rows > 0) {
      echo "<script>alert('User Deleted!')</script>";
      header('Location: ./users.php');
    } else {
      echo "<script>alert('No user Exist with the given user Id.')</script>";
    }
  } else {
    echo '<script>alert("Permission Denied, you don\'t have the correct access rights to do this action.")</script>';
    header('Location: ./login.php');
  }
}

<?php
session_start();
include('./db_connection.php');
  $userId = $_GET['id'];
    $sql =  $connection->prepare('DELETE FROM conifg_country WHERE id = ?');
    $sql->bind_param('i', $userId);
    $sql->execute();
    if ($sql->affected_rows > 0) {
      echo "<script>alert('User Deleted!')</script>";
      echo "<meta http-equiv=\"refresh\" content=\"0; url=config_country.php\">";
                        exit();
    } else {
      echo "<script>alert('No user Exist with the given user Id.')</script>";
    }

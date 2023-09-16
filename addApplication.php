<?php
include_once("./core/header.php");
function generateRandomCode($length = 4) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

$getID = @$_GET['id'];

$sqlCheck = "SELECT * FROM `application_history` WHERE `user_to`='$global_user_id' AND `connect`='$getID'";
$queryCheck = mysqli_query($conn, $sqlCheck);
$countCheck = mysqli_num_rows($queryCheck);
if(!$countCheck == "1") {
$sql = "SELECT * FROM `config_list_charges` WHERE `id`='$getID'";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($query);
$thisID = $rows['id'];
$date = date("Y-m-d");
$connect = $rows['connect'];


$randomCode = generateRandomCode();

$sql2 = "INSERT INTO `application_history`(`id`, `user_to`, `connect`, `randCode`, `dateCount`, `status`) VALUES (null,'$global_user_id','$thisID','$randomCode','$date','0')";
$query2 = mysqli_query($conn, $sql2);
}
echo "<meta http-equiv=\"refresh\" content=\"0; url=dashboard.php\">";
exit();
?>
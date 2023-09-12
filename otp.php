<?php include_once("./core/header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get your tourist visa, quick and easy | Tripnaholidays</title>
</head>

<body>
    <div class='halfBack'>
        <br>
        <div class='loginArea'>
            <center><img src='./resource/img/logo.png'><br><br>
                <h1>Enter OTP sent on</h1>
                <?php

                //Getting the ID from URL
                $varID = @$_GET['id'];
                //End Of Getting the ID
                
                //Now checking the OTP is valid or expired
                $sql = "SELECT * FROM `user_otp` WHERE `id`='$varID' AND `expired`='0'";
                $query = mysqli_query($conn, $sql);
                $numRows = mysqli_num_rows($query);
                $rows = mysqli_fetch_array($query);
                $connectID = $rows['connect'];
                $theOTP = $rows['otp'];
                //End of checking the OTP
                
                //Now fetching the email from the associcated ID in OTP system
                $sql2 = "SELECT * FROM `users` WHERE `id`='$connectID'";
                $query2 = mysqli_query($conn, $sql2);
                $row = mysqli_fetch_array($query2);
                $userEmail = $row['user_email'];
                //End of fetching the email
                
                //Redirection to index.php If OTP is expired or Invalid
                if ($numRows == "0") {
                    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
                    exit();
                }
                //End of redirection!
                
                if (isset($_POST['checkOTP'])) {
                    $otpArea = @$_POST['otpVal'];
                    if ($otpArea == $theOTP) {

                        //Updating the OTP Expiry Before Loginning
                        $sql3 = "UPDATE `user_otp` SET `expired`='1' WHERE id='$varID'";
                        $query3 = mysqli_query($conn, $sql3);
                        //End Of Updating The Database
                        
                    } else {
                        $message = "<p class='errorMSG'>OTP is incorrect!</p>";
                    }
                }
                ?>
                <p>
                    <?= $userEmail ?> <a href='login.php'
                        style='text-decoration: none; color: var(--color-primary);'>Change</a>
                </p>
                <?= $message ?>
                <br>
                <form action='otp.php?id=<?= $varID ?>' method='POST'>
                    <input type='text' name='otpVal' style='font-size: 20px; text-align: center; letter-spacing: 5px;'
                        placeholder='____'>
                    <button type='submit' name='checkOTP'>Submit</button>
                </form><br>
            </center>
            <a href='#' style='text-decoration: none; color: var(--color-primary);'>Resent OTP</a>
        </div>
    </div>
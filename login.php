<?php include_once("./core/header.php"); 
if (isset($_SESSION['username'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
    exit();
}
?>
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
                <h1>Let’s get started</h1>
                <p>Sign up/log in using your Email</p>
                <?php
                include("./components/email_function.php");
                //Connecting Input's With PHP Code
                $email = @$_POST['email'];
                $dateCreated = date('d-m-y');
                $ipAddress = $_SERVER['REMOTE_ADDR'];
                //End Of Connecting The Inputs
                
                if (isset($_POST['login'])) {
                    //Checking Whether The Email ID Exist In The Database Or Not
                    $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
                    $query = mysqli_query($conn, $sql);
                    $numRows = mysqli_num_rows($query);
                    //End Of Checking The Email ID
                
                    if ($numRows == "0") {
                        //Sending Data To The Database
                        $sql2 = "INSERT INTO `users`(`id`, `user_email`, `date_created`, `ip_address`) VALUES (null,'$email','$dateCreated','$ipAddress')";
                        $query2 = mysqli_query($conn, $sql2);

                        //End Of Sending The Data To The Database
                        $last_id = mysqli_insert_id($conn);
                        //Getting The SQL Last Inserted ID Of User
                
                        //Generating 4 Digit OTP
                        $otp_generation = substr(str_shuffle("0123456789"), 0, 4);
                        //End Of Generation 4 Digit OTP
                
                        //Sending The User OTP To The Database
                        $sql3 = "INSERT INTO `user_otp`(`id`, `connect`, `otp`, `expired`) VALUES (null,'$last_id','$otp_generation','0')";
                        $query3 = mysqli_query($conn, $sql3);
                        //End of Getting The User OTP
                
                        $otp_last_id = mysqli_insert_id($conn);

                        sendEmail($email, "[Tripnaholidays] Please verify OTP", "Hey!<br><br>
                        A sign in attempt requires further verification because we did not recognize your device. To complete the sign in, enter the verification code on the unrecognized device.
                        <br><br>
                        Device: <b>$otp_generation</b>
                        <br><br>
                        If you decide to enable two-factor authentication, ensure you retain access to one or more account recovery methods.
                        <br><br>
                        Thanks,
                        The Tripnaholidays Team");

                        echo "<meta http-equiv=\"refresh\" content=\"0; url=otp.php?id=$otp_last_id\">";
                        exit();
                    } else {
                        //Getting User ID From Database Cause It's Already Registered
                        $sql2 = "SELECT * FROM `users` WHERE `user_email`='$email'";
                        $query2 = mysqli_query($conn, $sql2);
                        $rows = mysqli_fetch_array($query2);
                        $last_id = $rows['id'];
                        //End Of Getting User ID
                
                        //Generating 4 Digit OTP
                        $otp_generation = substr(str_shuffle("0123456789"), 0, 4);
                        //End Of Generation 4 Digit OTP
                
                        //Cancelling All The Last Generated OTP
                        $sql4 = "UPDATE `user_otp` SET `expired`='1' WHERE `connect`='$last_id'";
                        $query4 = mysqli_query($conn, $sql4);
                        //End Of Cancelling The Last Generated OTP
                
                        //Sending The User OTP To The Database
                        $sql3 = "INSERT INTO `user_otp`(`id`, `connect`, `otp`, `expired`) VALUES (null,'$last_id','$otp_generation','0')";
                        $query3 = mysqli_query($conn, $sql3);
                        //End of Getting The User OTP
                
                        $otp_last_id = mysqli_insert_id($conn);

                        sendEmail($email, "[Tripnaholidays] Please verify OTP", "Hey!<br><br>
                        A sign in attempt requires further verification because we did not recognize your device. To complete the sign in, enter the verification code on the unrecognized device.
                        <br><br>
                        Device: <b>$otp_generation</b>
                        <br><br>
                        If you decide to enable two-factor authentication, ensure you retain access to one or more account recovery methods.
                        <br><br>
                        Thanks,
                        The Tripnaholidays Team");

                        echo "<meta http-equiv=\"refresh\" content=\"0; url=otp.php?id=$otp_last_id\">";
                        exit();
                    }

                }
                ?>
                <br>
                <form action='login.php' method='POST'>
                    <input type='email' name='email' placeholder='Email'>
                    <button type='submit' name='login'>Send OTP</button>
                </form><br>
                <p style='font-size: 13.5px;'>By logging in, you agree to our</p>
                <a href='#' style='font-size: 13.5px; text-decoration: none; color: #555;'>Terms & Conditions</a>
            </center>
        </div>
    </div>
    <?php include_once("./core/footer.php"); ?>
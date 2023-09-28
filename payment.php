<!DOCTYPE html>
<html lang="en">
<?php include_once("./core/header.php"); ?>
<?php
$thisID = @$_GET['id'];
$sql = "SELECT * FROM `passports` WHERE `id`='$thisID'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
//Fetching Passport Details
$idPass = $row['id'];
$namePass = $row['name'];
$surnamePass = $row['surname'];
$connPass = $row['conn'];
//End Of Fetching Passport Details

$sql2 = "SELECT * FROM `application_history` WHERE `id`='$connPass'";
$query2 = mysqli_query($conn, $sql2);
$rows = mysqli_fetch_assoc($query2);
//Fetching Passport Uploaded History
$idHis = $rows['id'];
$user_toHis = $rows['user_to'];
$connectHis = $rows['connect'];
//End Of Fetching Passport History

$sql3 = "SELECT * FROM `config_list_charges` WHERE `id`='$connectHis'";
$query3 = mysqli_query($conn, $sql3);
$rowss = mysqli_fetch_assoc($query3);
$amount_per_traveller = $rowss['amount_per_traveller'];
$our_fees = $rowss['our_fees'];
$connectCLC = $rowss['connect'];

//Getting The Country Name
$sql4 = "SELECT * FROM `conifg_country` WHERE `id`='$connectCLC'";
$query4 = mysqli_query($conn, $sql4);
$rowsss = mysqli_fetch_assoc($query4);
$country_name = $rowsss['country_name'];
//End Of Getting The Country

$result1 = str_replace(',', '', $amount_per_traveller);
$result2 = str_replace(',', '', $our_fees);
$total = $result1 + $result2;

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get your tourist visa, quick and easy | Tripnaholidays</title>
</head>

<body style='background: #f1f1f1;'>
    <div class='halfBack'>
        <br>
        <div id='wrapper' style='margin-top: 180px;'>
            <div class='paymentFlexContainer'>
                <div id='flexBox' style='flex: 1;'>
                    <div style='margin-top: 100px; padding: 20px;'>
                        <a href='dashboard.php'><button><i class="fa-solid fa-arrow-left-long"></i></button></a><br>
                        <h1 style='font-weight: 600;'>Complete your<br>payment</h1>
                        <span>Payment summary:</span>
                        <br><br>
                        <form action='#' method='POST' style='display: flex; gap: 10px;'>
                            <input type='text' name='code' placeholder='Apply coupon code' style='flex: 1;'
                                class='couponCodeInput'>
                            <button type='submit'>Apply</button>
                        </form><br>
                        <hr style='height: 1px; border: 0 none; background: #ccc;'>
                        <br>
                        <div class='calcFlexContainer'>
                            <div id='flexBox'>
                                <p style='font-weight: 600; font-size: 18px; line-height: 30px;'>Embassy & Appointment
                                    fees</p>
                                <p>₹
                                    <?= $amount_per_traveller ?> for
                                    <?= $country_name ?><br>
                                    <?= $namePass . " " . $surnamePass ?>
                                </p>
                            </div>
                            <div id='flexBox'>
                                <p style='text-align: right; font-size: 18px; font-weight: 500;'>₹
                                    <?= $amount_per_traveller ?>
                                </p>
                            </div>
                        </div>
                        <br>
                        <hr style='height: 1px; border: 0 none; background: #ccc;'>
                        <br>
                        <div class='calcFlexContainer'>
                            <div id='flexBox'>
                                <p style='font-weight: 600; font-size: 18px; line-height: 30px;'>Teleport fee</p>
                                <p>₹599(per traveller) x 1</p>
                            </div>
                            <div id='flexBox'>
                                <p style='text-align: right; font-size: 18px; font-weight: 500;'>₹
                                    <?= $our_fees ?>
                                </p>
                            </div>
                        </div>
                        <br>
                        <hr style='height: 1px; border: 0 none; background: #ccc;'>
                        <br>
                        <div class='calcFlexContainer'>
                            <div id='flexBox'>
                                <p style='font-weight: 600; font-size: 18px; line-height: 30px;'>Grand total</p>
                            </div>
                            <div id='flexBox'>
                                <p style='text-align: right; font-size: 18px; font-weight: 500;'>₹
                                    <?= $total ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='flexBox' style='flex: 1;'>
                    <div class='cardStack'>
                        <center>
                            <form action='#' method="POST">
                                <h2 style='font-weight: 600;'>Pay only Teleport<br>fees now<h2>
                                        <br>
                                        <h1 style='font-size: 36px;'>₹599</h1><br>
                                        <hr style='background: #eee; height: 1px; border: 0 none;'>
                        </center>
                        <br><br>
                        <p style='font-size: 18px;'><i class="fa-solid fa-check"
                                style='padding-right: 10px; color: #279EFF;'></i> Pay embassy fees later</p>
                        <br>

                        <p style='font-size: 18px;'><i class="fa-solid fa-check"
                                style='padding-right: 10px; color: #279EFF;'></i> Fully refundable, if you change your
                            mind.</p>
                        <br>
                        <p style='font-size: 18px;'><i class="fa-solid fa-check"
                                style='padding-right: 10px; color: #279EFF;'></i> Dedicated chat support.</p>
                        <br><br>
                        <button type='Submit'>Pay Now!</button>
                        </form>
                    </div>
                </div>
                <div id='flexBox' style='flex: 1;'>
                    <div class='cardStack'>
                        <center>
                            <form action='#' method="POST">
                                <h2 style='font-weight: 600;'>Pay entire fees<br>now<h2>
                                        <br>
                                        <h1 style='font-size: 36px;'>₹
                                            <?= $total ?>
                                        </h1><br>
                                        <hr style='background: #eee; height: 1px; border: 0 none;'>
                        </center>
                        <br><br>
                        <p style='font-size: 18px;'><i class="fa-solid fa-check"
                                style='padding-right: 10px; color: #279EFF;'></i> Pay nothing later</p>
                        <br>

                        <p style='font-size: 18px;'><i class="fa-solid fa-check"
                                style='padding-right: 10px; color: #279EFF;'></i> Fully refundable, before visa
                            application submission</p>
                        <br>
                        <p style='font-size: 18px;'><i class="fa-solid fa-check"
                                style='padding-right: 10px; color: #279EFF;'></i> Dedicated relationship manager</p>
                        <br><br>
                        <button type='Submit'>Pay Now!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("./core/footer.php"); ?>
</body>
<html>
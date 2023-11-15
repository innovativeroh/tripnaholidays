<?php include_once("./core/header.php");
$connectID = @$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get your tourist visa, quick and easy | Tripnaholidays</title>
</head>

<body style='background: #f1f1f1;'>
    <div class='halfBack'>
    <div style='padding: 20px;'>
    <?php include_once("./components/stepComponent.php"); ?>
        <br><br>
        <div class='defaultApplication' style='max-width: 1200px; margin-right: auto;
    margin-left: auto;'>
            <div style='padding: 20px;'>
                <p style='font-size: 18px; color: #555; font-weight: 600; display: inline;'>Select your visa type to
                    proceed</p>
            </div>
            <hr>
            <div style='padding: 10px; overflow-x: scroll;'>
                <div class='travelCard'>
                    <!-- EACH TRAVEL CARD -->
                    <?php
                    $sql = "SELECT * FROM `config_list_charges` WHERE `connect`='$connectID'";
                    $query = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($query)) {
                        $id = $rows['id'];
                        $visa_type = $rows['visa_type'];
                        $title = $rows['visa_type'];
                        $visa_type = $rows['title'];
                        $visa_structure = $rows['visa_structure'];
                        $process_time = $rows['process_time'];
                        $stay_duration = $rows['stay_duration'];
                        $visa_validity = $rows['visa_validity'];
                        $amount_per_traveller = $rows['amount_per_traveller'];
                        $our_fees = $rows['our_fees'];
                        $embassey_fees_18 = $rows['embassey_fees_18'];
                        $embassey_fees_18p = $rows['embassey_fees_18p'];
                        $embassey_fees_75 = $rows['embassey_fees_75'];
                        $covid_insurance = $rows['covid_insurance'];
                        echo "<div id='flex' style='white-space: nowrap; width: 350px !important; border-right: 1px solid #f1f1f1; background: #fff;'>
                            <div style='padding: 20px;'>
                                <div class='flexCardContainer'>
                                    <div id='flex' style='flex: 2;'>
                                        <p style='font-size: 16px;'>$stay_duration | $title</p>
                                        <p style='font-size: 13.5px;'>$title</p>
                                    </div>
                                    <div id='flex' style='flex: 1;'>
                                        <p style='text-align: right; font-weight: 600; background: #FFF3DA; padding: 10px; border-radius: 4px; color: #FD8D14; float: right; text-transform: uppercase;'>$visa_structure</p>
                                    </div>
                                </div><br>
                                <hr style='height: 1px; border: 0 none; background: #eee; margin-bottom: 15px;'>
                                <div class='flexCardContainer'>
                                    <div id='flex' style='flex: 1;'>
                                        <span style='font-size: 13.5px; color: #555; font-weight: 500;'>Visa type</span>
                                    </div>
                                    <div id='flex' style='flex: 1;'>
                                        <p style='font-size: 18px; font-weight: 600; text-align: right; color: #444;'>$visa_type</p>
                                    </div>
                                </div>
                                <br>
                                <div class='flexCardContainer'>
                                    <div id='flex' style='flex: 1;'>
                                        <span style='font-size: 13.5px; color: #555; font-weight: 500;'>Processing Time</span>
                                    </div>
                                    <div id='flex' style='flex: 1;'>
                                        <p style='font-size: 18px; font-weight: 600; text-align: right; color: #444;'>$process_time Days</p>
                                    </div>
                                </div>
                                <br>
                                <div class='flexCardContainer'>
                                    <div id='flex' style='flex: 1;'>
                                        <span style='font-size: 13.5px; color: #555; font-weight: 500;'>Stay duration</span>
                                    </div>
                                    <div id='flex' style='flex: 1;'>
                                        <p style='font-size: 18px; font-weight: 600; text-align: right; color: #444;'>$stay_duration Days</p>
                                    </div>
                                </div>
                                <br>
                                <div class='flexCardContainer'>
                                    <div id='flex' style='flex: 1;'>
                                        <span style='font-size: 13.5px; color: #555; font-weight: 500;'>Visa validity</span>
                                    </div>
                                    <div id='flex' style='flex: 1;'>
                                        <p style='font-size: 18px; font-weight: 600; text-align: right; color: #444;'>$visa_validity Days</p>
                                    </div>
                                </div>
                                <br>
                                <hr style='background: transparent; border: 0 none; border-top: 1px dashed #ccc;'>
                                <div style='padding: 20px;'>
                                    <center><h3 style='color: #241468; font-size: 20px;'>₹ $amount_per_traveller/- <span style='font-weight: 300; color: #241468; font-size: 12px;'>per traveller</span></h3></center>
                                </div>
                                <hr style='background: transparent; border: 0 none; border-top: 1px dashed #ccc;'>
                                <br>
                                <div class='flexCardContainer'>
                                    <div id='flex' style='flex: 1;'>
                                        <span style='font-size: 13.5px; color: #555; font-weight: 500;'>Tripnaholidays Fees:</span>
                                    </div>
                                    <div id='flex' style='flex: 1;'>
                                        <p style='font-size: 13.5px; font-weight: 600; text-align: right; color: #444;'>₹ $our_fees
    /- per traveller</p>
                                    </div>
                                </div>
                                <hr style='height: 1px; border: 0 none; background: #eee; margin-bottom: 15px; margin-top: 15px;'>
                                <div class='flexCardContainer'>
                                    <div id='flex' style='flex: 1;'>
                                        <span style='font-size: 13.5px; color: #555; font-weight: 500;'>Embassy fees: </span>
                                    </div>
                                    <div id='flex' style='flex: 1;'>
                                        <p style='font-size: 11px; font-weight: 400; text-align: right; color: #444;'>₹ $embassey_fees_18 (0-18)<br>
                                        ₹ $embassey_fees_18p (18-75)<br>
                                        ₹ $embassey_fees_75 (75+)</p>
                                    </div>
                                </div>
                                <a href='addApplication.php?id=$id'><button class='continueBtn'>Continue</button></a>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                    <!-- END OF TRAVEL CARD -->
                </div>
            </div>
        </div>
    </div>
    <?php include_once("./core/footer.php"); ?>
</body>
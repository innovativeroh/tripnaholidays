<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("./core/header.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get your tourist visa, quick and easy | Tripnaholidays</title>
</head>

<body style='background: #f1f1f1;'>
    <div class='halfBack'>
        <br>
        <div class='defaultApplication' style='max-width: 1200px; margin-right: auto;
    margin-left: auto; margin-top: 120px; box-shadow: 1px 1px 10px #ccc;'>
            <div style='padding: 20px;'>
                <p style='font-size: 18px; color: #555; font-weight: 600; display: inline;'>Traveller</p>
            </div>
            <hr>
            <?php
            $thisGET = @$_GET['id'];
            $pre_sql = "SELECT * FROM `passports` WHERE conn='$thisGET' AND `status`='1'";
            $pre_query = mysqli_query($conn, $pre_sql);
            $preCheck = mysqli_num_rows($pre_query);
            if($preCheck == "0") {
                echo "This One!";
            if (isset($_POST['verifyPassport'])) {
                $passNumber = @$_POST['passNumber'];
                $name = @$_POST['name'];
                $sur_name = @$_POST['surname'];
                $gender = @$_POST['gender'];
                $dob = @$_POST['dob'];
                $pobPassport = @$_POST['pobPassport'];
                $exPassport = @$_POST['exPassport'];
                $address1 = @$_POST['address1'];
                $address2 = @$_POST['address2'];
                $city = @$_POST['city'];
                $state = @$_POST['state'];
                $pincode = @$_POST['pincode'];
                $mobile = @$_POST['mobile'];
                $email = @$_POST['email'];
                if($passNumber&&$name&&$sur_name&&$pobPassport&&$address1&&$city&$state&&$mobile&&$email) {
                $sql = "INSERT INTO `passports`(`id`, `passport_number`, `name`, `surname`, `gender`, `date_of_birth`, `place_of_birth`, `pass_expiry_date`, `address_1`, `address_2`, `city`, `state`, `pincode`, `mobile`, `email`, `conn`, `status`) VALUES (null,'$passNumber','$name','$sur_name','$gender','$dob','$pobPassport','$exPassport','$address1','$address2','$city','$state','$pincode','$mobile','$email','$thisGET','1')";
                $query = mysqli_query($conn, $sql);
                
                $sql2 = "UPDATE `application_history` SET `status`='1' WHERE id='$thisGET'";
                $query2 = mysqli_query($conn, $sql2);

                echo "<meta http-equiv=\"refresh\" content=\"0; url=dashboard.php\">";
                exit();
                } else {
                    echo "Input's Are Empty!";
                }
            }
        } else {
            $GETSql = "SELECT * FROM `passports` WHERE `conn`='$thisGET'";
            $GETquery = mysqli_query($conn, $GETSql);
            while($rows = mysqli_fetch_array($GETquery)) {
                $passID = $rows['id'];
                $passNumber = $rows['passport_number'];
                $name = $rows['name'];
                $sur_name = $rows['surname'];
                $gender = $rows['gender'];
                $dob = $rows['date_of_birth'];
                $pobPassport = $rows['place_of_birth'];
                $exPassport = $rows['pass_expiry_date'];
                $address1 = $rows['address_1'];
                $address2 = $rows['address_2'];
                $city = $rows['city'];
                $state = $rows['state'];
                $pincode = $rows['pincode'];
                $mobile = $rows['mobile'];
                $email = $rows['email'];
                $paymentID = $rows['conn'];
            }
            $GETSql2 = "SELECT * FROM `application_history` WHERE `id`='$paymentID'";
            $GETquery2 = mysqli_query($conn, $GETSql2);
            $row = mysqli_fetch_array($GETquery2);
            $connect = $row['connect'];
            
            $GETSql3 = "SELECT * FROM `config_list_charges` WHERE `id`='$connect'";
            $GETquery3 = mysqli_query($conn, $GETSql3);
            $row = mysqli_fetch_array($GETquery3);
        }
            ?>
            <div style='padding: 20px;'>
                <div class='flexFormContainer'>
                    <div id='flexForm' style='flex: 1.4;'>
                        <p style='font-weight: 800; color: var(--color-dark-gray);'>Review 's basic details:</p>
                        <form action='application.php?id=<?=$thisGET;?>' method='POST'>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Passport number</label><br>
                                    <input type='input' name='passNumber' class='input_size'
                                        placeholder='Passport Number' value='<?=@$passNumber?>'>
                                </div>
                            </div>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Given name (as on Passport)</label><br>
                                    <input type='input' name='name' class='input_size' placeholder='Given name'
                                    value='<?=@$name?>'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Surname (as on Passport)</label><br>
                                    <input type='input' name='surname' class='input_size' placeholder='Surname'
                                    value='<?=@$sur_name?>'>
                                </div>
                            </div>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Sex</label><br>
                                    <select name='gender' class='input_size'>
                                        <option value='Male'>Male</option>
                                        <option value='Female'>Female</option>
                                        <option value='Others'>Others</option>
                                    </select>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Date Of Birth</label><br>
                                    <input type='date' name='dob' class='input_size' value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Place of birth</label><br>
                                    <input type='input' name='pobPassport' class='input_size'
                                        placeholder='Place of birth' value="<?=@$pobPassport?>">
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Passport expiry date</label><br>
                                    <input type='date' name='exPassport' class='input_size' value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>
                            <br><br>
                            <p style='font-weight: 800; color: var(--color-dark-gray);'>Review 's basic details:</p><br>
                            <input type='checkbox' name='resident'>
                            <p style='display: inline;'>My address in passport is same as current residential address
                            </p>
                            <br><br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Address 1</label><br>
                                    <input type='input' name='address1' class='input_size' placeholder='Address 1' value='<?=@$address1?>'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Address 2</label><br>
                                    <input type='input' name='address2' class='input_size' placeholder='Address 2'
                                    value='<?=@$address2?>'>
                                </div>
                            </div>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>City</label><br>
                                    <input type='input' name='city' class='input_size' placeholder='City'
                                    value='<?=@$city?>'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>State</label><br>
                                    <input type='input' name='state' class='input_size' placeholder='Select State'
                                    value='<?=@$state?>'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Pincode</label><br>
                                    <input type='input' name='pincode' class='input_size' placeholder='Enter Pincode'
                                    value='<?=@$pincode?>'>
                                </div>
                            </div>
                            <br>
                            <p style='font-weight: 800; color: var(--color-dark-gray);'>Contact Details</p>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Phone</label><br>
                                    <input type='tel' name='mobile' class='input_size' placeholder='Mobile'
                                    value='<?=@$mobile?>'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Email</label><br>
                                    <input type='email' name='email' class='input_size' placeholder='Email'
                                    value='<?=@$email?>'>
                                </div>
                            </div><br>
                            <?php
                            if($preCheck == "0") {
                                ?>
                            <button type="submit" name='verifyPassport' class="input_btn">Veify Traveller
                                Details</button>
                                <?php
                            } else {
                                ?>
                                <a href='payment.php?id=<?=$passID?>'><button type="button" class="input_btn">Complete Payment <i class="fa-solid fa-arrow-right"></i></button></a>
<?php
                            }
                                ?>
                        </form>
                    </div>
                    <div id='flexForm' style='flex: 1;'>
                        <div style='border: 3px dashed #888; border-radius: 10px; padding: 20px;'>
                            <img src='./resource/img/pass.jpeg' width='100%' height='250px'>
                        </div>
                        <div style='border: 3px dashed #888; margin-top: 20px; border-radius: 10px; padding: 20px;'>
                            <img src='./resource/img/pass2.png' width='100%' height='250px'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php include_once("./core/footer.php"); ?>
</body>
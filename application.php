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
            }
            ?>
            <div style='padding: 20px;'>
                <div class='flexFormContainer'>
                    <div id='flexForm' style='flex: 1.4;'>
                        <p style='font-weight: 800; color: var(--color-dark-gray);'>Review 's basic details:</p>
                        <form>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Passport number</label><br>
                                    <input type='input' name='passNumber' class='input_size'
                                        placeholder='Passport Number'>
                                </div>
                            </div>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Given name (as on Passport)</label><br>
                                    <input type='input' name='name' class='input_size' placeholder='Given name'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Surname (as on Passport)</label><br>
                                    <input type='input' name='surname' class='input_size' placeholder='Surname'>
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
                                    <input type='date' name='dob' class='input_size'>
                                </div>
                            </div>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Place of birth</label><br>
                                    <input type='input' name='pobPassport' class='input_size'
                                        placeholder='Place of birth'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Passport expiry date</label><br>
                                    <input type='date' name='exPassport' class='input_size'>
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
                                    <input type='input' name='address1' class='input_size' placeholder='Address 1'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Address 2</label><br>
                                    <input type='input' name='address2' class='input_size' placeholder='Address 2'>
                                </div>
                            </div>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>City</label><br>
                                    <input type='input' name='city' class='input_size' placeholder='City'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Address 1</label><br>
                                    <input type='input' name='state' class='input_size' placeholder='Select State'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Address 2</label><br>
                                    <input type='input' name='pincode' class='input_size' placeholder='Enter Pincode'>
                                </div>
                            </div>
                            <br>
                            <p style='font-weight: 800; color: var(--color-dark-gray);'>Contact Details</p>
                            <br>
                            <div class='formFlex'>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Phone</label><br>
                                    <input type='tel' name='mobile' class='input_size' placeholder='Mobile'>
                                </div>
                                <div id='flexForm' style='flex: 1;'>
                                    <label>Email</label><br>
                                    <input type='email' name='email' class='input_size' placeholder='Email'>
                                </div>
                            </div><br>
                            <button type="submit" name='verifyPassport' class="input_btn">Veify Traveller
                                Details</button>
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
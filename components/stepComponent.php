<?php
    $sql = "SELECT * FROM `conifg_country` WHERE `id`='$connectID'";
    $query = mysqli_query($conn, $sql);
    while($rows = mysqli_fetch_assoc($query)) {
        $symbol_code = $rows['symbol_code'];
        $country_name = $rows['country_name'];
    }
?>
<br><div class='stepsArea'>
    <div style='padding: 20px;'>
                <p style='font-size: 18px; color: #555; font-weight: 600;'>Steps to get travel visa to <?=$country_name?> (<?=$symbol_code?>)</p>    
            </div>
            <hr style='background: #eee; border: 0 none; height: 1px;'>
            <div style='width: 90%; margin-right: auto; margin-left: auto;'>
            <div class='stepVerificationFlex'>
                <div id='flex' style='flex: 1;'>
                    <div style='padding: 20px 10px;'>
                        <div class='innerStepFlex'>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-solid fa-check" style='padding: 10px; font-size: 12px; background: #FFC7EA; color: #C23373; border-radius: 100%;'></i>
                            </div>
                            <div id='flex' style='flex: 2;'>
                            <p style='font-size: 12px; font-weight: 600;'>STEP 1</p>
                            <p style='font-size: 12px; font-weight: 400;'>Complete your application on Trip Na Holidays with Very Easier Step</p>
                            </div>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-solid fa-arrow-right" style='float: right;'></i>
                            </div>
                        </div>
                    </div>
                </div>              
                <div id='flex' style='flex: 1;'>
                <div style='padding: 20px 10px;'>
                        <div class='innerStepFlex'>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-solid fa-magnifying-glass" style='padding: 10px; font-size: 12px; background: #D5FFD0; color: #0C356A; border-radius: 100%;'></i>
                            </div>
                            <div id='flex' style='flex: 2;'>
                            <p style='font-size: 12px; font-weight: 600;'>STEP 2</p>
                            <p style='font-size: 12px; font-weight: 400;'>Our visa expert will review your application and help set up your appointment with VFS</p>
                            </div>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-solid fa-arrow-right" style='float: right;'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='flex' style='flex: 1;'>
                <div style='padding: 20px 10px;'>
                        <div class='innerStepFlex'>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-solid fa-magnifying-glass" style='padding: 10px; font-size: 12px; background: #DFCCFB; color: #3D246C; border-radius: 100%;'></i>
                            </div>
                            <div id='flex' style='flex: 2;'>
                            <p style='font-size: 12px; font-weight: 600;'>STEP 3</p>
                            <p style='font-size: 12px; font-weight: 400;'>Submit your biometrics / documents at VFS on appointment day</p>
                            </div>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-solid fa-arrow-right" style='float: right;'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='flex' style='flex: 1;'>
                <div style='padding: 20px 10px;'>
                        <div class='innerStepFlex'>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-regular fa-face-smile" style='padding: 10px; font-size: 12px; background: #FFC7EA; color: #C23373; border-radius: 100%;'></i>
                            </div>
                            <div id='flex' style='flex: 2;'>
                            <p style='font-size: 12px; font-weight: 600;'>STEP 4</p>
                            <p style='font-size: 12px; font-weight: 400;'>Get your passport with stamped visa and start living your dream</p>
                            </div>
                            <div id='flex' style='flex: 1;'>
                            <i class="fa-solid fa-arrow-right" style='float: right;'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

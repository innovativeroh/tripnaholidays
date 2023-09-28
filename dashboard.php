<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once("./core/header.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get your tourist visa, quick and easy | Tripnaholidays</title>
</head>
<body style='background: #f1f1f1;'>
    <div id='extraWrapper' style='padding: 20px;'>
        <section class='dashboard'>
            <br><br>
            <center><h3>Welcome to Teleport!</h3></center>
            <hr>
            <br><br>
            <div class='flexContainer'>
    <div id='flex' style='flex: 1;'>
            <div class='searchBox'>
            <form action='pack.php' method='GET'>
                <i class="fa-brands fa-cc-visa" id="mainIcon"></i>
                <input type='text' name='q' placeholder='Where to, captain?'>
                <button type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class='countryBtn'>
            <?php
                    $sql = "SELECT * FROM `conifg_country` WHERE `active`='1'";
                    $query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_array($query)) {
                        $countryID = $rows['id'];
                        $countryName = $rows['country_name'];
                        $symbolCode = $rows['symbol_code'];
                        echo "<a href='country.php?id=$countryID'>$symbolCode $countryName</a>";
                    }
                ?>
        </div>
    </div>
</div></div>
<br><br><br><br><br>
        <form class='quickSearch'>
            <input type='text' name='searchQ' placeholder='Search by name, company'>
        </form>
        <br>
        <div class='defaultApplication'>
            <div style='padding: 20px;'>
            <?php
                $sql = "SELECT * FROM `application_history` WHERE `user_to`='$global_user_id' AND `status`='1' OR `status`='0'";
                $query = mysqli_query($conn, $sql);
                $count_numRows = mysqli_num_rows($query);
            ?>
                <p style='font-size: 18px; color: #555;'>Your draft applications (<?=$count_numRows?>)</p>
            </div>
            <hr>
            <?php
                $sql = "SELECT * FROM `application_history` WHERE `user_to`='$global_user_id' AND `status`='1' OR `status`='0'";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($query)) {
                    $ThisID1 = $rows['id'];
                    $user_to = $rows['user_to'];
                    $connect = $rows['connect'];
                    $randCode = $rows['randCode'];
                    $dateCount = $rows['dateCount'];
                    
                    $sql2 = "SELECT * FROM `config_list_charges` WHERE `id`='$connect'";
                    $query2 = mysqli_query($conn, $sql2);
                    $row = mysqli_fetch_assoc($query2);
                    $ThisID2 = $row['connect'];
                    $process_time = $row['process_time'];

                    $sql3 = "SELECT * FROM `conifg_country` WHERE `id`='$ThisID2'";
                    $query3 = mysqli_query($conn, $sql3);
                    $ro = mysqli_fetch_assoc($query3);
                    $countryName = $ro['country_name'];

                    echo "<div style='padding: 20px;'>
                    <div class='flexApplicationList'>
                        <div id='flex' style='flex: 1;'>
                            <p class='title'>$countryName</p>
                            <p class='code' style='text-transform: lowercase;'>#$randCode</p>
                        </div>
                        <div id='flex' style='flex: 1;'>
                            <a href='application.php?id=$ThisID1'><button class='applicationBtn'>Resume Application</button></a>
                            <div style='clear: both;'></div>
                        </div>
                    </div>
                </div>";
                }
            ?>
        </div>
        <br><br>
        <div class='defaultApplication'>
            <div style='padding: 20px;'>
            <?php
                $sql = "SELECT * FROM `application_history` WHERE `user_to`='$global_user_id' AND `status`='2'";
                $query = mysqli_query($conn, $sql);
                $count_numRows = mysqli_num_rows($query);
            ?>
                <p style='font-size: 18px; color: #555;'>Submitted Applications (<?=$count_numRows?>)</p>
            </div>
            <hr>
            <?php
                $sql = "SELECT * FROM `application_history` WHERE `user_to`='$global_user_id' AND `status`='2'";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($query)) {
                    $ThisID1 = $rows['id'];
                    $user_to = $rows['user_to'];
                    $connect = $rows['connect'];
                    $randCode = $rows['randCode'];
                    $dateCount = $rows['dateCount'];
                    
                    $sql2 = "SELECT * FROM `config_list_charges` WHERE `id`='$connect'";
                    $query2 = mysqli_query($conn, $sql2);
                    $row = mysqli_fetch_assoc($query2);
                    $ThisID2 = $row['connect'];
                    $process_time = $row['process_time'];

                    $sql3 = "SELECT * FROM `conifg_country` WHERE `id`='$ThisID2'";
                    $query3 = mysqli_query($conn, $sql3);
                    $ro = mysqli_fetch_assoc($query3);
                    $countryName = $ro['country_name'];

                    echo "<div style='padding: 20px;'>
                    <div class='flexApplicationList'>
                        <div id='flex' style='flex: 1;'>
                            <p class='title'>$countryName</p>
                            <p class='code' style='text-transform: lowercase;'>#$randCode</p>
                        </div>
                        <div id='flex' style='flex: 1;'>
                            <a href='application.php?id=$ThisID1'><button class='applicationBtn'>Get Details</button></a>
                            <div style='clear: both;'></div>
                        </div>
                    </div>
                </div>";
                }
            ?>
        </div>
        </section>
    </div>
    <?php include_once("./core/footer.php");?>
</body>
</html>
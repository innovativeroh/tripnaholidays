<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once("./core/header.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get your tourist visa, quick and easy | Tripnaholidays</title>
</head>
<body style='background: #f1f1f1;'>
    <div id='extraWrapper'>
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
                <p style='font-size: 18px; color: #555;'>Your draft applications (2)</p>
            </div>
            <hr>
            <div style='padding: 20px;'>
                <div class='flexApplicationList'>
                    <div id='flex' style='flex: 1;'>
                        <p class='title'>United Arab Emirates(UAE)</p>
                        <p class='code'>#rvxdg7</p>
                    </div>
                    <div id='flex' style='flex: 1;'>
                        <button class='applicationBtn'>Resume Application</button>
                        <div style='clear: both;'></div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class='defaultApplication'>
            <div style='padding: 20px;'>
                <p style='font-size: 18px; color: #555;'>Submitted applications (0)</p>
            </div>
            <hr>
            <div style='padding: 20px;'>
            </div>
        </div>
        </section>
    </div>
    <?php include_once("./core/footer.php");?>
</body>
</html>
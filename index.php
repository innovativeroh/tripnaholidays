<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once("./core/header.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get your tourist visa, quick and easy | Tripnaholidays</title>
</head>
<body>
<br><br><br><br>
<div id='wrapper'>
<div class='flexContainer'>
    <div id='flex' style='flex: 1;'>
        <h1>Obtain a tourist visa, <br> swiftly and effortlessly.
        </h1>
        <h3>Commencing at just ₹499</h3>
        <div class='searchBox'>
            <form action='pack.php' method='GET'>
                <i class="fa-brands fa-cc-visa" id="mainIcon"></i>
                <input list='browsers' name='q' placeholder='Where to, captain?' autocomplete="off">
  <datalist id="browsers">
    <?php
                $sql = "SELECT * FROM `conifg_country` WHERE `active`='1'";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)) {
                    $countryName = $rows['country_name'];
                    echo "<option value='$countryName'>$countryName</option>";
                }
    ?>
  </datalist>
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
</div>
<div id='flex' style='flex: 1.2;'>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
<lottie-player src="https://lottie.host/a241da07-a90c-4288-9aa7-6e816247a782/kUUhU20vrT.json" background="transparent" speed="1" style="width: 100%;" loop autoplay></lottie-player>
</div>
</div>
</div>
<div id="wrapper">
    <section class="howItWorks">
        <center><h1>How it works</h1><br>
    <h3>Everything visa at one place, starting from ₹499.</h3>
    </center>
    <br><br><br><br>
    <div class='flexBoxes'>
        <div id="flex" style="flex: 1;">
            <img src='./resource/img/how (1).svg'>
            <div class='paddingBox'>
                <h2>You submit the details</h2>
                <hr>
                <p>This is a simple process that can be <br> done entirely online.</p>
            </div>
        </div>
        <div id="flex" style="flex: 1;">
            <img src='./resource/img/how (2).svg'>
            <div class='paddingBox'>
                <h2>We work our magic</h2>
                <hr>
                <p>We process your visa. Easily track <br>progress via your account.</p>
            </div>
        </div>
        <div id="flex" style="flex: 1;">
            <img src='./resource/img/how (3).svg'>
            <div class='paddingBox'>
                <h2>You get your visa</h2>
                <hr>
                <p>Get your visa, once it’s approved.<br>It's that easy!</p>
            </div>
        </div>
    </div>
    </section>
</div>
<?php include_once("./core/footer.php");?>
</body>
</html>
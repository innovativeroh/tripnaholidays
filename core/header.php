<?php include_once("./core/connection.php"); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./resource/css/main.css">
<div style='background: #fff;'>
    <div id="wrapper">
        <header>
            <div class='flexContainer'>
                <div id="logoArea">
                    <a href='index.php'><img src='./resource/img/logo.png'></a>
                </div>
                <nav>
                    <a href='#'>Why Us</a>
                    <a href='#'>About Us</a>
                    <?php
                    if (isset($_SESSION['username'])) {
                        ?>
                        <a href='dashboard.php'><button id='whatsappBtn'>Dashboard <i class="fa-solid fa-arrow-right"></i></button></a>
                        <a href='logout.php'><button id='mainBtn'>Logout</button></a>
                        <?php
                    } else {
                        ?>
                        <a href='login.php'><button id='mainBtn'>Login</button></a>
                        <a href='wa.me/+918095997811'><button id='whatsappBtn'><i class="fa-brands fa-whatsapp"></i> Whatsapp</button></a>
                        <?php
                    }
                    ?>
                </nav>
                <div class='mobView'>
                    <button class='menuToggle' id='menuToggle' onclick="menuToggleFun()"><i class="fa-solid fa-bars" id="menuTIcon"></i></button>                    
                </div>
            </div>
        </header>    
    </div>
    <div class='navItems' id='navMenu'>
        <div style='padding: 10px 20px;'>
        <a href='#'>Why Us</a>
        <a href='#'>About Us</a>
        <?php
                    if (isset($_SESSION['username'])) {
                        ?>
                        <button>Dashboard <i class="fa-solid fa-arrow-right"></i></button>
                        <button>Logout</button>
                        <?php
                    } else {
                        ?>
                        <a href='login.php'><button>Login</button></a>
                        <a href='wa.me/+918095997811'><button><i class="fa-brands fa-whatsapp"></i> Whatsapp</button></a>
                        <?php
                    }
                    ?>
                    </div>
    </div>
</div>
<script>
    let menuToggle = document.querySelector("#menuToggle");
    let navMenu = document.querySelector("#navMenu"); 
    let menuTIcon = document.querySelector("#menuTIcon");
    function menuToggleFun() {
        if(navMenu.style.display === 'block') {
            navMenu.style.display = 'none';
            menuTIcon.classList.remove('fa-xmark'); // Remove the original class
            menuTIcon.classList.add('fa-bars');     // Add the new class
        } else {
            navMenu.style.display = 'block';
            menuTIcon.classList.remove('fa-bars'); // Remove the original class
            menuTIcon.classList.add('fa-xmark');     // Add the new class
        }
    }
</script>
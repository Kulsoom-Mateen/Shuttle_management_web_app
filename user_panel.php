<?php
$servername = "localhost";
$username = "root";
$password = "ksmmtn921112";
$dbname = "shuttle_management";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name1 = $name2 = "";
$name1 = $_GET['name'];
$name2 = $_GET['name'];
session_start() ;
$_SESSION['name']=$name1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Panel</title>
    <link rel="stylesheet" href="style_user_panel.css">
</head>

<body>
    <div class="topnav">
        <img src="logo.png"
            style="height:90px;width:90px;float:left;margin-top:5px;margin-left:5px;">
        <p class="para"><b>Shuttle Service Web App</b></p>
    </div>
    <nav class="navbar">
        <span class="open-slide">
            <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30">
                    <path d="M0,5 30,5" stroke="#fff" stroke-width="5" />
                    <path d="M0,14 30,14" stroke="#fff" stroke-width="5" />
                    <path d="M0,23 30,23" stroke="#fff" stroke-width="5" />
                </svg>
            </a>
        </span>
        <h2 style="margin-left:100px;color:white;font-family:Tahoma; text-align: center;">User Panel</h2>
    </nav>

        <div id="side-menu" class="side-nav" style="margin-top:110px;margin-left:8px;">
            <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
            <a href="user_profile.php?name=<?php echo $name1;?>">Profile</a>
            <a href="reset_propassword.php?name=<?php echo $name1;?>">Reset password</a>
            <a href="login1.php" onclick="logout()">Logout</a>
        </div>

    <script>
        function openSlideMenu() {
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('main').style.marginLeft = '250px';
        }

        function closeSlideMenu() {
            document.getElementById('side-menu').style.width = '0';
            document.getElementById('main').style.marginLeft = '0';
        }

        function linkbookingpage() {
            location.replace("booking.php?name=<?php echo $name1;?>")
        }
    
        function linkvoucherpage() {
            location.replace("showvoucher.php?name=<?php echo $name1;?>")
        }

        function linksearchbuspage() {
            location.replace("user_searchbus.php?name=<?php echo $name1;?>")
        }
        
        function linksearchroutepage() {
            location.replace("user_searchroute.php?name=<?php echo $name1;?>")
        }

    </script>

    <div class="flex-container">
        <div onclick="linkbookingpage()">
            <img src="booking.jpg" style="width: 150px; height: 150px; padding: 20px 0px 52px 0px; " alt="">
            <h3>Booking</h3>
        </div>
        <div onclick="linkvoucherpage()">
            <img src="payment.png" style="width: 150px; height: 150px; padding: 20px 0px 52px 0px; " alt="">
            <h3>Voucher</h3>
        </div>
        <div onclick="linksearchbuspage()">
            <img src="search.png" style="width: 210px; height: 210px; padding: 13px 13px 0px 26px;" alt="">
            <h3>Search Bus Information</h3>
        </div>
        <div onclick="linksearchroutepage()">
            <img src="search.png" style="width: 210px; height: 210px; padding: 13px 13px 0px 26px;" alt="">
            <h3>Search Route Information</h3>
        </div>
    </div>
</body>

</html>
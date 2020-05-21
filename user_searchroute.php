<?php

 $servername = "localhost";
 $username = "root";
 $password = "ksmmtn921112";
 $dbname = "shuttle_management";

 $stop1 = $stop2 = $stop3 = $stop4 = $stop5 = $stop6 = $stop7 = $stop8 = $stop9 = $stop10 = $stop11 = "";
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);

 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }

session_start() ;
$name1=$_SESSION['name'];

// define variables and set to empty values
$name = $noofmonths = $payment = "";
$name_req = $noofmonths_req = "";
$name_co = $noofmonths_co = "";
$cal="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['search-btn'])){
        $search=mysqli_real_escape_string($conn,$_POST['select']);
        $sql="select * from routes where route_id='$search'";
        $result=mysqli_query($conn,$sql);
        $queryresult=mysqli_num_rows($result);
        if($queryresult>0){
            while($row=mysqli_fetch_assoc($result)){
                $stop1=$row['stop1'];
                $stop2=$row['stop2'];
                $stop3=$row['stop3'];
                $stop4=$row['stop4'];
                $stop5=$row['stop5'];
                $stop6=$row['stop6'];
                $stop7=$row['stop7'];
                $stop8=$row['stop8'];
                $stop9=$row['stop9'];
                $stop10=$row['stop10'];
                $stop11=$row['stop11'];            
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Route</title>
    <link rel="stylesheet" href="style_user_searchroute.css">
    <style>
        .login-area {
            width: 100%;
            height: 600px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: Tahoma, sans-serif;
        }

        .form-area {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 550px;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.5);
            padding: 40px;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <img src="logo.png"
            style="height:90px;width:90px;float:left;margin-top:5px;margin-left:5px;">
        <p class="para"><b>NED University Shuttle service</b></p>
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
        <h2 style="margin-left:100px;color:white;font-family:Tahoma; text-align: center;">Search Route</h2>
    </nav>

    <div id="side-menu" class="side-nav" style="height:170px;margin-top:110px;margin-left:8px;">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="login1.php"">Logout</a>
    </div>

    <div class="booking">
        <input type="button" class="button" value="Back" style="float:right;" onclick="userbackbutton()">
        <div class="login-area">
            <div class="form-area">
                <h3>Select Route no.</h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <br>
                    <br>
                    <p>Route no .  : </p><br>
                    <select id="mySelect" onchange="calculatepayment()" name="select" style="width:300px; height: 30px;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                    </select><br><br>
                    <input type="submit" name="search-btn" value="Search"><br>
                    <p>
                        <?php 
                            echo 'Stop 1 : ';
                            echo $stop1.'<br>';
                            echo 'Stop 2 : ';
                            echo $stop2.'<br>';
                            echo 'Stop 3 : ';
                            echo $stop3.'<br>';
                            echo 'Stop 4 : ';
                            echo $stop4.'<br>';
                            echo 'Stop 5 : ';
                            echo $stop5.'<br>';
                            echo 'Stop 6 : ';
                            echo $stop6.'<br>';
                            echo 'Stop 7 : ';
                            echo $stop7.'<br>';
                            echo 'Stop 8 : ';
                            echo $stop8.'<br>';
                            echo 'Stop 9 : ';
                            echo $stop9.'<br>';
                            echo 'Stop 10 : ';
                            echo $stop10.'<br>';
                            echo 'Stop 11 : ';
                            echo $stop11.'<br>';
                        ?>
                    </p>
                </form>
            </div>
        </div>
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

        function userbackbutton(){
            location.replace("user_panel.php?name=<?php echo $name1;?>")
        }
    </script>
</body>

</html>
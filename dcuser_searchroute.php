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

session_start();
$name1 = $_SESSION['name'];
// echo $name1;

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
    if(empty($name)){
        $name_req = '*Name is required field';
    }
    else{
        $name=test_input($_POST['name']);
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $name_req='Only letters and white spaces allowed';
            $name_co="";
        }
        else{
            $name_co=$name;
            $noofmonths_co=$noofmonths;
        }
    }

    if(!empty($name_co) && !empty($noofmonths_co)){
        $cal=$noofmonths_co*600;
        $sql1= "update passenger set payment = '$cal',no_of_months = '$noofmonths_co' where p_name='".$name_co."' ";
            
    if(!mysqli_query($conn,$sql1)){
        echo 'You have not registered . Error: '.$sql."<br>" .mysqli_error($conn) ;
        exit;
    }
    else{
        header("location: user_showbusinfo.php");
    }
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Route</title>
    <link rel="stylesheet" href="style_dcuser_searchroute.css">
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

        .side-nav {
            height: 170px;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            opacity: 0.9;
            overflow-x: hidden;
            padding-top: 60px;
            transition: 0.5s;
        }

        .booking input[type="button"]{
            background-color:royalblue;
            border:none;
            color:white;
            padding:15px 32px;
            text-align:center;
            text-decoration:none;
            display:inline-block;
            font-size:16px;
            margin:4px 2px;
            cursor:pointer;
        }
        .para {
            font-size: 35px;
            color: white;
            font-family: Tahoma, sans-serif;
            font-weight: 90;
            display: block;
            margin: 0 auto;
            margin-top: 20px;
            margin-left: 10px;
            padding: 6px 0px 0px 0px;
            text-align: center;
            float: left;
        }


        h3 {
            margin: 0;
            padding: 0 0px 20px;
            font-weight: bold;
            color: #ffffff;
            text-align: center;
            font-size: 20px
        }

        .form-area p {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #ffffff;
        }

        .form-area input[type=text],
        .form-area input[type=password] {
            border: none;
            border-bottom: 1px solid #ffffff;
            background-color: transparent;
            outline: none;
            height: 40px;
            width: 300px;
            color: #ffffff;
            display: 16px;
        }

        ::placeholder {
            color: #ffffff
        }

        .form-area a {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 0px 5px 7px 5px;
        }

        .form-area input[type="submit"]{
            font-size:16px;
            font-family: sans-serif;
            width:100px;
            background-color: royalblue;
            display: block;
            margin: 13px auto;
            text-align: center;
            border: 2px solid royalblue;
            padding: 10px 10px;
            outline: none;
            color: white;
            border-radius: 100px;
            transition: 0.5s;
            cursor:pointer;
            font-weight:bold;
        }

        .form-area input[type="submit"]:hover{
            background-color: royalblue;
            color: white;
            font-weight: bold;
            width: 120px;
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

    <div id="side-menu" class="side-nav" style="margin-top:110px;margin-left:8px;">
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
            location.replace("dcuser_panel.php?name=<?php echo $name1;?>")
        }
    </script>
</body>

</html>
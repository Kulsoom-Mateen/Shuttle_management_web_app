<?php

 $servername = "localhost";
 $username = "root";
 $password = "ksmmtn921112";
 $dbname = "shuttle_management";

 $invalid="";
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 $sql="";
 $searchname="";
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 $name1 = "";
 $name1 = $_GET['name'];

// define variables and set to empty values
$name = $noofmonths = $payment = "";
$name_req = $noofmonths_req = $bus_req = $type_req = "";
$name_co = $noofmonths_co = "";
$cal="";
$busno = "";
$type = "";
$time="";
$date ="";
$validdate="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['submit'])){
        $name = test_input($_GET["name"]);
        $noofmonths=$_GET["select"];
        $busno = $_GET["busno"];
        $type = $_GET["type"];
    }
    if(empty($name)){
        $name_req = '*Name is required field';
    }
    else{
        $name=test_input($_GET['name']);
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $name_req='Only letters and white spaces allowed';
            $name_co="";
        }
        else{
            $name_co=$name;
            $noofmonths_co=$noofmonths;
        }
    }
    if(empty($busno)){
        $bus_req = '*Bus no. is required field';
    }
    if(empty($type)){
        $type_req = '*Passenger type is required field';
    }
    if($noofmonths==1){
    $date = date("Y-m-d");
    $time = strtotime("$date");
    $validdate = date("Y-m-d",strtotime("+1 month",$time));
    }
    else if($noofmonths==2){
    $date = date("Y-m-d");
    $time = strtotime("$date");
    $validdate = date("Y-m-d",strtotime("+2 month",$time));
    }
    else if($noofmonths==3){
        $date = date("Y-m-d");
        $time = strtotime("$date");
        $validdate = date("Y-m-d",strtotime("+3 month",$time));
    }
    else if($noofmonths==4){
        $date = date("Y-m-d");
        $time = strtotime("$date");
        $validdate = date("Y-m-d",strtotime("+4 month",$time));
    }
    else if($noofmonths==5){
        $date = date("Y-m-d");
        $time = strtotime("$date");
        $validdate = date("Y-m-d",strtotime("+5 month",$time));
    }
    else if($noofmonths==6){
        $date = date("Y-m-d");
        $time = strtotime("$date");
        $validdate = date("Y-m-d",strtotime("+6 month",$time));
        }
    else{
        $date = date("Y-m-d");
        $time = strtotime("$date");
        $validdate = "";
    }

    if(!empty($name_co) && !empty($noofmonths_co) && !empty($busno) && !empty($type)){
        $cal=$noofmonths_co*600;
        $sql1= "update passenger set payment = '$cal',no_of_months = '$noofmonths_co' where p_name='".$name_co."' ";
        $sql3= "delete  from pass where Passenger_name='".$name."' limit 1 ";
        $sql2= "insert into pass (bus_id,pay_date,valid_upto,no_of_months,Passenger_name,Passenger_type) VALUES ('$busno','$date','$validdate','$noofmonths_co','$name_co','$type')";
        $sql4= "insert into voucher (bank_id,p_name,payment) VALUES ('1','$name_co','$cal')";
    
            
        if(!mysqli_query($conn,$sql1)){
            echo 'You have not registered . Error: '.$sql1."<br>" .mysqli_error($conn) ;
            exit;
        }
        else if(!mysqli_query($conn,$sql3)){
            echo 'You have not registered . Error: '.$sql2."<br>" .mysqli_error($conn) ;
            exit;
        }
        else if(!mysqli_query($conn,$sql2)){
            echo 'You have not registered . Error: '.$sql2."<br>" .mysqli_error($conn) ;
            exit;
        }
        else if(!mysqli_query($conn,$sql4)){
            echo 'You have not registered . Error: '.$sql2."<br>" .mysqli_error($conn) ;
            exit;
        }
        else{
        header("location: book.php?name=$name");
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
    <title>Booking</title>
    <link rel="stylesheet" href="style_booking.css">
    <style>
        .login-area {
            width: 100%;
            height: 800px;
            background-image: url(../assets/bus-690508_960_720.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: Tahoma, sans-serif;
        }

        .form-area {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 750px;
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
        <p class="para"><b>Shuttle service Web App</b></p>
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
        <h2 style="margin-left:100px;color:white;font-family:Tahoma; text-align: center;">Booking</h2>
    </nav>

    <div id="side-menu" class="side-nav" style="height:170px;margin-top:110px;margin-left:8px;">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="login1.php"">Logout</a>
    </div>

    <div class="booking">
        <input type="button" class="button" value="Back" style="float:right;" onclick="userbackbutton()">
        <div class="login-area">
            <div class="form-area">
                <h3>Select no. of months for booking</h3>
                <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <br><p>Enter Username : </p>
                    <input type="text" name="name" id="" placeholder="Username" ><br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$name_req?></h1>
                    <br><p>Enter Bus no. : </p>
                    <input type="text" name="busno" id="" placeholder="Bus no." ><br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$bus_req?></h1>
                    <br><p>Booking date :</p><br>    
                    <p name="bookdate">
                    <?php
                     echo date("Y/m/d")."<br>";
                    ?>
                    </p>
                    <br><p>Enter passenger type : </p>
                    <input type="text" name="type" id="" placeholder="Type" ><br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$type_req?></h1>
                    <p>No. of months : </p><br>
                    <select id="mySelect" onchange="calculatepayment()" name="select" style="width:300px; height: 30px;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select><br><br>
                    <p id="payment"></p><br>
                    <input type="submit" name="submit" value="Book">
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
            location.replace("http://localhost/WEB_PROJECT(WE)/user/user_panel.php?name=<?php echo $name1;?>")
        }

        function calculatepayment(){
            var x=document.getElementById("mySelect").value;
            var y=x*600;
            document.getElementById("payment").innerHTML="Your payment = Rs . "+y;
        }

    </script>
</body>

</html>
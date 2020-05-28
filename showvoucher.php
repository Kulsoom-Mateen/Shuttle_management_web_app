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

 $name1 = $name2 = "";
 $name1 = $_GET['name'];
 $name2 = $_GET['name'];

// define variables and set to empty values
$name = $type = $noofmonths = $busid = $paydate = $validupto = "";

        $sql="select * from pass where Passenger_name='$name1'";
        $result=mysqli_query($conn,$sql);
        $queryresult=mysqli_num_rows($result);
        if($queryresult>0){
            while($row=mysqli_fetch_assoc($result)){
                $name=$row['Passenger_name'];
                $type=$row['Passenger_type'];
                $noofmonths=$row['no_of_months'];
                $busid=$row['bus_id'];
                $paydate=$row['pay_date'];
                $validupto=$row['valid_upto'];         
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
    <title>Voucher</title>
    <link rel="stylesheet" href="style_voucher.css">
    <style>
        .login-area {
            width: 100%;
            height: 500px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: Tahoma, sans-serif;
        }

        .form-area {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 460px;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            margin-top:160px;
        }

        h3 {
            margin: 0;
            padding: 0 0 15px;
            font-weight: bold;
            color: #ffffff;
            text-align: center;
            font-size: 20px
        }

        .form-area p {
            margin: 0;
            padding: 0;
            color: #ffffff;
            font-weight: bold;
            font-size: 14px;
        }

        .form-area input[type=text] {
            border: none;
            border-bottom: 1px solid #ffffff;
            background-color: transparent;
            outline: none;
            height: 30px;
            width: 400px;
            color: gold;
            display: 16px;
            font-size:17px;
            font-weight: bold;
        }

        .form-area input[type=password] {
            border: none;
            border-bottom: 1px solid #ffffff;
            background-color: transparent;
            outline: none;
            height: 30px;
            width: 400px;
            color: #ffffff;
            display: 16px;
        }

        .form-area select {
            height: 30px;
            width: 400px;
        }

        ::placeholder {
            color: #ffffff
        }

        .form-area input[type=submit] {
            font-size: 15px;
            font-family: sans-serif;
            width: 100px;
            background-color: royalblue;
            display: block;
            margin: 30px auto;
            text-align: center;
            border: 2px solid royalblue;
            padding: 10px 10px;
            outline: none;
            color: white;
            border-radius: 100px;
            transition: 0.5s;
            cursor: pointer;
            font-weight: bold;
        }

        .form-area input[type=submit]:hover {
            background-color: royalblue;
            color: #ffffff;
            font-weight: bold;
            width: 120px;
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
        <h2 style="margin-left:100px;color:white;font-family:Tahoma; text-align: center;">Voucher</h2>
    </nav>

    <div id="side-menu" class="side-nav" style="height:170px;margin-top:110px;margin-left:8px;">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="login1.php">Logout</a>
    </div>

    <div class="update">
        <input type="button" class="button" value="Back" style="float:right;" onclick="userbackbutton()">
    </div>

    <main>
        <div class="insert">
             <div class="login-area">
                <div class="form-area">
                    <form class="sign" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
                        <p>
                        <?php 
                            echo 'Name : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            echo $name.'<br><br><br>';
                            echo 'Passenger Type :&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $type.'<br><br><br>';
                            echo 'No. of months :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $noofmonths.'<br><br><br>';
                            echo 'Bus ID : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            echo $busid.'<br><br><br>';
                            echo 'Booking Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $paydate.'<br><br><br>';
                            echo 'Valid upto :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $validupto.'<br><br><br>';
                        ?>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </main>

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
    </script>
</body>

</html>
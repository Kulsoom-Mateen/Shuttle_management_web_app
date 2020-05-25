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

 session_start();
$name1 = $_SESSION['name'];
//  $name1 = "";
//  $name1 = $_GET['name'];

$busid = $dname = $cname = $routeid = $morntime = $eventime = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['search-btn'])){
        $search=mysqli_real_escape_string($conn,$_POST['busid']);
        $sql="select * from bus where bus_id='$search'";
        $result=mysqli_query($conn,$sql);
        $queryresult=mysqli_num_rows($result);
        if($queryresult>0){
            while($row=mysqli_fetch_assoc($result)){
                $busid=$row['bus_id'];
                $dname=$row['d_name'];
                $cname=$row['c_name'];
                $routeid=$row['route_id'];
                $morntime=$row['morn_time'];
                $eventime=$row['even_time'];          
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
    <title>View dutytiming</title>
    <link rel="stylesheet" href="style_dutytiming.css">
    <style>
        .login-area {
            width: 100%;
            height: 550px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: Tahoma, sans-serif;
        }

        .form-area {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            margin-top:160px;
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

        .update input[type="button"]{
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
        <h2 style="margin-left:100px;color:white;font-family:Tahoma; text-align: center;">View Duty Timing</h2>
    </nav>

    <div id="side-menu" class="side-nav" style="margin-top:110px;margin-left:8px;">
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
                    <form class="sign" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
                        <p>Enter Bus ID</p><input type="text" name="busid" value="<?php echo $busid;?>">
                        <input type="submit" name="search-btn" id="" value="View">
                        <p>
                        <?php 
                            echo 'Bus ID : &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            echo $busid.'<br><br>';
                            echo 'Driver Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $dname.'<br><br>';
                            echo 'Conductor name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $cname.'<br><br>';
                            echo 'Route ID :  &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            echo $routeid.'<br><br>';
                            echo 'Morning Time :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $morntime.'<br><br>';
                            echo 'Evening Time :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $eventime.'<br><br>';
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
            location.replace("dcuser_panel.php?name=<?php echo $name1;?>")
        }
    </script>
</body>

</html>
<?php

 $servername = "localhost";
 $username = "root";
 $password = "ksmmtn921112";
 $dbname = "shuttle_management";

 $invalid="";
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 $sql="";
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 $name1 = "";
 $name1 = $_GET['name'];

// define variables and set to empty values
$name = $busid = $email = $password ="";

$sql1="select * from driver where d_name='$name1'";
$sql2="select * from conductor where c_name='$name1'";
$result1=mysqli_query($conn,$sql1);
$result2=mysqli_query($conn,$sql2);
$queryresult1=mysqli_num_rows($result1);
$queryresult1=mysqli_num_rows($result1);
if($queryresult1>0){
    while($row=mysqli_fetch_assoc($result1)){
        $name=$row['d_name'];
        $busid=$row['bus_id'];
        $email=$row['email'];
        $password=$row['d_password'];
    }
}
else{
    while($row=mysqli_fetch_assoc($result2)){
        $name=$row['c_name'];
        $busid=$row['bus_id'];
        $email=$row['email'];
        $password=$row['c_password'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="style_dcuser_profile.css">
    <style>
        .login-area {
            width: 100%;
            height: 400px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: Tahoma, sans-serif;
        }

        .form-area {
            position: absolute;
            top: 48%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height:470px;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            margin-top:100px;
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

        .insert input[type="button"]{
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
        <h2 style="margin-left:100px;color:white;font-family:Tahoma; text-align: center;">User Profile</h2>
    </nav>

    <div id="side-menu" class="side-nav" style="margin-top:110px;margin-left:8px;">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="dcuser_profile.php">Profile</a>
        <a href="reset_propassword.php">Reset password</a>
        <a href="login1.php">Logout</a>
    </div>

    <main>
        <div class="insert">
            <input type="button" class="button" value="Back" style="float:right;" onclick="userbackbutton()">
            <div class="login-area">
                <div class="form-area">
                    <form class="sign" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
                    <p>
                        <?php 
                            echo 'Name : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            echo $name.'<br><br><br>';
                            echo 'Bus ID :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $busid.'<br><br><br>';
                            echo 'Email :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
                            echo $email.'<br><br><br>';
                            echo 'Password :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            echo $password.'<br><br><br>';
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
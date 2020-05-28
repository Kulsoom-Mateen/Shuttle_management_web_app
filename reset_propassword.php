<?php
$servername = "localhost";
$username = "root";
$password = "ksmmtn921112";
$dbname = "shuttle_management";

$invalid="";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
        $email = $_POST["email"];
        $resetpassword = $_POST["reset_password"];
        $confirmpassword=$_POST["confirm_password"];

        if(empty($_POST["email"]) || empty($_POST["reset_password"]) || empty($_POST["confirm_password"])){
            $invalid = '*Please fill all the required fields';
        }
    }
    
    if(!empty($_POST["reset_password"]) && !empty($_POST["confirm_password"])){
            if($_POST["reset_password"]!=$_POST["confirm_password"]){
                $invalid="Password should be same in both the fields";
            }
            else{
                // $confirmpassword=$_POST["confirm_password"];
                // $email = $_POST["email"];
                $sql1="update passenger set p_password = '$confirmpassword' where p_email='$email' ";
                $sql2="update driver set d_password = '$confirmpassword' where email='$email' ";
                $sql3="update conductor set c_password = '$confirmpassword' where email='$email' ";
                if(!mysqli_query($conn,$sql1)){
                    echo ' Error: '.$sql1."<br>" .mysqli_error($conn) ;
                    exit;
                }
                else if(!mysqli_query($conn,$sql2)){
                    echo ' Error: '.$sql2."<br>" .mysqli_error($conn) ;
                    exit;
                }
                else if(!mysqli_query($conn,$sql3)){
                    echo ' Error: '.$sql3."<br>" .mysqli_error($conn) ;
                    exit;
                }
                else{
                    header("location: setpassword.php");
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
    <title>Reset Password</title>
    <link rel="stylesheet" href="style_reset_propassword.css">
</head>

<body>
    <div class="topnav">
        <img src="logo.png"
            style="height:90px;width:90px;float:left;margin-top:5px;margin-left:5px;">
        <p class="para"><b>Shuttle service Web App</b></p>
    </div>
    <nav class="navbar">
        <!-- <span class="open-slide">
            <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30">
                    <path d="M0,5 30,5" stroke="#fff" stroke-width="5" />
                    <path d="M0,14 30,14" stroke="#fff" stroke-width="5" />
                    <path d="M0,23 30,23" stroke="#fff" stroke-width="5" />
                </svg>
            </a>
        </span> -->
        <h2 style="margin-left:50px;color:white;font-family:Tahoma; text-align: center;">Reset Password</h2>
    </nav>

    <!-- <div id="side-menu" class="side-nav" style="margin-top:110px;margin-left:8px;">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="user_profile.php" onclick="profile()">Profile</a>
        <a href="reset_propassword.php" onclick="reset_password()">Reset password</a>
        <a href="login1.php" onclick="logout()">Logout</a>
    </div> -->

    <div class="flex-container">
        <!-- <input type="button" class="button" value="Back" style="margin-left:1200px;height:55px;width:100px;font-size:20px;" onclick="openSlideMenu()"> -->
        <a style="margin-left:1200px;height:55px;width:100px;font-size:20px;" href="#" onclick="userbackbutton()">Back</a>
        <div class="form-area">
            <form class="box" method="POST" action="">
                <br>
                <p>Email</p>
                <input type="text" name="email" id="" placeholder="e.g. abc@email.com"><br><br>
                <p>New Password</p>
                <input type="password" name="reset_password" id=""><br><br>
                <p>Confirm Password</p>
                <input type="password" name="confirm_password" id=""><br><br>
                <h5 style="color:white;"><?php echo $invalid;?></h5>
                <input type="submit" name="submit" id="" value="OK">
            </form>
        </div>
    </div>
    </div>

    <script>
        function funct() {
            document.getElementById("pass").style.display = "block";
        }

        function userbackbutton(){
            location.replace("user_panel.php?name=<?php echo $name1;?>")
        }

        function openSlideMenu() {
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('main').style.marginLeft = '250px';
        }

        function closeSlideMenu() {
            document.getElementById('side-menu').style.width = '0';
            document.getElementById('main').style.marginLeft = '0';
        }
    </script>
</body>

</html>
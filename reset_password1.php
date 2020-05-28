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
$email1 = $email2 = "";
$email1 = $_GET['email'];
$email2 = $_GET['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
        $resetpassword = $_POST["reset_password"];
        $confirmpassword=$_POST["confirm_password"];

        if(empty($resetpassword) || empty($confirmpassword)){
            $invalid = '*Please fill all the required fields';
        }
    }
    
    if(!empty($resetpassword) && !empty($confirmpassword)){
            if($resetpassword!=$confirmpassword){
                $invalid="Password should be same in both the fields";
            }
            else{
            $sql1="update passenger set p_password = '$confirmpassword' where p_email='$email1' ";
            $sql2="update driver set d_password = '$confirmpassword' where email='$email1' ";
            $sql3="update conductor set c_password = '$confirmpassword' where email='$email1' ";

            if(!mysqli_query($conn,$sql1)){
                echo ' Error: '.$sql1."<br>" .mysqli_error($conn) ;
                exit;
            }
            else if(!mysqli_query($conn,$sql2)){
                echo ' Error: '.$sql2."<br>" .mysqli_error($conn) ;
                exit;
            }
            else if(!mysqli_query($conn,$sql1)){
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
    <title>Shuttle Service Web App</title>
    <link rel="stylesheet" href="style_forgot_password1.css">
    
    <style>
    .error{
    font-size:12px;
    color:white;
    margin-left:auto;
    text-align:center;
    }
    .button{
    font-size: 15px;
    font-family: sans-serif;
    width: 100px;
    background-color: royalblue;
    display: block;
    margin: 30px auto;
    margin-top:50px;
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
    .button:hover {
    background-color: royalblue;
    color: #ffffff;
    font-weight: bold;
    width: 120px;
    }
    </style>
</head>

<body>
    <header>
        
        <img src="logo.png" style="float:left;height:90px;padding:5px 5px;" alt="">
        <p class="header-nav">Shuttle Service Web App</p>
    </header>
    <main>
        <img src="bus_legs.png" alt="bus_legs" style="height:545px;width:100%;float:left;">
        <div class="login-area">
            <div class="form-area">
                <br><h3>Reset password</h3><br>
                <form class="box" method="POST" action="">
                    <br><br>
                    <p>Reset password</p>
                    <input type="password" name="reset_password" id=""><br><br>
                    <p>Confirm password</p>
                    <input type="password" name="confirm_password" id=""><br><br>
                    <span class="error"><?php echo $invalid;?></span>
                    <button class="button" type="submit" name="submit">OK</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>

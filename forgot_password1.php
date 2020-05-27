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

if(isset($_GET['email'])){
    $email1="";
    $email1=$_GET['email'];
    $email=$_GET['email'];

    $sql1="select * from passenger where p_email='".$email."' ";
    $result1=mysqli_query($conn,$sql1);
    $sql2="select * from driver where email='".$email."' ";
    $result2=mysqli_query($conn,$sql2);    
    $sql3="select * from conductor where email='".$email."' ";
    $result3=mysqli_query($conn,$sql3);
        
    if(mysqli_num_rows($result1)==1){
          header("location: reset_password1.php?email=$email1");
    }
    else if(mysqli_num_rows($result2)==1){
        header("location: reset_password1.php?email=$email1");
    }
    else if(mysqli_num_rows($result3)==1){
        header("location: reset_password1.php?email=$email1");
    }
    else{
        if(empty($email)){
            $invalid="Email address is required";
        }
        else{
            $invalid="You have entered incorrect email address";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NED University Shuttle Service</title>
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
        <p class="header-nav">NED University Shuttle Service</p>
    </header>
    <main>
        <img src="bus_legs.png" alt="bus_legs" style="height:545px;width:100%;float:left;">
        <div class="login-area">
            <div class="form-area">
                <br><h3>Reset password</h3><br>
                <form class="box" method="GET" action="">
                    <br><br>
                    <p>Email address</p>
                    <input type="text" name="email" id=""><br><br>
                    <span class="error"><?php echo $invalid;?></span>
                    <button class="button" type="submit" name="submit">OK</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>

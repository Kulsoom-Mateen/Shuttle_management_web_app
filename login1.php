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

if(isset($_GET['name'])){
    $name1 = "";
    $name1 = $_GET['name'];
    $name=$_GET['name'];
    $pass=$_GET['password'];

    $sql1="select * from passenger where p_name='".$name."' AND p_password='".$pass."' limit 1 ";
    $result1=mysqli_query($conn,$sql1);
    $sql2="select * from driver where d_name='".$name."' AND d_password='".$pass."' limit 1 ";
    $result2=mysqli_query($conn,$sql2);
    $sql3="select * from conductor where c_name='".$name."' AND c_password='".$pass."' limit 1 ";
    $result3=mysqli_query($conn,$sql3);
    if(mysqli_num_rows($result1)==1){
        header("location: user_panel.php?name=$name1");
    }
    else if(mysqli_num_rows($result2)==1){
        header("location: dcuser_panel.php?name=$name1");
    }
    else if(mysqli_num_rows($result3)==1){  
        header("location: dcuser_panel.php?name=$name1");
    }
    else{
        if(empty($name) OR empty($pass)){
            $invalid="Username and password are required";
        }
        else{
            $invalid="You have entered wrong username or password";
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
    <link rel="stylesheet" href="style_login1.css">
    
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
    margin-top:20px;
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
                <h3>Login Form</h3>
                <form class="box" method="GET" action="">
                    <br>
                    <p>User Name</p>
                    <input type="text" name="name" id="" placeholder="Username" ><br><br>
                    <p>Password</p>
                    <input type="password" name="password" id="" placeholder="Password" ><br><br>
                    <span class="error"><?php echo $invalid;?></span>
                    <button class="button" type="submit" name="submit">Login</button>
                    <a class="forgot" href="forgot_password1.php" style="text-align: left;float:left;margin-top: 15px;"
                        target="blank">Forgot password</a>
                    </h6>
                    <a class="join" href="registration.php" style="text-align: right;float:right;margin-top: 15px;"
                        target="blank">Not registered,join now</a></h6>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

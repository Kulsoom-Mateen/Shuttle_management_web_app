<?php
$servername = "localhost";
$username = "root";
$password = "ksmmtn921112";
$dbname = "shuttle_management";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name1 = $name2 = "";
$name1 = $_GET['name'];
$name2 = $_GET['name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <link rel="stylesheet" href="style_reg.css">
</head>

<style>

.registered{
    font-size:60px;
    margin-top:0px;
    margin-right:220px;
    margin-left:220px;
}

.button{
    height:45px;
    width:85px;
    font-size:35px;
    margin-left:600px;
}

.reg{
    height:480px;
    background-color:DodgerBlue;
    margin-top:0px;
}

</style>

<body>
    <div class="topnav">
        <img src="logo.png"
            style="height:90px;width:90px;float:left;margin-top:5px;margin-left:5px;">
        <p class="para"><b>NED University Shuttle service</b></p>
    </div>
    <div class="reg">
        <div class="registered"><p style="margin-left:140px;padding:190px 0px 0px 0px;">Seat has been booked</p></div>
        <button style="height:100px;width:170px;margin-left:580px;" class="button" type="submit" name="OK" onclick="ok()">Generate voucher</button>
    </div>
<script>
    function ok(){
        location.replace("http://localhost/user/voucher.php?name=<?php echo $name1;?>");
    }
</script>
</body>
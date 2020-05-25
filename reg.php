<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Status</title>
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
        <div class="registered"><p style="padding:190px 0px 0px 0px;">You have successfully registered</p></div>
        <button class="button" type="submit" name="OK" onclick="ok()">OK</button>
    </div>
<script>
    function ok(){
        location.replace("login1.php");
    }
</script>
</body>
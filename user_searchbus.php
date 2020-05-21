<?php

 $servername = "localhost";
 $username = "root";
 $password = "ksmmtn921112";
 $dbname = "shuttle_management";

 $dname = $cname = $morntime = $eventime = "";
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);

session_start() ;
$name1=$_SESSION['name'];

 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
    
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if(isset($_POST['search-btn'])){
        $search=mysqli_real_escape_string($conn,$_POST['select']);
        $sql="select * from bus where bus_id='$search-btn'";
        $result=mysqli_query($conn,$sql);
        $queryresult=mysqli_num_rows($result);
        if($queryresult>0){
            while($row=mysqli_fetch_assoc($result)){
                $dname=$row['d_name'];
                $cname=$row['c_name'];
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
    <title>search bus</title>
    <link rel="stylesheet" href="style_user_searchbus.css">
</head>

<body>
    <p id="abc"><php echo $name1;?></p>
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
        <h2 style="margin-left:100px;color:white;font-family:Tahoma; text-align: center;">Search Bus</h2>
    </nav>

    <div id="side-menu" class="side-nav" style="height:170px;margin-top:110px;margin-left:8px;">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="login1.php"">Logout</a>
    </div>

    <div class="booking">
        <input type="button" class="button" value="Back" style="float:right;" onclick="userbackbutton()"> 
        <div class="login-area">
            <div class="form-area">
                <h3>Select bus no.</h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <br>
                    <br>
                    <p>Bus no .  : </p><br>
                    <select id="mySelect" name="select" value="" style="width:300px; height: 30px;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                    </select><br><br>
                    <input type="submit" name="search-btn" value="Search"><br>
                    <p>
                        <?php 
                            echo 'Driver name : ';
                            echo $dname.'<br>';
                            echo 'Conductor name : ';
                            echo $cname.'<br>';
                            echo 'Morning Time : ';
                            echo $morntime.'<br>'; 
                            echo 'Evening Time : ';
                            echo $eventime.'<br>'; 
                        ?>
                    </p>
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
            location.replace("user_panel.php?name=<?php echo $name1;?>")
        }
    </script>
</body>

</html>
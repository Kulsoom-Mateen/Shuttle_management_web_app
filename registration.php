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

// define variables and set to empty values
$name = $rollno = $year = $department = $type = $email = $password = "";
$name_req= $rollno_req = $year_req = $department_req = $type_req = $email_req = $password_req = "";
$name_co= $rollno_co= $year_co= $department_co= $type_co= $email_co= $password_co = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
        $name = test_input($_POST["name"]);
        $rollno = test_input($_POST["rollno"]);
        $year = test_input($_POST["year"]);
        $department = test_input($_POST["department"]);
        $type = test_input($_POST["type"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
    }
    if(empty($name)){
        $name_req = '*Name is required field';
    }
    else{
        $name=test_input($_POST['name']);
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $name_req='Only letters and white spaces allowed';
            $name_co="";
        }
        else{
            $name_co=$name;
        }
    }
    if(empty($rollno)){
        $rollno_req = '*Roll no. is required field';
    }
    else{
        $rollno=test_input($_POST['rollno']);
        if(!preg_match("/^[A-Z0-9-]*$/",$rollno)){
            $rollno_req='Only capital letters and numbers allowed';
            $rollno_co="";
        }
        else{
            $rollno_co=$rollno;
        }
    }
    if(empty($year)){
        $year_req = '*Year is required field';
    }
    else{
        $year=test_input($_POST['year']);
        if(!preg_match("/^[0-9]*$/",$year)){
            $year_req='Only numbers allowed';
            $year_co="";
        }
        else{
            $year_co=$year;
        }
    }
    if(empty($department)){
        $department_req = '*Department is required field';
        $department_co="";
    }
    else{
        $department=test_input($_POST['department']);
        $department_co=$department;        
    }
    if(empty($type)){
        $type_req = '*Type is required field';
        $type_co="";
    }
    else{
        $type=test_input($_POST['type']);
        $type_co=$type ;       
    }
    if(empty($email)){
        $email_req= '*Email is required field';
    }
    else{
        $email=test_input($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_req='Invalid email format';
            $email_co="";
        }        
        else{
            $email_co=$email;
        }
    }
    if(empty($password)){
        $password_req = '*Password is required field';
        $password_co="";
    }
    else{
        $password=test_input($_POST['password']);
        $password_co=$password;        
    }
    if(strlen($password)<=8){
        $display= 'Password should be at least 8 characters';
    }

    if(!empty($name_co) && !empty($rollno_co) && !empty($year_co) && !empty($department_co) && !empty($type_co) && !empty($email_co)  && !empty($password_co)){
        $sql= "INSERT into passenger (p_name,roll_no,year,dept_name,u_type,p_email,p_password) VALUES ('$name_co','$rollno_co','$year_co','$department_co','$type_co','$email_co','$password_co')";
    
    if(!mysqli_query($conn,$sql)){
        echo 'You have not registered . Error: '.$sql."<br>" .mysqli_error($conn) ;
        exit;
    }
    else{
        header("location: reg.php");
    }
}}

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
    <title>Registration</title>
    <link rel="stylesheet" href="style_registration.css">
</head>

<body>

    <header>
        <img src="logo.png" style="float:left;height:90px;width:90px;margin-left:5px;margin-top:5px;" alt="">
        <a href="#" class="header-nav">NED University Shuttle Service</a>
    </header>
    <main>
        <img src="bus_legs.png" alt="bus_legs" style="height:950px;width:100%;float:left;">
        <div class="login-area">
            <div class="form-area">
                <h3>Registration</h3>
v                 <form class="sign" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
                    <p>Name</p>
                    <input type="text" name="name" value="<?=$name?>"></br></br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$name_req?></h1>
                    <p>Roll no.</p>
                    <input type="text" name="rollno" placeholder="e.g SE-000" value="<?=$rollno?>"></br></br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$rollno_req?></h1>
                    <p>Year</p>
                    <input type="text" name="year" placeholder="e.g 20--" value="<?=$year?>"></br></br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$year_req?></h1>
                    <p>Department</p>
                    <input type="text" name="department" value="<?=$department?>"></br></br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$department_req?></h1>
                    <p>Type</p>
                    <input type="text" name="type" placeholder="e.g Student/Faculty" value="<?=$type?>"></br></br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$type_req?></h1>
                    <p>Email</p>
                    <input type="text" name="email" placeholder="e.g abc@gmail.com" value="<?=$email?>"></br></br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;"><?=$email_req?></h1>
                    <p>Password</p>
                    <input type="text" name="password" value="<?=$password?>"></br></br>
                    <h1 class="error" style="color:aqua;font-size:10px;text-align:center;margin-top:0px;" value="<?=$password?>"><?=$password_req?></h1>
                    <input type="submit" name="submit" id="" value="Register">
                </form>
            </div>
        </div>
    </main>
</body>

</html>

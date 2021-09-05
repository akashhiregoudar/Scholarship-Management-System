<?php 
session_start();
if(isset($_POST['submit'])) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db){
        echo "ERROR";
        die();
    }
    $username=$_SESSION['username']=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $branch=$_SESSION['branch']=$_POST['branch'];
    $q="SELECT * FROM staffregister WHERE username='$username' and password='$password' and branch='$branch'";
    $r=mysqli_query($db,$q);
    if(!$r) {
        echo "ERROR" .mysqli_error($db);
        die($db);
    }
    if(mysqli_num_rows($r)==1){
        header('location:home.php');
    }
    else{
        echo "<script> alert('You entered wrong Username OR Password OR Choosen wrong branch') ;</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>HOD'S Login</title>
</head>
<body>
    <a href="../index.php"><button class="btn btn-danger">Home</button></a>
    <div class="form">
        <h2 class="heading">All Department HOD'S Login</h2>
        <form action="#" method="POST">
        <input class="input input1" type="text" name="username" placeholder="Enter Username"><br>
        <input class="input input2" type="password" name="password" placeholder="Enter Password"><br>
        <select class="input" name="branch" id="">
            <option class="option" value="CSE">CSE</option>
            <option class="option" value="ISE">ISE</option>
            <option class="option" value="ECE">ECE</option>
            <option class="option" value="EEE">EEE</option>
            <option class="option" value="CIV">CIV</option>
            <option class="option" value="ME">ME</option>
        </select><br>
        <input class="btnn" type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>


    

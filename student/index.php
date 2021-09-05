<?php 
session_start();
if(isset($_POST['submit'])) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db) {
        echo "ERROR";
    }
    $usn=$_SESSION['usn']=mysqli_real_escape_string($db,$_POST['usn']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $query="SELECT * FROM studentregister WHERE usn='$usn' AND password='$password'";
    $r=mysqli_query($db,$query);
    if(mysqli_num_rows($r)==1) {
        $q="SELECT usn FROM studentprofile WHERE usn='$usn'";
        $res=mysqli_query($db,$q);
        if(mysqli_num_rows($res)==1) {
            header('location:home.php');
        } else {
            header('location:profile.php');
        }
    }
    else {
        echo "<script> alert('You entered wrong USN or Password or IF you are new user please register'); </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Student Login</title>
</head>
<body>
    <a href="../index.php"><button class="btn btn-danger">Home</button></a>
    <div class="form">
        <form action="index.php" method="POST">
            <h2 class="heading">Student Login.</h2>
            <input class="input input1" type="text" name="usn" placeholder="Enter USN"><br>
            <input class="input input2" type="password" name="password" placeholder="Password"><br>
            <input class="btnn" type="submit" name="submit" value=" Login "><br><br>
            <a class="link" href="forget_password.php">Forget password?</a>
            <h5 class="link">New user?<a class=" btn btn-danger" href="register.php">Register Now</a></h5>

        </form>
    </div>

</body>
</html>
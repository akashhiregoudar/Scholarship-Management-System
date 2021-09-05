<?php
session_start();
if($_SESSION['email']) {
if(isset($_POST['submit'])) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db){
        echo "Error".mysqli_error();
    }
    $email=$_SESSION['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $q="SELECT * FROM studentregister WHERE email='$email' and username='$username'";
    $r=mysqli_query($db,$q);
    if(!$r) {
        echo "Error";
    }
    else if($password==$cpassword) {
        $q1="UPDATE studentregister SET password='$password' WHERE username='$username'";
        $r1=mysqli_query($db,$q1);
        if(!$r1) {
            echo "Error";
        }
        else {
            echo "Password Updated successfully";
            header('refresh:0; url=index.php');
        }
    }
    else{
        echo "Password and Confirm Password must match!";
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
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Change Password</title>
</head>
<body>
    <div class="form">
    <form action="#" method="post">
    <input class="input input1" type="text" name="username" placeholder="Username">
    <input class="input input2" type="password" name="password" placeholder="Password">
    <input class="input input2" type="password" name="cpassword" placeholder="Confirm Password">
    <input class="btnn" type="submit" name="submit" value="Change Password">
    </form>
    </div>
    
</body>
</html>
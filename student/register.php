<?php
session_start();
if(isset($_POST['submit'])) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db) {
        echo "ERROR".mysqli_error($db);
    }
    $usn=mysqli_real_escape_string($db,$_POST['usn']);
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $repassword=mysqli_real_escape_string($db,$_POST['repassword']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $phone=mysqli_real_escape_string($db,$_POST['phone']);
    if($repassword<>$password){
        echo "<script> alert('Re-Entered Password must be same as Password') ; </script>";
        die();
    }
    $query="INSERT INTO studentregister VALUES('$usn','$username','$password','$email','$phone')";
    $result=mysqli_query($db,$query);
    if($result) {
        echo "<script> alert('Registered Successfully'); </script>";
        header('refresh:0; url=index.php');
    }
    else {
        echo "error:".mysqli_error($db);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://use.fontawesome.com/c45a9f3d9b.js"></script>
    <title>Student Register</title>
</head>

<body>
    <div class="form">
        <h2 class="heading">Register</h2>
        <form action="register.php" method="POST">
            <input class="input input1" type="text" name="usn" placeholder="Enter USN" required pattern="2KA+[0-9]{2,2}[A-Z]{2,2}[0-9]{3,3}"
                title="Please enter in valid formate(2KA17CS001)"><br>
            <input class="input input2" type="text" name="username" placeholder="Username" required pattern="[A-Za-z]+"
                title="Only lower case letters are allowed"><br>
            <input class="input input2" type="email" name="email" placeholder="Email Id"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please insert valid email id" required><br>
            <input class="input input2" type="number" name="phone" placeholder="Mobile Number" pattern="[0-9]{10,10}"
                title="Please enter valid mobile number of 10 digit" required><br>
            <input class="input input2" type="password" name="password" placeholder="Password" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"><br>
            <input class="input input2" type="password" name="repassword" placeholder="Re-enter Password" required><br>
            <input class="btnn" type="submit" name="submit" value="Register">
        </form>
    </div>
</body>

</html>
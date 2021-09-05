<?php
session_start();
if(isset($_POST['sendotp'])) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db){
        echo "Error".mysqli_error();
    }
     $otp =$_SESSION['otp']=rand(100000,999999);
    $email=$_SESSION['email']=$_POST['email'];
    $q="SELECT * FROM studentregister WHERE email='$email'";
    $r=mysqli_query($db,$q);
    if(mysqli_num_rows($r)==1) {
       $to=$email;
       $subject="Verify your account!";
       $message="
       <h1>SKSVMACET Scholarship Portal</h1>
       <h3>Your One Time Password(OTP) is :" .$otp."</h3>
       <h3 style='color:red;'>Don't share OTP with any one else!! </h3>";
       $header="From: mail2akashhiregoudar@gmail.com"."\r\n". 
               'Cc: mail2akashhiregoudar@gmail.com'."\r\n".
               'MIME: Version: 1.0' . "\r\n". 
               "Content-Type: text/html;charset=UTF-8";
       $res=mail($to,$subject,$message,$header);
       if(!$res) {
           echo "Error";
       }
       else{
           echo "<script> alert('OTP sent Successfully, Please verify your Email Id'); </script>";
       }
       
    }
}
if(isset($_POST['verify'])) {
    $sotp=$_SESSION['otp'];
    $eotp=$_POST['otp'];
    $ans=$sotp-$eotp;
    if($ans==0){
        header('location:changepasswd.php');
    }
    else{
        echo "Error";
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
    <script src="index.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Forget Password</title>
</head>
<body>
    <div class="form">
    <form action="forget_password.php" method="post">
        <input class="input input1" type="email" name="email" placeholder="Enter registered Email Id">
        <input class="btnn" type="submit" name="sendotp" value="Send OTP" onclick="setTimeout(otpExpire,3000);">
        <br><br>
        <input class="input input2" type="number" name="otp" placeholder="Enter OTP">
        <input class="btnn" type="submit" value="Verify" name="verify">
    </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
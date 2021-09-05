<?php
if(isset($_POST['submit'])) {
    $email=$_POST['email'];
    $to= "akashhiregoudar1@gmail.com";
    $subject=$email." Wants to contact you";
    $message=$_POST['message'];
    $header="From:".$email."\r\n". 
           'MIME: Version: 1.0' . "\r\n". 
           'Reply-To:'.$email. "\r\n". 
           "Content-Type: text/html;charset=UTF-8";
    $res=mail($to,$subject,$message,$header);
    if(!$res) {
       echo "Error";
    }
    else{
       echo "<script> alert('Your message submitted successfully'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo.png">
    <title>Scholarship Portal</title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/c45a9f3d9b.js"></script>
    <link rel="stylesheet" href="css/first.css">
</head>
<body>
    <div class="pos-f-t">
    <div class="collapse" style="background-color:#fcc169;" id="navbarToggleExternalContent">
        <table class="table table-hover">
            <tbody>
                <tr>
                <td><a class="nav-link" href="index.php">Home</a></td>
                </tr>
                <tr>
                <td><a class="nav-link" href="#about">About</a></td>
                </tr>
                <tr>
                <td><a class="nav-link" href="#contact">Contact</a></td>
                </tr>
                <tr>
                <td><a class="nav-link" href="hod/index.php" ><i class="fa fa-sign-in" aria-hidden="true"></i> HOD Login</a></td>
                </tr>
                <tr>
                <td><a class="nav-link" href="staff/index.php" ><i class="fa fa-sign-in" aria-hidden="true"></i> Committee Member Login</a></td>
                </tr>
                <tr>
                <td><a class="nav-link" href="student/index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Student Login</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <nav class="navbar navbar-light bg-light">
        <div>
        <img class="navbar-brand" src="images/logo.png" alt="Logo"><h3 class="name">Smt Kamala And Sri Venkappa M. Agadi College of Engineering & Technology</h3>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    </div>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="about" id="about">
        <h1 class="heading">About</h1><br>
        <p>With the objective of encouraging meritorious students and academic excellence, many scholarships are offered for deserving candidates. The quantum of scholarship and the number of scholarships are subject to change from time to time. Changes, if any will be updated in our website.</p>
        <p>The award of scholarship for the subsequent years will be same as given at the time of admission in the first year. The percentage of scholarship amount will be constant throughout the course duration, irrespective of changes in income group.</p>
        <p>Continuation of scholarship for subsequent years will be based on academic performance of the students in the university exam as per the University rules.</p>
        <p>On 22nd March 2019, 126 students from 1st year of our college have received the Institutional Scholarship of worth Rs. 19,26,000/- </p>
    </div>

    <div class="contact" id="contact">
        <h1 class="headings">Contact</h1>
        <form class="form" action="#" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please insert valid email id">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea name="message" class="form-control" cols="30" rows="4" placeholder="Drop your message" required></textarea><br>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
        </form>
        <h3 class="visit">Follow Us On</h3>
        <a href="https://www.facebook.com/sksvlxr"><i class="fa fa-facebook-official fa-4x visits" style="color:#3b5998;" aria-hidden="true"></i></a>
        <a href="https://twitter.com/SKSVMACET_LXR"><i class="fa fa-instagram visits fa-4x" style="color: #833AB4;" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/sksvmacet_official/"><i class="fa fa-twitter visits fa-4x" style="color: #00acee;" aria-hidden="true"></i></a>
    </div>

<footer class="page-footer">
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://akashhiregoudar.github.io/akash/">Akash Hiregoudar</a> | Designed and Developed by Akash Hiregoudar.
  </div>
</footer>

</body>
</html>

<?php 
session_start();
if($_SESSION['username']) {
$username=$_SESSION['username'];
if(isset($_POST['logout'])) {
    $_SESSION['username']=array();
    session_abort();
    header('location:index.php');
}
} else{
    echo "<script> alert('Session Expired Please Login again!!!'); </script>";
    header('refresh:0; url=index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SKSVMACET-Scholardhip</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>SKSVMACET-Scholardhip</title>
</head>
<body>
    <form action="#" method="post">
    <input class="btn btn-danger" type="submit" value="Logout" name="logout" ><br><br>
    </form>
    <h1>Welcome <?php echo $username; ?></h1><br>
    <table class="table table-hover table-dark">
        <tbody>
            <tr>
            <td><a class="nav-link" href="willium.php">Mr Willium Mitchell Scholarship</a></td>
            </tr>
            <tr>
            <td><a class="nav-link" href="leadership.php">Mr Willium Mitchell Scholarship for demonstrated Leadership</a></td>
            </tr>
            <tr>
            <td><a class="nav-link" href="ramamoorthy.php">Ramamoorthy Memorial Scholarship</a></td>
            </tr>
            <tr>
            <td><a class="nav-link" href="sunita.php">Smt Sunita Srivastava Scholarship</a></td>
            </tr>
            <tr>
            <td><a class="nav-link" href="saibaba.php">Sri Shirdi Saibaba Scholarship</a></td>
            </tr>
            <tr>
            <td><a class="nav-link" href="satish.php">Sri Satish Anand Scholarship</a></td>
            </tr>
            <tr>
            <td><a class="nav-link" href="teachers.php">SKSVMA Teachers Scholarship</a></td>
            </tr>
            <tr>
            <td><a class="nav-link" href="shakuntalamma.php">Smt Pathre Shakuntalamma Scholarship</a></td>
            </tr>
        </tbody>
    </table>
    <footer class="page-footer">
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="../../My-Site/">Akash Hiregoudar</a> | Designed and Developed by Akash Hiregoudar.
  </div>
</footer>
</body> 
</html>


<?php 
session_start();
if($_SESSION['usn']) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db) {
        echo "ERROR".mysqli_error($db);
    }
    $usn=$_SESSION['usn'];
    $q="SELECT username FROM studentregister WHERE usn='$usn'";
    $r=mysqli_query($db,$q);
    if(!$r) {
        echo "error".mysqli_error($r);
    }
    $row=mysqli_fetch_assoc($r);
    if(isset($_POST['logout'])) {
        $_SESSION['usn']=array();
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
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home.css">
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
    <title>SKSVMACET-Scholarship</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">SKSVMACET</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="editProfile.php">Edit Profile</a>
        </li>
        <li class="nav-item">
        <form action="#" method="post">
        <input class="button" type="submit" name="logout" value="Logout" class="nav-item">
        </form>
        </li>
        </ul>
    </div>
    </nav>    



    <h1 class="card-header">Welcome <?php echo $row['username'];?></h1>
    <div class="row">
        <div class="card col-md-6">
        <h5 class="card-header">Sri Shirdi SaiBaba Scholarships Mr Partha Mukherjee</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	First semester students of SKSVMACET.</p>
            <p class="card-text">2	Minimum 65% marks in PCM.</p>
            <p class="card-text">3	Highest marks among applied students.</p>        
            <p class="card-text">4	Family income : Less than 150000/-annum.</p>        
            <p class="card-text">5	Should not have taken admission in SNQ quota.</p>        
            <label for=""><input type="checkbox" name="eligible" class="checkbox1"> Yes, I'm Eligible for above criteria</label><br>
            <a href="saibaba.php"><button class="btn btn-success float-right" id="c1" disabled> Apply Now</button></a>
        </div>
        </div>
        <script>
        $('.checkbox1').click(function() {
            if ($(this).is(':checked')) {
                $('#c1').removeAttr('disabled');
            } else {
                $('#c1').attr('disabled',true);
            }
        });
        </script>
        <div class="card col-md-6">
        <h5 class="card-header">SMT SUNITA SRIVASTAVA SCHOLARSHIPS</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	 Girl Student of SKSVMACET.</p>
            <p class="card-text">2	Should not have taken admission in SNQ quota.</p>
            <p class="card-text">3	Financially challenged </p>
            <p class="card-text">4	Family income : Less than 50000/annum(BPL card)</p>
            <label for=""><input type="checkbox" name="eligible" class="checkbox2"> Yes, I'm Eligible for above criteria</label><br>
            <a href="sunita.php"><button class="btn btn-success float-right" disabled="disabled" id="c2"> Apply Now</button></a>
        </div>
        </div>
    </div>
    <script>
        $('.checkbox2').click(function() {
            if ($(this).is(':checked')) {
                $('#c2').removeAttr('disabled');
            } else {
                $('#c2').attr('disabled',true);
            }
        });
        </script>
    <div class="row">
        <div class="card col-md-6">
        <h5 class="card-header">SRI SATISH ANAND</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	Student of SKSVMACET.</p>
            <p class="card-text">2	Should not have taken admission in SNQ quota.</p>
            <p class="card-text">3	Financially challenged </p>
            <p class="card-text">4	Family income : Less than 50000/annum(BPL CARD)</p>
            <label for=""><input type="checkbox" name="eligible" class="checkbox3"> Yes, I'm Eligible for above criteria</label><br>
            <a href="satish.php"><button class="btn btn-success float-right" disabled="disabled" id="c3"> Apply Now</button></a>
        </div>
        </div>
        <script>
        $('.checkbox3').click(function() {
            if ($(this).is(':checked')) {
                $('#c3').removeAttr('disabled');
            } else {
                $('#c3').attr('disabled',true);
            }
        });
        </script>
        <div class="card col-md-6">
        <h5 class="card-header">SKSVMA TEACHERS SCHOLARSHIPS</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	Student of SKSVMACET.</p>
            <p class="card-text">2	Should not have taken admission in SNQ quota.</p>
            <p class="card-text">3	Good academic records.</p>
            <p class="card-text">4	Preferably Fifth Semester student.</p>
            <p class="card-text">5	One student from each branch and one for first semester.</p>
            <p class="card-text">6	On recommendations of HOD of the branch.</p>
            <label for=""><input type="checkbox" name="eligible" class="checkbox4"> Yes, I'm Eligible for above criteria</label><br>
            <a href="teachers.php"><button class="btn btn-success float-right" disabled="disabled" id="c4"> Apply Now</button></a>
        </div>
        </div>
    </div>
    <script>
        $('.checkbox4').click(function() {
            if ($(this).is(':checked')) {
                $('#c4').removeAttr('disabled');
            } else {
                $('#c4').attr('disabled',true);
            }
        });
        </script>
    <div class="row">
        <div class="card col-md-6">
        <h5 class="card-header">SMT PATHRE SHAKUNTALAMMA SCHOLARSHIPS</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	Girl Student of SKSVMACET.</p>
            <p class="card-text">2	Orphan(deprived of parents)</p>
            <p class="card-text">3	Should not have taken admission in SNQ quota.</p>
            <p class="card-text">4	Financially challenged</p>
            <p class="card-text">5	Family income : Less than 50000/annum(BPL card)</p>
            <label for=""><input type="checkbox" name="eligible" class="checkbox5"> Yes, I'm Eligible for above criteria</label><br>
            <a href="shakuntalamma.php"><button class="btn btn-success float-right" disabled="disabled" id="c5"> Apply Now</button></a>
        </div>
        </div>
        <script>
        $('.checkbox5').click(function() {
            if ($(this).is(':checked')) {
                $('#c5').removeAttr('disabled');
            } else {
                $('#c5').attr('disabled',true);
            }
        });
        </script>
        <div class="card col-md-6">
        <h5 class="card-header">Mr WILLIUM MITCHELL SCHOLARSHIPS</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	Student of SKSVMACET.</p>
            <p class="card-text">2	Should not have taken admission in SNQ quota.</p>
            <p class="card-text">3	Belong to Christian community.</p>
            <p class="card-text">4	Family income : Less than 150000/annum</p>
            <label for=""><input type="checkbox" name="eligible" class="checkbox6"> Yes, I'm Eligible for above criteria</label><br>
            <a href="willium.php"><button class="btn btn-success float-right" disabled="disabled" id="c6"> Apply Now</button></a>
        </div>
        </div>
    </div>
    <script>
        $('.checkbox6').click(function() {
            if ($(this).is(':checked')) {
                $('#c6').removeAttr('disabled');
            } else {
                $('#c6').attr('disabled',true);
            }
        });
        </script>
    <div class="row">
        <div class="card col-md-6">
        <h5 class="card-header">Mr WILLIUM MITCHELL SCHOLARSHIPS FOR DEMONSTRATED LEADERSHIP</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	Student of SKSVMACET. Preferably VII semester.</p>
            <p class="card-text">2  Exhibited leadership Quality in organizing functions, leadership in NSS, Leed  Foundation, Games and participated or won the national level or state level sports. Proofs for Claim.</p>
            <label for=""><input type="checkbox" name="eligible" class="checkbox7"> Yes, I'm Eligible for above criteria</label><br>
            <a href="leadership.php"><button class="btn btn-success float-right" disabled="disabled" id="c7"> Apply Now</button></a>
        </div>
        </div>
        <script>
        $('.checkbox7').click(function() {
            if ($(this).is(':checked')) {
                $('#c7').removeAttr('disabled');
            } else {
                $('#c7').attr('disabled',true);
            }
        });
        </script>
        <div class="card col-md-6">
        <h5 class="card-header">RAMAMOORTHY MEMORIAL SCHOLARSHIPS</h5>
        <div class="card-body">
            <h5 class="card-title">Eligibility Criteria</h5>
            <p class="card-text">1	Son or Daughter of widow</p>
            <p class="card-text">2	First semester students of SKSVMACET.</p>
            <p class="card-text">3	Minimum 55% marks in PCM.</p>
            <p class="card-text">4	Highest marks among applied students.</p>
            <p class="card-text">5  Family income : Less than 50000/-annum</p>
            <p class="card-text">6  Should not have taken admission in SNQ quota</p>
            <label for=""><input type="checkbox" name="eligible" class="checkbox8"> Yes, I'm Eligible for above criteria</label><br>
            <a href="ramamoorthy.php"><button class="btn btn-success float-right" disabled="disabled" id="c8"> Apply Now</button></a>
        </div>
        </div>
    </div>
    <script>
        $('.checkbox8').click(function() {
            if ($(this).is(':checked')) {
                $('#c8').removeAttr('disabled');
            } else {
                $('#c8').attr('disabled',true);
            }
        });
        </script>

<footer class="page-footer">
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://akashhiregoudar.github.io/akash/">Akash Hiregoudar</a> |Designed and Developed by Akash Hiregoudar.
  </div>
</footer>
</body>
</html>

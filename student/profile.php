<?php
session_start();
if(isset($_POST['submit'])) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db) {
        echo "ERROR";
    } 
    if($_SESSION['usn']) {
        $fname=$_SESSION['fname']=$_POST['fname'];
        $lname=$_POST['lname'];
        $usn=$_SESSION['usn'];
        $branch=$_POST['branch'];
        $sem=$_POST['sem'];
        $dob=$_POST['dob'];
        $correspondanceAddress=$_POST['correspondanceAddress'];
        $permanentAdderss=$_POST['permanentAdderss'];
        $phone=$_POST['phone'];
        $altPhone=$_POST['altPhone'];
        $pucPercentage=$_POST['pucPercentage'];
        $pcmPercentage=$_POST['pcmPercentage'];
        $cetRank=$_POST['cetRank'];
        $firstSem=$_POST['firstSem'];
        $secondSem=$_POST['secondSem'];
        $thirdSem=$_POST['thirdSem'];
        $fourthSem=$_POST['fourthSem'];
        $fifthSem=$_POST['fifthSem'];
        $sixthSem=$_POST['sixthSem'];
        $average=((double)$firstSem+(double)$secondSem+(double)$thirdSem+(double)$fourthSem+(double)$fifthSem+(double)$sixthSem)/($sem-1);
        $agreegateCgpa=$average;
        $income=$_POST['income'];

        $photo=$_SESSION['usn'].$_FILES['photo']['name'];
        $destination='../uploads/profile/'.$photo;
        $extension = pathinfo($photo, PATHINFO_BASENAME);
        $file = $_FILES['photo']['tmp_name'];
        $size = $_FILES['photo']['size'];
        if($size < 100000) {
            if (move_uploaded_file($file, $destination)) {
                $query="INSERT INTO studentprofile VALUES('$fname','$lname','$usn','$branch','$sem','$dob','$correspondanceAddress','$permanentAdderss','$phone','$altPhone','$pucPercentage','$pcmPercentage','$cetRank','$firstSem','$secondSem','$thirdSem','$fourthSem','$fifthSem','$sixthSem','$agreegateCgpa','$income','$photo')";
                if (!mysqli_query($db, $query)) {
                    echo "Error".mysqli_error($db);
                } else {
                    echo "<script> alert('Profile submitted successfully.'); </script>";
                    header('refresh:0; url=home.php');
                }
            }
        } else {
            echo "<script> alert('Please upload files having size less than 100kb'); </script>";
        }       
    } 
    else {
        echo "<script> alert('Your session has been expired! please login again'); </script>";
        header('refresh:0; url:index.php');
    }
    
}
if(isset($_POST['logout'])) {
    $_SESSION['usn']=array();
    session_abort();
    header('location:index.php');
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
    <link rel="stylesheet" href="../css/profile.css">
    <title>Profile</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SKSVMACET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
            <form action="#" method="post">
            <input class="button" type="submit" name="logout" value="Logout" class="nav-item">
            </form>
            </li>
            </ul>
        </div>
    </nav>
    <h1 class="label">Complete your profile</h1>

<div class="main">
<p style="color:red;">All fields are compulsory</p>
<form action="#" method="POST" enctype="multipart/form-data">
    <div class="row">
            <div class="col">
            <input class="form-control" type="text" name="fname" placeholder="First Name" pattern="[A-Za-z]+" title="Only characters are allowed" required>
            </div>
            <div class="col">
            <input class="form-control" type="text" name="lname" placeholder="Last Name" pattern="[A-Za-z]+" title="Only characters are allowed" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="text" name="usn" name="usn" placeholder="USN" value=" <?php echo $_SESSION['usn']; ?> " readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <select class="form-control" name="branch" required>
                <option>SELECT</option>
                <option value="CSE">CSE</option>
                <option value="ISE">ISE</option>
                <option value="ECE">ECE</option>
                <option value="EEE">EEE</option>
                <option value="CIV">CIV</option>
                <option value="ME">ME</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="number" name="sem" placeholder="Your Current Sem" max="8" pattern="[0-9]{1,8}" title="Enter your sem(1-8) are allowed" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="date" name="dob" placeholder="Date of Birth" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <textarea class="form-control" name="correspondanceAddress" placeholder="Correspondance Address" cols="30" rows="4" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <textarea class="form-control" name="permanentAdderss" placeholder="Permanent Adderss" cols="30" rows="4" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="tel" name="phone" placeholder="Phone Number" size="10" pattern="[\d]{10,10}" title="Enter valid moblie number" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="tel" name="altPhone" placeholder="Alternative phone number" size="10" pattern="[\d]{10,10}" title="Enter valid moblie number" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="number" name="pucPercentage" placeholder="PUC Percentage" step="0.01" pattern="[\d]{45,99}" title="Only numeric characters between 50 to 100 are allowed" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="number" name="pcmPercentage" placeholder="PCM Percentage" step="0.01" pattern="[\d]{45,99}" title="Only numeric characters between 50 to 100 are allowed" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="number" name="cetRank" placeholder="CET Rank" pattern="[\d]" title="Only numeric are allowed" required> 
            </div>
        </div>
        <label>SGPA of previous Semester exams:</label>
        <div class="row">
            <div class="col">
            <input class="form-control" placeholder="1st sem sgpa" type="number" name="firstSem" min="4" max="10" step="0.01" required>
            </div>
            <div class="col">
            <input class="form-control" placeholder="2nd sem sgpa" type="number" name="secondSem" min="4" max="10" step="0.01">
            </div>
            <div class="col">
            <input class="form-control" placeholder="3rd sem sgpa" type="number" name="thirdSem" min="4" max="10" step="0.01">
            </div>
            <div class="col">
            <input class="form-control" placeholder="4th sem sgpa" type="number" name="fourthSem" min="4" max="10" step="0.01">
            </div>
            <div class="col">
            <input class="form-control" placeholder="5th sem sgpa" type="number" name="fifthSem" min="4" max="10" step="0.01">
            </div>
            <div class="col">
            <input class="form-control" placeholder="6th sem sgpa" type="number" name="sixthSem" min="4" max="10" step="0.01">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="number" name="agreegateCgpa" placeholder="Agreegate CGPA" min="4" min="5" max="10" step="0.01" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input class="form-control" type="number" name="income" placeholder="Parent annual income" pattern="[\d]" title="Only numbers are allowed" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <label  for="photo">Upload your passport size photo</label>
            <input  type="file" name="photo">
            </div>
        </div><br>
        <label for=""><input type="checkbox" name="eligible" class="checkbox1">The above information provided by me is true to the best of my Knowledge and belief.</label><br>							
            <input class="btn btn-success" id="c1" type="submit" name="submit" value="Submit" disabled>
    </div>        
</form>
<script>
        $('.checkbox1').click(function() {
            if ($(this).is(':checked')) {
                $('#c1').removeAttr('disabled');
            } else {
                $('#c1').attr('disabled',true);
            }
        });
</script>
    
</body>

</html>
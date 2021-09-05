<?php
session_start();
if($_SESSION['usn']) {
    $usn=$_SESSION['usn'];
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db) {
        echo "ERROR";
    }
    $q="SELECT * FROM studentprofile WHERE usn='$usn'";
    $r=mysqli_query($db,$q);
    if(!$r) {
        echo "Error".mysqli_error();
    }

    if(isset($_POST['submit'])) {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $usn=$_POST['usn'];
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
        $agreegateCgpa=$_POST['agreegateCgpa'];
        $income=$_POST['income'];
        $query="UPDATE studentprofile SET fname='$fname' , lname='$lname' , usn='$usn' , dob='$dob' , correspondance_address='$correspondanceAddress' , permanent_address='$permanentAdderss' , phone='$phone' , altphone='$altPhone' , puc_percentage='$pucPercentage' , pcm_percentage='$pcmPercentage' , cet_rank='$cetRank' , 1st_sem_sgpa='$firstSem' , 2nd_sem_sgpa='$secondSem' , 3rd_sem_sgpa='$thirdSem' , 4th_sem_sgpa='$fourthSem' , 5th_sem_sgpa='$fifthSem' , 6th_sem_sgpa='$sixthSem' , agreegate_cgpa='$agreegateCgpa' , income='$income' , photo='$photo' WHERE usn='$usn'";
        if (!mysqli_query($db, $query)) {
            echo "Error".mysqli_error($db);
        } else {
            echo "<script> alert('Profile updated successfully.'); </script>";
            header('refresh:0; url=home.php');
        }
        
    }         
}
else {
    echo "<script> alert('Session has Expired please login again'); </script>";
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
    <link rel="stylesheet" href="../css/profile.css">
    <title>Edit your profile</title>
</head>

<body>
<a href="home.php"><button class="btn btn-primary">Home</button></a>
    <h1>Edit your profile.</h1>
    <?php 
    if(mysqli_num_rows($r)==1) {
        $row=mysqli_fetch_assoc($r); ?>
        <div class="main">
            <form action="#" method="POST">
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="text" name="fname" value="<?php echo $row['fname']; ?>">
                    </div>
                    <div class="col">
                    <input class="form-control" type="text" name="lname" value="<?php echo $row['lname']; ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="text" name="usn" name="usn" value="<?php echo $row['usn']; ?>" readonly>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="number" name="sem" value="<?php echo $row['sem']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="date" name="dob" value="<?php echo $row['dob']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="text" name="correspondanceAddress" value="<?php echo $row['correspondance_address']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="text" name="permanentAdderss" value="<?php echo $row['permanent_address']; ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="tel" name="phone" value="<?php echo $row['phone']; ?>" size="10"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="tel" name="altPhone" value="<?php echo $row['altphone']; ?>" size="10"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="">PUC Percentage</label>
                    <input class="form-control" type="number" name="pucPercentage" step="0.01" value="<?php echo $row['puc_percentage']; ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="">PCM Percentage</label>
                    <input class="form-control" type="number" name="pcmPercentage" step="0.01" value="<?php echo $row['pcm_percentage']; ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="">CET Rank</label>
                    <input class="form-control" type="number" name="cetRank" value="<?php echo $row['cet_rank']; ?>"><br>
                    </div>
                </div>
                <label>SGPA of previous Semester exams:</label>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="number" name="firstSem" value="<?php echo $row['1st_sem_sgpa']; ?>" max="10" step="0.01">                </div>
                    <div class="col">
                    <input class="form-control" type="number" name="secondSem" value="<?php echo $row['2nd_sem_sgpa']; ?>" max="10" step="0.01">                </div>
                    <div class="col">
                    <input class="form-control" type="number" name="thirdSem" value="<?php echo $row['3rd_sem_sgpa']; ?>" max="10" step="0.01">                </div>
                    <div class="col">
                    <input class="form-control" type="number" name="fourthSem" value="<?php echo $row['4th_sem_sgpa']; ?>" max="10" step="0.01">                </div>
                    <div class="col">
                    <input class="form-control" type="number" name="fifthSem" max="10" value="<?php echo $row['5th_sem_sgpa']; ?>" step="0.01">                </div>
                    <div class="col">
                    <input class="form-control" type="number" name="sixthSem" max="10" value="<?php echo $row['6th_sem_sgpa']; ?>" step="0.01">                </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="number" name="agreegateCgpa" value="<?php echo $row['agreegate_cgpa']; ?>" step="0.01">                </div>
                </div>
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="number" name="income" value="<?php echo $row['income']; ?>">                </div>
                </div>
                
                    <input class="btn btn-success " type="submit" name="submit" value="Submit">
            </form>
        </div>

    <?php } ?>
    
        </div>

        
</body>

</html>
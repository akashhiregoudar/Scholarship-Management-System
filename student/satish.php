<?php
session_start(); 
if($_SESSION['usn']) {
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db) {
        echo "ERROR".mysqli_error($db);
    }
    $usn=$_SESSION['usn'];
    $q="SELECT * FROM satish where usn='$usn'";
    $r=mysqli_query($db,$q);
    if(mysqli_num_rows($r)>=1) {
        echo "<script> alert('You have already applied for this scholarship'); </script>";
        header( "refresh:0; url=home.php" );
    }
    $q1="SELECT income FROM studentprofile where usn='$usn'";
    $r1=mysqli_query($db,$q1);
    $row=mysqli_fetch_array($r1);
    if($row['income']>=50001) {
        echo "<script> alert('You are not eligible for this Scholarship.'); </script>";
        header('refresh:0; url=home.php');
    }
    if(isset($_POST['submit'])) {
        $s1=$_FILES['puc']['size'];
        $s2=$_FILES['markscard1']['size'];
        $s3=$_FILES['markscard2']['size'];
        $s4=$_FILES['bpl']['size'];
        $s5=$_FILES['signature']['size'];
        if($s1<100000 and $s2<100000 and $s3<100000 and $s4<100000 and $s5<100000) {
            $puc=$_SESSION['usn'].$_FILES['puc']['name'];
            $destination1='../uploads/satish/'.$puc;
            $extension = pathinfo($puc, PATHINFO_BASENAME);
            $file1 = $_FILES['puc']['tmp_name'];

            $markscard1=$_SESSION['usn'].$_FILES['markscard1']['name'];
            $destination2='../uploads/satish/'.$markscard1;
            $extension = pathinfo($markscard1, PATHINFO_BASENAME);
            $file2 = $_FILES['markscard1']['tmp_name'];

            $markscard2=$_SESSION['usn'].$_FILES['markscard2']['name'];
            $destination3='../uploads/satish/'.$markscard2;
            $extension = pathinfo($markscard2, PATHINFO_BASENAME);
            $file3 = $_FILES['markscard2']['tmp_name'];

            $bpl=$_SESSION['usn'].$_FILES['bpl']['name'];
            $destination4='../uploads/satish/'.$bpl;
            $extension = pathinfo($bpl, PATHINFO_BASENAME);
            $file4 = $_FILES['bpl']['tmp_name'];

            $signature=$_SESSION['usn'].$_FILES['signature']['name'];
            $destination5='../uploads/satish/'.$signature;
            $extension = pathinfo($signature, PATHINFO_BASENAME);
            $file5 = $_FILES['signature']['tmp_name'];

            if (move_uploaded_file($file1, $destination1) and move_uploaded_file($file2, $destination2) and move_uploaded_file($file3, $destination3) and move_uploaded_file($file4, $destination4) and move_uploaded_file($file5, $destination5)) {
                $query="INSERT INTO satish(usn,puc,markscard1,markscard2,bpl,signature) VALUES('$usn','$puc','$markscard1','$markscard2','$bpl','$signature')";
                if (!mysqli_query($db, $query)) {
                    echo "Error".mysqli_error($db);
                } else {
                    $q2="SELECT email FROM studentregister WHERE usn='$usn'";
                    $q3="SELECT app_no FROM satish WHERE usn='$usn'";
                    $r2=mysqli_query($db,$q2);
                    $r3=mysqli_query($db,$q3);
                    $row2=mysqli_fetch_array($r2);
                    $row3=mysqli_fetch_array($r3);
                    $to=$row2['email'];
                    $subject="Confirmation Email for you Scholarship Application";
                    $message="
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                        <title>SKSVMACET</title>
                    </head>
                    <body>
                        <header style='background-color:#fcc169; padding:3rem; text-align: center; font-size: 2rem;'>SKSVMACET-Scholarship Portal</header>
                        <div style='text-align: center; padding-left: 2rem; padding-right: 2rem;'>
                            <h1>Confirmation response from SKSVMACET-Scholarship Portal</h1>
                            <h2>Sri Satish Anand Scholarship</h2>
                            <h3>Your Application number :" .strip_tags($row3['app_no'])."</h3>
                            <h3>Your Application is successfully submitted. <br> Consider this email as acknowedgement for your applied scholarship application.<br>Remember application number for further queries</h3>
                            <h2>Thank You.</h2>
                        </div>
                    </body>
                    </html>";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: <mail2akashhiregoudar@gmail.com>' . "\r\n";
                    $headers .= 'Cc: mail2akashhiregoudar@gmail.com' . "\r\n";
                    $a=mail($to,$subject,$message,$headers);
                    if($a){
                        echo "<script> alert('Your Application submitted successfully.') ; </script>";
                        header('refresh:0; url=home.php');
                    }
                }
            }

        } else {
            echo "<script> alert('Upload files size less than 100kb') ; </script>";
        }
    }
}
else {
echo "<script> alert('Session Expired please login again') ; </script>";
header('refresh:0; url=index.php');
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
    <link rel="stylesheet" href="../css/form.css">
    <title>Sri Satish Anand</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SKSVMACET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <form action="#" method="post">
            <input class="button" type="submit" name="logout" value="Logout" class="nav-item">
            </form>
            </li>
            </ul>
        </div>
    </nav>

    <div class="main">
    <h1>Sri Satish Anand Scholarship</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <table align="center">
            <tbody>
                <tr>
                <td><label>PUC Markscard</label></td>
                <td><input type="file" name="puc" ></td>
                </tr>
                <tr>
                <td><label>Previous Two sem marks card</label></td>
                <td><input type="file" name="markscard1" ></td>
                <td><input type="file" name="markscard2" ></td>
                </tr>
                <tr>
                <td><label>Cerificate of BPL</label></td>
                <td><input type="file" name="bpl"></td>
                </tr>
                <tr>
                <td><label>Signature</label></td>
                <td> <input type="file" name="signature" ></td>
                </tr>
            </tbody>
        </table>
        <label for=""><input type="checkbox" name="eligible" class="checkbox1">The above information provided by me is true to the best of my 							
            Knowledge and belief.</label><br>
        <tr><td><input class="btn btn-success btnn" type="submit" value="Submit" name="submit" id="c1" disabled></td></tr>
        </form>
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
</body>
</html>
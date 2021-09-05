<?php
session_start();
if($_SESSION['branch']) {
    $branch=$_SESSION['branch'];
    $db=mysqli_connect('localhost','root','','scholarship');
    if(!$db){
        echo "Error".mysqli_error($db);
    } 
    $q="SELECT * FROM studentprofile INNER JOIN teachers ON studentprofile.usn=teachers.usn WHERE branch='$branch'";
    $r=mysqli_query($db,$q);
    if(!$r) {
        echo "Error ".mysqli_error($db);
    }

    if(isset($_POST['submit'])) {
      $usn=$_POST['usn'];
      $remark=$_POST['performance']." ".$_POST['recommend'];
      $q1="UPDATE teachers SET remarks='$remark' WHERE usn='$usn'";
      $r1=mysqli_query($db,$q1);
      if(!$r1) {
        echo "Error ".mysqli_error($r1);
      } else {
        echo "<script> alert('Response Recorded Successfully.'); </script>";
      }

    }
    
} else {
  echo "<h3>Your Session has expired!</h3>";
  header('refresh:0; url=index.php');
}
    

?>

<!DOCTYPE html>
<html lang="en" style="width:min-content;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>SKSVMA Teachers Scholarship</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">SKSVMACET</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Admin Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

    <h1>SKSVMA Teachers Scholarship</h1>
    <h3>List of applied students</h3>
<table class="table table-hover table-dark">
    <thead>
        <tr>
        <th scope="col">App-No</th>
        <th scope="col">USN</th>
        <th scope="col">Name</th>
        <th scope="col">Branch</th>
        <th scope="col">Date of birth</th>
        <th scope="col">Correspondance-Address</th>
        <th scope="col">Permanent-Address</th>
        <th scope="col">Phone Number</th>
        <th scope="col">PUC %</th>
        <th scope="col">PCM %</th>
        <th scope="col">CET Rank</th>
        <th scope="col">1st-Sem-SGPA</th>
        <th scope="col">2nd-Sem-SGPA</th>
        <th scope="col">3rd-Sem-SGPA</th>
        <th scope="col">4th-Sem-SGPA</th>
        <th scope="col">5th-Sem-SGPA</th>
        <th scope="col">6th-Sem-SGPA</th>
        <th scope="col">Agreegate CGPA</th>
        <th scope="col">Parent Income</th>
        <th class="noExl" scope="col">Profile Photo</th>
        <th class="noExl" scope="col">PUC markscard </th>
        <th class="noExl" scope="col">Previous sem markscard</th>
        <th class="noExl" scope="col">Previous sem markscard</th>
        <th class="noExl" scope="col">Signature</th>
        <th class="noExl" scope="col">Remarks</th>
        </tr>
    </thead>
    <tbody>
    <?php 
      While($row=mysqli_fetch_array($r)) { ?>
          <tr>
          <td><?php echo $row['app_no'] ; ?></td>
          <td><?php echo $row['usn'] ; ?></td>
          <td><?php echo $row['fname'].' '.$row['lname'] ; ?></td>
          <td><?php echo $row['branch'] ; ?></td>
          <td><?php echo $row['dob'] ; ?></td>
          <td><?php echo $row['correspondance_address'] ; ?></td>
          <td><?php echo $row['permanent_address'] ; ?></td>
          <td><?php echo $row['phone'].'<br>'.$row['altphone'] ; ?></td>
          <td><?php echo $row['puc_percentage'] ; ?></td>
          <td><?php echo $row['pcm_percentage'] ; ?></td>
          <td><?php echo $row['cet_rank'] ; ?></td>
          <td><?php echo $row['1st_sem_sgpa'] ; ?></td>
          <td><?php echo $row['2nd_sem_sgpa'] ; ?></td>
          <td><?php echo $row['3rd_sem_sgpa'] ; ?></td>
          <td><?php echo $row['4th_sem_sgpa'] ; ?></td>
          <td><?php echo $row['5th_sem_sgpa'] ; ?></td>
          <td><?php echo $row['6th_sem_sgpa'] ; ?></td>
          <td><?php echo $row['agreegate_cgpa'] ; ?></td>
          <td><?php echo $row['income'] ; ?></td>
          <td class="noExl"><a href="../uploads/profile/<?php echo $row['photo'] ?>">Open Document</a></td>
          <td class="noExl"><a href="../uploads/teachers/<?php echo $row['puc'] ?>">Open Document</a></td>
          <td class="noExl"><a href="../uploads/teachers/<?php echo $row['markscard1'] ?>">Open Document</a></td>
          <td class="noExl"><a href="../uploads/teachers/<?php echo $row['markscard2'] ?>">Open Document</a></td>
          <td class="noExl"><a href="../uploads/teachers/<?php echo $row['signature'] ?>">Open Document</a></td>
          <td class="noExl">
            <form action="#" method="post">
              <input type="hidden" name="usn" value="<?php echo $row['usn'] ; ?>">
              <table>
                  <tr>
                    <td>
                    <label class="lable" for="">Performance:</label>
                    </td>
                    <td>
                    <select class="performance" name="performance">
                      <option value="">Select</option>
                      <option value="Outstanding">Outstanding</option>
                      <option value="Excellent">Excellent</option>
                      <option value="Very Good">Very Good</option>
                      <option value="Good">Good</option>
                      <option value="Average">Average</option>
                      <option value="Poor">Poor</option>
                      <option value="Very Poor">Very Poor</option>
                    </select>      
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <label class="lable" for="">Recommendation:</label>
                    </td>
                    <td>
                    <select name="recommend">
                      <option value="">Select</option>
                      <option value="Highly Recommended">Highly Recommended</option>
                      <option value="Recommended">Recommended</option>
                      <option value="Not Recommended">Not Recommended</option>
                    </select>
                    </td>
                  </tr>
                </table>
              <input type="submit" value="Submit" name="submit">
            </form>
          </td>
          </tr>
      <?php 
      }
     ?>
    </tbody>
</table>
<button class="btn btn-primary" id="export">Download in Excel</button>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="../javascript/jquery.table2excel.js"></script>
<script type="text/javascript">
  $("#export").click(function(){
    // alert('Hello');
    $(".table").table2excel({
      exclude: ".noExl",
      name: "SKSVMA Teachers",
      filename: "SKSVMA Teachers"
    });
});
</script>
</body>
</html>
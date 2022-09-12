<?php
  session_start();
  $login=$_SESSION['name'];
  if(isset($login))
  {
  }
  else{
    header("Location:index.php");
  }
?>
<?php
include 'conn.php';
if(isset($_POST['done']))
{
 $start=$_POST['start'];
 $end=$_POST['end'];
 $year=$_POST['year'];
 

 $q="INSERT INTO terms(start,end, year)
		VALUES ( '$start','$end','$year');";
 mysqli_query($con,$q);
 header('Location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <title>Staff Registration</title>
    <?php
        include_once 'common/navbar.php';
    ?>
    <h2 style="text-align:center;">Enter Term Details</h2>
    <form method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Start Date:</span>
            <input type="date" name="start" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">End Date:</span>
            <input type="date" name="end" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Year:</span>
            <input type="number" name="year" class="form-control" required>
        </div>
                
        <button type="submit" name="done" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>

        </form>
</body>
</html>
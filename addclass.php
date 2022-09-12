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
 $form=$_POST['form'];
 $stream=$_POST['stream'];
 $teacherid=$_POST['teacherid'];
 

 $q="INSERT INTO classes(form,streamname, teacherid)
		VALUES ( '$form','$stream','$teacherid');";
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
    <title>New Class</title>
    <?php
        include_once 'common/navbar.php';
    ?>
    <h2 style="text-align:center;">Enter class Details</h2>
    <form method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Form&nbsp&nbsp:</span>
            <input type="text" name="form" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Stream&nbsp:</span>
            <input type="text" name="stream" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Teacherid&nbsp&nbsp:</span>
            <input type="text" name="teacherid" class="form-control" required>
        </div>
                
        <button type="submit" name="done" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>

        </form>
</body>
</html>
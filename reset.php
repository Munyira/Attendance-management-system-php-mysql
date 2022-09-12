<?php
    session_start();
    $name=$_SESSION['name'];
    $id=$_SESSION['id'];
?>
<?php
    include 'conn.php';
    include_once 'common/navbar.php';
    if(isset($_POST['submit']))
        {
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        
        $pass1= password_hash(md5(mysqli_real_escape_string($con,$pass1)),PASSWORD_DEFAULT);
        $pass2= password_hash(md5(mysqli_real_escape_string($con,$pass2)),PASSWORD_DEFAULT);
        if (password_verify($pass1,$pass2))
      {
        $q="UPDATE staff
            SET password='$pass1'
            WHERE staff_id='$id' AND names='$name'";
        mysqli_query($con,$q);

      }
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
<?php include_once 'common/navbar.php' ?>

<form method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Insert Password:</span>
            <input type="password" name="pass1" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Confirm Password:</span>
            <input type="password" name="pass2" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Reset Password</button>
</form>
</body>
</html>

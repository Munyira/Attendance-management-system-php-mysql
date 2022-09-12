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
 $staff_id=$_POST['staff_id'];
 $names=$_POST['names'];
 $type=$_POST['type'];
 $phone=$_POST['phone'];
 $email=$_POST['email'];
 $gender=$_POST['gender'];
 $password= password_hash(md5(mysqli_real_escape_string($con,'password')),PASSWORD_DEFAULT);

 $q="INSERT INTO staff(staff_id,names, type, phone,  email, gender, password)
		VALUES ( '$staff_id','$names','$type','$phone','$email','$gender','$password');";
 mysqli_query($con,$q);
 header('Location:index.php');
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
<?php include_once 'common/navbar.php';?>
        <h2 style="text-align:center;">Enter Staff Details</h2>
    <form method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Staff&nbspId.:</span>
            <input type="text" name="staff_id" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Names&nbsp:</span>
            <input type="text" name="names" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Type&nbsp&nbsp&nbsp&nbsp&nbsp:</span>
            <select name="type" class="form-select form-select-sm" required>
                <option value="Teacher">Teacher</option>
                <option value="Teacher">Supporting staff</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Phone&nbsp&nbsp:</span>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Email&nbsp&nbsp&nbsp&nbsp:</span>
            <input type="email" name="email" class="form-control" required></div>
        <div class="input-group mb-3">
            <span class="input-group-text">Gender&nbsp:</span>
            <select name="gender" class="form-select form-select-sm" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        
        <button type="submit" name="done" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>

        </form>
</body>
</html>
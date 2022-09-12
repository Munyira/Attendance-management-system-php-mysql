<?php
include 'conn.php';

if(isset($_POST['done']))
{
  $email= mysqli_real_escape_string($con,stripslashes($_POST['email']));
  if (isset($email))
  {
    $temp=$_POST['password'];
    $q="SELECT staff_id,names FROM staff WHERE email='$email' and type='Teacher'";
    $result = mysqli_query( $con,$q);
    $records=mysqli_num_rows($result);
    if(isset($password))
    {
      if ($records>0)
    {
      $password = md5(mysqli_real_escape_string($con,stripslashes($temp)));
      $row = mysqli_fetch_array($result);
      /*if (password_verify( $password, $row['password']))
      {
        if(password_verify($password,password_hash(md5(mysqli_real_escape_string($con,'password')),PASSWORD_DEFAULT)))
          {
            session_start();
            $_SESSION['name']=$row['names'];
            $_SESSION['id']=$row['staff_id'];
            header("Location:reset.php");
          }
          else{*/
        session_start();
        $_SESSION['id']=$row['staff_id'];
        $_SESSION['name']=$row['names'];
        
        header("Location:home.php");
         // }
     // }
      
    }
  }

else
{
  $b="Input email";
}
}
}
?>



 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Attendance</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <style>
    .gradient-custom {      
      background: #6a11cb;
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
  </style>
  <section class="vh-100 gradient-custom">
    <form method=post autocomplete="off">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-white text-black" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">
                <img src="images/stmarklogo.png">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5"></p>

                <div class="form-outline form-white mb-4">
                  <input type="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Password</label>
                </div>
                <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="done">Login</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </section>
</body>
</html>
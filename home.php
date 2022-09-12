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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
  <title>Attendance Register</title>
  
  <?php
$names=$_SESSION['name'];?>
<style>
.dropdown {
position: relative;display: inline-block;
}.dropdown-content {
display: none;position: absolute;
background-color: #f9f9f9;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}
.dropdown-content a:hover {background-color: #f1f1f1}
.dropdown:hover .dropdown-content {
display: block;}.dropdown:hover .dropbtn {
background-color: #3e8e41;}
</style>



</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../images/stmarklogo.png" alt="" width="auto" height="auto" class="d-inline-block align-text-top">
    </a>
  </div>

  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Disabled</a>
        </li>
      </ul>
      <div class="dropdown">
          <button class="dropbtn btn btn-secondary"><?php echo $names;?></button>
          <div class="dropdown-content">
          <form method=post action="common/logout.php">
          &nbsp&nbsp&nbsp&nbsp<button class="btn btn-outline-secondary" type="submit">&nbsp&nbspLogout&nbsp&nbsp</button>
          </form>
          
      </div>
      </div>
      

      
  

    </div>
  </div>
</nav>
<div class="d-flex flex-row">
  <div class="p-2">
    
          <a href="student.php"> <button type="button" class="btn btn-success">Student Registration</button> </a><br><br>
          <a href="staff.php"> <button type="button" class="btn btn-success">Staff Registration</button> </a><br><br>
          <a href="attendance.php"><button type="button" class="btn btn-success">Mark Attendance</button> </a><br><br>
          <a href="viewstudents.php"><button type="button" class="btn btn-success">Student Details</button> </a><br><br>
          <a href="addclass.php"><button type="button" class="btn btn-success">Add Class</button> </a><br><br>
          <a href="addterm.php"><button type="button" class="btn btn-success">Add Term</button> </a><br><br>
          <a href="viewattendance.php"><button type="button" class="btn btn-success">Attendance Details</button> </a><br><br>
    </div>

    <div class="p-2">
               
          <a href="viewclasses.php"> <button type="button" class="btn btn-success">View Classes</button> </a><br><br>
          <a href="staff.php"> <button type="button" class="btn btn-success">Staff Registration</button> </a><br><br>
          <a href="attendance.php"><button type="button" class="btn btn-success">Mark Attendance</button> </a><br><br>
          <a href="viewstudents.php"><button type="button" class="btn btn-success">Student Details</button> </a><br><br>
          <a href="addclass.php"><button type="button" class="btn btn-success">Add Class</button> </a><br><br>
          <a href="addterm.php"><button type="button" class="btn btn-success">Add Term</button> </a><br><br>
          <a href="viewattendance.php"><button type="button" class="btn btn-success">Attendance Details</button> </a><br><br>
    </div>
  
</div>
   
   
</body>

</html>
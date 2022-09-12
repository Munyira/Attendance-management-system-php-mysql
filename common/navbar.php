
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
      
      <li>
      <div class="dropdown">
          <button class="dropbtn btn btn-secondary" style="display:flex;justify-content:flex-end;margin:8px;"><?php echo $names;?></button>
          <div class="dropdown-content">
          <form method=post action="common/logout.php">
          &nbsp&nbsp&nbsp&nbsp<button class="btn btn-outline-secondary" type="submit">&nbsp&nbspLogout&nbsp&nbsp</button>
          </form>
          <form method=post action="reset.php">
            <button class="btn btn-outline-secondary" type="submit">Reset Password</button>
          </form>
          
      </div>
      </div>
      </li>
      </ul>
      <span style="display:flex;justify-content:flex-end;margin:8px;"><a href="home.php"><button type="button" class="btn btn-danger">Back</button></a></span>
      </div>
      

      
  

    </div>
  </div>
</nav>

 
 
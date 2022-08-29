<?php
include 'conn.php';
if(isset($_POST['done']))
{
 $adm_no=$_POST['adm_no'];
 $names=$_POST['names'];
 $form=$_POST['form'];
 $stream=$_POST['stream'];
 $dob=$_POST['dob'];
 $gender=$_POST['gender'];

 $q="INSERT INTO student(adm_no,names, form, stream,  dob, gender)
		VALUES ( '$adm_no','$names','$form','$stream','$dob','$gender');";
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
    <title>Student Registration</title>
</head>
<body>
    <div>
    <img src="stmarklogo.png" alt="St. Marks Kiserian" style="float:left">
    <span style="display:flex;justify-content:flex-end;margin:8px;"><a href="index.php"><button type="button" class="btn btn-secondary">Back</button></a></span>  
    <br><br>
    </div>
    <div><h2 style="text-align:center;">Enter Student Details</h2></div>
        <form method="post">
                        
            <div class="input-group mb-3">
                <span class="input-group-text">Admission_No.:</span>
                <input type="text" name="adm_no" class="form-control" required>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</span>
                <input type="text" name="names" class="form-control" required>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Form&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</span>
                <select name="form" class="form-select form-select-sm" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
        
            <div class="input-group mb-3">
                <span class="input-group-text">Stream&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</span>
                <select name="stream" class="form-select form-select-sm" required>
                    <option value="Alpha">Alpha</option>
                    <option value="Beta">Beta</option>
                    <option value="Gamma">Gamma</option>
                    <option value="Delta">Delta</option>
                    <option value="Champions">Champions</option>
                </select>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Date Of Birth&nbsp&nbsp&nbsp:</span>
                <input type="date" name="dob" class="form-control" required>
            </div>
        
            <div class="input-group mb-3">
                <span class="input-group-text">Gender&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</span>
                <select name="gender" class="form-select form-select-sm" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        <div style="display:block;margin-left:auto;margin-right:auto;">
        <button type="submit" name="done" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button></form>
        </div>
</body>
</html>
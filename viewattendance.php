<?php
 include 'conn.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <title> Mark Attendance</title>
</head>
<body>
    <form method=post>
        <span><label><b>Form</b></label>
                <select name="chosenf" required>
                        <option value="null" disabled selected>--Select--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                </select>
                <label><b>Stream</b><label>
                <select name="chosens" required>
                        <option value="null" disabled selected>--Select--</option>
                        <option value="Alpha">Alpha</option>
                        <option value="Beta">Beta</option>
                        <option value="Gamma">Gamma</option>
                        <option value="Delta">Delta</option>
                        <option value="Champions">Champions</option>
                </select>
                        <label><b>Date</b></label>
                        <input type="date" name="date1" required>
                <button type="submit" name="choose" class="btn btn-dark">View</button>
                
        </span>
        </form>
                <br>
                <div>
                    <img src="stmarklogo.png" alt="St. Marks Kiserian" style="float:left">
                    <span style="display:flex;justify-content:flex-end;margin:8px;"><a href="index.php"><button type="button" class="btn btn-secondary">Back</button></a></span>  
                    <br><br>
                </div>
    <h2 style="text-align:center;margin-bottom:0;padding-bottom:0;"><?php   error_reporting(0);
                                        $chosenform=$_POST['chosenf'];
                                        $chosenstream=$_POST['chosens'];
                                        $date1=$_POST['date1'];
                if($chosenform == "null" or $chosenform=="" ){
                    echo "Please Select Class and Stream";
                }
                else {
                    if ($chosenstream == "null" or $chosenstream =="") {
                    echo "Please Select the Class and Stream";
                    }
                    else {
                        echo "Form ".$chosenform." ".$chosenstream." "."Class Attendance";
                    }
                }
                                        ?></h2><br>
    <h2 style="text-align:center;"><?php if ($date1==""){
                                            echo "Please select date";
                                            }
                                            else{echo $date1;}?></h2>
    	
    <form method="POST">
        <table class="table table-striped">
            <tr>
                    <th> </th>
                    <th> Adm No </th>
                    <th> Name </th>
                    <th> Status </th>
                 </tr>
                     <?php
                    $q="SELECT attendance.adm_no, student.names, student.Form, student.Stream, attendance.status, attendance.date
                        FROM student INNER JOIN attendance ON student.adm_no = attendance.adm_no
                        where student.form='$chosenform' AND student.stream='$chosenstream' and attendance.date='$date1'";
                     $query= mysqli_query($con,$q);
                     $x=0;
                     while($row = mysqli_fetch_array($query)){
                     $x++;
                     ?>
                 <tr>
                     <td><?php echo $x; ?></td>
                     <td><?php echo $row["adm_no"]; ?></td>
                     <td><?php echo $row['names']; ?></td>
                     <td><?php echo $row['status']; ?></td>
                       <?php echo "</tr>";
                 }
                 ?>
        </table>
        <?php


        ?>
        <br>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>

 </form>
</body>
</html>
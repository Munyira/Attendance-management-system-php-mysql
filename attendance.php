<?php
 include 'conn.php';

if(isset($_POST['submit'])){
        $date1=date("Y-m-d");
        $student_id = $_POST['adm_no'];
        $attendance = $_POST['attendance'];
       
        
        for ($i=0; $i < count($student_id); $i++) { 
        $sql = "INSERT INTO attendance (adm_no, status, date) values
        ('$student_id[$i]', 
        '$attendance[$i]', '$date1')";
        $result = $con->query($sql);
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
    <title> Mark Attendance</title>
    <style>.switch{display:block;padding:0;}.switchh3{font-weight:normal;}.toggle{position:absolute;margin-left:-9999px;visibility:hidden;}.toggle+label{display:block;position:relative;cursor:pointer;border-radius:60px;padding:0;width:85px;height:25px;overflow:hidden;}.toggle+label:before,.toggle+label:after{display:block;border-radius:60px;position:absolute;top:1px;left:1px;bottom:1px;padding:0;color:#FFF;}.toggle+label:before{content:"Present";right:1px;background-color:#cc0000;padding-left:4px;text-indent:-90px;}.toggle+label:after{content:"Absent";text-indent:23px;width:20px;background-color:#fff;margin:2px;box-shadow:02px5pxrgba(000,000,000,0.2)}.toggle:checked+label:before{background-color:#009933;text-indent:0;}.toggle:checked+label:after{margin-left:60px;box-shadow:none;}input.toggle-round-flat+label{background-color:#990000;}input.toggle-round-flat+label:before,input.toggle-round-flat+label:after{top:2px;bottom:2px;left:2px;box-shadow:none;color:#000;}input.toggle-round-flat+label:before{	right:2px;backround-color:#FFF;}input.toggle-round-flat+label:after{width:18px;background-color:#cc0000;border:none;margin:2px;}input.toggle-round-flat:checked+label{background-color:#009933;}input.toggle-round-flat:checked+label:before{background-color:#FFF;}input.toggle-round-flat:checked+label:after{margin-left:10px;background-color:#009933;}.toggle+label:before,.toggle+label:after{transition:All0.5sease;-webkit-transition:All0.5sease;-moz-transition:All0.5sease;-o-transition:All0.5sease;}</style>
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
                                        $date1=date("Y-m-d");
                                        $chosenform=$_POST['chosenf'];
                                        $chosenstream=$_POST['chosens'];
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
    <h2 style="text-align:center;"><?php echo $date1?></h2>
    	
    <form method="POST">
        <table class="table table-striped">
            <tr>
                    <th> </th>
                    <th> Adm No </th>
                    <th> Name </th>
                    <th> Status </th>
                 </tr>
                     <?php
                     $date=date("Y-m-d");

                     $q="select adm_no, names from student where form='$chosenform' AND stream='$chosenstream'";
                     $query= mysqli_query($con,$q);
                     $x=0;
                     while($row = mysqli_fetch_array($query)){
                     $x++;
                     ?>
                 <tr>
                     <td><?php echo $x; ?></td>
                     <td><?php echo $row["adm_no"]; ?> <input type="hidden" name="adm_no[]" value="<?php echo $row["adm_no"]; ?>"></td>
                     <td><?php echo $row['names']; ?></td>
                     <td><input type="checkbox" name="attendance[]" value="present"> Present <input type="checkbox" name="attendance[]" value="absent"> Absent  <input class="form-control" type="hidden" name="date1[]" value="<?php echo $date; ?>"></td>
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
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
    <style>
    .switch{display:block;padding:0;}.switchh3{font-weight:normal;}.toggle{position:absolute;margin-left:-9999px;visibility:hidden;}.toggle+label{display:block;position:relative;cursor:pointer;border-radius:60px;padding:0;width:85px;height:25px;overflow:hidden;}.toggle+label:before,.toggle+label:after{display:block;border-radius:60px;position:absolute;top:1px;left:1px;bottom:1px;padding:0;color:#FFF;}.toggle+label:before{content:"Present";right:1px;background-color:#cc0000;padding-left:4px;text-indent:-90px;}.toggle+label:after{content:"Absent";text-indent:23px;width:20px;background-color:#fff;margin:2px;box-shadow:02px5pxrgba(000,000,000,0.2)}.toggle:checked+label:before{background-color:#009933;text-indent:0;}.toggle:checked+label:after{margin-left:60px;box-shadow:none;}input.toggle-round-flat+label{background-color:#990000;}input.toggle-round-flat+label:before,input.toggle-round-flat+label:after{top:2px;bottom:2px;left:2px;box-shadow:none;color:#000;}input.toggle-round-flat+label:before{	right:2px;backround-color:#FFF;}input.toggle-round-flat+label:after{width:18px;background-color:#cc0000;border:none;margin:2px;}input.toggle-round-flat:checked+label{background-color:#009933;}input.toggle-round-flat:checked+label:before{background-color:#FFF;}input.toggle-round-flat:checked+label:after{margin-left:10px;background-color:#009933;}.toggle+label:before,.toggle+label:after{transition:All0.5sease;-webkit-transition:All0.5sease;-moz-transition:All0.5sease;-o-transition:All0.5sease;}</style>
    <?php
      include_once 'common/navbar.php';
    ?>
    <h2 style="text-align:center;margin-bottom:0;padding-bottom:0;">Classes</h2><br>
    <h2 style="text-align:center;"><?php echo $date1?></h2>
    	
    <form method="POST">
        <table class="table table-striped">
            <tr>
                    <th> </th>
                    <th> Class </th>
                    <th> Class Teacher </th>
                 </tr>
                     <?php
                     $q="select form, streamname,  from student where form='$chosenform' AND stream='$chosenstream'";
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
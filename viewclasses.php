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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <title>Classes</title>
    <?php
include_once 'common/navbar.php';
?>

    <h2 style="text-align:center;">Classes</h2><br>
    <div class="d-flex justify-content-center">      
    <table class="table table-responsive">
                <tr>
                    <th></th>
					<th>Class</th>
                    <th>Class Teacher</th>
                </tr>
                <?php
					
                include 'conn.php';
					      $q="SELECT classes.form, classes.streamname, staff.names
                          FROM staff INNER JOIN classes ON staff.staff_id = classes.teacherid;";
					
                $query=mysqli_query($con,$q);
                $x=0;
                while($res=mysqli_fetch_array($query)) {
                    $x++;
                ?>
                <tr>
                    <td><?php echo $x?></td>
                    <td><?php echo $res['form']." ".$res['streamname']; ?></td>
                    <td><?php echo $res['names']; ?></td>
                    
                </tr>
					<?php  } ?>

            </table>
            </div>  
                                        <form action="pdf/generatepdf.php" method="post" target="_blank">
                                            <span style="display:flex;justify-content:flex-end;margin:8px;"><button type="submit" class="btn btn-outline-primary">PDF</button></span>
                                        </form>
                                        
                                           
</body>
</html>

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
    <title>Student Details</title>
    <?php
include_once 'common/navbar.php';
?>

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
        <h2 style="text-align:center;"><?php   error_reporting(0);
                                        $chosenform=$_POST['chosenf'];
                                        $chosenstream=$_POST['chosens'];
                if($chosenform == "null" or $chosenform=="" ){
                    echo "All ";
                }
                else {
                    if ($chosenstream == "null" or $chosenstream =="") {
                    echo "Form ".$chosenform." ";
                    }
                    else {
                        echo "Form ".$chosenform." ".$chosenstream." ";
                    }
                }
                                        ?>Student Details</h2><br>
            <table class="table table-striped">
                <tr>
                    <th>Admission No</th>
					<th>Names</th>
                    <th>Form</th>
                    <th>Stream</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                </tr>
                <?php
					
                include 'conn.php';
					$chosenform=$_POST['chosenf'];
					$chosenstream=$_POST['chosens'];
                                        session_start();
                                        
                                        $_SESSION['chosenform'] = $chosenform;
                                        $_SESSION['chosenstream'] = $chosenstream;
                                        
                                $q="select adm_no, names, form, stream, gender, dob from student ORDER BY form ASC";
				if(isset($_POST['choose']))
					{$chosenform=$_POST['chosenf'];
					$chosenstream=$_POST['chosens'];
					if ($chosenstream == "null" or $chosenstream == "" and $chosenform=="null" or $chosenform==""){
                                            $q="select adm_no, names, form, stream, gender, dob from student ORDER BY form ASC";
                                        }
					else if ($chosenstream == "null" or $chosenstream == "" ) {
					    $q="select adm_no, names, form, stream, gender, dob from student where form='$chosenform'";
					}
					else {
					    $q="select adm_no, names, form, stream, gender, dob from student where form='$chosenform' AND stream='$chosenstream'";
                                        }
                                        }
                                        
                                        
					
								
				
					
                $query=mysqli_query($con,$q);
                while($res=mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $res['adm_no']; ?></td>
                    <td><?php echo $res['names']; ?></td>
                    <td><?php echo $res['form']; ?></td>
                    <td><?php echo $res['stream']; ?></td>
                    <td><?php echo $res['gender']; ?></td>
                    <td><?php echo $res['dob']; ?></td>
                </tr>
					<?php  } ?>

            </table>
                                        <form action="pdf/generatepdf.php" method="post" target="_blank">
                                            <span style="display:flex;justify-content:flex-end;margin:8px;"><button type="submit" class="btn btn-outline-primary">PDF</button></span>
                                        </form>
                                        
                                           
</body>
</html>

<?php

include 'conn.php';
if(isset($_GET['id'])){
$usn= $_GET['id'];
$q=" DELETE FROM `time` WHERE usn ='$usn';";
mysqli_query($con,$q);
header('Location:display.php');
}
?>
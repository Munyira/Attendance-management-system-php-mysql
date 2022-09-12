<?php
include '../conn.php';
require('fpdf.php');

    session_start();
                                        
    $chosenform = $_SESSION['chosenform'];
    $chosenstream = $_SESSION['chosenstream']; 

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Ln(3);
    $this->Image('../images/stmarklogo.png',10,8,70);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $chosenform = $_SESSION['chosenform'];
    $chosenstream = $_SESSION['chosenstream'];
    
    // Move to the right
    if($chosenform == "null" or $chosenform=="" ){
    $this->Cell(80,30,'                                            All Student Details');
                }
    else {
    if ($chosenstream == "null" or $chosenstream =="") {
    $this->Cell(80,30,'                                       '.'FORM '.$chosenform.' Student Details');
    }
    else {
    $this->Cell(80,30,'                                       '.'FORM '.$chosenform.' '.$chosenstream.' Student Details');
    }
    }
    
    
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
    $pdf->Line(10,33,195,33);
    $pdf->Line(10,40,195,40);
$pdf->SetFont('Times','B',14);
    $pdf->Cell(5,7,' ',0,0);
    $pdf->Cell(25,7,'   Adm',0,0);
    $pdf->Cell(50,7,'Names',0,0);
    $pdf->Cell(20,7,'Form',0,0);
    $pdf->Cell(30,7,'Stream',0,0);
    $pdf->Cell(30,7,'Gender',0,0);
    $pdf->Cell(20,7,'  DOB',0,1);

$pdf->SetFont('Times','',12);


        if ($chosenstream == "null" or $chosenstream == "" and $chosenform=="null" or $chosenform==""){
            $q="select adm_no, names, form, stream, gender, dob from student ORDER BY form ASC";
        }
        else if ($chosenstream == "null" or $chosenstream == "" ) {
            $q="select adm_no, names, form, stream, gender, dob from student where form='$chosenform'";
        }
        else {
            $q="select adm_no, names, form, stream, gender, dob from student where form='$chosenform' AND stream='$chosenstream'";
        }
$x=0;        
$result=mysqli_query($con,$q);
while ($row= mysqli_fetch_array($result)) {
    $x++;
    $pdf->Cell(5,7,$x.'.',0,0);
    $pdf->Cell(25,7,'   '.$row['adm_no'],0,0);
    $pdf->Cell(50,7,$row['names'],0,0);
    $pdf->Cell(20,7,'    '.$row['form'],0,0);
    $pdf->Cell(30,7,$row['stream'],0,0);
    $pdf->Cell(30,7,$row['gender'],0,0);
    $pdf->Cell(20,7,$row['dob'],0,1);
}

    
$pdf->Output();
?>
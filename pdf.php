<?php

include_once("fpdf/fpdf.php");

include "database/conn.php";

$emp_id = $_GET['emp_id'];
$sql = "select * from petty_cash where emp_id =$emp_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

    $pdf = new FPDF();
	$pdf->AddPage();
    
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(190,10,"Receipt",0,1,"C");
    // $pdf->Cell(190,10,"XYZ Pvt. Ltd.",0,1,"C");
    $pdf->SetFont("Arial",null,12);

    $pdf->Cell(97,10," DATE: ".$row["date"],0,1);
    $pdf->Cell(97,10," TIME: ".$row["time"],0,1);

    $pdf->Cell(28,15,"Employee Name",0,0,"C");
    $pdf->Cell(102,15,"Amount",0,0,"C");
    $pdf->Cell(65,15,"Description",0,1,"C");

    $sql2 = "select * from employee_details where id=$emp_id";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    
    $pdf->Cell(22,0,$row2['employee_name'],0,0,"C");
    $pdf->Cell(110,0,$row['petty_amt'],0,0,"C");
    $pdf->Cell(60,0,$row['petty_notes'],0,1,"C");

    $pdf->Cell(300,80,"       Signature:  _________________________",0,0,"C");


    $pdf->Output("PDF_Receipt/Petty_Cash".$emp_id.".pdf","F");	
    $pdf->Output();	
?>
<?php
include "database/conn.php";
$emp_id = $_GET['emp_id'];
$sql = "DELETE FROM `petty_cash` WHERE emp_id='$emp_id'";
$query = mysqli_query($conn, $sql);
if($query){
    header("Location: petty_cash_report.php");
}else{
    echo "Query Faild.";
}



?>
<?php
include "database/conn.php";

if(isset($_POST['emp_id']) || isset($_POST['petty_amt']) || isset($_POST['petty_notes'])){
    $petty_date = $_POST['date'];
    $petty_time = $_POST['time'];
    $emp_id = $_POST['emp_id'];
    $petty_amt = $_POST['petty_amt'];
    $petty_notes = $_POST['petty_notes'];

    $sql = "INSERT INTO `petty_cash`(`emp_id`, `date`, `time`, `petty_amt`, `petty_notes`)
    VALUES ('{$emp_id}','{$petty_date}','{$petty_time}','{$petty_amt}','{$petty_notes}')";

    $query = mysqli_query($conn, $sql) or die ("query failed.");
    if($query){
        echo 1;
    }else{
        echo 0;
    }
    
    
}




?>
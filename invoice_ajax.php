<?php
include "database/conn.php";
if(isset($_POST['c_name']) && isset($_POST['c_phone'])){
    $date = mysqli_real_escape_string($conn,$_POST['date']);
    $time = mysqli_real_escape_string($conn,$_POST['time']);
    $c_name = mysqli_real_escape_string($conn,$_POST['c_name']);
    $c_add = mysqli_real_escape_string($conn,$_POST['c_add']);
    $c_phone = mysqli_real_escape_string($conn,$_POST['c_phone']);
    $des = mysqli_real_escape_string($conn,$_POST['c_phone']);
    $value = mysqli_real_escape_string($conn,$_POST['c_phone']);
    $igst = mysqli_real_escape_string($conn,$_POST['c_phone']);
    $cgst = mysqli_real_escape_string($conn,$_POST['c_phone']);
    $sgst = mysqli_real_escape_string($conn,$_POST['c_phone']);
    $amt = mysqli_real_escape_string($conn,$_POST['c_phone']);
    $disc = mysqli_real_escape_string($conn,$_POST['c_phone']);
    
    $sql = "INSERT INTO invoice_customer (`date`, `time`, `name`, `address`, `phone`)
    VALUES ('{$date}','{$time}','{$name}','{$c_add}','{$c_phone}')";
    
    $sql2 = "INSERT INTO `invoice_list`(`invoice_no`, `des`, `value`, `igst`, `cgst`, `sgst`, `amt`, `disc`)
    VALUES ('{$des}',{$value},{$igst},{$cgst},{$sgst},{$amt},{$disc})";

    $query= mysqli_query($conn,$sql);
    $query2= mysqli_query($conn,$sql2);

    if($query || $query2){
        echo 1;
    }else{
        echo 2;
    }
    

    }else{
        echo 0;
    }



?>

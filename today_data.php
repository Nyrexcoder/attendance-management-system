<?php
session_start();
include "database/conn.php";
if(isset($_POST['emp_id'])){
    $emp_id = $_POST['emp_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $emp_department = $_POST['emp_department'];
    $emp_role = $_POST['emp_role'];
    $emp_attendance = $_POST['emp_attendance'];

    $check = "select emp_id and date from employee_attendance where emp_id='$emp_id' and date='$date'";
    $result = mysqli_query($conn,$check);
    if(mysqli_num_rows($result)>0){
        $_SESSION['status'] == 'Already Exist';
    }else{
        $sql = "INSERT INTO `employee_attendance`(`emp_id`, `date`, `time`, `emp_department`, `emp_role`, `emp_attendance`) 
        VALUES ('{$emp_id}','{$date}','{$time}','{$emp_department}','{$emp_role}','{$emp_attendance}')";
    
        $query = mysqli_query($conn, $sql) or die("query failed.");
        if($query){
            echo "yes";
        }else{
            echo "no";
        }
    }

       
        
    }


?>
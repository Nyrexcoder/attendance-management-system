<?php
include "database/conn.php";
$employee_name = mysqli_real_escape_string($conn, $_POST['employee_name']);
$employee_phone = mysqli_real_escape_string($conn, $_POST['employee_phone']);
$employee_address = mysqli_real_escape_string($conn, $_POST['employee_address']);
$employee_department = mysqli_real_escape_string($conn, $_POST['employee_department']);
$employee_role = mysqli_real_escape_string($conn, $_POST['employee_role']);

if(isset($employee_name) && isset($employee_phone) && isset($employee_address) && isset($employee_department) && isset($employee_role)){
    $sql = "INSERT INTO employee_details (`employee_name`, `employee_phone`, `employee_add`, `employee_department`, `employee_role`)
     VALUES ('{$employee_name}','{$employee_phone}','{$employee_address}','{$employee_department}','{$employee_role}') ";

    $query = mysqli_query($conn, $sql);
    if($query){
        echo 1;
    }else{
        echo 2;
    }
}
?>



<?php
include "database/conn.php";
$emp_id = $_POST['emp_id'];
$result_array=[];
$sql = "select * from employee_details where id= '$emp_id'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0){
    foreach($query as $row){
        array_push($result_array, $row);
    }
    header("content-type: application/json");
	echo json_encode($result_array);
}


?>
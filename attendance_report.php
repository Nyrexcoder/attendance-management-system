<?php  include "header.php";  ?>              
              <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Attendance Report <button class="btn btn-success" id="excel_btn">Export in Excel</button></h1>
                   
                    <div class="container mt-3">
                    <table class="table table-secondary" id="myTable">
                                    <thead>
                                        <tr>
                                        <th scope="col">S.no.</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "database/conn.php";
                                            $sql = "select * from employee_attendance ORDER BY id DESC";
                                            $query = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($query)>0){
                                                $sno=0;
                                                foreach($query as $row){
                                                $sno=$sno+ 1;
                                                $emp_id = $row['emp_id'];
                                                $date = $row['date'];
                                                $time = $row['time'];
                                                $emp_attendance = $row['emp_attendance'];
                                           
                                        ?>
                                        <tr>
                                        <th><?php echo $sno; ?></th>
                                        <?php
                                            $sql2 = "select * from employee_details where id='$emp_id'";
                                            $query2 = mysqli_query($conn, $sql2);
                                            if(mysqli_num_rows($query2)>0){
                                                foreach($query2 as $row2){
                                                 $emp_name = $row2['employee_name'];
                                                 $emp_phone = $row2['employee_phone'];
                                        ?>
                                        <td><?php echo strtoupper($emp_name); ?></td>
                                        <td><?php echo $emp_phone; ?></td>
                                        <?php
                                        }
                                        }

                                        ?>  
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $time; ?></td>
                                        <td><?php
                                        if($emp_attendance == 1){
                                            echo "Present";
                                        }if($emp_attendance == 0){
                                            echo "Absent";
                                        }
                                         ?></td>
                                        </tr> <?php }
                                            }  ?>
                                    </tbody>
                                    </table>
                    </div>





                </div>
            </div>
        </div>

<?php  include "footer.php";  ?>     
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="/tableHTMLExport.js"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();

    $("#excel_btn").click(function(){
    $('#myTable').table2excel({
        filename: "Attendance_Sheet.xls"
    });

    // $("#pdf_btn").click(function(){
    //     $("#myTable").tableHTMLExport({
    //         type:'pdf',
    //         orientation:'p',
    //         filename:'attenance.pdf',
    //         ignoreColumns:'.ignore',
    //         ignoreRows:'.ignore'
    //     });
    // })


    
    })
} );
</script>



   
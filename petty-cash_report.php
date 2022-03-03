<?php  include "header.php";  ?>              
              <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Patty Cash Report</h1>
                   

                    <div class="container mt-3">
                    <table class="table table-secondary" id="myTable">
                                    <thead class="table-warning">
                                        <tr>
                                        <th scope="col">S.no.</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Patty Amount</th>
                                        <th scope="col">Notes</th>
                                        <th scope="col">Print</th>
                                        <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "database/conn.php";
                                            $sql = "select * from petty_cash ORDER BY id DESC";
                                            $query = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($query)>0){
                                                $sno=0;
                                                foreach($query as $row){
                                                $sno=$sno+ 1;
                                                $emp_id = $row['emp_id'];
                                                $date = $row['date'];
                                                $time = $row['time'];
                                                $petty_notes = $row['petty_notes'];
                                                $petty_amt = $row['petty_amt'];
                                           
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
                                        <td><?php echo $date; ?></td>
                                        <?php
                                        }
                                        }

                                        ?>  
                                        <td><?php echo $time; ?></td>
                                        <td><?php echo "₹".$petty_amt; ?></td>
                                        <td><?php echo $petty_notes;   ?></td>
                                        <td><a href="pdf.php?emp_id=<?php echo $emp_id;  ?>"><button class="btn btn-primary"><i class="bi bi-printer"></i></button></a></td>
                                        <td><a href="delete.php?emp_id=<?php echo $emp_id;  ?>"><button class="btn btn-danger" id="delete_btn"><i class="bi bi-trash"></i></button></a></td>
                                        </tr> <?php 
                                        }
                                        } 
                                        ?>
                                    </tbody>
                                    </table>
                    </div>



                </div>
            </div>
        </div>

<?php  include "footer.php";  ?>     

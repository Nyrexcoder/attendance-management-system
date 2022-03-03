<?php  include "header.php";?>  
              <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Attendance</h1>
                    <div class="success text-center"></div>
                    <div class="error text-center"></div>
                   <!-- Table Structure start -->
                   <form id="attendance_data">

                   <table class="table" id="myTable">
                                <thead class="table-success">
                                    <tr>
                                    <th scope="col" class="text-center">Today Date</th>
                                    <th scope="col"class="text-center">Today Time</th>
                                    <th scope="col"class="text-center">Employee Name</th>
                                    <th scope="col"class="text-center">Department</th>
                                    <th scope="col"class="text-center">Role</th>
                                    <th scope="col"class="text-center">P/A</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th><input class="form-control text-center input" id="date" name="date" type="text" readonly value="<?php  echo date("d/m/Y") ;    ?>"></th>
                                    <th><input class="form-control text-center input" id="time" name="time" type="text" readonly value="<?php  echo date('h:i a') ;    ?>"></th>
                                    <td><select class="form-control input" id="emp_id" name="emp_name" aria-label="Default select example">
                                        <option value="" selected>--choose--</option>
                                        <?php
                                            include "database/conn.php";
                                            $sql = "select * from employee_details";
                                            $query = mysqli_query($conn, $sql);
                                            foreach($query as $row){
                                            $employee_id =  $row['id'];
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['employee_name']; ?></option>
                                       
                                    <?php } ?>
                                    </select></td>
                                    
                                    <td><input class="input" type="text" name="department" id="department" readonly></td>
                                    <td><input class="input" type="text" name="role" id="role" readonly></td>
                                
                                    <td><select class="form-control input" id="emp_attendance" name="emp_attendance" aria-label="Default select example">
                                        <option value="" selected>--choose--</option>
                                        <option value="1">Present</option>
                                        <option value="0">Absent</option>
                                        </select></td>
                                    </tr>
                                </tbody>
                                
                                </table>
                                <div class="container mx-auto mt-5"style="width: 200px;">
                                    <button class="btn btn-success" id="today_attendance_btn">Submit</button>
                                </div>
                                </form>
                   <!-- Table Structure end -->
                </div>
            </div>
        </div>

<?php  include "footer.php";  ?>     
<script>
    $(document).ready(function(){
      $("#emp_id").change(function(){
       var emp_id = $("#emp_id").val();
          if(emp_id == ""){
            $("#department").val("");
            $("#role").val("");
              alert("please select valid name.");

          }else{
              $.ajax({
                  url : "data.php",
                  type : "POST",
                  dataType : "json",
                  data : "emp_id="+emp_id,
                  success : function(data){
                    $.each(data,function(key, pview){
                    $("#department").val(pview['employee_department']);
                    $("#role").val(pview['employee_role']);
                    });
                  }
              });
          }
      });


      $("#today_attendance_btn").click(function(e){
        event.preventDefault();
       var emp_id = $("#emp_id").val();
       var date = $("#date").val();
       var time = $("#time").val();
       var emp_department = $("#department").val();
       var emp_role = $("#role").val();
       var emp_attendance = $("#emp_attendance").val();

       if(emp_attendance == ""){
        $(".error").html("Please fill Today Attendance !").slideDown();
        $(".success").slideUp();
       }else{
        $.ajax({
                  url : "today_data.php",
                  type : "POST",
                  data :{emp_id:emp_id,date:date,time:time,emp_department:emp_department,emp_role:emp_role,emp_attendance:emp_attendance},
                  success : function(data){
                    if(data == "yes"){
                        $("#attendance_data").trigger("reset");
                        $(".success").html("Attendance inserted.").slideDown();
                        $(".error").slideUp();
                    }else{
                        $(".error").html("This Employee Attendance is already exits !").slideDown();
                        $(".success").slideUp();
                    }
                  }
              });
       }
            

          
      });


    });
    
</script>

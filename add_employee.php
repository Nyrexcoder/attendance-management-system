<?php  include "header.php"; 
date_default_timezone_set('Asia/Calcutta'); 
?>  
              <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Add Employee</h1>
                    <div class="success text-center"></div>
                    <div class="error text-center"></div>
                   <!-- Form Structure start -->
                        <div class="card" style="background:#198754; color:white;">
                            <div class="card-body">
                                <div class="card-title text-center"><h5>Enter Employee Details</h5></div>
                                    <form id="employee_datails">
                                        <div class="form-control c_body">
                                    <div class="container mt-2">
                                        <div class="row">
                                            <div class="col">
                                            <label for="employee_name">Employee Name</label>
                                            <input class="form-control input" id="employee_name" name="employee_name" type="text">
                                        
                                            </div>
                                            <div class="col">
                                            <label for="employee_phone">Employee Phone No.</label>
                                            <input class="form-control input" id="phone_no" name="employee_phone" type="text">
                                        </div>
                                        <div class="col">
                                            <label for="employee_address">Employee Address</label>
                                            <input class="form-control input" name="employee_address" type="text">
                                        </div>
                                    </div>
                                    </div>

                                    <div class="container mt-2">
                                        <div class="row">
                                            <div class="col">
                                            <label for="employee_department">Department</label>
                                            <input class="form-control input" name="employee_department" type="text">
                                        
                                            </div>
                                            <div class="col">
                                            <label for="employee_role">Working Role</label>
                                            <input class="form-control input" name="employee_role" type="text">
                                        </div>
            
                                    </div>
                                    </div>
                                       
                                    <div class="container mt-4 text-center">
                                        <button class="btn" id="submit_btn" style="background:#AFB6BB;">Save</button>
                                    </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
                 
                   <!-- Form Structure end -->
                </div>
            </div>
        </div>

<?php  include "footer.php";  ?>     


<script>
    $(document).ready(function(){
        $("#submit_btn").click(function(e){
            event.preventDefault();
          var employee_name = $("#employee_name").val();
          var phone_number = $("#phone_no").val();
          if(employee_name == ""){
            $(".error").html("SORRY Please Enter Employee name.").slideDown();
            $(".success").slideUp();
          }else{
              if(phone_number == ""){
              $(".error").html("SORRY Please Enter Employee Mobile Number.").slideDown();
              $(".success").slideUp();
              }else{
                if(isNaN(phone_number)){
                $(".error").html("SORRY this is not a number.").slideDown();
                $(".success").slideUp();
            }else{
            if(phone_number.length !== 10){
                $(".error").html("phone number should be 10 digits.").slideDown();
                $(".success").slideUp();
              }if(phone_number.length == 10){
                $.ajax({
                        url: "process.php",
                        type : "POST",
                        data :$("#employee_datails").serialize(),
                        success : function(data){
                          if(data == 1){
                            $("#employee_datails").trigger("reset");
                            $(".success").html("New Employee Added Successfylly.").slideDown();
                            $(".error").slideUp();
                          }else{
                            $(".error").html("Sorry Employee Not Added !").slideDown();
                            $(".success").slideUp();
                          }
                        }
                });
              }
              
          }
        }
           
        }
        
        });
    });
</script>



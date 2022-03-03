<?php  include "header.php";?>              
              <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Petty Cash</h1>
                   <div class="container">
                       <div class="card" style="background:#198754; color:white;">
                           <div class="card-body">
                               <div class="card-title text-center"><h4>Entry of Petty Cash.</h4></div>
                               <form id="patty_cash">
                               <div class="form-control c_body">
                                    <div class="container mt-2">
                                        <div class="row">
                                            <div class="col">
                                            <label for="employee_name">Date</label>
                                            <input class="form-control input vinput" name="date" type="text" readonly value="<?php  echo date("d/m/Y") ;    ?>">
                                            </div>

                                            <div class="col text-center">
                                                <div class="success"></div>
                                                <div class="error"></div>
                                            </div>

                                            <div class="col">
                                            <label for="employee_phone">Time</label>
                                            <input class="form-control input vinput" name="time" type="text" readonly value="<?php  echo date('h:i a') ;    ?>">
                                        </div>
                                        
                                    </div>
                                    </div>

                                    <div class="container mt-4">
                                    <div class="row">
                                            <div class="col">
                                            <label for="employee_name">Employee Name</label>
                                            <select class="form-control input" id="emp_id" name="emp_id" aria-label="Default select example">
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
                                    </select>
                                        
                                            </div>
                                            <div class="col">
                                            <label for="employee_phone">Amount</label>
                                            <input class="form-control input pinput" id="petty_amt" name="petty_amt" type="text">
                                        </div>

                                        <div class="col">
                                            <label for="employee_address">Notes</label>
                                            <textarea class="form-control tinput" id="petty_notes" name="petty_notes" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    
                                       
                                    <div class="container mt-5 text-center">
                                        <button class="btn" id="submit_btn" style="background:#AFB6BB;">Save</button>
                                    </div>
                                    </div>
                               </form>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>

<?php  include "footer.php";  ?>
<script>
    $(document).ready(function(){
        $("#submit_btn").click(function(e){
           var emp_id = $("#emp_id").val();
           var petty_amt = $("#petty_amt").val();
           var petty_notes = $("#petty_notes").val();
            event.preventDefault();
            if(emp_id == ""|| petty_amt == ""|| petty_notes == ""){
                $(".error").html("Please Fill The Blanks.").slideDown();
                $(".success").slideUp();
            }else{
                // $(".success").html("good").slideDown();
                // $(".error").slideUp();
                if(isNaN(petty_amt)){
                $(".error").html("This Amount Not a Number.").slideDown();
                $(".success").slideUp();
                }else{
                    $.ajax({
                        url : "petty_ajax.php",
                        type : "POST",
                        data : $("#patty_cash").serialize(),
                        success : function(data){
                           if(data == 1){
                            $(".success").html("Inserted Successfully.").slideDown();
                            $(".error").slideUp();
                            if (confirm("Do u want to print Receipt ?")) {
							window.location.href = "pdf.php?emp_id="+emp_id;
						}

                           }else{
                            $(".error").html("Not Inserted.").slideDown();
                            $(".success").slideUp();
                           }
                        }
                    });
                }
            }
        })
    })
</script>
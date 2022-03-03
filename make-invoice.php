<?php include 'header.php';  ?>

 <!-- Page content-->
 <div class="container-fluid">
                    <h1 class="mt-4">Invoice</h1>
                    <div class="success text-center"></div>
                    <div class="error text-center"></div>
                    <form id="invoice_form">
                    <div class="container">
                        <div class="card c_body">
                        <!-- Date and Time -->
                        <div class="container">
                        <div class="row">
                            <div class="col">

                            <div class="mt-2">
                                <label for="">Date</label>
                                <input class="form-control input  text-center" name="date" type="text" readonly  value="<?php  echo date("d/m/Y") ;    ?>">
                            </div>

                            </div>
                            <div class="col-8">
                            <!-- Column -->
                            </div>
                            <div class="col">

                            <div class="mt-2">
                                <label for="">Time</label>
                                <input class="form-control input  text-center" name="time" type="text" readonly value="<?php  echo date('h:i a') ;    ?>">
                            </div>

                            </div>
                            <!-- Cutomer Details -->
                            <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <label for="">Cutomer Name</label>
                                    <input class="form-control input" id="c_name" name="c_name" type="text">
                                </div>
                                <div class="col">
                                <label for="">Cutomer Address</label>
                                    <input class="form-control input" id="c_add" name="c_add" type="text">
                                </div>
                                <div class="col">
                                <label for="">Cutomer Phone</label>
                                    <input class="form-control input" id="c_phone" name="c_phone" type="text">
                                </div>
                            </div>
                            </div>


                            <!-- Table for service and stock choosing -->
                            <div class="container mt-3">
                            <table class="table">
                                <thead class="table-success">
                                    <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">IGST(%)</th>
                                    <th scope="col">CGST(%)</th>
                                    <th scope="col">SGST(%)</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Discount</th>
                                    </tr>
                                </thead>
                                <tbody id="table_data">
                                    <tr>
                                    <td><b class="number">1</b></td>
                                    <td><input class="form-control input" id="desc" name="desc" type="text"></td>
                                    <td><input class="form-control input" id="value" name="value" type="text" style="width:110px;"></td>
                                    <td><input class="form-control input" id="igst" name="igst" type="text" style="width:60px;"></td>
                                    <td><input class="form-control input" id="cgst" name="cgst" type="text" style="width:60px;"></td>
                                    <td><input class="form-control input" id="sgst" name="sgst" type="text" style="width:60px;"></td>
                                    <td><input class="form-control input" id="amount" name="amount" type="text" style="width:120px;"></td>
                                    <td><input class="form-control input" id="disc" name="disc" type="text" style="width:120px;"></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="card text-center c_body">
                                <div class="row">
                                <center style="padding:10px;">
		                        	<button id="add" style="width:150px;" class="btn btn-success">Add</button>
		                        	<button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
		                        </center>
                                </div>
                            </div>

                            <!-- discount field  -->
                            <div class="hstack gap-3 mb-3 mt-3">
                                <label for="">Net Amount</label>
                                <input class="form-control input" id="net_amt" name="net_amt" type="text" style="width:120px;">
                                <div class="container text-center">
                                    <button class="btn btn-success" id="invoice">Invoice</button>
                                </div>
                            </div>

                            </form>
                            

                        </div>
                        </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>



<?php include 'footer.php';  ?>

<script>
    $("document").ready(function(){
        $("#add").click(function(e){
            event.preventDefault();
            var html = '<tr><td><b class="number">1</b></td><td><input class="form-control input" type="text"></td> <td><input class="form-control input" type="text" style="width:110px;"></td><td><input class="form-control input" type="text" style="width:60px;"></td><td><input class="form-control input" type="text" style="width:60px;"></td><td><input class="form-control input" type="text" style="width:60px;"></td><td><input class="form-control input" type="text" style="width:120px;"></td><td><input class="form-control input" type="text" style="width:120px;"></td></tr>';
            $("#table_data").append(html);

            var n = 0;
				$(".number").each(function(e){
                    event.preventDefault();
				$(this).html(++n);
			})
        })


        $("#remove").click(function(e){
            event.preventDefault();
            $("#table_data").children("tr:last").remove();
        })

        // Validate input fields in invoice form
        $("#invoice").click(function(e){
            event.preventDefault();
            var c_name = $("#c_name").val();
            var c_add = $("#c_add").val();
            var c_phone = $("#c_phone").val();

            if(c_name==""||c_add==""||c_phone==""){
                $(".error").html("Please fill the Customer Details !").slideDown();
                $(".success").slideUp();
            }else{

                if(isNaN(c_phone)){
                $(".error").html("This phone number is invalid !").slideDown();
                $(".success").slideUp();
                }else{
                if(c_phone.length !== 10){
                $(".error").html("phone number should be 10 digits.").slideDown();
                $(".success").slideUp();
              }if(c_phone.length == 10){
                $(".error").hide();
                $.ajax({
                  url : "invoice_ajax.php",
                  type : "POST",
                  data :$("#invoice_form").serialize(),
                  success : function(data){
                      alert(data);
                  }
            })
        }
    }
}
    });


    })
</script>


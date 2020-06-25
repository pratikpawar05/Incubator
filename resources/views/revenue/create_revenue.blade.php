@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->

      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
      .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    </style>
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <!--  <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>ADD ADDITIONAL REVENUE</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="container-fluid" style="padding: 2%">
    
                 <div class="errors">
      
                    </div>

                   <div class="container">
                  <form id="Additional_Revenue" class="form-horizontal" >
                    
                    <div class="errors">
                      
                    </div>

                    <div style="    background-color: #134779;
                    color: #fff;
                    padding: 2%;
                    border-radius: 5px;" class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label" >Customer Name</label>
                            <input type="text" class="form-control" placeholder="Enter Customer Name" name="company_name">
                        </div>

                        <div class="form-group">
                          <label class="control-label" >Revenue Type</label>
                            <select name="revenue_type" class="form-control">
                              <option>VIRTUAL OFFICE</option>
                              <option>CABINET</option>
                              <option>MEETING ROOM</option>
                              <option>EVENT ROOM</option>
                              <option>ADD ON SERVICE</option>
                              <option></option>
                            </select>
                        </div>

                        <!-- <div class="form-group">
                          <label class="control-label" >Amount</label>
                            <input type="text" class="form-control"  placeholder="Enter Amount" name="amount">
                        </div> -->

                        <div class="form-group">
                          <label class="control-label" >Invoice Amount</label>
                          <input type="text" id="sum"  min="0" class="form-control"  placeholder="Enter Invoice Amount" name="invoice_amt">
                        </div>

                        <div class="form-group">
                          <label class="control-label" >Gst On Invoice Amount</label>
                            <input type="text" id="value3" min="0"  class="form-control"  placeholder="Enter GST Amount" name="invoice_amt_gst">
                        </div>

                         <div class="form-group">
                          <label class="control-label" >Total Invoice Amount</label>
                            <input type="text" id="sum2" min="0" class="form-control"  placeholder="Enter Total Amount" name="total_amt">
                        </div>

                      </div>

                      <div class="col-sm-6">       
                    
                         <div class="form-group">
                          <label class="control-label" >Invoice Date</label>
                            <input type="text" id="datepicker" class="form-control"  placeholder="Enter Invoice Date" name="invoice_date">
                        </div>

                        <div class="form-group">
                          <label class="control-label" >Invoice Number</label>
                            <input type="text" class="form-control"  placeholder="Enter Invoice Number" name="invoice_no">
                        </div>

                         <div class="form-group">
                          <label class="control-label" >Reeceived Date</label>
                            <input type="text" id="datepicker1" class="form-control"  placeholder="Enter Reeceived Date" name="received_date">
                        </div>

                        <div style="display: none;" class="form-group">
                          <label class="control-label" >Payment Status</label>
                            <select class="form-control" name="payment_status">
                              <option>RECEIVED</option>
                              <option>PENDING</option>
                            </select>
                        </div>

                        <div class="form-group">
                          <label class="control-label" >Payment Month</label>

                          <input type="text" id="datepicker2" name="payment_month" class="form-control" placeholder="Enter The Month & Year Respectively">
                          <!-- <select class="form-control" name="payment_month">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                          </select> -->
                      </div>
                            <div class="form-group">
                          <label class="control-label" >Amount Received</label>
                          <input type="text" class="form-control" name="amount_received" placeholder="Enter The Amount Received">
                        </div>


                      </div>


                  
                      <div class="form-group">        
                          <button type="submit" class="btn btn-info">Submit</button>
                      </div>
                    
                    </div>

                  </form>
                </div><!-- end row -->

            </div> <!-- end container -->
        <!-- end wrapper -->

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Required datatable js -->

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

  <script type="text/javascript">
    $(function () {
  $("#datepicker").datepicker({ 
  }).datepicker;
});

  </script>

    <script type="text/javascript">
    $(function () {
  $("#datepicker1").datepicker({ 
  }).datepicker;
});

  </script>

      <script type="text/javascript">
    $(function () {
  $("#datepicker2").datepicker({ 
    format: "yyyy-mm",
    viewMode: "months", 
    minViewMode: "months"
  }).datepicker;
});

  </script>

<script type="text/javascript">
    $(function(){
            $('#sum, #value3').keyup(function(){
               var sum = parseFloat($('#sum').val()) || 0;
               var value3 = parseFloat($('#value3').val()) || 0;
               totalAmount = sum+sum*(value3/100)
               $('#sum2').val(totalAmount);
            });
         });
</script>
    
  <script type="text/javascript">
      $(function() {
          
        $("#Additional_Revenue").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/additionalRevenueSave")}}',
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },   
            method: 'POST',
            type: 'JSON',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,

            success: function(obj) {

              if(obj.status ="success") {
                swal({
                    title:'An Additional Revenue Added <b style="color:green;">successfully</b>!',
                    type:'success',
                    
                }).then(e=>{
                window.location.href = "/additionalRevenue"

                }).catch(err=>{

                });
              }

            },
            error: function(obj) {
              if (obj.status == 401) {
                swal(
                  'Warning',
                  'You are not Authorized!',
                  'warning'
                );
              }

              
              console.log(obj)
              $(".alert-danger").remove();
              console.log(obj.responseJSON.errors)
              $.each(obj.responseJSON.errors, function(key, val) {
                $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
              });
            },

          }) 
      })       
  })
</script>

@include('includes/footer_end')
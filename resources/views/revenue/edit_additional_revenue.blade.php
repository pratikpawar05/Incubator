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
                          <!--   <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>EDIT ADDITIONAL REVENUE</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">

                      <div class="container">
                      <form id="Edit_Additional_Revenue" class="form-horizontal" >

                      <div class="errors">

                      </div>

                      <div style="    background-color: #14487A;
                      color: #fff;
                      padding: 2%;
                      border-radius: 5px;" class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                      <label class="control-label" >Customer Name</label>
                      <input type="text" class="form-control" placeholder="Enter Customer Name" name="company_name" value="{{$data->company_name}}">
                      </div>

                      <div class="form-group">
                      <label class="control-label" >Revenue Type</label>
                      <select name="revenue_type" class="form-control">
                      <option>{{$data->revenue_type}}</option>
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
                      <input type="text" class="form-control"  placeholder="Enter Invoice Amount" name="invoice_amt" value="{{$data->invoice_amount}}">
                      </div>

                      <div class="form-group">
                      <label class="control-label" >Gst On Invoice Amount</label>
                      <input type="text" class="form-control"  placeholder="Enter GST Amount" name="invoice_amt_gst" value="{{$data->invoice_amt_gst}}">
                      </div>

                      <div class="form-group">
                      <label class="control-label" >Total Invoice Amount</label>
                      <input type="text" class="form-control"  placeholder="Enter Total Amount" name="total_amt" value="{{$data->total_amt}}">
                      </div>

                      </div>



                      <div class="col-sm-6">






                      <div class="form-group">
                      <label class="control-label" >Invoice Date</label>
                      <input type="text" class="form-control"  placeholder="Enter Invoice Date" name="invoice_date" data-select="datepicker" id="datepicker" value="{{$data->invoice_date}}" >
                      </div>

                      <div class="form-group">
                      <label class="control-label" >Invoice Number</label>
                      <input type="text" class="form-control"  placeholder="Enter Invoice Number" name="invoice_no" value="{{$data->invoice_no}}">
                      </div>

                      <div class="form-group">
                      <label class="control-label" >Reeceived Date</label>
                      <input type="text" class="form-control"  placeholder="Enter Reeceived Date" name="received_date" id="datepicker1" data-select="datepicker" value="{{$data->received_date}}">
                      </div>


                      <div class="form-group">
                      <label class="control-label" >Payment Status</label>
                      <select class="form-control" name="payment_status">
                      <option>{{$data->payment_status}}</option>
                      <option>RECEIVED</option>
                      <option>PENDING</option>
                      </select>
                      </div>


                      <div class="form-group">
                      <label class="control-label" >Payment Month</label>

                      <input type="text" id="datepicker2" name="payment_month" class="form-control" placeholder="Enter The Month & Year Respectively" value="{{$data->payment_month}}">
                      <!-- <select class="form-control" name="payment_month">
                      <option>{{$data->payment_month}}</option>
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

                      </div>
                      <div class="form-group">
                      <label class="control-label" >Amount Received</label>
                      <input type="text" class="form-control" name="amount_received" 
                      value="{{$data->amount_received}}">
                      </div>

                      <div style="margin-top: 28px; margin-left: 10px;" class="form-group">        
                      <button type="submit" class="btn btn-info">Submit</button>
                      </div>
                    </div>
                      </div>

                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
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
      $(function() {
          
        $("#Edit_Additional_Revenue").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/edit_revenue_save")}}/{{$data->id}}',
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
                    title:'An Additional Revenue Updated <b style="color:green;">successfully</b>!',
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
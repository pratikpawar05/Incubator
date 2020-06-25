@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <h4 class="page-title"> <i class="dripicons-blog"></i>EDIT Revenue</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="container-fluid" style="padding: 2%">
                    <form id="Revenue" class="form-horizontal" >
    
                 <div class="errors">
      
                    </div>

                            <div style="background-color: #144E84;
                            color: #fff;
                            padding: 1%;
                            border-radius: 5px;" class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label" >Company Name</label>
                                    <!-- <input type="text" class="form-control" placeholder="Enter Customer Name" name="Customer_name" -->
                                    <!-- > -->
                                    <select name="company_id"  class="form-control" name="Customer_name">

                                    <option value="{{$companyRevenue->company_id}}">{{$company_new}}</option>
                                    </select>    
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Seats/Desk</label>


                                  <input type="text" value="{{$companyRevenue->no_of_seats}}"  id="value1" min="0" class="form-control no_of_desk"  placeholder="Enter no of seat" name="no_of_seats">

                                </div>


                                <div class="form-group">
                                  <label class="control-label" >Revenue Type</label>
                                    <select name="revenue_type" class="form-control">
                                      <option>{{$companyRevenue->revenue_type}}</option>
                                      </select>
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Price Per Seat</label>
                                    <input type="text" id="value2" min="0" class="form-control" value="{{$companyRevenue->price_per_seat}}" placeholder="Enter per seat amount" name="price_per_seat">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Monthly Rent</label>
                                  <input type="text"  id="sum" class="form-control"  placeholder="Enter Monthly Rent" value="{{$companyRevenue->monthly_rent}}" name="monthly_rent">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Gst(%)</label>
                                    <input type="text" id="value3" min="0" class="form-control" value="{{$companyRevenue->gst_rate}}" placeholder="Enter GST %" name="gst_rate">
                                </div>

                              </div>

                              <div class="col-sm-6">

                                

                            
                                <div class="form-group">
                                  <label class="control-label" >Total Amount</label>
                                    <input type="text" id="sum2" min="0"  class="form-control" value="{{$companyRevenue->invoice_amount}}" placeholder="Enter Total Amount" name="invoice_amount">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Invoice Number</label>
                                    <input type="text"  class="form-control"  placeholder="Enter Invoice Number" value="{{$companyRevenue->invoice_number}}" name="invoice_number">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Invoice Date</label>
                                    <input type="text" value="{{$companyRevenue->invoice_date}}"  type="text" id="datepicker" class="form-control"  placeholder="Enter Invoice Date" name="invoice_date" >
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Received Date</label>
                                    <input type="text" id="datepicker1" value="{{$companyRevenue->received_date}}"  class="form-control"  placeholder="Enter Received Date" name="received_date">
                                </div>
                            
                                <div style="display: none;"  class="form-group">
                                  <label class="control-label" >Payment Status</label>
                                     <input type="month" name="payment_month" class="form-control" placeholder="Enter The Month & Year Respectively" value="{{$companyRevenue->payment_month}}">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Payment Month</label>
                                  <input type="text" id="datepicker2" name="payment_month" class="form-control"  value="{{$companyRevenue->payment_month}}" placeholder="Enter The Month & Year Respectively">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Amount Received</label>
                                  @if(isset($companyRevenue->amount_received))
                                  <input type="text" name="amount_received" class="form-control" placeholder="Enter the amount received" value="{{$companyRevenue->amount_received}}">
                                @else
                                  <input type="text" name="amount_received" class="form-control" placeholder="Enter the amount received" value="0">
                                @endif
                                </div>

                              </div>

                              <div class="form-group">        
                                  <button type="submit" class="btn btn-info">Submit</button>
                              </div>
                            
                            </div>

                          </form>
                        </div>


                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


@include('includes/footer_start')
<!-- Put Extra Js here -->
<!-- Required datatable js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

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
          
        $("#Revenue").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/updateRevenue")}}/{{$companyRevenue->id}}',
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
                    title:'An Revenue Updated <b style="color:green;">successfully</b>!',
                    type:'success',
                    
                }).then(e=>{
                window.location.href = "/revenue"

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
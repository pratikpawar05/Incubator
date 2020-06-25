@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="{{ url('/assets/css/jquery.datepicker2.css') }}" rel="stylesheet">
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

     <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
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
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>ADD REVENUE</h4>
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
                                    <select name="company_id" id="company_name" class="form-control" name="Customer_name">
                                      <option>--SELECT--</option>
                                      @foreach($members as $member)
                                      <option value="{{$member->id}}">{{ $member->company_registered_name }}</option>
                                      @endforeach
                                      <!-- <option value="0">Others</option> -->
                                    </select>    
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Seats/Desk</label>


                                  <input type="text" value=""  id="value1" min="0" class="form-control no_of_desk"  placeholder="Enter no of seat" name="no_of_seats">

                                </div>


                                <div class="form-group">
                                  <label class="control-label" >Revenue Type</label>
                                    <select name="revenue_type" class="form-control">
                                      <option>RENT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Price Per Seat</label>
                                    <input type="text" id="value2" min="0" class="form-control"  placeholder="Enter per seat amount" name="price_per_seat">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Monthly Rent</label>
                                  <input type="text"  id="sum" class="form-control"  placeholder="Enter Monthly Rent" name="monthly_rent">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Gst(%)</label>
                                    <input type="text" id="value3" min="0" class="form-control"  placeholder="Enter GST %" name="gst_rate">
                                </div>

                              </div>

                              <div class="col-sm-6">

                                

                            
                                <div class="form-group">
                                  <label class="control-label" >Total Amount</label>
                                    <input type="text" id="sum2" min="0"  class="form-control"  placeholder="Enter Total Amount" name="invoice_amount">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Invoice Number</label>
                                    <input type="text"  class="form-control"  placeholder="Enter Invoice Number" name="invoice_number">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Invoice Date</label>
                                    <input type="text" type="text" id="datepicker" class="form-control"  placeholder="Enter Invoice Date" name="invoice_date" >
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Received Date</label>
                                    <input type="text" id="datepicker1"  class="form-control"  placeholder="Enter Received Date" name="received_date">
                                </div>
                            
                                <div style="display: none;"  class="form-group">
                                  <label class="control-label" >Payment Status</label>
                                    <select class="form-control" name="payment_status">
                                      <option>--SELEECT--</option>
                                      <option>RECEIVED</option>
                                      <option>PENDING</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Payment Month</label>
                                  <input type="text" id="datepicker2" name="payment_month" class="form-control" placeholder="Enter The Month & Year Respectively">
                                </div>

                                <div class="form-group">
                                  <label class="control-label" >Amount Received</label>
                                  <input type="text" name="amount_received" class="form-control" placeholder="Enter the amount received">
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

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

          <div class="modal-body">
              
            <div class="thank-you-pop">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this consumption?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger consumption_delete_btn" data-dismiss="modal">Delete</button>
      </div>

      </div>
  </div>
</div>

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="assets/pages/datatables.init.js"></script>

    <script type="text/javascript" src="{{ url('/assets/js/jquery.datepicker2.js') }}"></script>

    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<script type="text/javascript">
$("#datepicker").datepicker( {
});

</script>

<script type="text/javascript">
$("#datepicker1").datepicker( {
});

</script>

<script type="text/javascript">
$("#datepicker2").datepicker( {
  format: "yyyy-mm",
    viewMode: "months", 
    minViewMode: "months"
});

</script>


<script type="text/javascript">
    $(function(){
            $('#value1, #value2').keyup(function(){
               var value1 = parseFloat($('#value1').val()) || 0;
               var value2 = parseFloat($('#value2').val()) || 0;
               $('#sum').val(value1 * value2);
            });
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
          
        $("#Revenue").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/revenueSave")}}',
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
                    title:'An Revenue Added <b style="color:green;">successfully</b>!',
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

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $("#company_name").on('change', function() {
        var level = $(this).val();
        // alert(level);
        var deskURL = 'companySeats/'+level
        if(level){
               $.ajax ({
                type: 'get',
                url: deskURL,
                success : function(htmlresponse) {
                  // alert('alert')
                    $('#value1').val(htmlresponse);
                    // alert(htmlresponse);
                },error:function(e){
                alert("error");}
            });
        }
    });
});
</script>

@include('includes/footer_end')
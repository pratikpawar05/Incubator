@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i> REVENUE LIST</h4>
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
                        <div class="card m-b-20">
                            <div class="card-body text-center">

                                <!-- <h4 class="">cgvh</h4> -->
                                <br>
                                <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                          <thead style="background-color: #134C80;color: white;">
                                    <tr>
                                    <th><b>SR NO.</b></th>
                                    <!-- <th>Payment Month</th> -->
                                    <th><b>COMPANY NAME</b></th>
                                    <th><b>NO OF SEATS</b></th>
                                    <th><b>REVENUES TYPE</b></th>
                                    <th><b>PRICE PER SEATS</b></th>
                                    <!-- <th>Monthly Rent</th> -->
                                    <!-- <th>GST</th> -->
                                    <th><b>INVOICE AMOUNT</b></th>
                                    <!-- <th>Invoice Number</th> -->
                                    <!-- <th>Invoice Date</th>
                                    <th>Received Date</th> -->
                                    <th><b>AMOUNT RECEIVED</b></th>                
                                    <th><b>PAYMENT MONTH</th>
                                    <th><b>PAYMENT STATUS</b></th>
                                    <th><b>ACTION</b></th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                   @foreach($revenueData as $key=> $data)
                                    <tr id="{{$data->id}}">
                                         <td>{{$key+1}}</td>
                                          <!-- <td>{{$data->payment_month}}</td> -->
                                          <td>{{$data->company_registered_name}}</td>
                                          <td class="money">{{$data->no_of_seats}}</td>
                                          <td>{{$data->revenue_type}}</td>
                                          <td class="money">{{$data->price_per_seat}}</td>
                                          <!-- <td>{{$data->monthly_rent}}</td> -->
                                          <!-- <td>{{$data->gst_rate}}</td> -->
                                          <td class="money">{{$data->invoice_amount}}</td>
                                          <!-- <td>{{$data->invoice_number}}</td> -->
                                          <!-- <td>{{$data->invoice_date}}</td>
                                          <td>{{$data->received_date}}</td> -->
                                          <td>
                                            @if(isset($data->amount_received))
                                              {{ $data->amount_received }}
                                            @else
                                              N.A.
                                            @endif
                                          </td>
                                          <td>
                                          {{ $data->payment_month }}

                                          </td>
                                          <td>
                                              @if($data->invoice_amount == $data->amount_received)
                                              RECEIVED
                                              @else
                                             PENDING
                                            @endif
                                            
                                          </td>
                                            
                                          <td>
                                          @if (Auth::user()->isAuthenticated("Revenue", "d"))
                                            <a type="button" class="btn btn-danger delete_member_btn "  data-toggle="modal"  data-target="#myModal"  id="{{$data->id}}">
                                            <span style="color: #fff;"><i class="fa fa-trash" title="Delete Sales"></i></span>
                                            </a>
                                            @endif
                                          @if (Auth::user()->isAuthenticated("Revenue", "u"))
                                          <a href="{{url('/edit_revenue')}}/{{$data->id}}">
                                          <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                            </a>
                                            @endif
                                          </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
              
            <div class="thank-you-pop text-center">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this Member?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger member_delete_btn" data-dismiss="modal">Delete</button>
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

<script type="text/javascript">
$(function() {
    $(".delete_member_btn").on("click", function() {
        member_id = $(this)[0].id
        // alert(member_id);
        delete_visitor_url = '{{url("/deleteRevenue")}}/'+member_id
        $("#myModal .member_delete_btn").attr("id", member_id)
        $(".member_delete_btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
            url: delete_visitor_url,
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },   
            method: 'get',
            type: 'JSON',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
              $('#loading_icon').show();
            },
            success: function(obj) {
              console.log(obj)
              $(".alert-danger").remove();
              // if(obj.status ="success") {
              //   swal(
              //       'Success',
              //       'The Member deleted <b style="color:green;">successfully</b>!',
              //       'success'
              //     )
              // }
              $(".reveue_table tr#"+member_id).fadeOut()
              window.location.href = "/revenue";
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
            complete: function() {
              $('#loading_icon').hide();
            }
          })

        })


    })

})


$('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            }); 


</script>
@include('includes/footer_end')
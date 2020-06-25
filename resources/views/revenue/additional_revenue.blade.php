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
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i> ADDITIONAL REVENUE LIST</h4>
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
                                    <th class='fix' ><b>SR NO.</b></th>
                                    <th class='fix'><b>CUDTOMER NAME</b></th>
                                    <th class='fix'><b>REVENUE TYPE</b></th>
                                    <!-- <th class='fix'>Invoice Amount</th> -->
                                    <!-- <th class='fix'>GST</th> -->
                                    <!-- <th  class='fix'>Gst On Invoice Amount</th> -->
                                    <th class='fix'><b>TOTAL AMOUNT</b></th>
                                    <th class='fix'><b>PAYMENT STATUS</b></th>
                                    <th class='fix'><b>REVENUES MONTH</b></th>
                                    <th class='fix'><b>ACTION</b></th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    @foreach($data as $key=> $additional_revenue)
                                    <tr id="{{$additional_revenue->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$additional_revenue->company_name}}</td>
                                    <td>{{$additional_revenue->revenue_type}}</td>
                                    <!-- <td class="money">{{$additional_revenue->total_amt}}</td> -->
                                    <!-- <td>{{$additional_revenue->invoice_amt_gst }} %</td> -->
                                    <!-- <td>{{$additional_revenue->invoice_amt_gst}}</td> -->
                                    <td class="money">{{$additional_revenue->total_amt}}</td>
                                    <td>
                                    @if($additional_revenue->total_amt == $additional_revenue->amount_received)
                                    RECEIVED
                                    @else
                                    PENDING
                                    @endif
                                    </td>
                                    <td>{{$additional_revenue->payment_month}}</td>
                                    <td>
                                     @if (Auth::user()->isAuthenticated("Additional Revenue", "d"))
                                    <a type="button" class="btn btn-danger delete_visitor_btn"  data-toggle="modal"  data-target="#myModal"  id="{{$additional_revenue->id}}">
                                    <span style="color: #fff;"><i class="fa fa-trash" title="Delete Sales"></i></span>
                                    </a>
                                    @endif
                                     @if (Auth::user()->isAuthenticated("Additional Revenue", "u"))
                                    <a href="{{url('/edit_additional_revenue')}}/{{$additional_revenue->id}}">
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

  <!-- ====Delete Sales required modal begins========== -->

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

          <div class="modal-body">
              
            <div class="thank-you-pop">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this Sales Lead?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger visitor_delete_btn" data-dismiss="modal">Delete</button>
      </div>

      </div>
  </div>
</div>

<!-- ====Delete Sales required modal ends========== -->

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

    <script type="text/javascript">
$(function() {
    $(".delete_visitor_btn").on("click", function() {
        visitor_id = $(this)[0].id
        // alert(visitor_id);
        delete_visitor_url = '{{url("/delete_additional_revenue")}}/'+visitor_id
        $("#myModal .visitor_delete_btn").attr("id", visitor_id)

        $(".visitor_delete_btn").on("click", function(e) {
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
              if(obj.status ="success") {
                swal(
                    'Success',
                    'The Sales deleted <b style="color:green;">successfully</b>!',
                    'success'
                  )
              }
              $("#visitor_table tr#"+visitor_id).fadeOut()
              // window.location.href = "/admin/visitors";
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
</script>

<script>
  $("#filter").on("click", function(e) {
    e.preventDefault()

    var year = $('#year').val()
    var month = $('#month').val()
    if (year == "--Select--" || month == '') {
      $('#date_error').text("Year or Month can't be empty")
    } else {
      $.ajax({
        url: '/revenue_filter/' + year + "/" + month,
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'get',
        type: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {
          // alert(obj.id)
          $(".alert-danger").remove();
          if (obj.status == "Expense already exists!") {
            swal(
              'Warning',
              'This Expense Report already exists!',
              'warning'
            )
          }

          $("th,td").not('.fix').hide();
          $("." + obj.id).show();

        },
        error: function(obj) {
          if (obj.status == 401) {
            swal(
              'Warning',
              'You are not Authorized!',
              'warning'
            );
          }


          alert("Expense Report for this month does not exists")
          $(".alert-danger").remove();
          console.log(obj.responseJSON.errors)
          $.each(obj.responseJSON.errors, function(key, val) {
            $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>" + val + "</li></ul>")
          });
        },
        complete: function() {
          $('#loading_icon').hide();
        }
      })
    }
  });

$('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            });

  
</script>

@include('includes/footer_end')
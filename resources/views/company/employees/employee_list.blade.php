@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- Dropzone css -->
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
                            <h4 class="page-title busines_data"> <i class="dripicons-box"></i> All MEMBER DETAILS</h4>
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
                            <div class="card-body">

                               <table style="font-size: 18px;" id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%" class="employee_table">
                                    <thead style="background-color: #134C80;color: white;">
                                    <tr>
                                        <th><b>SR No.</b></th>
                                        <th><b>Customer Name</b></th>
                                        <th><b>Company name</b></th>
                                        <th><b>Gender</b></th>
                                        <th><b>Contact</b></th>
                                        <th><b>Date Of Birth</b></th>
                                        <!-- <th>Email</th> -->
                                        <th><b>Status</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                    </thead>


                                      <tbody id="myTable">
                                            @if(isset($data))
                                            @foreach($data as $key => $employe_details)
                                        <tr id="{{$employe_details->id}}">
                                          <td>{{$key+1}}</td>
                                          <td>{{$employe_details->customer_Name}}</td>
                                          <td>{{$employe_details->company_Name}}</td>
                                          <td>{{$employe_details->gender}}</td>
                                          <td>{{$employe_details->contact}}</td>
                                          <td>{{$employe_details->DOB}}</td>
                                          @if($employe_details->status == '1')

                                            <!-- <p class="text-muted">Active</p> -->
                                            <td>Active</td>

                                          @else

                                             <td>Inactive</td>
                                             @endif
                                          <!-- <td>{{$employe_details->aadhar_Card}}</td> -->
                                          <!-- <td>{{$employe_details->pan_card}}</td> -->
                                          
                                          <td>
                                            <!-- <a href="{{url('/deleteEmployee')}}"> -->
                                                <!-- <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                                                <!-- </a> -->
                                  @if(Auth::user()->isAuthenticated("Member","d"))

                                                <a type="button" class="btn btn-danger delete_visitor_btn"  data-toggle="modal"  data-target="#myModal"  id="{{$employe_details->id}}">
                                                <span style="color: #fff;"><i class="fa fa-trash" title="Delete Employee"></i></span>
                                                </a>
                                                @endif
                                                @if(Auth::user()->isAuthenticated("Member","u"))
                                                <a href="{{url('editEmployee')}}/{{$employe_details->id}}">
                                                <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>
                                                @endif
                                                @if(Auth::user()->isAuthenticated("Member","v"))
                                                <a href="{{url('/employeeDetails')}}/{{$employe_details->id}}">
                                                <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                                </a>
                                                @endif
                                          </td>
                                        </tr>
                                      @endforeach
                                          @endif
                                      </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

<!-- ====Delete Visitor required modal begins========== -->

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

          <div class="modal-body">
              
            <div class="thank-you-pop">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this Visitor?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger visitor_delete_btn" data-dismiss="modal">Delete</button>
      </div>

      </div>
  </div>
</div>

<!-- ====Delete Visitor required modal ends========== -->

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Dropzone js -->
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
    $('.employeeStatusChange').change(function() {
      // alert('ok')
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
      
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{url('changeStatus')}}',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              // alert('su')
              console.log(data.success)
            },
            error: function (obj) {
              if (obj.status == 401) {
                swal(
                  'Warning',
                  'You are not Authorized!',
                  'warning'
                );
              }


            }
        });

    })
  })
</script>


<script type="text/javascript">
  $(function() {
  

    $(".employee_status").on("change", function(){
        article_status = $(this).val()
        article_id = $(this)[0].id


      if (article_status=="Active") {
          $(".article"+article_id).removeClass("btn btn-info btn-edited btn-warning btn-danger btn-primary")
          $(".article"+article_id).addClass("btn btn-success")
          button_class ="btn btn-success"
        }
        if (article_status=="Inactive") {
          $(".article"+article_id).removeClass("btn btn-success btn-edited btn-warning btn-danger btn-primary")
          $(".article"+article_id).addClass("btn btn-info")
          button_class ="btn btn-info"
        }    

        url = "{{url('/change_employee_status')}}/"+article_status+"/"+article_id+"/"+button_class+""
        console.log(url)                                                                        
        $.ajax({
          url: url,
          headers:{
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },   
          method: 'GET',
          beforeSend: function() {
            $('#loading_icon').show();
          },
          success: function(obj) {
            console.log("success");
            if(obj.status=="success") {
              swal(
              'Success',
              'Employee Status updated to '+article_status,
              'success'
              )
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


          },
          complete: function() {
          }
        })

      })


      $(".delete_visitor_btn").on("click", function() {
        visitor_id = $(this)[0].id
        // dd($visitor_id)
        delete_visitor_url = '{{url("/deleteEmployee")}}/'+visitor_id
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
                    'An Employee deleted <b style="color:green;">successfully</b>!',
                    'success'
                  )
              }
              $(".employee_table tr#"+visitor_id).fadeOut(1000)
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
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


 <script type="text/javascript">
  $(function() {
    $(".select_visitor").on("change", function() {
      visitor_id = $(this)[0].id
      visitor_status = $(this).val()
      url = "{{url('/change_visitor_status')}}/"+visitor_id+"/"+visitor_status+""
      console.log(url)
      $.ajax({
        url: url,
        headers:{
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },   
        method: 'GET',
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {

          swal(
              'Success',
              'The Employee status updated as <b>'+visitor_status+"</b>",
              'success'
          )

        },
        error: function(obj) {
          if (obj.status == 401) {
            swal(
              'Warning',
              'You are not Authorized!',
              'warning'
            );
          }

          
        },
        complete: function() {
        }
      })


    })
  })
</script>
@include('includes/footer_end')
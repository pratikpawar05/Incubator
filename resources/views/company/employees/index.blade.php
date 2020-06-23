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
    #datatable-buttons_previous,#datatable-buttons_next{
        text-transform: uppercase;
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
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>Employee List - {{$member_name}}</h4>
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

                                 <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered visitor_table" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;"> 
                                    <tr>
                                     <th>Sr.No.</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Contact</th>
                                      <th>Gender</th>
                                      <th>Designation</th>
                                      <!-- <th>Date of Joining</th> -->
                                      <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody id="myTable">
                                    @if(isset($employees))
                                    @foreach($employees as $key=> $employee)
                                    <tr id="">
                                          <td>{{$key+1}}</td>
                                          <td>{{$employee->customer_Name}}</td>
                                          <td>{{$employee->email}}</td>
                                          <td>{{$employee->contact}}</td>
                                          <td>{{$employee->gender}}</td>
                                          <td>{{$employee->designation}}</td>
                                          <!-- <td>{{$employee->date_of_joining}} N.A.</td> -->
                                          <td>

                                          @if (Auth::user()->isAuthenticated("Member", "d"))
                                          <a type="button" class="btn btn-danger"  data-toggle="modal"  data-target="#myModal"  id="{{$employee->id}}">
                                            <span style="color: #fff;"><i class="fa fa-trash" title="Delete Employee"></i></span>
                                          </a>
                                          @endif

                                          @if (Auth::user()->isAuthenticated("Member", "u"))
                                            <a href="{{url('/editEmployee')}}/{{$employee->id}}">
                                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                            </a>
                                          @endif

                                          @if (Auth::user()->isAuthenticated("Member", "v"))
                                            <a href="{{url('/employeeDetails')}}/{{$employee->id}}">
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
                </div>
            </div>

            </div>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

          <div class="modal-body">
              
            <div class="thank-you-pop">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this Employee Data?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger visitor_delete_btn" data-dismiss="modal">Delete</button>
      </div>

      </div>
  </div>
</div>

@include('includes/footer_start')
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script type="text/javascript">
$(function() {
    $(".delete_visitor_btn").on("click", function() {
        visitor_id = $(this)[0].id
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
                    'The Sales deleted <b style="color:green;">successfully</b>!',
                    'success'
                  )
              }
              $(".visitor_table tr#"+visitor_id).fadeOut()
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
@include('includes/footer_end')
@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <style type="text/css">
      .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    .busines_data1{
        font-size: 2.5em;
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
                            <h4 class="page-title busines_data"> <i class="fa fa-lock"></i>PERMISSIONS LIST</h4>
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

                                <div class="container-fluid" style="padding:3%;">

                                <a href="/permission/create/" class="btn btn-success">Add Permissions</a>
                                <br>
                                <br>


                                <div class="col-sm-6">
                                @if(session()->get('success_added'))
                                <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session()->get('success_added') }}  
                                </div>
                                @endif
                                </div>

                                <div class="col-sm-6">
                                @if(session()->get('success_updated'))
                                <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>      {{ session()->get('success_updated') }}  
                                </div>
                                @endif
                                </div>

                                <div class="col-sm-6">
                                @if(session()->get('deleted'))
                                <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session()->get('deleted') }}  
                                </div>
                                @endif
                                </div>

                                <table style="font-size: 18px;" id="visitor_table" class="table table-hover table-bordered table-stripped">
                                <thead style="background-color: #134C80;color: white;">
                                <tr>
                                <th><b>Sr. No.</b></th>
                                <th><b>Permission</b></th>
                                <th><b>Actions</b></th>
                                <!-- <th>Edit</th> -->
                                <!-- <th>Delete</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $index => $permission)
                                <tr id="{{$permission->id}}">
                                <td>{{$index+1}}</td>
                                <td>{{$permission->module}}</td>
                                <td><a href="/permission/{{$permission->id}}/edit/" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <!-- <td><form action="permission/{{$permission->id}}" method="post">
                                <button class="btn btn-danger" type="submit"  /><i class="fa fa-trash-o"></i></button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                </form></td> -->
                                <!-- <td> -->
                                <a type="button" class="btn btn-danger delete_visitor_btn"  data-toggle="modal"  data-target="#myModal"  id="{{$permission->id}}">
                                <span style="color: #fff;"><i class="fa fa-trash" title="Delete Visitor"></i></span>
                                </a>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
    <!-- Datatable init js -->

    <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

          <div class="modal-body">
              
            <div class="thank-you-pop">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this permission?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger visitor_delete_btn" data-dismiss="modal">Delete</button>
      </div>

      </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
    $(".delete_visitor_btn").on("click", function() {
        permission_id = $(this)[0].id
        delete_user_url = '{{url("/permission")}}/'+permission_id
        $("#myModal .visitor_delete_btn").attr("id", permission_id)

        $(".visitor_delete_btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
            url: delete_user_url,
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },   
            method: 'DELETE',
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
                    'The permission deleted <b style="color:green;">successfully</b>!',
                    'success'
                  )
              }
              $("#visitor_table tr#"+permission_id).fadeOut()
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
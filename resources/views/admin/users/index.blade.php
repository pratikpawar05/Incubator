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
                            <h4 class="page-title busines_data"> <i class="fa fa-users"></i>USER LIST</h4>
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

                                <!-- <h4 class="mt-0 header-title">Buttons example</h4> -->

                                <div class="container-fluid" style="padding:3%;">

     <a href="{{ route('users.create') }}" class="btn btn-info">Add Users</a>
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
  @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
 <div class="col-sm-6">
  @if(session()->get('success_update'))
    <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      {{ session()->get('success_update') }}  
    </div>
  @endif
</div>

    <table style="font-size: 18px;" id="visitor_table" class="table table-bordered table-hover table-stripped">
            <thead style="background-color: #134C80;color: white;">
                <th><b>Name</b></th>
                <th><b>Email</b></th>
                <th><b>Role</b></th>
                <th><b>Action</b></th>
                <!-- <th><b>Edit</b></th> -->
                <!-- <th><b>Delete</b></th> -->
            </thead>
                @foreach($users as $user)
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{$user->email}}</td>
                    <!-- <td>{{ $user->role }}</td> -->
                    <td>{{ $user->role }}</td>
                    <td><a href="users/{{$user->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    
                      
              <a type="button" class="btn btn-danger delete_visitor_btn"  data-toggle="modal"  data-target="#myModal"  id="{{$user->id}}">
                <span style="color: #fff;"><i class="fa fa-trash" title="Delete Visitor"></i></span>
              </a>
                    </td>


                </tr>
            </tbody>
                @endforeach
        </table>
</div>

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
              
            <div class="thank-you-pop">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this user?</p>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
$(function() {
    $(".delete_visitor_btn").on("click", function() {
        user_id = $(this)[0].id
        delete_user_url = '{{url("/users")}}/'+user_id
        $("#myModal .visitor_delete_btn").attr("id", user_id)

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
              if(obj.status ="success") {
                swal({
                    title:'The user deleted <b style="color:green;">successfully</b>!',
                    type:'success',
                    
                }).then(e=>{
                window.location.href = "/users"

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
            complete: function() {
              $('#loading_icon').hide();
            }
          })

        })


    })

})
</script>
@include('includes/footer_end')
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
                                                <h4 class="page-title busines_data"> <i class="fa fa-user"></i>Profile</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end page title end breadcrumb -->

                                </div>
                    </div>

                            <div class="wrapper">
                                <div class="container-fluid">

                                    <div style="margin-left: 300px;" class="row">
                                        <div class="col-8">
                                            <div class="card m-b-20 ">
                                     <div class="card">
                                        <div class="card-body">

                                            <h3 class="text-center m-0">
                                                <!-- <a href="{{ URL:: to('index') }}" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="30" alt="logo"></a> -->
                                            </h3>

                                            <div class="p-3">
                                                <!-- <h4 class="text-muted font-18 m-b-5 text-center">Free Register</h4>
                                                <p class="text-muted text-center">Get your free fonik account now.</p> -->
                                                <div class="form-group text-center">
                                                  <div class="avatar">
                                                    <!-- <img src="https://randomuser.me/api/portraits/men/75.jpg"> -->

                                                    <img style=" vertical-align: middle; width: 120px;height: 120px;border-radius: 50%; " src="/image/{{ $profile}}"  height="" width="">

                                                  </div>
                                                </div>

                                                    <div class="form-group text-center">
                                                        <label for="useremail">Email :</label>
                                                       
                                                        <strong>{{$email}}</strong>
                                                    </div>

                                                    <div class="form-group text-center">
                                                        <label for="username">Name :</label>
                                                        <strong>{{$name}}</strong>
                                                    </div>

                                                    <div class="form-group text-center">
                                                        <label for="userpassword">User Role :</label>
                                                       <!--  <input type="text" class="form-control" id="userpassword" placeholder="Enter Role" value="{{$role_select}}"> -->
                                                        <strong>{{$role_select}}</strong>
                                                    </div>
                                                    @if (Auth::user()->isAuthenticated("User Profile", "u")) 
                                                    <div class="form-group row m-t-20 text-center">
                                                        <div class="col-12 ">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">Edit</button>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="col-sm-6 col-md-3 m-t-30">

                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- <h5 class="modal-title mt-0">Center modal</h5> -->
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">

                                            
                                                <form class="form-horizontal m-t-30" id="profile">

                                                     <div class="form-group text-center">
                                                  <div class="avatar">
                                                    <!-- <img src="https://randomuser.me/api/portraits/men/75.jpg"> -->

                                                    <img style=" vertical-align: middle; width: 120px;height: 120px;border-radius: 50%; "  src="/image/{{ $profile}}"  height="" width="">
                                                    
                                                  </div>
                                                </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="useremail">Email</label>
                                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email" value="{{$email}}" name="email">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="username">Name</label>
                                                        <input type="text" class="form-control" id="" placeholder="Enter username" value="{{$name}}" name="name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="userpassword">User Role</label>
                                                        

                                                        <select name="role_id" class="form-control">
                                                        <option>--select--</option>
                                                            @foreach($roles as $a)
                                                        <option value="{{$a->id}}"  {{($a->role == $role_select) ? 'selected' : '' }}>{{$a->role}}</option>
                                                         @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Profile Upload</label>
                                                        <input type="file" class="form-control" id="username" placeholder="Enter username" value="" name="user_logo">
                                                    </div>

                                                    <div class="form-group row m-t-20 text-center">
                                                        <div class="col-12 ">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3 m-t-30">
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                     </div>
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
    <script src="assets/pages/datatables.init.js"></script>

      <script type="text/javascript">
      $(function() {
          
        $("#profile").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/profile_update")}}',
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
                    title:'An Profile Updated <b style="color:green;">successfully</b>!',
                    type:'success',
                    
                }).then(e=>{
                window.location.href = "/profile"

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

              
              // alert('k');
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
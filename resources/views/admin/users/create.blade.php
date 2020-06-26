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
                            <h4 class="page-title busines_data"> <i class="fa fa-users"></i>ADD USER</h4>
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

                              <div style="margin-left: 100px; padding: 0.5%;"  class="card col-lg-offset-0 col-lg-10 col-xs-12">
  <div class="container">
    <!-- <h3>ADD USER</h3> -->
    <span class="busines_data1">ADD USER</span>
  </div>
    <div class="card-body">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>

        @endif

        <form action="{{ route('users.store') }}" class="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group col-sm-6">
                <label for="title" class="">Name:</label>
                <input placeholder="Enter Name" type="text" name="name" id="title" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="title" class="">Email:</label>
                <input type="text" placeholder="Enter Email" name="email" id="title" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="title" class="">password</label>
                <input type="password" placeholder="Enter password" name="password" id="title" class="form-control">
            </div>

             <div class="form-group col-sm-6">
                <label for="title" class="">Role</label>
                <select name="role" class="form-control">
                    <option>--select--</option>
            @foreach($users_role as $role)
                    <option value="{{$role->id}}">{{$role->role}}</option>
            @endforeach
                </select>
            </div>
<!--             <div  class="container col-sm-12">
            <label>permissions</label>
            <table class="table table-bordered table-striped table-hover">
        <tr>
            @foreach ($permissions as $column)
                <th>{{$column->module}}</th>
            @endforeach
        </tr>
            @foreach ($permissions as $column)
                <td id="{{$column->id}}">
                    <div class="row">
                        <div class="col-md-8 ">
                    <label class="checkbox-inline">
                      <input name="{{$column->module}}_create" class="check" type="checkbox" value="{{$column->module}}_C">Create
                    </label>
                        </div>
                        <div class="col-md-8">
                    <label class="checkbox-inline">
                      <input name="{{$column->module}}_read" class="check" type="checkbox" value="{{$column->module}}_R">Read
                    </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                    <label class="checkbox-inline">
                      <input name="{{$column->module}}_update" class="check" type="checkbox" value="{{$column->module}}_U">Update
                    </label>
                        </div>
                        <div class="col-md-8">
                    <label class="checkbox-inline">
                      <input name="{{$column->module}}_delete" class="check" type="checkbox" value="{{$column->module}}_D">Delete
                    </label>
                        </div>
                    </div>
                </td>
            @endforeach
        </tr>
    </table>
</div> -->

          <div class="form-group col-sm-6">
             <input type="submit" class="btn btn-success" value="Submit">
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

@include('includes/footer_end')
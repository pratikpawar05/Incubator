@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
    /* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
  </style>

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
    /* ul {
    padding: 0;
    margin: 0;
    clear: both;
    }

    li{
    list-style-type: none;
    list-style-position: outside;
    padding: 10px;
    float: left;
    }

    input[type="checkbox"]:not(:checked), 
    input[type="checkbox"]:checked {
    position: absolute;
    left: -9999%;
    }

    input[type="checkbox"] + label {
    display: inline-block;
    padding: 10px;
    cursor: pointer;
    border: 1px solid black;
    color: black;
    background-color: white;
    margin-bottom: 10px;
    }

    input[type="checkbox"]:checked + label {
    border: 1px solid white;
    color: white;
    background-color: black;
    } */
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
                            <h4 class="page-title busines_data"> <i class="fa fa-user"></i>ROLE PERMISSIONS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


        <div class="wrapper">

        <div style="display: none;" id="loading_icon" class="loading">Loading&#8230;</div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                             <form>
    {{csrf_field()}}
<div class="container-fluid" style="padding:3%">
    <div class="row pull-right">
       <strong>Role: </strong>&nbsp;
    <select id="role_filter" class="form-group col-sm-10 form-control">
        <option>All</option>
        @foreach ($roles as $row)
        <option value="{{$row->id}}">{{$row->role}}</option>
        @endforeach
        </select>
    </div>
    <div class="row">
        <!-- <h4 class="busines_data"></h4> -->
        <span class="busines_data1">Assign Privileges</span>

    </div>

    <div id="value1" class="row table-responsive">
    <table id="grant_revoke_table" style="font-size: 18px;" class="table table-bordered table-striped table-hover">
        <tr style="background-color: #134C80;color: white;">
            <th><b>Sr. No.</b></th>
            <th><b>Modules</b></th>
            @foreach ($roles as $role)
                <th id="{{$role->id}}"><b>{{$role->role}}</b></th>
            @endforeach
        </tr>
        @foreach ($permissions as $index => $column)
        <tr id="{{$column->id}}">
            <td>{{$index+1}}</td>
            <td>{{$column->module}}</td>
            @foreach ($roles as $row)
                <td id="{{$row->id}}">
                    <div class="row">
                        <div class="col-md-8">
                    <label class="checkbox-inline">
                        <div id="c-{{$row->id}}-{{$column->id}}-c-parent">
                        @if ((isset($role_permissions[$row->id . "-" . $column->id])) && (strpos($role_permissions[$row->id . "-" . $column->id], "c") !== false))
                            <input type="hidden" id="c-{{$row->id}}-{{$column->id}}-c" value="c">
                            </div>
                            <input type="checkbox" value="c" name="c-{{$row->id}}-{{$column->id}}-c" checked>
                            <label for="check_1">Create</label>
                        @else
                            </div>
                            <input type="checkbox" value="c">Create
                        @endif
                    </label>
                        </div>
                        <div class="col-md-8">
                    <label class="checkbox-inline">
                        <div id="r-{{$row->id}}-{{$column->id}}-c-parent">
                        @if ((isset($role_permissions[$row->id . "-" . $column->id])) && (strpos($role_permissions[$row->id . "-" . $column->id], "r") !== false))
                            <input type="hidden" id="r-{{$row->id}}-{{$column->id}}-c" value="r">
                            </div>
                            <input type="checkbox" value="r" name="r-{{$row->id}}-{{$column->id}}-c" checked>Read
                        @else
                            </div>
                            <input type="checkbox" value="r">Read
                        @endif
                    </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                    <label class="checkbox-inline">
                        <div id="u-{{$row->id}}-{{$column->id}}-c-parent">
                        @if ((isset($role_permissions[$row->id . "-" . $column->id])) && (strpos($role_permissions[$row->id . "-" . $column->id], "u") !== false))
                            <input type="hidden" id="u-{{$row->id}}-{{$column->id}}-c" value="u">
                            </div>
                            <input type="checkbox" value="u" name="u-{{$row->id}}-{{$column->id}}-c" checked>Update
                        @else
                          </div>
                          <input type="checkbox" value="u">Update
                        @endif
                    </label>
                        </div>
                        <div class="col-md-8">
                    <label class="checkbox-inline">
                        <div id="d-{{$row->id}}-{{$column->id}}-c-parent">
                        @if ((isset($role_permissions[$row->id . "-" . $column->id])) && (strpos($role_permissions[$row->id . "-" . $column->id], "d") !== false))
                            <input type="hidden" id="d-{{$row->id}}-{{$column->id}}-c" value="d">
                            </div>
                            <input type="checkbox" value="d" name="d-{{$row->id}}-{{$column->id}}-c" checked>Delete
                        @else
                          </div>
                          <input type="checkbox" value="d">Delete
                        @endif
                    </label>
                        </div>

                        <div class="col-md-8">
                    <label class="checkbox-inline">
                        <div id="v-{{$row->id}}-{{$column->id}}-c-parent">
                        @if ((isset($role_permissions[$row->id . "-" . $column->id])) && (strpos($role_permissions[$row->id . "-" . $column->id], "v") !== false))
                            <input type="hidden" id="v-{{$row->id}}-{{$column->id}}-c" value="v">
                            </div>
                            <input type="checkbox" value="v" name="v-{{$row->id}}-{{$column->id}}-c" checked>View
                        @else
                          </div>
                          <input type="checkbox" value="v">View
                        @endif
                    </label>
                        </div>
                    </div>
                </td>
            @endforeach
        </tr>
        @endforeach
    </table>
    <input type="submit" class="btn btn-success">       
    </div>
</div>
</form>

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

    <script>
     $("input[type='checkbox']").on('click', function() {
        var role_id = $(this).parent().parent().parent().parent().attr("id")
        var module_id = $(this).parent().parent().parent().parent().parent().attr("id")
        if ($(this).is(":checked")) {
            $(this).attr('name', $(this).val()+"-"+role_id+"-"+module_id+"-c")
            let id = $(this).attr("name");
            $("#"+id+"-parent").html('<input type="hidden" id="' + id + '">');
        }
        else {
            let id = $(this).attr("name");
            $("#"+id).attr('name', $(this).val()+"-"+role_id+"-"+module_id+"-d");
        }
    })
</script>


<script type="text/javascript">
    $("form").on("submit", function(e) {
      e.preventDefault()
      $.ajax({
        url: "/role-permission-store/",
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'POST',
        type: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
         beforeSend: function() {
            $('#loading_icon').show();
            },
        success: function(obj) {
            console.log(obj)
            if (obj.status == "Success") {
                swal(
                  'Success',
                  'Permission Grant/Revoke done successfully!',
                  'success'
                )
            }
            else if (obj.status == "Data Empty"){
                swal(
                  'Warning',
                  'Please select any one permission!',
                  'warning'
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

            
          console.log(obj)
          // alert("error is there")
            swal(
              'Error',
              'Something went wrong!',
              'error'
            )               


        },
        complete: function() {
          $('#loading_icon').hide();
        }
      })
    })

</script>


<script type="text/javascript">
  jQuery(document).ready(function($) {
    $("#role_filter").on('change', function() {
        var role_id = $(this).val();
        var col = $("#grant_revoke_table tr #" + role_id).parent().children().index($("#grant_revoke_table tr #" + role_id));
        $("#grant_revoke_table tr").each(function() {
            $(this).children().show();
            if (col != -1)
                $(this).children().not($(this).children().eq(col)).not($(this).children().eq(0)).not($(this).children().eq(1)).hide();
        })
    });
});
</script>
@include('includes/footer_end')
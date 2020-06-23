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
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i> All COMAPNY LIST</h4>
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

                                <!-- <h4 class="mt-0 header-title">Buttons example</h4> -->

                                 <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered member_table" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;">
                                    <tr>
                                    <th><b>SR. No.</b></th>
                                    <th><b>BRAND NAME</b></th>
                                    <th><b>REGISTERED COMPAPNY NAME</b></th>
                                    <th><b>AGREEMENT</b></th>
                                    <th><b>START DATE</b></th>
                                    <th><b>END DATE</b></th>
                                    <th><b>STATUS</b></th>
                                    <th><b>ACTION</b></th>
                                    <th><B>EMPLOYEE LIST</b></th>
                                    </tr>
                                    </thead>

                                   
                                    <tbody id="myTable">
                                     @if(isset($memberdata))
                                     @foreach($memberdata as $key => $member_details)
                                    <tr id="{{$member_details->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$member_details->brand_name}}</td>
                                    <td>{{$member_details->company_registered_name}}</td>
                                    <td>{{$member_details->tenure}}</td>
                                    <!-- <td>{{$member_details->Lock_in}}</td> -->
                                    <td>{{$member_details->start_date}}</td>
                                    <td>{{$member_details->end_date}}</td>
                                    <!-- <td> -->
              <!-- <select name="visitor" class="select_visitor form-control" id="{{ $member_details->id }}">
                <option selected>{{$member_details->status}}</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select> -->
  
           <!-- <ul>
              <li class="tg-list-item">
                <h4>
                  <input class="companyStatusChange"  data-id="{{$member_details->id}}" id="cb5" class="tgl tgl-flip" type="checkbox" name="" {{ $member_details->status ? 'checked' : '' }}>

                  <label class="tgl-btn" data-tg-off="Inactive" data-tg-on = "Active" for="cb5"></label>
                </h4>
              </li>
            </ul>

            </td> -->
            @if($member_details->status == 1)
            <td>Active</td>
            @else
            <td>Inactive</td>
            @endif


            <td>
              <!-- <a href="{{url('/delete_member_list')}}/{{$member_details->id}}">
                <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </a> -->

              @if (Auth::user()->isAuthenticated("Company", "d"))
              <a type="button" href="" class="btn btn-danger delete_member_btn" data-toggle="modal" data-target="#myModal" id="{{$member_details->id}}">
                <span style="color: #fff;"><i class="fa fa-trash" title="Delete Visitor"></i></span>
              </a>
              @endif
              @if(Auth::user()->isAuthenticated("Company","u"))
              <a href="{{url('/edit_member_list')}}/{{$member_details->id}}">
                <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
              </a>
              @endif

              @if(Auth::user()->isAuthenticated("Company","v"))
              <a href="{{url('/member_show/')}}/{{$member_details->id}}">
                <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
              </a>
              @endif
            </td>
            <td>
              @if(Auth::user()->isAuthenticated("Member","v"))
              <a href="{{url('/employee_list')}}/{{$member_details->id}}">
                <button type="button" class="btn btn-success"><i class="fa fa-users"></i></button>
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

        <script type="text/javascript">
  $(function() {
    $('.companyStatusChange').change(function() {
      // alert('ok')
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
      
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{url('company_Status_change')}}',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              // alert('su')
              console.log(data.success)
            }
        });

    })
  })
</script>

  <!-- ====Delete Visitor required modal ends========== -->

  <script type="text/javascript">
    $(function() {
      $(".delete_member_btn").on("click", function() {
        member_id = $(this)[0].id
        // alert(member_id)
        delete_visitor_url = '{{url("/delete_member_list")}}/' + member_id
        $("#myModal .member_delete_btn").attr("id", member_id)
        $(".member_delete_btn").on("click", function(e) {
          e.preventDefault();
          $.ajax({
            url: delete_visitor_url,
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
              $(".alert-danger").remove();
              if (obj.status = "success") {
                swal(
                  'Success',
                  'The Member deleted <b style="color:green;">successfully</b>!',
                  'success'
                )
              }
              $(".member_table tr#" + member_id).fadeOut()
              window.location.href = "/companyDetails";
            },
            error: function(obj) {
              if (obj.status == 401) {
                swal(
                  'Warning',
                  'You are not Authorized!',
                  'warning'
                );
              }
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

        })


      })

    })
  </script>

  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
@include('includes/footer_end')
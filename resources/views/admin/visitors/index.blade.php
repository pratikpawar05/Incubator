<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />

@include('includes/header_start')

<!-- Put extra Css here -->
    <style>
        .dashboard_card {
            border: 2px solid #2E8BDC !important;
        }
        .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    </style>
    <style type="text/css">
        .width_change{
            display: inline-block;
            height: 100px;
            border-radius: 5px;
            margin: 1rem;
            position: relative;
            width: 224px;
        }
        .company_page .container-fluid {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        .dataTables_filter{
            float: right;
        }
        .dataTables_filter label {
            margin-top: -15px;
        }
    </style>
<link rel="stylesheet" href="/assets/plugins/morris/morris.css">
   
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>
                            VISITOR LIST</h4>
                        </div>
                    </div>
                </div>

        </div>
    </div>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body company_page">

                       <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                          <thead style="background-color: #134C80;color: white;">
                                <tr>
                                    <th><b>SR.NO</b></th>
                                    <th><b>DATE</b></th>
                                    <th><b>NAME</b></th>
                                    <th><b>COMPANY NAME</b></th>
                                    <th><b>PURPOSE</b></th>
                                    <th><b>CONCTACT PERSON</b></th>
                                    <th><b>ACTION</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if(isset($visitors))
                                      @foreach($visitors as $key => $visitor_details)
                                      <tr id="{{ $visitor_details->id }}">
                                      <td>{{$key+1 }}</td>
                                      <td>{{$visitor_details->visit_date}}</td>
                                      <td>{{$visitor_details->first_name}}</td>
                                      <td>{{$visitor_details->name_of_company}}</td>
                                      <td>{{$visitor_details->visit_purpose}}</td>
                                      <td>{{$visitor_details->person_to_meet}}</td>
                                    <td>

                                  <a type="button" class="btn btn-danger delete_visitor_btn "  data-toggle="modal"  data-target="#myModal"  id="{{$visitor_details->id}}">
                                      <span style="color: #fff;"><i class="fa fa-trash" title="Delete Sales"></i></span>
                                  </a>

                                    <a href="{{url('/edit_visitor')}}/{{$visitor_details->id}}">
                                      <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                    </a>

                                       <a href="{{url('/show_visitor_detail')}}/{{$visitor_details->id}}">
                                        <button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>
                                        </a>

                                    </td>
                                    </tr>
                                    @endforeach
                                     @endif
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

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Required datatable js -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables/jszip.min.js"></script>
    <script src="/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="/assets/pages/datatables.init.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
$(function() {
    $(".delete_visitor_btn").on("click", function() {
        visitor_id = $(this)[0].id
        delete_visitor_url = '{{url("/Delete_visitor")}}/'+visitor_id
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
              if(obj.status ="success") {
                swal({
                          title:'An Visitor Deleted <b style="color:green;">successfully</b>!',
                          type:'success',

                          }).then(e=>{
                          window.location.href = "/admin/visitors"

                          }).catch(err=>{

                          });
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

     <script type="text/javascript">
      $(function() {
          
        $("#table_show").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/fetch_data")}}',
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },   
            method: 'POST',
            type: 'JSON',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            // beforeSend: function() {
            //   $('#loading_icon').show();loading_icon
            // },
            success: function(data) {
              console.log(data)
              $(".alert-danger").remove();

              // if(obj.status ="success") {
              //   swal(
              //       'Success',
              //       'The Visitor added <b style="color:green;">successfully</b>!',
              //       'success'
              //     )
              // }

              // if(obj.status ="Visitor already exists!") {
              //   swal(
              //       'Warning',
              //       'The Visitor already exists!',
              //       'warning'
              //     )
              // }
              // window.location.href = "/admin";
              // $.each(obj.responseJSON.errors, function(key, val) {
              //   $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
              // });
            },
            error: function(obj) {
              console.log(obj)
              $(".alert-danger").remove();
              console.log(obj.responseJSON.errors)
              $.each(obj.responseJSON.errors, function(key, val) {
                $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
              });
            },
            // complete: function() {
            //   $('#loading_icon').hide();
            // }
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
@include('includes/footer_end')
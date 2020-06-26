@include('includes/header_start')
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
 
    <style type="text/css">

  .font{
    font-family: 'Alice', serif;
  }
  .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
  label{
    font-size: 18px;
    font-family: 'Alice', serif;

/*font-family: 'Merienda', cursive;*/

  }
  
  .box{
    background-image: linear-gradient(to bottom right, #134474, #4f9cb9eb);  
    color: #ffffff; 
    padding: 2%; 
    border-radius: 5px; 
    width: 140%;

  }

  .butn {
  background-color: #2663d8e8;
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 25px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
  font-family: 'Alice', serif;

}

.butn:hover{
  background-color: #062663;

}

  input:focus{
    border: 2px solid black;
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
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>EDIT VISITOR</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div>
        </div>


    <div style="margin-left:95px" class="wrapper">
            <div class="container-fluid" style="padding: 2%">
                 <div class="errors">
                 </div>
                  <div class="row">
    <div style="background-color: #134779;
    color: #fff;
    padding: 3%;
    border-radius: 5px;" class="col-xs-12 col-lg-10 col-sm-8 col-md-8">
      <form id="edit_visitor_save">
        <div class="row">
          <div class=" col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="first_name" class="form-control"  value="{{$data->first_name}}" placeholder=" Enter First Name">
            </div>
          </div>
          
          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Company Name (From)</label>
              <input type="text" name="company_from" class="form-control"  value="{{$data->company_from}}" placeholder="Enter Last Name">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Contact</label>
              <input type="text" name="mobile" class="form-control"  value="{{$data->mobile}}" placeholder="Enter Mobile Number">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label  for="Gender" class="select">Gender</label>
              <select name="Gender" class="form-control">
                  <option>Male</option>
                  <option>Female</option> 
                </select>
            </div>
          </div>
          <div class="col-lg-offset-0 col-lg-6 col-xs-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Location</label>
              <input type="text" name="location" class="form-control"  value="{{$data->location}}" placeholder="Eg . Mumbai">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Purpose for visit</label>
              <input type="text" name="visit_purpose" class="form-control"  value="{{$data->visit_purpose}}" placeholder="Eg. Client visit">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="Gender" class="select">Types of visitors</label>
              <select id="visitor_type"  name="visitors_type" class="form-control">
                  <option>--select--</option>
                  <option value="{{ $data->visitors_type }}" selected>{{ $data->visitors_type }}</option>
                  <option value="customer">Customer</option>
                  <option value="vendor">Vendor</option>
                  <option value="candidate">Candidate</option>
                  <option value="member visitor">Member Visitor</option>
                </select>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12" id="visitor_type_field">
            <div class="form-group">
              <label for="Gender" class="select"> Description:</label>
              <textarea type="text" class="form-control" name="description_visitor_type" value="{{ $data->description_visitor_type }}" placeholder="Describe your Visitor type...">{{ $data->description_visitor_type }}</textarea>
            </div>
          </div>          


          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Whom to meet</label>
              <input value="{{$data->person_to_meet}}" name="person_to_meet" type="text" class="form-control"  placeholder="Eg:Rahul Rathod">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Company Name (Meeting with)</label>
              <input value="{{$data->name_of_company}}" name="name_of_company" type="text" class="form-control"  value="{{ $data->name_of_company }}" placeholder="Eg:Rahul Rathod">
            </div>
          </div>



           <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Date</label>
              <input value="{{$data->visit_date}}" type="text" name="visit_date" data-provide ="datepicker" type="email" class="form-control"  placeholder="Enter visit date">
            </div>
          </div>

           <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">In Time</label>
              <input value="{{$data->in_time}}" type="time" name="in_time" type="email" class="form-control timepicker"  placeholder="In Time">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Out Time</label>
              <input value="{{$data->out_time}}" type="time" name="out_time" type="email" class="form-control timepicker"  placeholder="Out Time">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Id Card Number</label>
              <input value="{{$data->id_card_number}}" type="text" name="id_card_number" type="email" class="form-control"  placeholder="Enter Id Card Number">
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">E-Mail</label>
              <input type="email" name="email" type="email" class="form-control"  value="{{$data->email}}" placeholder="Rahul.r@biznest.co.in">
            </div>
          </div>

         <div>
    <button type="submit" class="btn btn-success">submit</button>
  </div>
    </div>
  </form>
 </div>
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

    <script type="text/javascript" src="{{ url('/assets/js/jquery.datepicker2.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('/assets/js/timepicki.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

<!-- <script type="text/javascript">
  $(function() {
    $(".timepicker").timepicki();
  })
</script> -->
     <script type="text/javascript">
            $(function() {
                
                $("#edit_visitor_save").on("submit", function(e) {
                    e.preventDefault()
                     $.ajax({
                        url: '{{url("/edit_visitor_save")}}/{{$data->id}}',
                        headers:{
                           'X-CSRF-TOKEN': "{{ csrf_token() }}"
                         },   
                        method: 'POST',
                        type: 'JSON',
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function() {
                          $('#loading_icon').show();
                        },
                        success: function(obj) {
                          // alert('df')
                          if(obj.status == "success") {
                          swal({
                          title:'An Visitor Updated <b style="color:green;">successfully</b>!',
                          type:'success',

                          }).then(e=>{
                          window.location.href = "/admin/visitors"

                          }).catch(err=>{

                          });  

                          }
                        },
                        error: function(obj) {
                          // alert('dd')
                        if (obj.status == 401) {
                          swal(
                            'Warning',
                            'You are not Authorized!',
                            'warning'
                          );
                        }                          
                          $(document).on('click', '#success', function(e) {
                          swal(
                            'Error!',
                            'The visitors details  <b style="color:red;">Inceorrect</b>!',
                            'error'
                          )
                        });
                          console.log(obj)
                          $(".alert-danger").remove();
                          console.log(obj.responseJSON.errors)
                          $.each(obj.responseJSON.errors, function(key, val) {
                            $('.errors').append("<li class='text-danger'>"+val+"</li>")
                          });
                        },
                        complete: function() {
                          $('#loading_icon').hide();
                        }
                      }) 
                })       
        })
        </script>

<script type="text/javascript">
  $( "#progress-button" ).click(function() {
  $("#progress-menu").toggleClass('hidden-xs');
 });
</script>

@include('includes/footer_end')
@include('includes/header_start')

<link rel="stylesheet" href="/assets/plugins/morris/morris.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css">
<script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js"></script>
    <link href="https://cdn.syncfusion.com/ej2/material.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>    
    <style type="text/css">
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

        .card-color {
            background-color: #eaf5ff;
        }
        
        #imagePreview{
          display:none;border:1px solid #333;
          padding:5px;
          margin:10px;
          max-width:200px;
        }
    </style>
   
@include('includes/header_end')
<div id="loading_icon" style="display: none;"></div>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title busines_data"> <i class="dripicons-meter"></i>EDIT EMPLOYEE </h4>
                <div class="container-fluid" style="padding: 3%;">
              <div id="loading_icon" style="display: none;">
              </div>
                  <a href="/fonik_employee_list/{{$Employee_details->member_id}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="wrapper">
<div class="container-fluid">

<form id="employeeDetail">  
        <div class="row">
          <div class="col-sm-8">
          <div class="errors">
          </div>

            <!-- Profile Image -->
<!--             <div class="card card-color card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">rahul rathod</h3>

                <p class="text-muted text-center">utyrgfhgjh</p>

              </div>
            </div> -->

            <div class="card card-color card-outline">
              <div class="card-body box-profile">
            <div class="card card-color">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
              <div class="card-body">
                <strong><i class="fa fa-user"></i>&nbsp;Customer Name</strong>

                <input class="form-control form-control" type="text" placeholder="Enter Customer Name" value="{{$Employee_details->customer_Name}}" name="customer_Name" aria-label="Search">

                <hr>
                <strong><i class="fa fa-building"></i> Company Name</strong>

                  <!-- <input class="form-control form-control" type="text" placeholder="Enter Company Name" aria-label="Search"> -->

                   <input type="text" name="company_name" value="{{$Employee_details->company_Name}}" class="form-control form-control" placeholder="Enter company visitor belongs...">

                <hr>

                 <strong><i class="fa fa-id-badge"></i>&nbsp;Customer Image</strong>
                  <!-- <img id="imagePreview" src="#" alt="your image" /> -->

                  <img style="max-width: 200px; max-height: 100px; margin-top: 10px; margin-bottom: 30px;" src="/image/{{ $Employee_details->user_logo }}" height="" width="">
                  
                 
                 <input value="{{ $Employee_details->user_logo }}" name="user_logo" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">

                <hr>

                <strong><i class="fa fa-user-circle"></i>&nbsp;Designation</strong>

                 <input value="{{$Employee_details->designation}}" name="designation" class="form-control form-control" type="text" placeholder="Enter Designation" aria-label="Search">

                <hr>

                <strong><i class="fa fa-envelope"></i>&nbsp;Email Id</strong>

                <input value="{{$Employee_details->email}}" class="form-control form-control" name="email" type="text" placeholder="Enter Email Id" aria-label="Search">

                <hr>
                <strong><i class="fa fa-male"></i>&nbsp;Gender</strong>


                 <select name="gender" class="form-control form-control">

                  @if($employe_gender  == "Male")
                   <option>{{$Employee_details->gender}}</option>
                   <option>Female</option>
                   @else

                   <option>{{$Employee_details->gender}}</option>
                   <option>Male</option>
                  @endif 
                 </select>


                <hr>
                <strong><i class="fa fa-id-card-alt"></i> Contact</strong>

                <input value="{{$Employee_details->contact}}" name="contact" class="form-control form-control" type="text" placeholder="Enter Contact Number" aria-label="Search">

                <hr>
                <strong><i class="fa fa-address-card"></i> Address</strong>

                 <!-- <input name="address" class="form-control form-control" type="text" placeholder="Enter Full Address" aria-label="Search"> -->
                 <textarea name="address" class="form-control form-control">{{$Employee_details->address}}</textarea>

                <hr>
                <strong><i class="far fa-calendar-alt"></i> Date Of Birth</strong>

                <input  value="{{$Employee_details->DOB}}" name="DOB" class="form-control form-control" type="text" placeholder="Enter Customer Name" aria-label="Search">
                <hr>

                <strong><i class="far fa-calendar-alt"></i> Date of joining</strong>

                 <input value="{{$Employee_details->date_of_Joining}}" id="datepicker1" name="date_of_joining" class="form-control form-control" type="text" placeholder="Enter Customer Name" aria-label="Search">

                  </div>
        </div>

          <div class="card card-color ">
             <div class="card card-color">
          <div class="card-header">
                <h3 class="card-title">All Types of card Information</h3>
          </div>
              <div class="card-body box-profile">


                <strong><i class="fa fa-id-card"></i> Aadhar Card</strong>

              <input value="{{$Employee_details->aadhar_Card}}" name="aadhar_Card" class="form-control form-control" type="text" placeholder="Enter Aadhar Card Number" aria-label="Search">

                <hr>
                <strong><i class="fa fa-id-card-alt"></i> Pan Card</strong>

                <input value="{{$Employee_details->pan_card}}" name="pan_Card" class="form-control form-control" type="text" placeholder="Enter Pan Card Number" aria-label="Search">

                <hr>
            <strong><i class="fa fa-address-book"></i>&nbsp;Access Card Number</strong>

                <input value="{{$Employee_details->access_card}}" name="access_card" class="form-control form-control" type="text" placeholder="Enter Access Card Number" aria-label="Search">

                <hr>
                 <strong><i class="fa fa-id-card"></i>&nbsp;Card Number</strong>

               <input value="{{$Employee_details->card_no}}" name="card_no" class="form-control form-control" type="text" placeholder="Enter  Card Number" aria-label="Search">
                <hr>
                <strong><i class="fa fa-address-card"></i>&nbsp;Cabin/Desk Alloted</strong>

               <input value="{{$Employee_details->cabin_access}}" name="cabin_access" class="form-control form-control" type="text" placeholder="Enter  Cabin Access" aria-label="Search">
                <hr>
                <strong><i class="fa fa-address-card"></i>Card Type</strong>

               <input value="{{$Employee_details->Card_Types}}" name="card_type" class="form-control form-control" type="text" placeholder="Enter  Card Type" aria-label="Search">
                <hr>
                <strong><i class="fa fa-address-card"></i>Satus</strong>
            <select class="form-control m-bot15" name="status">

              @if($Employee_details->status == 1)
              <option value="1">Active</option>
              <option value="0">Inactive</option>
              @else
              <option value="0">Inactive</option>
              <option value="1">Active</option>
              @endif

                <!--  @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $employee_status == $role->id ? 'selected="selected"' : '' }}>{{ $role->status }}</option>    
                @endforeach -->
              </select>


                <hr>

                <strong><i class="fa fa-address-card"></i>Marital Status</strong>

                 <select name="marital_status" class="form-control form-control">
                  @if($employee_marital_status == "signle")
                   <option value="{{$Employee_details->marital_status}}">{{$Employee_details->marital_status}}</option>
                   <option value="married">married</option>
                   <option value="Unmarried">Unmarried</option>

                   @elseif($employee_marital_status == "married")
                   <option value="{{$Employee_details->marital_status}}">{{$Employee_details->marital_status}}</option>
                   <option value="signle">signle</option>
                   <option value="Unmarried">Unmarried</option>
                   @else
                    <option value="{{$Employee_details->marital_status}}">{{$Employee_details->marital_status}}</option>
                   <option value="married">married</option>
                    <option value="signle">signle</option>
                   @endif
                 </select>

                 <hr>

                <strong><i class="fa fa-id-badge"></i>&nbsp;Customer Address Proof Image(Aadhar Card,Voting Card , Driving Licence)</strong>
                  <!-- <img id="imagePreview" src="#" alt="your image" /> -->


                 <img width="20%;" class=" " src="/AddressProof/{{ $Employee_details->address_proof }}" height="" width="">

                 <input name="address_proof" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">
                <hr>

                 <strong><i class="fa fa-id-badge"></i>&nbsp;Customer ID Proof Image(Aadhar Card,Voting Card , Pan card,Driving Licence)</strong>
                  <!-- <img id="imagePreview" src="#" alt="your image" /> -->

                 <img width="20%;" class=" " src="/IdProof/{{ $Employee_details->id_proof }}" height="" width=""> 
                 <br>
                 <input name="id_proof" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">
                 <center>
                <button id="success" class="btn btn-success" style="margin-top: 10px;">Submit</button>
                  </center>
            </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</form>
</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>


  <script type="text/javascript">
      $(function() {
          
        $("#employeeDetail").on("submit", function(e) {
            e.preventDefault()
            //console.log(new FormData(this));
          $.ajax({
            url: '/editEmployeeSave/{{$Employee_details->id}}',
            // url: '#',
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },   
            type: 'POST',
            data:  new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
              $('#loading_icon').show();
            },
            success: function(obj) {
              //console.log(obj)
              //console.log(obj.status)
              $(".alert-danger").remove();
              if(obj.status ="success") {
                swal({
                          title:'An Employee Updated <b style="color:green;">successfully</b>!',
                          type:'success',

                          }).then(e=>{
                          window.location.href = "/fonik_active_employee_list/{{$Employee_details->member_id}}"

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
</script>

<script type="text/javascript">
  $(function() {
    $('#visit_datepicker').datepicker({
        format: 'mm/dd/yyyy'
    })
  })
</script>
<script>
        var datepicker = new ej.calendars.DatePicker({  });
        datepicker.appendTo('#datepicker');
</script>

<script>
        var datepicker = new ej.calendars.DatePicker({  });
        datepicker.appendTo('#datepicker2');
</script>

<script type="text/javascript">
  function getImagePreview(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          if(e.target.result!==''){
            $('#imagePreview').attr('src', e.target.result);
            $('#imagePreview').show();
          }
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$("#imageInput").on('change',function(){
    getImagePreview(this);
});
</script>

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


<script src="/assets/plugins/morris/morris.min.js"></script>
<script src="/assets/plugins/raphael/raphael-min.js"></script>


@include('includes/footer_end')
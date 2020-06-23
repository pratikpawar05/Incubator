@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- Dropzone css -->
    <link href="assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
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
                            <h4 class="page-title busines_data"> <i class="dripicons-box"></i> ADD MEMBER</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


        <div style="" class="wrapper">
            <div class="container-fluid">
<!-- 
                <div class="row">
                    <div class="col-12"> -->
                       <!--  <div class="card m-b-20">
                            <div class="card-body"> -->

                                <form id="employeeDetail" enctype="multipart/form-data">
  
                                          <div class="container-fluid">
                                            <div  class="row">
                                              <div class="col-sm-8">

                                       <div class="errors">
                                          </div>

                                            <div style="background-color: white;" class="card card-outline">
                                                  <div class="card-body box-profile">
                                                <div class="card ">
                                                  <div class="card-header">
                                                    <h3 class="card-title">Personal Information</h3>
                                                  </div>
                                                  <div class="card-body">
                                                    <strong><i class="fa fa-user"></i>&nbsp;Customer Name</strong>

                                                    <input class="form-control form-control" type="text" placeholder="Enter Customer Name" name="customer_Name" aria-label="Search">

                                                    <hr>
                                                    <strong><i class="fa fa-building"></i> Company Name</strong>

                                                      <!-- <input class="form-control form-control" type="text" placeholder="Enter Company Name" aria-label="Search"> -->


                                                   <select class="form-control form-control" name="member_id">
                                                      <option>--select--</option>
                                                      @foreach($member_data as $d)
                                                        <option value="{{$d->id }}">{{ $d->company_registered_name }}</option>                  
                                                      @endforeach
                                                    </select>



                                                    <hr>

                                                     <strong><i class="fa fa-id-badge"></i>&nbsp;Customer Image</strong>
                                                      <!-- <img id="imagePreview" src="#" alt="your image" /> -->
                                                     <input name="user_logo" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">

                                                    <hr>



                                                    <strong><i class="fa fa-user-circle"></i>&nbsp;Designation</strong>

                                                     <input name="designation" class="form-control form-control" type="text" placeholder="Enter Designation" aria-label="Search">

                                                    <hr>

                                                    <strong><i class="fa fa-envelope"></i>&nbsp;Email Id</strong>

                                                    <input class="form-control form-control" name="email" type="text" placeholder="Enter Email Id" aria-label="Search">

                                                    <hr>
                                                    <strong><i class="fa fa-male"></i>&nbsp;Gender</strong>


                                                     <select name="gender" class="form-control form-control">
                                                       <option>--select</option>
                                                       <option>Male</option>
                                                       <option>Female</option>
                                                     </select>


                                                    <hr>
                                                    <strong><i class="fa fa-id-card-alt"></i> Contact</strong>

                                                    <input name="contact" class="form-control form-control" type="text" placeholder="Enter Contact Number" aria-label="Search">

                                                    <hr>
                                                    <strong><i class="fa fa-address-card"></i> Address</strong>

                                                     <input name="address" class="form-control form-control" type="text" placeholder="Enter Full Address" aria-label="Search">

                                                    <hr>
                                                    <strong><i class="fa fa-calendar-alt"></i> Date Of Bitrh</strong>

                                                    <input id="datepicker" name="DOB" class="form-control form-control" type="text" placeholder="Enter Customer Name" aria-label="Search">
                                                    <hr>

                                                    <strong><i class="fa fa-calendar-alt"></i> Date Of Joining</strong>

                                                     <input id="datepicker1" name="date_of_joining" class="form-control form-control" type="text" placeholder="Enter Customer Name" aria-label="Search">

                                                      </div>
                                            </div>

                                              <div class="card ">
                                                 <div class="card">
                                              <div class="card-header">
                                                    <h3 class="card-title">All Types of card Information</h3>
                                              </div>
                                                  <div class="card-body box-profile">


                                                    <strong><i class="fa fa-id-card"></i> Aadhar Card</strong>

                                                  <input name="aadhar_Card" class="form-control form-control" type="text" placeholder="Enter Aadhar Card Number" aria-label="Search">

                                                    <hr>
                                                    <strong><i class="fa fa-id-card-alt"></i> Pan Card</strong>

                                                    <input name="pan_Card" class="form-control form-control" type="text" placeholder="Enter Pan Card Number" aria-label="Search">

                                                    <hr>
                                                <strong><i class="fa fa-address-book"></i>&nbsp;Access Card Number</strong>

                                                    <input name="access_card" class="form-control form-control" type="text" placeholder="Enter Access Card Number" aria-label="Search">

                                                    <hr>
                                                     <strong><i class="fa fa-id-card"></i>&nbsp;Card Number</strong>

                                                   <input name="card_no" class="form-control form-control" type="text" placeholder="Enter  Card Number" aria-label="Search">
                                                    <hr>
                                                    <strong><i class="fa fa-address-card"></i>&nbsp;Cabin/Desk Alloted</strong>

                                                   <input name="cabin_access" class="form-control form-control" type="text" placeholder="Enter  Cabin Access" aria-label="Search">
                                                    <hr>
                                                    <strong><i class="fa fa-address-card"></i>Card Type</strong>

                                                   <input name="card_type" class="form-control form-control" type="text" placeholder="Enter  Card Type" aria-label="Search">
                                                    <hr>
                                                    <strong><i class="fa fa-address-card"></i>Satus</strong>
                                                    <!-- <input class="form-control form-control" type="text" placeholder="Enter  Status" aria-label="Search"> -->
                                                     <select name="status" class="form-control form-control">
                                                       <option>--select</option>
                                                       <option value="1">Active</option>
                                                       <option value="0">Inactive</option>
                                                     </select>
                                                     <hr>


                                                     <strong><i class="fa fa-address-card"></i>Marital Status</strong>
                                                    <!-- <input class="form-control form-control" type="text" placeholder="Enter  Status" aria-label="Search"> -->
                                                     <select name="marital_status" class="form-control form-control">
                                                       <option>--select</option>
                                                       <option value="signle">signle</option>
                                                       <option value="married">married</option>
                                                       <option value="Unmarried">Unmarried</option>
                                                     </select>
                                                     <hr>

                                                       <strong><i class="fa fa-id-badge"></i>&nbsp;Customer Address Proof Image(Aadhar Card,Voting Card , Driving Licence)</strong>
                                                      <!-- <img id="imagePreview" src="#" alt="your image" /> -->
                                                     <input name="address_proof" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">
                                                    <hr>

                                                     <strong><i class="fa fa-id-badge"></i>&nbsp;Customer ID Proof Image(Aadhar Card,Voting Card , Pan card,Driving Licence)</strong>
                                                      <!-- <img id="imagePreview" src="#" alt="your image" /> -->
                                                     <input name="id_proof" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">

                                                     <div style="margin: 10px;">
                                                    <button id="success"  class="btn btn-success">Submit</button>
                                                     </div>
                                                     
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                    </form>

                            <!-- </div>
                        </div> -->
                    <!-- </div> end col -->
                <!-- </div> end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Dropzone js -->
    <script src="assets/plugins/dropzone/dist/dropzone.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

  <script type="text/javascript">
    $(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

  </script>

    <script type="text/javascript">
    $(function () {
  $("#datepicker1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

  </script>

     <script type="text/javascript">
      $(function() {
          
        $("#employeeDetail").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/employeSave")}}',
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
              $(".alert-danger").remove();
              if(obj.status ="success") {
                swal({
                          title:'An Employee Added <b style="color:green;">successfully</b>!',
                          type:'success',

                          }).then(e=>{
                          window.location.href = "/employeList"

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
          }) 
      })       
  })
</script>

@include('includes/footer_end')
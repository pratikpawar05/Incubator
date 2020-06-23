@include('includes/header_start')

<!-- Put extra Css here -->
<link rel="stylesheet" href="/assets/plugins/morris/morris.css">
    <style type="text/css">
        .width_change{
            display: inline-block;
            height: 100px;
            border-radius: 5px;
            margin: 1rem;
            position: relative;
            width: 224px;
        }
        .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }

        .card-color {
            background-color: #eaf5ff;
        }
    </style>
   
@include('includes/header_end')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title busines_data"> <i class="dripicons-meter"></i>EMPLOYEE DETAILS</h4>
            <div class="container-fluid" style="padding: 3%;">
              <div id="loading_icon" style="display: none;">
              </div>
                  <a href="/fonik_employee_list/{{$Employee_details->member_id}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                   <a href="{{url('editEmployee')}}/{{$Employee_details->id}}" class="btn btn-success"><i class="fa fa-user"></i>&nbsp;Edit Profile</a>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="wrapper">
<div class="container">
<div class="card-body">
<section class="content align-middle">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">

            <!-- Profile Image -->
            <div class="card card-color card-outline">
              <div class="card-body box-profile">
                <div class="col-sm-5">
                  <!-- <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture"> -->

                        <img width="100%;" class=" " name="user_logo"  src="/image/{{ $Employee_details->user_logo }}" height="" width=""> 
                       

                <!-- </div> -->
                <!-- <div class="col-sm-4"> -->
                    

                <h3 class="profile-username text-center">{{$Employee_details->customer_Name}}</h3>
                <b><p class="text-muted text-center">{{$Employee_details->designation}}</p></b>

                </div>


              </div>
            </div>

            <div class="card card-color card-outline">
              <div class="card-body box-profile">
            <div class="card card-color">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
              <div class="card-body">
                <strong><i class="fa fa-building"></i> Company Name</strong>

                <p class="text-muted">
                    {{$Employee_details->company_Name}}
                    </p>

                <hr>
                <strong><i class="fa fa-envelope"></i>&nbsp;Email Id</strong>

                <p class="text-muted">
                  {{$Employee_details->email}}
                </p>

                <hr>
                <strong><i class="fa fa-book mr-1"></i> Gender</strong>

                <p class="text-muted">
                 {{$Employee_details->gender}}
                </p>


                <hr>
                <strong><i class="fa fa-id-card-alt"></i> Contact</strong>

                <p class="text-muted">
                    {{$Employee_details->contact}}
                </p>

                <hr>
                <strong><i class="fa fa-address-card"></i> Address</strong>

                <p class="text-muted">
                    {{$Employee_details->address}}
                </p>

                <hr>
                <strong><i class="far fa-calendar-alt"></i> Date Of Bith</strong>

                <p class="text-muted">
                  {{$Employee_details->DOB}}
                </p>
                <hr>

                <strong><i class="far fa-calendar-alt"></i> Date Of Joining</strong>

                <p class="text-muted">{{$Employee_details->date_of_Joining}}</p>


                  </div>
                 </div>

                </div>
              </div>
              </div>

                <div class="col-sm-6">





          <div class="card card-color ">
             <div class="card card-color">
          <div class="card-header">
                <h3 class="card-title">All Types of card Information</h3>
          </div>
              <div class="card-body box-profile">


                <strong><i class="fa fa-id-card"></i> Aadhar Card</strong>

                <p class="text-muted">{{$Employee_details->aadhar_Card}}</p>

                <hr>
                <strong><i class="fa fa-id-card-alt"></i> Pan Card</strong>

                <p class="text-muted">{{$Employee_details->pan_card}}</p>

                <hr>
            <strong><i class="fa fa-address-book"></i>&nbsp;Access Card Number</strong>

                <p class="text-muted">{{$Employee_details->access_card}}</p>

                <hr>
                 <strong><i class="fa fa-id-card"></i>&nbsp;Card Number</strong>

                <p class="text-muted">{{$Employee_details->card_no}}</p>
                <hr>
                <strong><i class="fa fa-address-card"></i>&nbsp;Cabin Access</strong>

                <p class="text-muted">{{$Employee_details->cabin_access}}</p>
                <hr>
                <strong><i class="fa fa-address-card"></i>Card Type</strong>

                <p class="text-muted">{{$Employee_details->Card_Types}}</p>
                <hr>
                <strong><i class="fa fa-chart-line"></i>&nbsp;Status</strong>

                  @if($employee_status_data == '1')

                  <p class="text-muted">Active</p>

                @else

                   <p class="text-muted">Inactive</p>
                   @endif

                <hr>
                <strong><i class="fa fa-chart-line"></i>&nbsp;Marital Status</strong>
                <p class="text-muted">{{$Employee_details->marital_status}}</p>

                  <strong><i class="fa fa-address-card"></i>&nbsp;&nbsp;Customer Address Proof(Aadhar Card,Passport)</strong>
                  <hr>
                 <img width="40%;" class=" " src="/AddressProof/{{ $Employee_details->address_proof }}" height="" width="">
                   <!-- <img width="40%;" class=" " src="/AddressProof/{{ $Employee_details->address_proof }}" height="" width=""> -->

                   <a class="btn btn-info" href="{{route('downloadFIle',$Employee_details->id)}}">Download</a>
                 <hr>
                  <strong><i class="fa fa-id-card"></i>&nbsp;&nbsp;Customer ID Proof(Voting Card , Pan card,Driving Licence)</strong>

                 <img width="40%;" class=" " src="/IdProof/{{ $Employee_details->id_proof }}" height="" width=""> 

                 <a class="btn btn-info" href="{{route('downloadFIleId',$Employee_details->id)}}">Download</a>
                  
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
    </section>
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


<script src="/assets/plugins/morris/morris.min.js"></script>
<script src="/assets/plugins/raphael/raphael-min.js"></script>


@include('includes/footer_end')
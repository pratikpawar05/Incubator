<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css">
<script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js"></script>
    <link href="https://cdn.syncfusion.com/ej2/material.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/foundation/5.5.0/css/foundation.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.clearing.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
@extends('layouts.admin')


@section('content')

<!-- <span>{{$member_id}}</span>
<span>{{$member_name}}</span> -->



<div class="container-fluid" style="padding: 3%;">
  <div id="loading_icon" style="display: none;">
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="page-header text-center">
        <h3>NEW MEMBER</h3>
      </div> 
    </div>
  </div>
  <hr>

    <!-- Main Content --> 

<form id="employeeDetail" enctype="multipart/form-data">
  
<section  class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8">

   <div class="errors">
      </div>

            <!-- Profile Image -->
<!--             <div class="card card-primary card-outline">
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

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-user"></i>&nbsp;Customer Name</strong>

                <input class="form-control form-control" type="text" placeholder="Enter Customer Name" name="customer_Name" aria-label="Search">

                <hr>
                <strong><i class="fas fa-building"></i> Company Name</strong>

                  <input name="company_name" value="{{$member_name}}" class="form-control form-control" type="text" placeholder="Enter Company Name" aria-label="Search">

                <hr>

                 <strong><i class="fas fa-id-badge"></i>&nbsp;Customer Image</strong>
                 <input name="user_logo" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">

                <hr>

                <strong><i class="fas fa-user-circle"></i>&nbsp;Designation</strong>

                 <input name="designation" class="form-control form-control" type="text" placeholder="Enter Designation" aria-label="Search">

                <hr>

                <strong><i class="far fa-envelope"></i>&nbsp;Email Id</strong>

                <input class="form-control form-control" name="email" type="text" placeholder="Enter Email Id" aria-label="Search">

                <hr>
                <strong><i class="fas fa-male"></i>&nbsp;Gender</strong>


                 <select name="gender" class="form-control form-control">
                   <option>--select</option>
                   <option>Male</option>
                   <option>Female</option>
                 </select>


                <hr>
                <strong><i class="fas fa-id-card-alt"></i> Contact</strong>

                <input name="contact" class="form-control form-control" type="text" placeholder="Enter Contact Number" aria-label="Search">

                <hr>
                <strong><i class="fas fa-address-card"></i> Address</strong>

                 <input name="address" class="form-control form-control" type="text" placeholder="Enter Full Address" aria-label="Search">

                <hr>
                <strong><i class="far fa-calendar-alt"></i>Date Of Birth</strong>

                <input id="datepicker" name="DOB" class="form-control form-control" type="text" placeholder="Enter Customer Name" aria-label="Search">
                <hr>

                <strong><i class="far fa-calendar-alt"></i>Date of joining</strong>

                 <input id="datepicker2" name="date_of_joining" class="form-control form-control" type="text" placeholder="Enter Customer Name" aria-label="Search">

                  </div>
        </div>

          <div class="card card-primary ">
             <div class="card card-primary">
          <div class="card-header">
                <h3 class="card-title">All Types of card Information</h3>
          </div>
              <div class="card-body box-profile">


                <strong><i class="fas fa-id-card"></i> Aadhar Card</strong>

              <input name="aadhar_Card" class="form-control form-control" type="text" placeholder="Enter Aadhar Card Number" aria-label="Search">

                <hr>
                <strong><i class="fas fa-id-card-alt"></i> Pan Card</strong>

                <input name="pan_Card" class="form-control form-control" type="text" placeholder="Enter Pan Card Number" aria-label="Search">

                <hr>
            <strong><i class="fas fa-address-book"></i>&nbsp;Access Card Number</strong>

                <input name="access_card" class="form-control form-control" type="text" placeholder="Enter Access Card Number" aria-label="Search">

                <hr>
                 <strong><i class="fas fa-id-card"></i>&nbsp;Card Number</strong>

               <input name="card_no" class="form-control form-control" type="text" placeholder="Enter  Card Number" aria-label="Search">
                <hr>
                <strong><i class="fas fa-address-card"></i>&nbsp;Cabin/Desk Alloted</strong>

               <input name="cabin_access" class="form-control form-control" type="text" placeholder="Enter  Cabin Access" aria-label="Search">
                <hr>
                <strong><i class="fas fa-address-card"></i>Card Type</strong>

               <input name="card_type" class="form-control form-control" type="text" placeholder="Enter  Card Type" aria-label="Search">
                <hr>
                <strong><i class="fas fa-address-card"></i>Satus</strong>
                <!-- <input class="form-control form-control" type="text" placeholder="Enter  Status" aria-label="Search"> -->
                 <select name="status" class="form-control form-control">
                   <option>--select</option>
                   <option value="1">Active</option>
                   <option value="0">Inactive</option>
                 </select>

                <hr>

                <strong><i class="fas fa-id-badge"></i>&nbsp;Customer Address Proof Image(Aadhar Card,Voting Card , Driving Licence)</strong>
                  <!-- <img id="imagePreview" src="#" alt="your image" /> -->
                 <input  id="photos" name="address_proof[]" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search" multiple>
                <hr>


                 <strong><i class="fas fa-id-badge"></i>&nbsp;Customer ID Proof Image(Aadhar Card,Voting Card , Pan card,Driving Licence)</strong>
                 <input name="id_proof" class="form-control form-control" type="file" placeholder="Enter Customer Name" aria-label="Search">
                 
                <button id="success"  class="btn btn-success">Submit</button>
            </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>

    </section>
</form>


<script type="text/javascript">
  # Display the images to be uploaded.
$('#photos').on 'change', (e) ->
  multiPhotoDisplay(this);

@readURL = (input) ->
  #
  # Read the contents of the image file to be uploaded and display it.
  #
  if (input.files && input.files[0])
    reader = new FileReader()

    reader.onload = (e) ->
      $('.image_to_upload').attr('src', e.target.result)
      $preview = $('.preview')
      if $preview.hasClass('hide')
        $preview.toggleClass('hide');

    reader.readAsDataURL(input.files[0]);
    
multiPhotoDisplay = (input) ->
  #
  # Read the contents of the image file to be uploaded and display it.
  #
  if (input.files && input.files[0])
    for file in input.files
      reader = new FileReader()

      reader.onload = (e) ->
        image_html = """<li><a class="th" href="#{e.target.result}"><img width="75" src="#{e.target.result}"></a></li>"""

        $('#photos_clearing').append(image_html)

        if $('.pics-label.hide').length != 0
          $('.pics-label').toggle('hide').removeClass('hide')

        $(document).foundation('reflow')

      reader.readAsDataURL(file)

    window.post_files = input.files
    if window.post_files != undefined
      input.files = $.merge(window.post_files, input.files)
</script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
  $(function() {
    $('#visit_datepicker').datepicker({
        format: 'mm/dd/yyyy'
    })
  })
</script>
  <script type="text/javascript">
      $(function() {
          
        $("#employeeDetail").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/employeeDetailSubmit")}}/{{$member_id}}',
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
              $('#loading_icon').show();loading_icon
            },
            success: function(obj) {
              console.log(obj)
              console.log(obj.status)
              $(".alert-danger").remove();
              if(obj.status ="success") {
                swal(
                    'Success',
                    'An Employee added <b style="color:green;">successfully</b>!',
                    'success'
                  )
              }

              window.location.href = "/employee_list/{{$member_id}}"
              // if(obj.status ="Visitor already exists!") {
              //   swal(
              //       'Warning',
              //       'The Visitor already exists!',
              //       'warning'
              //     )
              // }
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

<script>
        var datepicker = new ej.calendars.DatePicker({  });
        datepicker.appendTo('#datepicker');
</script>

<script>
        var datepicker = new ej.calendars.DatePicker({  });
        datepicker.appendTo('#datepicker2');
</script>



@endsection
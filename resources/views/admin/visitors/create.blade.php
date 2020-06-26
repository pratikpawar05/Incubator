@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
       <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> -->

       <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


 <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css"> -->

<!--        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" /> -->
       <style type="text/css">

    .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
</style>
    <style type="text/css">



  .font{
    font-family: 'Alice', serif;
  }

  
  label{
    font-size: 18px;
    font-family: 'Alice', serif;

/*font-family: 'Merienda', cursive;*/

  }
  
  .box{
    background-image: linear-gradient(to bottom right, #134779, #134779);  
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
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>NEW VISITOR</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div>
        </div>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="container-fluid" style="padding: 2%">
    
                 <div class="errors">
                 </div>

                  <div class="row">
                  </div>

                    <!-- Main Content --> 
                    <div class="col-xs-12 col-lg-8 col-sm-8 col-md-8">
                      <div class="errors">
                      </div>
                      <form id="sign_up_form" style="padding-left: 9%;">
                        <div class="row box">
                          <div class="col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="first_name" class="form-control" placeholder=" Enter Name">
                            </div>
                          </div>
                          
                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>Company Name (From)</label>
                              <input type="text" name="company_from" class="form-control" placeholder="Enter Company Visitor belongs to">
                            </div>
                          </div>

                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>Contact</label>
                              <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number">
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
                           <!--  <div class="form-group">
                              <div class="radio">
                                <label><input type="radio" name="gender" value="Male" checked>&nbsp;Male</label>
                              </div>
                              <div class="radio">
                                <label><input type="radio" name="gender" value="Female">&nbsp;Female</label>
                              </div>
                              <div class="radio disabled">
                                <label><input type="radio" name="gender" value="Others">&nbsp;Others</label>
                              </div>            
                            </div> -->

                          </div>
                          <div class="col-lg-offset-0 col-lg-6 col-xs-12">
                            <div class="form-group">
                              <label>Location</label>
                              <input type="text" name="location" class="form-control" placeholder="Eg. Mumbai">
                            </div>
                          </div>

                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                            <div class="form-group">
                              <label>Purpose for visit</label>
                              <input type="text" name="visit_purpose" class="form-control" placeholder="Eg. Client Visit">
                            </div>
                          </div>
                           <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                            <div class="form-group">
                              <label for="Gender" class="select">Types of visitors</label>
                              <select id="visitor_type"  name="visitors_type" class="form-control">
                                  <option>--select--</option>
                                  <option value="customer">Customer</option>
                                  <option value="vendor">Vendor</option>
                                  <option value="candidate">Candidate</option>
                                  <option value="member visitor">Member Visitor</option>
                                </select>
                            </div>
                          </div>

                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12" id="visitor_type_field" style="display:none">
                            <div class="form-group">
                              <label for="Gender" class="select"> Description:</label>
                              <textarea type="text" class="form-control" name="description_visitor_type" placeholder="Describe your Visitor type..."></textarea>
                            </div>
                          </div>          


                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>Whom to meet</label>
                              <input name="person_to_meet" type="text" class="form-control" placeholder="Eg. John Doe">
                            </div>
                          </div>

                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>Company Name (Meeting with)</label>
                              <input name="name_of_company" type="text" class="form-control" placeholder="Enter Company Name">
                            </div>
                          </div>

                           <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>Date</label>
                              <input type="text" name="visit_date" id="datepicker" type="text" class="form-control" placeholder="Enter Visit Date" >

                            </div>
                          </div>

                           <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                               <!-- <div class="ui calendar" id="example3"> -->
                              <label>In Time</label>
                               <!-- <h4>In Time</h4> -->                               <!--  <div class="ui input left icon col-sm-12">
                                  <i class="time icon"></i>
                                  <input name="in_time" type="text" placeholder="In Time">
                                </div>
                              </div> -->
                              <input type="time" name="in_time" type="text" class="form-control  timepicker" placeholder="In Time">
                            </div>
                          </div>

                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">

                          <!-- <div class="form-group">
                              <label>Out Time</label>
                            <div class='input-group date' id='datetimepicker3'>
                              <input type='text' class="form-control" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                              </span>
                            </div>
                          </div> -->



                            <div class="form-group">
                              <label>Out Time</label>
                              <input type="time" name="out_time" type="text" class="form-control timepicker" placeholder="Out Time">
                            </div>
                          </div>

                          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>Id Card Number</label>
                              <input type="text" name="id_card_number" type="text" class="form-control" placeholder="Enter Id Card Number">
                            </div>
                          </div>

                          <div class="col-lg-offset-0 col-lg-4 col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label>E-Mail</label>
                              <input type="email" name="email" type="email" class="form-control" placeholder="abc@xyz.com">
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <button id="success" type="submit" class="btn btn-success" style="margin-left: 8%;">Submit</button>
                </div>
                </form>
                </div>
              </div>
            </div>
          </div>

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Required datatable js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('/assets/js/timepicki.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>


  <script type="text/javascript">
    $(function () {
  $("#datepicker").datepicker({ 
  }).datepicker;
});

  </script>


  <script type="text/javascript">
      $(function() {
          
        $("#sign_up_form").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/create_visitor")}}',
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
              console.log(obj)
              console.log(obj.status)
              $(".alert-danger").remove();
              if(obj.status ="success") {
                swal({
                          title:'An Visitor Added <b style="color:green;">successfully</b>!',
                          type:'success',

                          }).then(e=>{
                          window.location.href = "/admin/visitors"

                          }).catch(err=>{

                          });
              }

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

<script type="text/javascript">
  $( "#progress-button" ).click(function() {
    $("#progress-menu").toggleClass('hidden-xs');
  });

  $("#visitor_type").on("change", function() {

    visitor_type = $(this).val()

    if(visitor_type == 'customer' || visitor_type == 'vendor' || visitor_type == 'candidate') {
        $("#visitor_type_field").show()
    }
    else if(visitor_type == 'member visitor') {
      $("#visitor_type_field").hide()
    }
  })
  
</script>
<!-- <script>
        var datepicker = new ej.calendars.DatePicker({  });
        datepicker.appendTo('#datepicker');


        $(".timepicker").timepicker();

    </script> -->
@include('includes/footer_end')
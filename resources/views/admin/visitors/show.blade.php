@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="{{ url('/assets/css/jquery.datepicker2.css') }}" rel="stylesheet">
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
    background-image: linear-gradient(to bottom right, #154C7F, #154C7F);  
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
                            <h4 class="page-title"> <i class="dripicons-blog"></i>SHOW VISITOR</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div style="margin-left: 95px;" class="wrapper">
        <div class="container-fluid">
            <div class="container-fluid" style="padding: 2%">
    
                 <div class="errors">
                 </div>

                  <div class="row">
                  </div>

     <div style="background-color: #154C7F;
    color: #fff;
    padding: 3%;
    border-radius: 5px;" class="col-xs-12 col-lg-10 col-sm-10 col-md-8">
      <div class="errors">
      </div>
      <form id="sign_up_form">
        <div class="row">
          <div class="col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" value="{{ $data->name }}"  placeholder=" Enter First Name" readonly>
            </div>
          </div>
          
          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Company Name (From)</label>
              <input type="text" name="last_name" class="form-control" value="{{ $data->company_from }}" placeholder="Enter Last Name" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Mobile</label>
              <input type="number" name="mobile" class="form-control" value="{{ $data->mobile }}" placeholder="Enter Mobile Number" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">

            <div class="form-group">
              <label  for="Gender" class="select">Gender</label>
              <select name="Gender" class="form-control" readonly>
                <option value="{{ $data->Gender }}" selected>{{ $data->Gender }}</option>
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
              <input type="text" name="location" class="form-control" value="{{ $data->location }}" placeholder="Eg. Mumbai" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
            <div class="form-group">
              <label>Purpose for visit</label>
              <input type="text" name="visit_purpose" value="{{ $data->visit_purpose }}" class="form-control" placeholder="Eg. Client Visit" readonly>
            </div>
          </div>
           <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="Gender" class="select">Types of visitors</label>
              <select id="visitor_type"  name="visitors_type" class="form-control" readonly>
                  <option value="{{ $data->visitors_type }}">{{ $data->visitors_type }}</option>
                </select>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12" id="visitor_type_field" >
            <div class="form-group">
              <label for="Gender" class="select"> Description:</label>
              <textarea type="text" class="form-control" name="description_visitor_type" placeholder="Describe your Visitor type..." readonly>{{ $data->description_visitor_type }}</textarea>
            </div>
          </div>          


          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Whom to meet</label>
              <input name="person_to_meet" type="text" class="form-control" value="{{ $data->person_to_meet }}" placeholder="Eg. Kashif Shaikh" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Company Name (Meeting with)</label>
              <input name="name_of_company" type="text" class="form-control" value="{{ $data->name_of_company }}" placeholder="Eg. Kashif Shaikh" readonly>
            </div>
          </div>

           <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Date</label>
              <input type="text" name="visit_date" id="datepicker" type="text" value="{{ $data->visit_date }}" class="form-control" placeholder="Enter visit date" readonly>
            </div>
          </div>

           <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>In Time</label>
              <input type="text" name="in_time" type="text" value="{{ $data->in_time }}" class="form-control" placeholder="In Time" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Out Time</label>
              <input type="text" name="out_time" value="{{ $data->out_time }}" type="text" class="form-control" placeholder="Out Time" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Id Card Number</label>
              <input type="text" name="id_card_number" type="text" value="{{ $data->id_card_number }}" class="form-control" placeholder="Enter Id Card Number" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-4 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>E-Mail</label>
              <input type="email" name="email" type="email" value="{{ $data->email }}" class="form-control" placeholder="kashif@biznest.co.in" readonly>
            </div>
          </div>

          <!-- <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-6">
            <div class="form-group">
              <label types_of_email  class="select">E-Mail Type</label>
              <select name="email_type" class="form-control">
                  <option>Personal</option>
                  <option>Work</option> 
                </select>
            </div>
          </div> -->
        <div style="margin-top: 5px;" class="">
        </div>
        <br>
        <br>
      </form>
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

@include('includes/footer_end')
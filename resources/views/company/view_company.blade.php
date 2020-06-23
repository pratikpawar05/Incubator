@include('includes/header_start')
<!-- Put extra Css here -->
<!-- Plugins css -->
<!-- <link href="{{ url('/assets/css/jquery.datepicker2.css') }}" rel="stylesheet"> -->
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<style type="text/css">
  .thumb {
    margin: 10px 5px 0 0;
    width: 100px;
  }
  
  .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    .busines_data1{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
</style>
<style type="text/css">
  input[type="file"] {
    display: none;
  }

  .data {
    padding: 10px;
    /* background: blue; */
    border-radius: 5px;
    display: table;
    color: #fff;
    border: 1px solid #fff;
  }

  .data1 {
    padding: 10px;
    /* background: green; */
    border-radius: 5px;
    display: table;
    color: #fff;
    border: 1px solid #fff;
  }

  .data2 {
    padding: 10px;
    /* background: #0095B6; */
    border-radius: 5px;
    display: table;
    color: #fff;
    border: 1px solid #fff;
  }

  .data3 {
    padding: 10px;
    /* background: #ffc107; */
    border-radius: 5px;
    display: table;
    color: #fff;
    border: 1px solid #fff;
  }

  .data4 {
    padding: 10px;
    border: 1px solid #fff;
    /* background: #FF6347; */
    border-radius: 5px;
    display: table;
    color: #fff;
  }
 
</style>

@include('includes/header_end')

<div class="container-fluid">
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <form class="float-right app-search">
          <input type="text" placeholder="Search..." class="form-control">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <h4 class="page-title busines_data"> <i class="dripicons-box"></i> {{strtoupper($member->company_registered_name)}} : COMPANY KYC</h4>
        <br>
        <!-- <img src='{{url("$image_mewo")}}' width="100%" height="350px"> -->

        <img src="{{url('/assets/images/7.png')}}" height="350px" width="100%">

      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->
  <br>
  <!-- <br>
  <br>
  <br> -->
  <div class="row">
    <div class="col-12 mb-4">
      <!-- <div id="morris-bar-example" class="dash-chart"></div> -->

        <div class="mt-4 text-center">

              <a href="/revenue/company/{{$member->company_registered_name}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Home</button></a>

              <a href="/fonik_employee_list/{{$id}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Member Details</button></a>

              <a href="/member_show/{{$id}}/{{1}}"><button type="button" class="btn btn-outline-info ml-1 waves-effect waves-light">Company KYC</button></a>

              <a href="/member_agreement/{{$id}}">
                <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Agreement</button></a>

              <a href="/revenue/company/invoice/{{$member->company_registered_name}}"><button type="submit" class="btn btn-outline-light ml-1 waves-effect waves-light">Tax Invoice </button></a>
       </div>
    </div>
  </div>
</div>
</div>


<div class="container-fluid" style="padding: 3%;">
  <div id="loading_icon" style="display: none;">
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="page-header">
        <!-- <h3>Add Company</h3> -->
      </div>
    </div>
  </div>
  <div class="row">
    @if(isset($success))
    <div class="alert alert-success">
      <span>Documents added successfully!</span>
    </div>
    @endif
  </div>


  <div class="wrapper">
    <div class="container-fluid "  style="background-color: #124473; color: #fff; padding: 2%; border-radius: 5px;">
          <div class="row">
            <!-- <h4 style="margin-left: 430px;" class="busines_data1">COMPANY KYC:</h4> -->
          </div>
          <form id="company_documents_form" enctype="multipart/form-data">
            <input type="hidden" name="company_id" id="doc_company_id">
            <div class="row" style="margin-left: 410px;">
                
                <div class="col-sm-6 col-sm-offset-2">
                  <div class="form-group">
                    <label class="select">PAN:</label>
                    <!-- <input type="file" class="form-control" name="pan"> -->
                    <label class="data" id="pan">
                      <!-- <div id="thumb-output"></div> -->
                      <!-- Modal -->
                      <a href="#" id="pop" style="color: #fff !important;">                    
                        <!-- <img id="imageresource" src="{{ asset($company_docs->company_pan_path) }}" width="200px" alt="No Image Found"> -->
                        <img id="imageresource" class="img-display" src="https://vakilsearch.com/advice/wp-content/uploads/2016/04/How-to-get-Pan-Card-for-a-Registered-NGO-in-India.jpg" width="300px" alt="No Image Found">
                      </a>
                    </label>
                  </div>
                </div>
              </div>
              
              <div class="row" style="margin-left: 410px;">
                <div class="col-sm-offset-3 col-sm-6">
                  <div class="form-group">
                    <label class="select">TAN:</label>
                    <!-- <input type="file" class="form-control" name="tan"> -->
                    <label class="data1" id="tan">

                      <a href="#" id="pop2" style="color: #fff !important;">
                        <!-- <img id="imageresource2" src="{{ asset($company_docs->company_tan_path) }}" width="200px" alt="No Image Found"> -->
                        <img id="imageresource2" class="img-display" src="https://tiimg.tistatic.com/fp/1/002/652/pan-and-tan-card-service-897.jpg" width="300px" alt="No Image Found">
                      </a>
                      <div id="thumb-output1"></div>
                    </label>
                  </div>
                </div>
              </div>


              <div class="row" style="margin-left: 410px;">
                <div  class="col-sm-offset-3 col-sm-6">
                  <div class="form-group">
                    <!-- <input type="file" class="form-control" name="aoa"> -->
                    <label class="select">ADDRESS PROOF:</label>
                    <label class="data2" id="add">

                      <a href="#" id="pop3" style="color: #fff !important;">
                        <!-- <img id="imageresource3" src="{{ asset($company_docs->company_adress_proof_path) }}" width="200px" alt="No Image Found"> -->
                        <img id="imageresource3" class="img-display" src="https://i.pinimg.com/originals/bf/db/37/bfdb3796f2848739ade77e73e905068e.jpg" width="300px" alt="No Image Found">
                      </a>
                      <div id="thumb-output2"></div>
                    </label>
                  </div>
                </div>
              </div>


              <div class="row" style="margin-left: 410px;">                
                <div class="col-sm-offset-3 col-sm-3">
                  <div class="form-group">
                    <label class="select">INCORPORATION CERTIFICATE :</label>
                    <!-- <input type="file" class="form-control" name="moa"> -->
                    <label class="data3" id="coi">
                      <a href="#" id="pop4" style="color: #fff !important;">
                        <!-- <img id="imageresource4" src="{{ asset($company_docs->company_coi_path) }}" width="200px" alt="No Image Found"> -->
                        <img id="imageresource4" class="img-display" height="" src="https://www.opalindia.in/images/incorporation.jpg" width="300px" height="125px" alt="No Image Found">

                      </a>
                      <div id="thumb-output3"></div>
                    </label>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-left: 410px;">
              <div style="margin-left:5px;" class="col-lg-offset-0 col-lg-4 col-xs-4 col-sm-4">
                <div class="form-group">
                  <label class="select">GST CERTIFICATE:</label>
                  <!-- <input type="file" class="form-control" name="gst"> -->
                  <label class="data4" id="gst">
                    <a href="#" id="pop5" style="color: #fff !important;">
                      <!-- width=150 -->
                      <!-- <img id="imageresource5" src="{{ asset($company_docs->company_gst_certificate_path) }}" width="200px" alt="No Image Found"> -->
                      <img id="imageresource5" class="img-display" src="https://gstindianews.info/wp-content/uploads/2019/07/gst-registration-certificate.jpg" width="300px" alt="No Image Found">
                    </a>
                    <div id="thumb-output4"></div>
                    <span id="file_name"></span>
                  </label>
                </div>
              </div>
              </div>

            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end wrapper -->

@include('includes/footer_start')
<!-- Put Extra Js here -->
<!-- Plugins js -->
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

<!-- Plugins Init js -->
<script src="assets/pages/form-advanced.js"></script>
<script type="text/javascript">
  $('body').on('click',"img[class=img-display]",function(e){
     var img_text=$(this).closest("div").find(".select").text();
     var src = e.currentTarget.src
    //console.log(e.currentTarget)
      swal({
           title: img_text,
           html:'<img src="'+src+'" style="width: 100%;  height: 100%;">',
           //imageUrl: src,
           imageAlt: 'No Image Found',
        });
  });
</script>
<!-- <script type="text/javascript" src="{{ url('/assets/js/jquery.datepicker2.js') }}"></script> -->
@include('includes/footer_end')
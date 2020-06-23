@include('includes/header_start')
<!-- Put extra Css here -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-base/styles/material.css" rel="stylesheet">
    <link href="//cdn.syncfusion.com/ej2/ej2-buttons/styles/material.css" rel="stylesheet">
    <link href="//cdn.syncfusion.com/ej2/ej2-inputs/styles/material.css" rel="stylesheet">
    <link href="//cdn.syncfusion.com/ej2/ej2-popups/styles/material.css" rel="stylesheet">
    <link href="//cdn.syncfusion.com/ej2/ej2-calendars/styles/material.css" rel="stylesheet">
  <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <style type="text/css">
  .thumb {
    margin: 10px 5px 0 0;
    width: 100px;
  }
</style>
<style type="text/css">
  input[type="file"] {
    display: none;
  }

  .data {
    padding: 10px;
    background: blue;
    border-radius: 5px;
    display: table;
    color: #fff;
  }

  .data1 {
    padding: 10px;
    background: green;
    border-radius: 5px;
    display: table;
    color: #fff;
  }

  .data2 {
    padding: 10px;
    background: #0095B6;
    border-radius: 5px;
    display: table;
    color: #fff;
  }

  .data3 {
    padding: 10px;
    background: #ffc107;
    border-radius: 5px;
    display: table;
    color: #fff;
  }

  .data4 {
    padding: 10px;
    background: #FF6347;
    border-radius: 5px;
    display: table;
    color: #fff;
  }
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
                            <h4 class="page-title busines_data"> <i class="dripicons-box"></i> EDIT COMPANY</h4>
                        </div>
                    </div>
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
<div class="container-fluid" style="padding:3%">

  <div class="wrapper">
    <div class="container-fluid">

    <div class="row">

    <ul class="nav nav-tabs">
      <li class="active btn btn-info">
        <a style="color: #fff;" data-toggle="tab" href="#home">Company Details</a>
      </li>&nbsp;&nbsp;
      <li class="btn btn-success">
        <a href="#menu1" id="deal" style="color: #fff;" data-toggle="tab">Director & Deal Details</a></li>&nbsp;&nbsp;
      <li class="btn btn-warning"><a href="#menu2" id="docs" style="color: #fff;" data-toggle="tab">Documents</a></li>
      <!-- <li class="btn btn-danger"><a style="color: #fff;" data-toggle="pill" href="#menu3">Menu 3</a></li> -->
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active show">
        <h3>Company Details</h3>
        <!-- action="{{ url('/store_company') }}" method="POST" -->
        <form id="company_details_form">
          <div class="row" style="background-color: #305881; color: #fff; padding: 2%; border-radius: 5px;">

            <div class="col-lg-offset-0 col-lg-6 col-xs-12">
              <label>Company Registered Name</label>
              <div class="form-group">
                <input type="text" name="company_registered_name" class="form-control" placeholder="Enter Registered Company Name" value="{{$member->company_registered_name}}">
              </div>
            </div>

            <div class="col-lg-6 col-xs-12 col-sm-6">
              <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="brand_name" class="form-control" placeholder=" Enter Brand Name" value="{{$member->brand_name}}">
              </div>
            </div>


            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
              <div class="form-group">
                <label>Start Date</label>
                <input  type="text" name="start_date"  class="form-control datepicker" placeholder="Select Date" value="{{$member->start_date}}">
              </div>
            </div>


            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
              <div class="form-group">
                <label>End Date</label>
                <input  type="text" name="end_date" class="form-control datepicker" placeholder="Select Date" value="{{$member->end_date}}">
              </div>
            </div>

            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label name="date_of_incorporation" class="select">Date Of Incorporation</label>
                <input  type="text" name="date_of_incorporation" class="form-control datepicker" placeholder="Select Date" value="{{$member->date_of_incorporation}}">
              </div>
            </div>


            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>Tenure (Months)</label>
                <input type="text" name="tenure" class="form-control" placeholder="Number Of Months" value="{{$member->tenure}}">
              </div>
            </div>

            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>Lock In (Months)</label>
                <input type="text" name="lock_in" class="form-control" placeholder="Number Of Months" value="{{$member->lock_in}}">
              </div>
            </div>

            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>Notice Period (Months)</label>
                <input type="text" name="notice_period" class="form-control" placeholder="Number Of Months" value="{{$member->notice_period}}">
              </div>
            </div>

            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>Registered Address</label>
                <textarea name="registered_address" class="form-control" placeholder="Enter Company Registered Address">{{$member->registered_address}}</textarea>
              </div>
            </div>

            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>GST No.</label>
                <input type="text" name="gst_no" class="form-control" placeholder="Enter GST No." value="{{$member->gst_no}}">
              </div>
            </div>


            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>Company PAN Number</label>
                <input type="text" name="company_pan_number" class="form-control" placeholder="Enter Company PAN Number" value="{{$member->company_pan_number}}">
              </div>
            </div>


            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>Company TAN Number</label>
                <input type="text" name="company_tan_number" class="form-control" placeholder="Enter Company TAN Number" value="{{$member->company_tan_number}}">
              </div>
            </div>

            <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <label>Company CIN Number</label>
                <input type="text" name="company_cin_number" class="form-control" placeholder="Enter CIN Number" value="{{$member->company_cin_number}}">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <button type="submit" class="btn btn-success go_to_next_tab">Save & Proceed</button>
          </div>
      </div>

      </form>


      <div id="menu1" class="tab-pane fade">

        <form id="company_deal_form">
          <!-- </div> -->
          <input type="hidden" id="company_id" name="company_id" value="{{$id}}">
          <div class="row">
            <h4>Deal Structure:</h4>
          </div>

          <div class="col-xs-12 col-lg-12 col-sm-8 col-md-8" id="deal_structure">

            <a class="btn btn-info" id="add_deal_structure_btn" title="Add Deal">
              <i class="fa fa-plus"></i>
            </a>

            <a class="btn btn-info" id="remove_deal_structure_btn" title="Remove Deal">
              <i class="fa fa-minus"></i>
            </a>
    
          @for ($i = 0; $i < $deal_structure; $i++)


            <div class="row deal" id="1" style="background-color: #305881; color: #fff;margin-top: 15px;  padding: 2%; border-radius: 5px;">

              <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">Type of Desk:</label>
                  <!-- <select name="type_of_desk[]" class="form-control">
                    <option>--select--</option>
                    <option value="dedicated_desk">Dedicated Desk</option>
                    <option value="dedicated_cabin">Dedicated Cabin</option>
                    <option value="hot_seat">Hot Seat</option>
                    <option value="day_pass">Day Pass</option>
                    <option value="virtual_office">Virtual Office</option>
                  </select>
 -->
                  {{ Form::select("type_of_desk[]", ["dedicated_desk"=>"Dedicated Desk", "dedicated_cabin"=>"Dedicated Cabin", "hot_seat"=>"Hot Seat", "day_pass"=>"Day Pass", "virtual_office"=>"Virtual Office"], $company_deal[$i]->type_of_desk, ['class'=>'form-control']) }}

                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-1 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>No. Of Desks</label>
                  <input type="text" name="no_of_desk[]" class="form-control no_of_seats" placeholder="Desks" value="{{$company_deal[$i]->no_of_desk}}">
                </div>
              </div>



              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Price/Seat</label>
                  <input type="text" name="price_per_seat[]" class="form-control price_per_seat" placeholder="Enter Price/Seat" value="{{$company_deal[$i]->price_per_seat}}">
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Monthly Rent</label>
                  <input type="text" name="net_total[]" class="form-control net_total_monthly" placeholder="Eg. 10000" value="{{$company_deal[$i]->net_total}}" readonly>
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Annual Rent</label>
                  <input type="text" name="annual_net_total[]" class="form-control annual_total_monthly" placeholder="Eg. 250000" value="{{$company_deal[$i]->annual_net_total}}" readonly>
                </div>
              </div>


              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Annual Increment</label>
                  <input type="text" name="annual_increment[]" class="form-control no_of_seats" placeholder="Enter Annual Increment" value="{{$company_deal[$i]->annual_increment}}">
                </div>
              </div>


              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Deposits (In Months)</label>
                  <input type="text" name="deposits_in_month[]" class="form-control deposits_in_month" placeholder="Enter Deposits in Month" value="{{$company_deal[$i]->deposits_in_month}}">
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Deposit Amount</label>
                  <input type="text" name="deposit_amount[]" class="form-control deposit_amount" placeholder="Enter Deposit Amount" value="{{$company_deal[$i]->deposit_amount}}">
                </div>
              </div>


              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Deposit Received</label>
                  <input type="text" name="deposit_received[]" class="form-control deposit_received" placeholder="Enter Advance Rent" value="{{$company_deal[$i]->deposit_received}}">
                </div>
              </div>



              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Deposit Received Date</label>
                  <input type="text" name="deposits_received_date[]" class="form-control datepicker" placeholder="Enter Deposit Date" value="{{$company_deal[$i]->deposits_received_date}}">
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Deposit Reference No.</label>
                  <input type="text" name="deposits_reference_no[]" class="form-control" placeholder="Enter Deposit Ref. no." value="{{$company_deal[$i]->deposits_reference_no}}">
                </div>
              </div>



              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Agreement Term (In Years)</label>
                  <input type="text" name="agreement_term_in_years[]" class="form-control agreement_term" placeholder="Enter Agreement Terms (In Years)" value="{{$company_deal[$i]->agreement_term_in_years}}">
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Notice Period (After Lock-In)</label>
                  <input type="text" name="notice_period[]" class="form-control notice_period" placeholder="Enter Notice Period" value="{{$company_deal[$i]->notice_period}}">
                </div>
              </div>


              <div class="col-lg-offset-0 col-lg-2 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Meeting Room Credits:</label>
                  <input type="text" name="meeting_room_credits[]" class="form-control meeting_room_credits" placeholder="Enter Meeting Room Credit" value="{{$company_deal[$i]->meeting_room_credits}}">
                </div>
              </div>


            </div>
          @endfor

          </div>
          <!-- </div> -->


          <div class="col-xs-12 col-lg-12 col-sm-8 col-md-8">

            <div class="row">
              <h4>Discount:</h4>
            </div>

            <div class="row" style="background-color: #305881; color: #fff; padding: 2%; border-radius: 5px;">

              <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">No.of Months:</label>
                  <input type="text" name="discount_months" class="form-control no_of_months" placeholder="Enter No. Of Months" value="{{$company_deal[0]->discount_months}}">
                </div>
              </div>
              <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">After Discount:</label>
                  <input type="text" name="amount_after_discount" class="form-control after_discount" placeholder="Eg. 20000" value="{{$company_deal[0]->amount_after_discounts}}" readonly>
                </div>
              </div>

            </div>
          </div>


          <div class="row">
            <h4>Director's Details:</h4>
          </div>

          <div class="col-xs-12 col-lg-12 col-sm-8 col-md-8" id="director_structure">

            <a class="btn btn-info" id="add_director_structure_btn" title="Add Deal">
              <i class="fa fa-plus"></i>
            </a>

            <a class="btn btn-info" id="remove_director_structure_btn" title="Remove Deal">
              <i class="fa fa-minus"></i>
            </a>

          @for ($i = 0; $i < $deal_director; $i++)


            <div class="row deal" style="background-color: #305881; color: #fff;margin-top: 15px;  padding: 2%; border-radius: 5px;">

              <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">Director Name:</label>
                  <input type="text" name="directorName[]" class="form-control" placeholder="Enter Director Name" value="{{$company_deal[$i]->director_name}}">
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>DIN Number</label>
                  <input type="text" name="din_number[]" class="form-control" placeholder="Enter DIN Number" value="{{$company_deal[$i]->din_number}}">
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Contact</label>
                  <input type="text" name="director_contact[]" class="form-control" placeholder="Enter Director Contact" value="{{$company_deal[$i]->director_contact}}">
                </div>
              </div>

              <div class="col-lg-offset-0 col-lg-3 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="director_email[]" class="form-control" placeholder="Eg. john@example.com" value="{{$company_deal[$i]->director_email}}">
                </div>
              </div>

            </div>

          @endfor

          </div>



          <div class="row" style="margin-top: 15px;">
            <button class="btn btn-success">Save & Proceed</button>
          </div>

      </div>
      </form>


      <div id="menu2" class="tab-pane fade">
        <div class="col-xs-12 col-lg-12 col-sm-8 col-md-8">

          <div class="row">
            <h4>Company Documents:</h4>
          </div>
          <form id="company_documents_form" enctype="multipart/form-data">
            <input type="hidden" name="company_id" id="doc_company_id">
            <div class="row" style="background-color: #305881; color: #fff; padding: 2%; border-radius: 5px;">


              <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">PAN:</label>
                  <!-- <input type="file" class="form-control" name="pan"> -->
                  <label class="data">Upload Your PAN Documents
                    <!-- <input name="pan" type="file"> -->
                    <input name="pan" type="file" id="file-input" value="{{ asset($company_docs->company_pan_path) }}" />

                    <input name="pan" type="button" onClick=removeAllImage() value="PAN" clas="remove">
                    <div id="thumb-output"></div>
                  </label>
                </div>
                <!-- <img style="max-width: 200px; max-height: 200px; margin-top: 10px; margin-bottom: 30px;" src="{{ $a }}" height="" width=""> -->



                <img style="max-width: 200px; max-height: 200px; margin-top: 10px; margin-bottom: 30px;" src="{{ $company_docs->company_pan_path }}" height="" width="">
              </div>

              <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">TAN:</label>
                  <!-- <input type="file" class="form-control" name="tan"> -->
                  <label class="data1"> Upload Your TAN Documents
                    <!-- <input name="tan" type="file"> -->
                    <input name="tan" type="file" id="file-input1" value="{{ asset($company_docs->company_tan_path) }}" />
                    <input name="tan" type="button" onClick=removeAllImage() value="TAN" clas="remove">
                    <div id="thumb-output1"></div>
                  </label>
                </div>
                <img style="max-width: 200px; max-height: 200px; margin-top: 10px; margin-bottom: 30px;" src="{{ $company_docs->company_tan_path }}" height="" width="">
              </div>

              <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">Address Proof:</label>
                  <!-- <input type="file" class="form-control" name="aoa"> -->
                  <label class="data2"> Upload Your Address Proof
                    <!-- <input type="file" name="aoa"> -->
                    <input name="address_proof" type="file" id="file-input2" value="{{ asset($company_docs->company_address_proof_path) }}" />
                    <input name="address_proof" type="button" onClick=removeAllImage() value="AOA" clas="remove">
                    <div id="thumb-output2"></div>
                  </label>
                </div>
              <img style="max-width: 200px; max-height: 200px; margin-top: 10px; margin-bottom: 30px;" src="{{ $company_docs->company_adress_proof_path }}" height="" width="">
              </div>

              <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">Company COI:</label>
                  <!-- <input type="file" class="form-control" name="moa"> -->
                  <label class="data3"> Upload Your Company COI
                    <!-- <input type="file" name="moa"> -->
                    <input name="company_coi" type="file" id="file-input3" value="{{ asset($company_docs->company_coi_path) }}" />
                    <input name="company_coi" type="button" onClick=removeAllImage() value="Company COI" clas="remove">
                    <div id="thumb-output3"></div>
                  </label>
                </div>
                <img style="max-width: 200px; max-height: 200px; margin-top: 10px; margin-bottom: 30px;" src="{{ $company_docs->company_coi_path }}" height="" width="">
              </div>

              <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label class="select">GST Certificate:</label>
                  <!-- <input type="file" class="form-control" name="gst"> -->
                  <label class="data4"> Upload Your GST Certificate
                    <!-- <input type="file" name="gst"> -->
                    <input name="gst_certificate" type="file" id="file-input4" onchange="updateList()" value="{{ asset($company_docs->company_gst_certificate_path) }}" />
                    <input name="gst_certificate" type="button" onClick=removeAllImage() value="GST" clas="remove">
                    <div id="thumb-output4"></div>
                    <span id="file_name"></span>
                  </label>
                </div>
                 <img style="max-width: 200px; max-height: 200px; margin-top: 10px; margin-bottom: 30px;" src="{{ $company_docs->company_gst_certificate_path }}" height="" width="">
              </div>

            </div>
            <div class="row" style="margin-top: 10px;">
              <button type="submit" class="btn btn-success go_to_next_tab">Submit</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Plugins js -->
    <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>


    <!-- Plugins Init js -->
    <script src="assets/pages/form-advanced.js"></script>

    <!-- <script type="text/javascript" src="{{ url('/assets/js/jquery.datepicker2.js') }}"></script> -->

    <script type="text/javascript" src="{{ url('/assets/js/jquery.datepicker2.js') }}"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


<script type="text/javascript">
  $(function() {

    $("#company_details_form").on("submit", function(e) {
      e.preventDefault()
      if ($("#company_id").val() == "")
        route = '{{url("/store_company")}}/0'
      else
        route = '{{url("/store_company")}}/'+$("#company_id").val()
      $.ajax({
        url: route,
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'POST',
        type: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {
          $(".alert-danger").remove();
          if (obj.status == "success") {
            $('#deal').click();

            company_id = obj.company_id
            //#company_deal_form 
            $("#company_id").attr('value', company_id)
            swal(
              'Success',
              'Company added successfully!',
              'success'
            )
          }


          if (obj.status == "Company already exists!") {
            swal(
              'Warning',
              'This Company already exists!',
              'warning'
            )
          }

          // window.location.href = "/companyDetails";
        },
        error: function(obj) {
          if (obj.status == 401) {
            swal(
              'Warning',
              'You are not Authorized!',
              'warning'
            );
          }

          
          alert("error is there")
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
    function activaTab(tab) {
      $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    };

    $("#company_deal_form").on("submit", function(e) {
      e.preventDefault()
      $.ajax({
        url: '{{url("/store_company_deal")}}/'+$("#company_id").val(),
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'POST',
        type: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {
          console.log("=====start====")
          console.log(obj)
          console.log("=====end====")
          $(".alert-danger").remove();
          if (obj.status == "success") {
            $("#docs").click();

            // activaTab('menu2');
            company_id = obj.company_id
            $("#doc_company_id").attr('value', company_id)

            swal(
              'Success',
              'Company Deal added successfully!',
              'success'
            )
          }


          // if(obj.status ="Member already exists!") {
          //   swal(
          //       'Warning',
          //       'The Member already exists!',
          //       'warning'
          //     )
          // }

          // window.location.href = "/companyDetails";
        },
        error: function(obj) {
          if (obj.status == 401) {
            swal(
              'Warning',
              'You are not Authorized!',
              'warning'
            );
          }


          alert("error aaya")
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



    $("#company_documents_form").on("submit", function(e) {
      e.preventDefault()
      $.ajax({
        url: '{{url("/store_company_documents")}}/'+$("#company_id").val(),
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'POST',
        type: 'JSON',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {

          $(".alert-danger").remove();
          if (obj.status == "File uploaded successfully.") {
            swal(
              'Success',
              'Company Documents uploaded successfully!',
              'success'
            )
          }
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


          alert("error")
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

    var id = 2

    $('#add_deal_structure_btn').on('click', function() {
      var clone = $('#deal_structure div.deal:eq(0)').clone().find("input").val("").end();
      clone.find('[id]').each(function(i, c) {
        $(c).attr('id', $(c).attr('id') + id);
        $(c).attr('placeholder', $(c).attr('placeholder'));
      });
      clone.attr("id", id);
      $('#deal_structure').append(clone)
      id++;
    });

$("body").on("focus", ".datepicker", function (e) {
  $(this).datepicker({ 
  }).datepicker;
});


    $('#add_director_structure_btn').on('click', function() {
      var clone = $('#director_structure div.deal:eq(0)').clone(true).find("input").val("").end();
      clone.find('[id]').each(function(i, c) {
        $(c).attr('id', $(c).attr('id') + i);
        $(c).attr('placeholder', $(c).attr('id'));
      });
      $('#director_structure').append(clone)
    });

    $('#remove_director_structure_btn').on('click', function() {
      if ($('#director_structure div.deal').length != 1)
        $('#director_structure div.deal:last').remove();
    });

    $('#remove_deal_structure_btn').on('click', function() {
      if ($('#deal_structure div.deal').length != 1)
        $('#deal_structure div.deal:last').remove();
    });

    $("body").on("keyup", ".price_per_seat", function() {
      console.log($(this)[0].outerHTML)
      var parentID = $(this).parent().parent().parent().attr("id");
      net_total = $(".no_of_seats").val() * $(this).val()
      $("#" + parentID + " .net_total_monthly").val(net_total)
      $("#" + parentID + " .annual_total_monthly").val(net_total * 12)
    })

    $("body").on("keyup", ".no_of_months", function() {
      // console.log($(this).val())

      var net_total_monthly = $('input[name="net_total[]"]').map(function() {
        return this.value;
      }).get()
      var net_total_annually = $('input[name="annual_net_total[]"]').map(function() {
        return this.value;
      }).get()

      var total_after_discount = 0

      for (i = 0; i < net_total_monthly.length; i++) {
        total_after_discount += net_total_annually[i] - net_total_monthly[i] * $(this).val();
      }

      $(".after_discount").val(total_after_discount)


      // total_after_discount = $(".after_discount").val($(".annual_total_monthly").val()- $(".net_total_monthly").val()*$(this).val())
      // console.log(total_after_discount)
    })

    $("body").on("keyup", ".deposits_in_month", function() {
      deposit_amount = $(this).val() * $(".net_total_monthly").val()
      $(".deposit_amount").val(deposit_amount)

      balance = $(".annual_total_monthly").val() - $(".advance_rent").val()
    })

  })
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#file-input').on('change', function() { //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {

        var data = $(this)[0].files; //this file data

        $.each(data, function(index, file) { //loop though each file
          if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
            var fRead = new FileReader(); //new filereader
            fRead.onload = (function(file) { //trigger function on successful read
              return function(e) {
                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                $('#thumb-output').append(img); //append image to output element
              };
            })(file);
            fRead.readAsDataURL(file); //URL representing the file's data.
          }
        });

      } else {
        alert("Your browser doesn't support File API!"); //if File API is absent
      }
    });

    $(".remove").click(function(e) {
      e.preventDefault();
      data.splice(0, 1);
      $('#thumb-output a').eq(data.length).remove();
    });
  });
</script>

<script>
  var datepicker1 = new ej.calendars.DatePicker({});
  var datepicker2 = new ej.calendars.DatePicker({});
  var datepicker4 = new ej.calendars.DatePicker({});
  datepicker1.appendTo('#start_date');
  datepicker2.appendTo('#end_date');
  datepicker3.appendTo('#date_of_incorporation');
  datepicker4.appendTo('input[name="deposits_received_date[]"]');
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#file-input1').on('change', function() { //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {

        var data = $(this)[0].files; //this file data

        $.each(data, function(index, file) { //loop though each file
          if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
            var fRead = new FileReader(); //new filereader
            fRead.onload = (function(file) { //trigger function on successful read
              return function(e) {
                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                $('#thumb-output1').append(img); //append image to output element
              };
            })(file);
            fRead.readAsDataURL(file); //URL representing the file's data.
          }
        });

      } else {
        alert("Your browser doesn't support File API!"); //if File API is absent
      }
    });

    $(".remove").click(function(e) {
      e.preventDefault();
      data.splice(0, 1);
      $('#thumb-output1 a').eq(data.length).remove();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#file-input2').on('change', function() { //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {

        var data = $(this)[0].files; //this file data

        $.each(data, function(index, file) { //loop though each file
          if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
            var fRead = new FileReader(); //new filereader
            fRead.onload = (function(file) { //trigger function on successful read
              return function(e) {
                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                $('#thumb-output2').append(img); //append image to output element
              };
            })(file);
            fRead.readAsDataURL(file); //URL representing the file's data.
          }
        });

      } else {
        alert("Your browser doesn't support File API!"); //if File API is absent
      }
    });

    $(".remove").click(function(e) {
      e.preventDefault();
      data.splice(0, 1);
      $('#thumb-output2 a').eq(data.length).remove();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#file-input3').on('change', function() { //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {

        var data = $(this)[0].files; //this file data

        $.each(data, function(index, file) { //loop though each file
          if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
            var fRead = new FileReader(); //new filereader
            fRead.onload = (function(file) { //trigger function on successful read
              return function(e) {
                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                $('#thumb-output3').append(img); //append image to output element
              };
            })(file);
            fRead.readAsDataURL(file); //URL representing the file's data.
          }
        });

      } else {
        alert("Your browser doesn't support File API!"); //if File API is absent
      }
    });

    $(".remove").click(function(e) {
      e.preventDefault();
      data.splice(0, 1);
      $('#thumb-output3 a').eq(data.length).remove();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#file-input4').on('change', function() { //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {

        var data = $(this)[0].files; //this file data

        $.each(data, function(index, file) { //loop though each file
          if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
            var fRead = new FileReader(); //new filereader
            fRead.onload = (function(file) { //trigger function on successful read
              return function(e) {
                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                $('#thumb-output4').append(img); //append image to output element
              };
            })(file);
            fRead.readAsDataURL(file); //URL representing the file's data.
          }
        });

      } else {
        alert("Your browser doesn't support File API!"); //if File API is absent
      }
    });

    $(".remove").click(function(e) {
      e.preventDefault();
      data.splice(0, 1);
      $('#thumb-output4 a').eq(data.length).remove();
    });
  });

  updateList = function() {
    var input = document.getElementById('file-input4');
    var output = document.getElementById('file_name');
    var children = "";
    for (var i = 0; i < input.files.length; ++i) {
      children += '' + input.files.item(i).name + '';
    }
    output.innerHTML = children;


  }
</script>
@include('includes/footer_end')
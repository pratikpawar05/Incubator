@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
     .busines_data1{
        font-size: 1.9em;
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
                <h4 class="page-title busines_data1">&nbsp;&nbsp;<i class="dripicons-blog"></i>ADD EXPENSE</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
</div>
</div>

 <div class="wrapper">
 	<div class="container-fluid">

    <form id="row_1" class="form" >
        <!-- <h3 class="busines_data1" style="color:white;">ADD EXPENSE</h3> -->
        <!-- Row 0 -->
        <div class="row" >
            <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6">
                <div class="page-header number-info mt-4 number-center">
                    <!-- <h4>Create Expenses List</h4> -->
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6">
                <div class="row" style="float: right">
                    <div class="form-group">
                        <label style="color: white;" class="select">Month:</label>
                        <select name="month" class="form-control" required="required">
                            <option value="">--Select The Month --</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="color: white;" class="select">Year:</label>
                        <select name="year" class="form-control" required="required">
                            <option value="">--Select The Year --</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>




        <!-- Row 1 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%;">
            <div class="col-sm-7 col-sm-offset-3" style="background-color:white;padding: 1%;border-radius: 25px;">
                <h5><u>Salaries & Fixed Expenses</u></h5>
                <div class="row">
                    <div class=" form-group col-sm-3">
                        <label class="control-label">Salary</label>
                        <input type="text" id="row_1_val_1" name="salaries" class="form-control" placeholder="Enter Salaries Expense">
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Marketting</label>
                        <div>
                            <input type="text" id="row_1_val_2" name="marketing" class="form-control" placeholder="Enter Marketing Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Tech</label>
                        <div>
                            <input type="text" id="row_1_val_3" name="tech" class="form-control" placeholder="Enter Tech Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input placeholder="0" readonly type="number" class="form-control" value="0" name="fixed_total" id="row_1_total" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Row 2 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">
            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px;">
                <h5><u>Cafe Materials</u></h5>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">CCD</label>
                        <input type="number" id="row_2_val_1" name="ccd_materials" class="form-control" placeholder="Enter CCD Expense">
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Pantry Materials</label>
                        <div>
                            <input type="number" id="row_2_val_2" name="pantry_materials" class="form-control" placeholder="Enter Pantry Materials  Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input readonly class="form-control" type="number" value="0" name="cafe_total" id="row_2_total">
                            <!-- <input type="text" class="form-control" id="text" placeholder="0" readonly> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">
            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px;">
                <h5><u>Travel, Hotel & Conveyance</u></h5>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">Travel</label>
                        <!-- <input type="text" class="form-control" id="text" placeholder="Enter Salary"> -->
                        <input type="text" id="row_3_val_1" name="travel" class="form-control" placeholder="Enter Travel Expense">
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Conveyance</label>
                        <div>
                            <input type="text" id="row_3_val_2" name="conveyance" class="form-control" placeholder="Enter Conveyance Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Stay</label>
                        <div>
                            <input type="text" id="row_3_val_3" name="stay" class="form-control" placeholder="Enter Stay Expense"> </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input placeholder="0" readonly type="number" value="0" name="travel_hotel_conveyance_total" class="form-control" id="row_3_total">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 4 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">
            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px;">
                <h5><u>Additional Marketing </u></h5>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">Google</label>
                        <input type="number" id="row_4_val_1" name="google_ads" class="form-control" placeholder="Enter Google Ads Expense">
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Facebok</label>
                        <div>
                            <input type="number" id="row_4_val_2" name="facebook_ads" class="form-control" placeholder="Enter Facebook Ads Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Collaterals</label>
                        <div>
                            <input type="number" id="row_4_val_3" name="collaterals" class="form-control" placeholder="Enter Collaterals Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input readonly class="form-control" type="number" value="0" name="marketing_total" id="row_4_total">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 5 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">
            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px;">
                <h5><u>Events & Refreshments</u></h5>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">Entertainment</label>
                        <div>
                            <input type="number" id="row_5_val_1" name="entertainment" class="form-control" placeholder="Enter Entertainment Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Event</label>
                        <div>
                            <input type="number" id="row_5_val_2" name="event" class="form-control" placeholder="Enter Event Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Gifting</label>
                        <div>
                            <input type="number" id="row_5_val_3" name="gifting" class="form-control" placeholder="Enter Gifting Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input readonly class="form-control" type="number" value="0" name="events_total" id="row_5_total">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 6 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">
            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px;">
                <h5><u>Electricity,Water bill, Internet & Commission</u></h5>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">Electricity</label>
                        <!-- <input type="text" class="form-control" id="text" placeholder="Enter Salary"> -->
                        <div>
                            <input type="number" id="col_1_val" name="electricity" class="form-control" placeholder="Enter Electricity, UPS & Generator Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Water</label>
                        <div>
                            <input type="number" id="col_2_val" name="water_bills" class="form-control" placeholder="Enter Water Bills Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Internet</label>
                        <div>
                            <input type="number" id="col_3_val" name="internet_charge" class="form-control" placeholder="Enter Internet charges Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">commission</label>
                        <div>
                            <input type="number" id="col_5_val" name="commission" class="form-control" placeholder="Enter Brokerage/Commission Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input type="number" class="form-control" id="combine" placeholder="0" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 7 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">

            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px;">
                <h5><u>Misc Expenenses</u></h5>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">Rental for Cable</label>
                        <div>
                            <input type="number" type="number" id="row_6_val_1" name="internet_cable_rent" class="form-control" placeholder="Enter Society Rental for Internet Cable Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Pest Control Monthly</label>
                        <div>

                            <input type="number" id="row_6_val_2" name="pest_control_monthly" class="form-control" placeholder="Enter Pest Control Monthly Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Room Booking License</label>
                        <div>
                            <input type="number" id="row_6_val_3" name="meeting_room_booking_license" class="form-control" placeholder="Enter Meeting Room Booking License Expense">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">

            </div>

            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px; margin-top: 20px;">
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">Stationary</label>
                        <div>

                            <input type="number" id="row_6_val_4" name="stationery" class="form-control" placeholder="Enter Stationery Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Employee_health</label>
                        <div>
                            <input type="number" id="row_6_val_5" name="employee_health" class="form-control" placeholder="Enter Employee Health Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">fixtures</label>
                        <div>
                            <input type="number" id="row_6_val_6" name="fixtures_fittings" class="form-control" placeholder="Enter  Fixtures & Fittings Expense">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input readonly type="number" value="0" class="form-control" name="misc_total" id="row_6_total">
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- row 8 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">
            <div class="col-sm-push-3 col-sm-6 col-md-6 col-lg-6" style="    background-color: white;
    padding: 1%;
    border-radius: 25px;">
                <h5><u>Additional Details:</u></h5>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="control-label">House Keeping</label>
                        <!-- <input type="text" class="form-control" id="text" placeholder="Enter Salary"> -->
                        <div>
                            <input type="number" id="row7_col1" name="house_keeping" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Generator</label>
                        <div>
                            <input type="number" id="row7_col2" name="generator" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="control-label">Total</label>
                        <div>
                            <input type="number" class="form-control" id="additional_details" name="additional_total" placeholder="0" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Row 8 -->
        <div class="row" id='ro' style="border: 1px solid #305881; border-radius: 5px; background-color: #dfdfe5; padding: 1%; margin-top: 2%">
            <hr>
            <label class="col-sm-6">Grand Total:</label>
            <input readonly type="number" name="total" value="0" class="form-control col-sm-6 text-center" id="grand_total">
            <hr>
        </div>
        <br>
        <div class="row">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>

    </form>

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


	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>


<script>
    $("#row_1").keyup(function() {
        var row1 = 0,
            row2 = 0,
            row3 = 0,
            row4 = 0,
            row5 = 0,
            row6 = 0;
            row7=0;
        var combine = 0,
            col4 = 0,
            col5 = 0;
        var grand_total1 = 0;

        // $("#row_1_val_1").on('change',function(e){
        //      $("#row_1_total").val(Number($("#row_1_val_1").val())+Number($("#row_1_total").val()));
        // });
        //  $("#row_1_val_2").on('change',function(e){
        //      $("#row_1_total").val(Number($("#row_1_val_2").val())+Number($("#row_1_total").val()));
        // });
        // $("#row_1_val_3").on('change',function(e){
        //      $("#row_1_total").val(Number($("#row_1_val_3").val())+Number($("#row_1_total").val()));
        // });

        var row1 = row1 + parseInt($("#row_1_val_1").val()) + parseInt($("#row_1_val_2").val()) + parseInt($("#row_1_val_3").val());
       // alert(row1)
        $("#row_1_total").val(row1);
        var row2 = row2 + parseInt($("#row_2_val_1").val()) + parseInt($("#row_2_val_2").val());
        $("#row_2_total").attr('value', row2);
        var row3 = row3 + parseInt($("#row_3_val_1").val()) + parseInt($("#row_3_val_2").val()) + parseInt($("#row_3_val_3").val());
        combine = combine + parseInt($("#col_1_val").val()) + parseInt($("#col_2_val").val()) + parseInt($("#col_3_val").val()) + parseInt($("#col_5_val").val());
        $("#combine").attr('value', combine)
        $("#row_3_total").attr('value', row3);
        var row4 = row4 + parseInt($("#row_4_val_1").val()) + parseInt($("#row_4_val_2").val()) + parseInt($("#row_4_val_3").val());
        // var col4 = parseInt($("#col_4_val").val());
        // $("#col_4_total").attr('value', col4);
        $("#row_4_total").attr('value', row4);
        var row5 = row5 + parseInt($("#row_5_val_1").val()) + parseInt($("#row_5_val_2").val()) + parseInt($("#row_5_val_3").val());
        $("#row_5_total").attr('value', row5);

        var row6 = row6 + parseInt($("#row_6_val_1").val()) + parseInt($("#row_6_val_2").val()) + parseInt($("#row_6_val_3").val()) + parseInt($("#row_6_val_4").val()) + parseInt($("#row_6_val_5").val()) + parseInt($("#row_6_val_6").val());
        $("#row_6_total").attr('value', row6);

        var row7 = row7 + parseInt($("#row7_col1").val()) + parseInt($("#row7_col2").val());
        $("#additional_details").attr('value', row7);

        var grand_total1 = grand_total1 + row1 + row2 + row3 + row4 + row5 + row6 + row7 + combine + col5;
        $("#grand_total").attr('value', grand_total1);
    });
</script>

<script type="text/javascript">
    $(function() {

        $("#row_1").on("submit", function(e) {
            e.preventDefault()
            if ($("select[name='year']").val() == "" || $("select[name='month']").val() == "")
                alert("Enter month and year")
            else {
                $.ajax({
                    url: '{{url("/store-expense/0")}}',
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

                        swal(
                            'Success',
                            'Expense Added <b style="color:green;">successfully</b>!',
                            'success'
                        ).then(e=>{ window.location.href = "/expense/index/";}).catch(e=>{});


                    }

                        if (obj.status == "Expense already exists!") {
                        //     swal(
                        //     'Warning',
                        //     'This Expense Report already exists </b>!',
                        //     'Warning'
                        // ).then(e=>{ window.location.href = "/expense/index/";}).catch(e=>{});

                        swal({
                        // title: "",
                        text: "This Expense Report already exists!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "ok",
                        closeOnConfirm: false
                        },
                        function(){
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        });
                            
                        }

                        // window.location.href = "/memberDetails";
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
            }
        })


    })
</script>


@include('includes/footer_end')
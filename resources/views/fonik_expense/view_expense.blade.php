@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@include('includes/header_end')

<div class="container-fluid" style="padding: 2% ;color: "#ffffff">
    <div class="row">
        <h3>View Expense</h3>
    </div>
    <form id="row_1" class="form" style="padding: 2%; border-radius: 5px;">
        <!-- Row 0 -->
        <div class="row">
            <div class="col-sm-8 col-xs-8 col-lg-8 col-md-8">
                <div class="page-header number-info mt-4 number-center">
                    <h3>Create Expenses List</h3>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4">
                <div class="form-group">
                    <label>Month & Year</label>
                    <input readonly type="month" value="{{ $key->date }}" name="date" class="form-control" placeholder="Enter The Month & Year Respectively">
                </div>
            </div>
        </div>

        
        <hr>
        <br>
        <!-- Row 1 -->
        <div class="row" id='ro'>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Salaries & Fixed Expenses</h3>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Electricity, UPS & Generator etc</h3>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Salaries Expense</label>
                    <input readonly value="{{ $key->salaries }}" type="number" id="row_1_val_1" pattern="[0-9]" name="salaries" class="form-control" placeholder="Enter Salaries Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Marketing Expense</label>
                    <input readonly value="{{ $key->marketing }}" type="number" id="row_1_val_2" name="marketing" class="form-control" placeholder="Enter Marketing Expense">
                </div>
            </div>

            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Tech Expense</label>
                    <input readonly value="{{ $key->tech }}" type="number" id="row_1_val_3" name="tech" class="form-control" placeholder="Enter Tech Expense">
                </div>
            </div>
            <hr>
            
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Expenses:</label>
                    <input readonly value="{{ $key->electricity }}" type="number" id="col_1_val" name="electricity" class="form-control" placeholder="Enter Electricity, UPS & Generator Expense">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total:</label>
                <input readonly value="{{ $key->fixed_total }}" type="number" value="0" name="fixed_total" style="float:right;" id="row_1_total" />
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->electricity }}" type="number" value="0" style="float:right" ; id="col_1_total"></label>
                <hr>
            </div>
        </div>

        <br>

        <!-- Row 2 -->
        <div class="row" id='row_2'>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Cafe Materials</h3>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Water Bills</h3>
            </div>
            <div class="col-sm-6 col-xs-3 col-lg-3">
                <div class="form-group">
                    <label class="label label-primary">CCD Expenses</label>
                    <input readonly value="{{ $key->ccd_materials }}" type="number" id="row_2_val_1" name="ccd_materials" class="form-control" placeholder="Enter CCD Expense">
                </div>
            </div>
            <div class="col-sm-6 col-xs-3 col-lg-3">
                <div class="form-group">
                    <label class="label label-primary">Pantry Materials Expenses</label>
                    <input readonly value="{{ $key->pantry_materials }}" type="number" id="row_2_val_2" name="pantry_materials" class="form-control" placeholder="Enter Pantry Materials  Expense">
                </div>
            </div>

            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Enter Expenses</label>
                    <input readonly value="{{ $key->water_bills }}" type="number" id="col_2_val" name="water_bills" class="form-control" placeholder="Enter Water Bills Expense">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->cafe_total }}" type="number" value="0" name="cafe_total" style="float:right;" id="row_2_total">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->water_bills }}" type="number" value="0" style="float:right;" id="col_2_total">
                <hr>
            </div>
        </div>
        <br>

        <!-- Row 3 -->
        <div class="row" id='row_3'>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Travel, Hotel & Conveyance</h3>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">

                <h3>Internet charge (Pre-Paid Quarterly)</h3>
            </div>

            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Travel Expense</label>
                    <input readonly value="{{ $key->travel }}" type="number" id="row_3_val_1" name="travel" class="form-control" placeholder="Enter Travel Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">ConveyanceExpense</label>
                    <input readonly value="{{ $key->conveyance }}" type="number" id="row_3_val_2" name="conveyance" class="form-control" placeholder="Enter Conveyance Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Stay Expense</label>
                    <input readonly value="{{ $key->stay }}" type="number" id="row_3_val_3" name="stay" class="form-control" placeholder="Enter Stay Expense">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Enter Expenses</label>
                    <input readonly value="{{ $key->internet_charge }}" type="number" id="col_3_val" name="internet_charge" class="form-control" placeholder="Enter Internet charges Expense">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->travel_hotel_conveyance_total }}" type="number" value="0" name="travel_hotel_conveyance_total" style="float:right;" id="row_3_total">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->internet_charge }}" type="number" value="0" style="float:right;" id="col_3_total">
                <hr>
            </div>
        </div>
        <br>


        <!-- Row 4 -->
        <div class="row" id=''>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Additional Marketing</h3>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Brokerage/Commission</h3>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Google Ad Expenses</label>
                    <input readonly value="{{ $key->google_ads }}" type="number" id="row_4_val_1" name="google_ads" class="form-control" placeholder="Enter Google Ads Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Facebok Ad Expnese</label>
                    <input readonly value="{{ $key->facebook_ads }}" type="number" id="row_4_val_2" name="facebook_ads" class="form-control" placeholder="Enter Google Ads Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Collaterals Expenses</label>
                    <input readonly value="{{ $key->collaterals }}" type="number" id="row_4_val_3" name="collaterals" class="form-control" placeholder="Enter Collaterals Expense">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">

                <div class="form-group">
                    <label class="label label-primary">Enter Expenses</label>
                    <input readonly value="{{ $key->commission }}" type="number" id="col_5_val" name="commission" class="form-control" placeholder="Enter Brokerage/Commission Expense">
                </div>

            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->marketing_total }}" type="number" value="0" name="marketing_total" style="float:right;" id="row_4_total">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->commission }}" type="number" value="0" style="float:right;" id="col_5_total">
                <hr>
            </div>
        </div>
        <br>

        <!-- Row 5 -->
        <div class="row" id='row_5'>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Events & Refreshments</h3>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <h3>Misc Expenenses </h3>
            </div>
            <div class="col-sm-3 col-xs-3 col-lg-3">
                <div class="form-group">
                    <label class="label label-primary">Entertainment Expenses</label>
                    <input readonly value="{{ $key->entertainment }}" type="number" id="row_5_val_1" name="entertainment" class="form-control" placeholder="Enter Entertainment Expense">
                </div>
            </div>

            <div class="col-sm-3 col-xs-3 col-lg-3">
                <div class="form-group">
                    <label class="label label-primary"> Event Expenses</label>
                    <input readonly value="{{ $key->event }}" type="number" id="row_5_val_2" name="event" class="form-control" placeholder="Enter Event Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Internet Expenses</label>
                    <input readonly value="{{ $key->internet_cable_rent }}" type="number" id="row_6_val_1" name="internet_cable_rent" class="form-control" placeholder="Enter Society Rental for Internet Cable Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Pest Control</label>
                    <input readonly value="{{ $key->pest_control_monthly }}" type="number" id="row_6_val_2" name="pest_control_monthly" class="form-control" placeholder="Enter Pest Control Monthly Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">License Expenses</label>
                    <input readonly value="{{ $key->meeting_room_booking_license }}" type="number" id="row_6_val_3" name="meeting_room_booking_license" class="form-control" placeholder="Enter Meeting Room Booking License Expense">
                </div>
            </div>

            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Gifting Expenses</label>
                    <input readonly value="{{ $key->gifting }}" type="number" id="row_5_val_3" name="gifting" class="form-control" placeholder="Enter Gifting Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">

                <div class="form-group">
                    <label class="label label-primary"> Stationery Expenses</label>
                    <input readonly value="{{ $key->stationery }}" type="number" id="row_6_val_4" name="stationery" class="form-control" placeholder="Enter Stationery Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Emp Health Expense</label>
                    <input readonly value="{{ $key->employee_health }}" type="number" id="row_6_val_5" name="employee_health" class="form-control" placeholder="Enter Employee Health Expense">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Fix&Fit Expenses</label>
                    <input readonly value="{{ $key->fixtures_fittings }}" type="number" id="row_6_val_6" name="fixtures_fittings" class="form-control" placeholder="Enter  Fixtures & Fittings Expense">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->events_total }}" type="number" value="0" name="events_total" style="float:right;" id="row_5_total">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly value="{{ $key->misc_total }}" type="number" value="0" name="misc_total" style="float:right;" id="row_6_total">
                <hr>
            </div>
        </div>
        <hr>
        <label>Grand Total:</label>
        <input readonly value="{{ $key->total }}" type="number" name="total" value="0" style="float:right;" id="grand_total">
        <hr>
    </form>
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




@include('includes/footer_end')
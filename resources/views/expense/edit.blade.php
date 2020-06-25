@extends('layouts.admin')


@section('content')
<div class="container-fluid" style="padding: 2%">
    <div class="row">
        <h3>Add Expense</h3>
    </div>

    <form id="row_1" class="form" style="background-color: #305881; color: #fff; padding: 2%; border-radius: 5px;">

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
                    <input type="month" name="date" class="form-control" placeholder="Enter The Month & Year Respectively" value="{{$record->date}}">
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
                    <input type="number" id="row_1_val_1" pattern="[0-9]" name="salaries" class="form-control" placeholder="Enter Salaries Expense" value="{{$record->salaries}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Marketing Expense</label>
                    <input type="number" id="row_1_val_2" name="marketing" class="form-control" placeholder="Enter Marketing Expense" value="{{$record->marketing}}">
                </div>
            </div>

            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Tech Expense</label>
                    <input type="number" id="row_1_val_3" name="tech" class="form-control" placeholder="Enter Tech Expense" value="{{$record->tech}}">
                </div>
            </div>
            <hr>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Expenses:</label>
                    <input type="number" id="col_1_val" name="electricity" class="form-control" placeholder="Enter Electricity, UPS & Generator Expense" value="{{$record->electricity}}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total:</label>
                <input readonly type="number" name="fixed_total" style="float:right;" id="row_1_total"  value="{{$record->fixed_total}}"/>
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" value="{{$record->electricity}}" style="float:right" ; id="col_1_total"></label>
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
                    <input type="number" id="row_2_val_1" name="ccd_materials" class="form-control" placeholder="Enter CCD Expense" value="{{$record->ccd_materials}}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-3 col-lg-3">
                <div class="form-group">
                    <label class="label label-primary">Pantry Materials Expenses</label>
                    <input type="number" id="row_2_val_2" name="pantry_materials" class="form-control" placeholder="Enter Pantry Materials  Expense" value="{{$record->pantry_materials}}">
                </div>
            </div>

            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Enter Expenses</label>
                    <input type="number" id="col_2_val" name="water_bills" class="form-control" placeholder="Enter Water Bills Expense" value="{{$record->water_bills}}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" value="{{$record->cafe_total}}" name="cafe_total" style="float:right;" id="row_2_total">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" value="{{$record->water_bills}}" style="float:right;" id="col_2_total">
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
                    <label class="label label-primary">Travel Expenses</label>
                    <input type="number" id="row_3_val_1" name="travel" class="form-control" placeholder="Enter Travel Expense" value="{{$record->travel}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Conveyance Expense</label>
                    <input type="number" id="row_3_val_2" name="conveyance" class="form-control" placeholder="Enter Conveyance Expense" value="{{$record->conveyance}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Stay Expenses</label>
                    <input type="number" id="row_3_val_3" name="stay" class="form-control" placeholder="Enter Stay Expense" value="{{$record->stay}}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Enter Expenses</label>
                    <input type="number" id="col_3_val" name="internet_charge" class="form-control" placeholder="Enter Internet charges Expense" value="{{$record->internet_charge}}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" value="{{$record->travel_hotel_conveyance_total}}" name="travel_hotel_conveyance_total" style="float:right;" id="row_3_total">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" value="{{$record->internet_charge}}" style="float:right;" id="col_3_total">
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
                    <label class="label label-primary">Google Ads Expenses</label>
                    <input type="number" id="row_4_val_1" name="google_ads" class="form-control" placeholder="Enter Google Ads Expense" value="{{$record->google_ads}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Facebok Ad Expnese</label>
                    <input type="number" id="row_4_val_2" name="facebook_ads" class="form-control" placeholder="Enter Google Ads Expense" value="{{$record->facebook_ads}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">Collaterals Expenses</label>
                    <input type="number" id="row_4_val_3" name="collaterals" class="form-control" placeholder="Enter Collaterals Expense" value="{{$record->collaterals}}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">

                <div class="form-group">
                    <label class="label label-primary">Enter Expenses</label>
                    <input type="number" id="col_5_val" name="commission" class="form-control" placeholder="Enter Brokerage/Commission Expense" value="{{$record->commission}}">
                </div>

            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" name="marketing_total" style="float:right;" id="row_4_total" value="{{$record->marketing_total}}">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" value="{{$record->commission}}" style="float:right;" id="col_5_total">
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
                    <input type="number" id="row_5_val_1" name="entertainment" class="form-control" placeholder="Enter Entertainment Expense" value="{{$record->entertainment}}">
                </div>
            </div>

            <div class="col-sm-3 col-xs-3 col-lg-3">
                <div class="form-group">
                    <label class="label label-primary"> Event Expenses</label>
                    <input type="number" id="row_5_val_2" name="event" class="form-control" placeholder="Enter Event Expense" value="{{$record->event}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Internet Expenses</label>
                    <input type="number" id="row_6_val_1" name="internet_cable_rent" class="form-control" placeholder="Enter Society Rental for Internet Cable Expense" value="{{$record->internet_cable_rent}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Pest Control</label>
                    <input type="number" id="row_6_val_2" name="pest_control_monthly" class="form-control" placeholder="Enter Pest Control Monthly Expense" value="{{$record->pest_control_monthly}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary">License Expenses</label>
                    <input type="number" id="row_6_val_3" name="meeting_room_booking_license" class="form-control" placeholder="Enter Meeting Room Booking License Expense" value="{{$record->meeting_room_booking_license}}">
                </div>
            </div>

            <div class="col-sm-6 col-xs-6 col-lg-6">
                <div class="form-group">
                    <label class="label label-primary">Gifting Expenses</label>
                    <input type="number" id="row_5_val_3" name="gifting" class="form-control" placeholder="Enter Gifting Expense" value="{{$record->gifting}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">

                <div class="form-group">
                    <label class="label label-primary"> Stationery Expenses</label>
                    <input type="number" id="row_6_val_4" name="stationery" class="form-control" placeholder="Enter Stationery Expense" value="{{$record->stationery}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Emp Health Expense</label>
                    <input type="number" id="row_6_val_5" name="employee_health" class="form-control" placeholder="Enter Employee Health Expense" value="{{$record->employee_health}}">
                </div>
            </div>
            <div class="col-sm-2 col-xs-2 col-lg-2">
                <div class="form-group">
                    <label class="label label-primary"> Fix & Fit Expenses</label>
                    <input type="number" id="row_6_val_6" name="fixtures_fittings" class="form-control" placeholder="Enter  Fixtures & Fittings Expense" value="{{$record->fixtures_fittings}}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" name="events_total" style="float:right;" id="row_5_total" value="{{$record->events_total}}">
                <hr>
            </div>
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <hr>
                <label>Total</label>
                <input readonly type="number" value="{{$record->misc_total}}" name="misc_total" style="float:right;" id="row_6_total">
                <hr>
            </div>
        </div>
        <hr>
        <label>Grand Total:</label>
        <input readonly type="number" name="total" value="0" style="float:right;" id="grand_total">
        <hr>
        <button type="submit" class="btn btn-success mt-3 mb-5 ">Submit</button>
    </form>
</div>
<script>
    $("#row_1").keyup(function() {
        var row1 = 0,
            row2 = 0,
            row3 = 0,
            row4 = 0,
            row5 = 0,
            row6 = 0;
        var col1 = 0,
            col2 = 0,
            col3 = 0,
            col4 = 0,
            col5 = 0;
        var grand_total1 = 0
        var row1 = row1 + parseInt($("#row_1_val_1").val()) + parseInt($("#row_1_val_2").val()) + parseInt($("#row_1_val_3").val());
        var col1 = parseInt($("#col_1_val").val());
        $("#col_1_total").attr('value', col1);
        $("#row_1_total").attr('value', row1);
        var row2 = row2 + parseInt($("#row_2_val_1").val()) + parseInt($("#row_2_val_2").val());
        var col2 = parseInt($("#col_2_val").val());
        $("#col_2_total").attr('value', col2);
        $("#row_2_total").attr('value', row2);
        var row3 = row3 + parseInt($("#row_3_val_1").val()) + parseInt($("#row_3_val_2").val()) + parseInt($("#row_3_val_3").val());
        var col3 = parseInt($("#col_3_val").val());
        $("#col_3_total").attr('value', col3);
        $("#row_3_total").attr('value', row3);
        var row4 = row4 + parseInt($("#row_4_val_1").val()) + parseInt($("#row_4_val_2").val()) + parseInt($("#row_4_val_3").val());
        // var col4 = parseInt($("#col_4_val").val());
        // $("#col_4_total").attr('value', col4);
        $("#row_4_total").attr('value', row4);
        var row5 = row5 + parseInt($("#row_5_val_1").val()) + parseInt($("#row_5_val_2").val()) + parseInt($("#row_5_val_3").val());
        var col5 = parseInt($("#col_5_val").val());
        $("#col_5_total").attr('value', col5);
        $("#row_5_total").attr('value', row5);
        var row6 = row6 + parseInt($("#row_6_val_1").val()) + parseInt($("#row_6_val_2").val()) + parseInt($("#row_6_val_3").val()) + parseInt($("#row_6_val_4").val()) + parseInt($("#row_6_val_5").val()) + parseInt($("#row_6_val_6").val());
        $("#row_6_total").attr('value', row6);
        var grand_total1 = grand_total1 + row1 + row2 + row3 + row4 + row5 + row6 + col1 + col2 + col3 + col5;
        $("#grand_total").attr('value', grand_total1);
    });
</script>

<script type="text/javascript">
    $(function() {

        $("#row_1").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: "/store-expense/{{$record->id}}",
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
              $('#loading_icon').show();
            },
            success: function(obj) {
              $(".alert-danger").remove();
              
              if(obj.status =="success") {

                swal(
                    'Success',
                    'Expense created <b style="color:green;">successfully</b>!',
                    'success'
                  )
            window.location.href = "/expense/index";


              }

              if(obj.status =="Expense already exists!") {
                swal(
                    'Warning',
                    'This Expense Report already exists!',
                    'warning'
                  )
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

@endsection
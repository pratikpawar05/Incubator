@extends('layouts.admin')
<style type="text/css">
	table, th, td {
		text-align: center;
	}
</style>
@section('content')
<div class="container">
      <div class="row" style="background-color: #305881; color: #fff; padding: 2%; border-radius: 10px;">
          <div class="col-sm-2">
            <div class="form-group">
              <label for="sel1">Month:</label>
              <select name="month" class="form-control" id="month" placeholder="Select">
                  <option value="">--Select--</option>
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
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="sel1">Year</label>

                <select name="year" class="form-control" id="year">
                      <option value="">--Select--</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                  </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
                <button style="margin-top:30px;" id="filter" class="btn btn-success">Filter</button>
              </div>
          </div>
        </div>

<h3 style="padding-top: 2%;" id="revenue_year_month">Revenue details on {{$year_month}}</h3>
<h5 class="pull-right"><b>Total Revenues: <span class="amount" id="revenue_total">{{$total_revenue}}</span></b></h5>
<hr style="margin-top: 50px;">
<table class="table table-bordered table-hover table-striped">
	<thead>
	<tr>
		<th>Sr. No.</th>
		<th>Company Name</th>
		<th>Revenue Type</th>
		<th>Invoice Amount</th>
		<th>Payment Status</th>
	</tr>
	</thead>
	@php ($sr_no = 1) @endphp
	<tbody id="revenue">
	@for ($i = 0; $i < count($company_name); $i++)
		<tr class="remove">
			<td>{{$sr_no}}</td>
			<td>{{$company_name[$i]}}</td>
			<td>{{$company_revenues[$i]['revenue_type']}}</td>
			<td class="amount">{{$company_revenues[$i]['invoice_amount']}}</td>
			<td>{{$company_revenues[$i]['payment_status']}}</td>
			@php ($sr_no++) @endphp
		</tr>
	@endfor
	@for ($i = 0; $i < count($additional_revenues); $i++)
		<tr class="remove">
			<td>{{$sr_no}}</td>
			<td>{{$additional_revenues[$i]->company_name}}</td>
			<td>{{$additional_revenues[$i]->revenue_type}}</td>
			<td class="amount">{{$additional_revenues[$i]->invoice_amt}}</td>
			<td>{{$additional_revenues[$i]->payment_status}}</td>
			@php ($sr_no++) @endphp
		</tr>
	@endfor
	</tbody>
</table>
<hr style="margin-top: 50px;">
<h3 style="padding-top: 2%;" id="expense_year_month">Expense details on {{$year_month}}</h3>
@if ($expense)
<h5 class="pull-right"><b>Total Expense: <span class="amount" id="expense_total">{{$expense->total}}</span></b></h5>
@endif
<hr style="margin-top: 50px;">
<table class="table table-bordered table-hover table-striped">
  <thead>
  <tr>
    <th>Sr. No.</th>
    <th>Salaries & Fixed Expenses</th>
    <th>Electricity, UPS & Generator etc</th>
    <th>Cafe Material</th>
    <th>Water Bills</th>
    <th>Travel, Hotel & Conveyance</th>
    <th>Internet Charge (Pre-Paid Quarterly)</th>
    <th>Additional Marketing</th>
    <th>Events & Refreshments</th>
    <th>Brokerage<br>/<br>Commission</th>
    <th>Misc Expenses</th>
  </tr>
  </thead>
  @if ($expense)
  <tbody id="expense">
    <tr class="remove">
      <td>1</td>
      <td class="amount">{{$expense->fixed_total}}</td>
      <td class="amount">{{$expense->electricity}}</td>
      <td class="amount">{{$expense->cafe_total}}</td>
      <td class="amount">{{$expense->water_bills}}</td>
      <td class="amount">{{$expense->travel_hotel_conveyance_total}}</td>
      <td class="amount">{{$expense->internet_charge}}</td>
      <td class="amount">{{$expense->marketing_total}}</td>
      <td class="amount">{{$expense->events_total}}</td>
      <td class="amount">{{$expense->commission}}</td>
      <td class="amount">{{$expense->misc_total}}</td>
    </tr>
  </tbody>
</table>
  @else
    <b style="color: red;"><h5>No records found!</h5></b>
  @endif
</div>


<script type="text/javascript">
    $("#filter").on("click", function(e) {
      e.preventDefault()
      var label = $("select[name='year']").val() + "-" + $("select[name='month']").val();
      $.ajax({
        url: "/bar-click/"+label+"/1",
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'GET',
        type: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {

        	$("#revenue_year_month").text("Revenue details on "+obj.year_month)
        	$("#revenue_total").text(obj.total_revenue)

        	var sr_no = 1
        	$(".remove").remove()
        	$.each(obj.company_name, function(index) {
        	$("#revenue").append('<tr class="remove"><td>'+sr_no+'</td><td>'+obj.company_name[index]+'</td><td>'+obj.company_revenues[index]["revenue_type"]+'</td><td class="amount">'+obj.company_revenues[index]["invoice_amount"]+'</td><td>'+obj.company_revenues[index]["payment_status"]+'</td></tr>')
        	sr_no++
        	})

        	$.each(obj.additional_revenues, function(index) {
        	$("#revenue").append('<tr class="remove"><td>'+sr_no+'</td><td>'+obj.additional_revenues[index]["company_name"]+'</td><td>'+obj.additional_revenues[index]["revenue_type"]+'</td><td class="amount">'+obj.additional_revenues[index]["invoice_amt"]+'</td><td>'+obj.additional_revenues[index]["payment_status"]+'</td></tr>')
        	sr_no++
        	})

          $("#expense_year_month").text("Expense details on "+obj.year_month)
          $("#expense_total").text(obj.expense['total'])
          $("#expense").append("<tr><td>1</td><td class='amount'>"+obj.expense['fixed_total']+"</td><td class='amount'>"+obj.expense['electricity']+"</td><td class='amount'>"+obj.expense['cafe_total']+"</td><td class='amount'>"+obj.expense['water_bills']+"</td><td class='amount'>"+obj.expense['travel_hotel_conveyance_total']+"</td><td class='amount'>"+obj.expense['internet_charge']+"</td><td class='amount'>"+obj.expense['marketing_total']+"</td><td class='amount'>"+obj.expense['events_total']+"</td><td class='amount'>"+obj.expense['commission']+"</td><td class='amount'>"+obj.expense['misc_total']+"</td></tr>")

        $('.amount').each(function() { 
            var monetary_value = $(this).text(); 
            var i = new Intl.NumberFormat("en-IN").format(monetary_value);
            $(this).text(i); 
        }); 


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
        },
        complete: function() {
          $('#loading_icon').hide();
        }
      })
    })

</script>




<script type="text/javascript">
        $('.amount').each(function() { 
            var monetary_value = $(this).text(); 
            var i = new Intl.NumberFormat("en-IN").format(monetary_value);
            $(this).text(i); 
        }); 

</script>


@endsection
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
</div>

<script type="text/javascript">
        $('.amount').each(function() { 
            var monetary_value = $(this).text(); 
            var i = new Intl.NumberFormat("en-IN").format(monetary_value);
            $(this).text(i); 
        }); 

</script>


@endsection
<script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js"></script>
<link href="https://cdn.syncfusion.com/ej2/material.css" rel="stylesheet">
@extends('layouts.admin')

@section('content')
<div class="container">
  <div id="loading_icon" style="display: none;">
  </div>
  <div class="col-lg-12 col-md-12">
    <div class="page-header">
      <h3>Company Details</h3>
    </div>
  </div>

<!--   <div class="errors">
  </div> -->
</div>
  <div class="row">
    <div class="text-justify col-lg-3 col-sm-3 col-md-3">
      <div class="visible-xs-block">
      </div>
    </div>

    <!-- Main Content --> 
    <div class="col-xs-12 col-lg-8 col-sm-8 col-md-8">
      <div class="errors">
      </div>
      <form id="edit_details">
        <div class="row">
          <div class="col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Brand Name</label>
              <input type="text" name="brand_name" class="form-control" placeholder=" Enter Person Name" value="{{$memberdataShow->brand_name}}" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12">
            <div class="form-group">
              <label>Company Name</label>
              <input type="text" name="Company_name" class="form-control" placeholder="Enter Company Name" value="{{$memberdataShow->member_name}}" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>Start Date</label>
              <input value="{{$memberdataShow->start_date}}" id="datepicker" type="text" name="start_date" id="visit_datepicker" type="text" class="form-control" placeholder="Enter Lead date " readonly>
            </div>
          </div>
          

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6">
            <div class="form-group">
              <label>End Date</label>
              <input value="{{$memberdataShow->end_date}}" id="datepicker1" type="text" name="end_date" id="visit_datepicker" type="text" class="form-control" placeholder="Enter Lead date" readonly>
            </div>
          </div>

           <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
            <div class="form-group">
              <label>Tenure</label>
              <input value="{{$memberdataShow->tenure}}" type="text" name="tenure" class="form-control" placeholder="www.BizNest.co.in" readonly>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
            <div class="form-group">
              <label>Lock In</label>
              <input type="text" name="Lock_in" class="form-control" placeholder="www.BizNest.co.in" value="{{$memberdataShow->Lock_in}}">
            </div>
          </div>

             <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="Gender" class="select">Status</label>
              <select readonly name="status" class="form-control">
                  <option>--select--</option>
                  <option value="Active">{{$memberdataShow->status}}</option>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
            </div>
          </div>            
        <br>
        <br>
      </form>
    </div>
  </div>
</div>

<script>
        var datepicker = new ej.calendars.DatePicker({  });
        datepicker.appendTo('#datepicker');
    </script>
    <script>
        var datepicker = new ej.calendars.DatePicker({  });
        datepicker.appendTo('#datepicker1');
    </script>
@endsection
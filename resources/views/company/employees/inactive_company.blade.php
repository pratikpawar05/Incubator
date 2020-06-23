@extends('layouts.admin')


@section('content')
<div style="margin-left: 10px;" class="row">
  <center><h3>Inactive Company</h3></center>
</div>
  
<div style="background-color: #305881;
    color: #fff;
    padding: 2%;
    border-radius: 10px; " class="container-fluid">
  <div class="row">

    <div  class="col-sm-4">
        
         <div  class="form-group col-xs-8">
        <label for="sel1">Company Search:</label>
        <input id="myInput" placeholder="Search Company" type="text" name="search" class="form-control">
      </div>

    </div>
    <div class="col-sm-4" >
      
      <div  class="form-group col-xs-8">
        <label for="sel1">Company Date Flilter:</label>
        <input type="text" name="search" class="form-control"><br>
        <input type="text" name="search" class="form-control">
      </div>

      <button style="" class="btn btn-success">Submit</button>

    </div>
  </div>
</div>

  <hr>

  <div style="margin-left: 10px; margin-right: 10px;" class="row">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
         <th>SR No.</th>
          <th>Brand Name</th>
          <th>Company name</th>
          <th>Agreement</th>
          <th>Lock In</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Status</th>
          <th>Action</th>
          <th>Employee List</th>
        </tr>
      </thead>
        @if(isset($InactiveEmployee))
            @foreach($InactiveEmployee as $key=> $inact_company)
      <tbody id="myTable">
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$inact_company->brand_name}}</td>
          <td>{{$inact_company->company_registered_name}}</td>
          <td>{{$inact_company->tenure}}</td>
          <td>{{$inact_company->lock_in}}</td>
          <td>{{$inact_company->start_date}}</td>
          <td>{{$inact_company->end_date}}</td>
          @if($inact_company->status == '1')
          <td>Active</td>
          @else
          <td>Inactive</td>
          @endif
           <td>

            @if (Auth::user()->isAuthenticated("Company", "d"))
              <a type="button" class="btn btn-danger delete_member_btn"  data-toggle="modal"  data-target="#myModal"  id="{{$inact_company->id}}">
                <span style="color: #fff;"><i class="fa fa-trash" title="Delete Company"></i></span>
              </a>
            @endif

            @if (Auth::user()->isAuthenticated("Company", "u"))
                <a href="{{url('/edit_member_list')}}/{{$inact_company->id}}">
                <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                </a>
            @endif

            @if (Auth::user()->isAuthenticated("Company", "v"))
                <a href="{{url('/member_show')}}/{{$inact_company->id}}">
                <button type="button" class="btn btn-success"><i class="fas fa-eye"></i></button>
                </a>
            @endif
          </td>
           <td>
            @if (Auth::user()->isAuthenticated("Member", "v"))
              <a href="{{url('/employee_list')}}/{{$inact_company->id}}">
                <button type="button" class="btn btn-success"><i class="fas fa-users"></i></button>
                </a>
            @endif
          </td>
        </tr>
      </tbody>
      @endforeach
          @endif
    </table>  
  </div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection
<style type="text/css">
  .note{
  color: #777;
  font-size: 0.85em;
}
</style>
@extends('layouts.admin')


@section('content')


<div class="bs-example container-fluid" data-example-id="striped-table" style="padding: 3%">
  <div class="row text-center">
      <center>  <h3>Inactive Member List</h3>
      </center>
  </div>

   <div style="    background-color: #305881;
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
  <div class="row">
    <div class="pull-right" style="margin-left: 20px; margin:5px;">
      <a href="{{url('/addMembers')}}">
      <button class="btn btn-primary">Add Member</button>
      </a>
      <a href="{{url('/employeExport')}}">
      <button class="btn btn-success">Export Excel</button>
      </a>
    </div>
  </div>

  <div class="row">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>SR No.</th>
          <th>Customer Name</th>
          <th>Company name</th>
          <th>Gender</th>
          <th>Contact</th>
          <th>Date Of Birth</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
        @if(isset($InactiveEmployee))
            @foreach($InactiveEmployee as $key => $In_ActiveEmployee)
      <tbody id="myTable">
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$In_ActiveEmployee->customer_Name}}</td>
          <td>{{$In_ActiveEmployee->company_Name}}</td>
          <td>{{$In_ActiveEmployee->gender}}</td>
          <td>{{$In_ActiveEmployee->contact}}</td>
          <td>{{$In_ActiveEmployee->DOB}}</td>
          <td>{{$In_ActiveEmployee->email}}</td>
          <td>{{$In_ActiveEmployee->status}}</td>
          <td>
              @if (Auth::user()->isAuthenticated("Member", "d"))
                <a href="">
                <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </a>
              @endif

              @if (Auth::user()->isAuthenticated("Member", "u"))
                <a href="{{url('/editEmployee')}}/{{$In_ActiveEmployee->id}}">
                <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                </a>
              @endif

              @if (Auth::user()->isAuthenticated("Member", "v"))
                <a href="{{url('/employeeDetails')}}/{{$In_ActiveEmployee->id}}">
                <button type="button" class="btn btn-success"><i class="fas fa-eye"></i></button>
                </a>
              @endif
          </td>
        </tr>
      </tbody>
      @endforeach
          @endif
    </table>  
  </div>
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
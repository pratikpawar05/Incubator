@extends('layouts.admin')

@section("title", "BizNest | Create Occupancy")

@section('content')
<div class="container">
    <div class="row">
        <center><h3>Create Occupancy:</h3></center>
    </div>
    <hr>
    <div class="row">   
        <form action="{{ url('store_occupancy') }}">
            <div class="form-group">
                <label for="email">Company:</label>
                <!-- <input type="text" class="form-control" id="email"> -->
                <select name="member" id="" class="form-control">
                    <option value="0">--Select Company--</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->member_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pwd">No. Of Seats:</label>
                <input type="number" class="form-control" id="pwd" placeholder="Enter no. of Seats">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>        
    </div>
</div>

@endsection
@extends('layouts.admin')

<!-- @section('occupancy_internal_css')
@endsection -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@section("title", "TechnoMatrix | Occupancy")
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

@keyframes bake-pie {
  from {
    transform: rotate(0deg) translate3d(0,0,0);
  }
}

body {
  font-family: "Open Sans", Arial;
  background: #EEE;
}
main {
  width: 400px;
  margin: 30px auto;
}
section {
  margin-top: 30px;
}
.pieID {
  display: inline-block;
  vertical-align: top;
}
.pie {
  height: 200px;
  width: 200px;
  position: relative;
  margin: 0 30px 30px 0;
}
.pie::before {
  content: "";
  display: block;
  position: absolute;
  z-index: 1;
  width: 100px;
  height: 100px;
  background: #EEE;
  border-radius: 50%;
  top: 50px;
  left: 50px;
}
.pie::after {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: rgba(0,0,0,0.1);
  border-radius: 50%;
  box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
  margin: 220px auto;
  
}
.slice {
  position: absolute;
  width: 200px;
  height: 200px;
  clip: rect(0px, 200px, 200px, 100px);
  animation: bake-pie 1s;
}
.slice span {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background-color: black;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  clip: rect(0px, 200px, 200px, 100px);
}
.legend {
  list-style-type: none;
  padding: 0;
  margin: 0;
  background: #FFF;
  padding: 15px;
  font-size: 13px;
  box-shadow: 1px 1px 0 #DDD,
              2px 2px 0 #BBB;
}
.legend li {
  width: 110px;
  height: 1.25em;
  margin-bottom: 0.7em;
  padding-left: 0.5em;
  border-left: 1.25em solid black;
}
.legend em {
  font-style: normal;
}
.legend span {
  float: right;
}
footer {
  position: fixed;
  bottom: 0;
  right: 0;
  font-size: 13px;
  background: #DDD;
  padding: 5px 10px;
  margin: 5px;
}

    </style>
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 2%">
            <h3><u>&nbsp;OCCUPANCY:</u></h3>
            <!-- <a href="{{ url('add_occupancy')  }}" class="btn btn-info">Add Occupancy</a> -->
              </div>
            <hr>

            <main style="border:1px solid black; background-color: #305881;border-radius: 10px;">
              <section>
                <div  class="pieID pie">  
                </div>
                <ul class="pieID legend">
                   @foreach($pie_graph as $d)
                  <li>
                    <em>{{$d->brand_name}}</em>
                    <span>{{$d->no_of_seats}}</span>
                  </li>
                    @endforeach
                </ul>
              </section>
            </main>
      
        <div class="row" style="margin-top: 2%">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>SR. No.</th>
                        <th>Brand Name</th>
                        <th>Company Name</th>
                        <th>No. of Seats Occupied</th>
                        <!-- <th>Total Seats </th> -->
                        <th>Percentage(%)</th>
                        <th>Employee List</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $d)
                    <tr class="success">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $d->brand_name }}</td>
                        <td>{{ $d->company_registered_name }}</td>
                        <td>{{ $d->no_of_seats }}</td>
                        <!-- <td>196</td> -->
                        <td>{{ $d->percentage }} %</td>
                        <td>
                         <a href="{{url('/employee_list')}}/{{$d->id}}">
                            <button type="button" class="btn btn-success"><i class="fas fa-users"></i></button>
                          </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @foreach($total as $totals)
           <tfoot style="background-color: black;color: white;">
            <tr>
              <td class="text-center">Total.</td>
              <td></td>
              <td></td>
              <td>{{$totals->no_of_seats}}</td>
              <td>{{$totals->percentage}}%</td>
              <td></td>
            </tr>
          </tfoot>
          @endforeach
            </table>
        </div>
    </div>
    <br>
    <br>
    <script type="text/javascript">
    function sliceSize(dataNum, dataTotal) {
  return (dataNum / dataTotal) * 360;
}
function addSlice(sliceSize, pieElement, offset, sliceID, color) {
  $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
  var offset = offset - 1;
  var sizeRotation = -179 + sliceSize;
  $("."+sliceID).css({
    "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
  });
  $("."+sliceID+" span").css({
    "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
    "background-color": color
  });
}
function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
  var sliceID = "s"+dataCount+"-"+sliceCount;
  var maxSize = 179;
  if(sliceSize<=maxSize) {
    addSlice(sliceSize, pieElement, offset, sliceID, color);
  } else {
    addSlice(maxSize, pieElement, offset, sliceID, color);
    iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
  }
}
function createPie(dataElement, pieElement) {
  var listData = [];
  $(dataElement+" span").each(function() {
    listData.push(Number($(this).html()));
  });
  var listTotal = 0;
  for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
  }
  var offset = 0;
  var color = [
    "cornflowerblue", 
    "olivedrab", 
    "orange", 
    "tomato", 
    "crimson", 
    "purple", 
    "turquoise", 
    "forestgreen", 
    "navy", 
    "gray",
    "crimson",
    "tomato",
    "orange",
  ];
  for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, pieElement, offset, i, 0, color[i]);
    $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
  }
}
createPie(".pieID.legend", ".pieID.pie");

</script>
@endsection
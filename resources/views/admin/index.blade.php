<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@extends('layouts.admin')
<style type="text/css">


</style>
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

  @keyframes bake-pie {
    from {
      transform: rotate(0deg) translate3d(0, 0, 0);
    }
  }

  body {
    font-family: "Open Sans", Arial;
    background: #EEE;
  }

  main {
    width: 400px;
    /* margin: 30px auto; */
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
    background: rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    box-shadow: 0 0 3px 4px rgba(0, 0, 0, 0.1);
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
<br>

<center><h1 style="font-size: 1.8rem; margin-left: 25px;">Dashboard</h1></center>
<br>

<div style="margin-left: 10px;" class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span style="background-color: black" class="info-box-icon bg  elevation-1">

        <img src="{{url('assets/img/current.png')}}">
      </span>
      <a href="{{url('combined_revenue')}}">
        <div class="info-box-content">
          <span class="info-box-text" style="color:black;">CURRENT REVENUES</span>
          <span class="info-box-number">
            <small class="money" style="color: black;font-weight: 700;"><i class="fa fa-rupee-sign"></i>{{$current_revenue[0]->value}}</small>
          </span>
        </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span style="background-color: black" class="info-box-icon bg elevation-1"><img src="{{url('assets/img/expences.png')}}"></span>
      <a href="/expense/index/">

        <div class="info-box-content">
          <span class="info-box-text" style="color:black;">CURRENT EXPENSES</span>
          <span style="color: black;" class="info-box-number">{{$current_expense}}</span>
        </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span style="background-color:black" class="info-box-icon bg- elevation-1"><img src="{{url('assets/img/profit-n-loss.png')}}"></span>
      <a href="/revenue-expense/">
      <div class="info-box-content">
        <span class="info-box-text" style="color:black;">BURNS/PROFIT</span>
        <span class="info-box-number" style="color: black;">760</span>
      </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span style="background-color:black" class="info-box-icon bg elevation-1"><img src="{{url('assets/img/security.png')}}"></span>
      <a href="{{url('security_deposits')}}">
        
      <div style="color: black;" class="info-box-content">
        <span class="info-box-text">SECURITY DEPOSITS</span>
        <span class="info-box-number money">{{$DepositeReceived[0]->deposite_receives}}</span>
      </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>

<div style="margin-left: 10px;" class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span style="background-color:black; " class="info-box-icon bg elevation-1">
        <img width="80%" src="{{url('assets/img/chair2.png')}}">
      </span>
      <a href="{{url('/occupancy')}}">
        <div class="info-box-content">
          <span class="info-box-text" style="color:black;">OCCUPANCY</span>
          <span class="info-box-number">
            <small style="color: black;">13%</small>
          </span>
        </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span style="background-color:black;" class="info-box-icon bg elevation-1">
        <img src="{{url('assets/img/active-company.png')}}">
      </span>
      <a href="{{url('/activeCompany')}}">

        <div class="info-box-content">
          <span class="info-box-text" style="color:black;">ACTIVE COMPANIES</span>
          <span style="color: black;" class="info-box-number">{{$member_count}}</span>
        </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span style="background-color:black;" class="info-box-icon bg elevation-1">
        <img src="{{url('assets/img/active-member.png')}}">
      </span>
      <a style="color: black" href="{{url('/activeEmployee')}}">

        <div class="info-box-content">
          <span class="info-box-text">ACTIVE MEMBERS</span>
          <span style="color: black" class="info-box-number">{{$employee_count}}</span>
        </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span style="background-color:black;" class="info-box-icon bg-whiite elevation-1">
        <img width="80%" src="{{url('assets/img/leads.png')}}">
      </span>
      <a style="color: black" href="{{url('hot_sales_data')}}">

        <div class="info-box-content">
          <span class="info-box-text">LEADS</span>
          <span class="info-box-number" style="color: black">{{$count_sales}}</span>
        </div>
      </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<!--        <div style="margin-top:40px;" class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 style="margin-left: 10px;" class="panel-title">Month Wise Profit Data</h3>
                        </div>
                        <div class="col-md-3">
                            <select name="year" class="form-control" id="year">
                                <option value="">--select--</option>
                                <option value="">2019</option>
                                <option value="">2020</option>
                            
                            </select>
                        </div>
                    </div>
              </div>
 -->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">

      <div id="mom-chart"></div>
      <div class="pull-right"><a href="/combined_revenue/">Read more...</a></div>
    </div>

    <div class="col-md-6">
      <div id="revenue-expense"></div>
      <div class="pull-right"><a href="/revenue-expense/" >Read more...</a></div>
    </div>

    <div class="col-sm-4">

    </div>

  </div>
</div>

<hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Latest Members</h3>

          <div class="card-tools">
            <span class="badge badge-danger">5 New Members</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            </button>
          </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body p-0">
          <ul class="users-list clearfix">
            <table class="table table-stripped">
              <thead>
                <th>SR No.</th>
                <th>Employee Name</th>
                <th>Company Name</th>
              </thead>
              <tbody>
                @foreach($Member_data as $key =>$employee_updated)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$employee_updated->customer_Name}}</td>
                  <td>{{$employee_updated->company_Name}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </ul>
          <div class="card-footer text-center">
            <a href="{{url('/employeList')}}">View All Members</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!--/.card -->
      </div>


    </div>
    <div style="border-radius: 10px;" class="col-sm-4">
      <main style="margin-left: 5%;border:1px solid white; background-color:white;border-radius: 10px;">
        <div class="container">
        <h5 style="color:;">Gender</h5>
        </div>
        <hr>
        <section>
          <div class="pieID pie">
          </div>
          <ul class="pieID legend">
            <li>
              <em>Male</em>
              <a href="">
                <span>{{$gender['male']}}</span>  
              </a>
            </li>
            <li>
              <em>Female</em>
              <a href="">
                <span>{{$gender['female']}}</span>
              </a>
            </li>
          </ul>
        </section>
      </main>
    </div>

    <div style="margin-left: 80px;" class="col-sm-3">
      <a href="https://www.instagram.com/{{$instagram['username']}}/" target="_blank">
        
     <div class="info-box mb-3" style="background-color: #DF4959; color: black">
              <span class="info-box-icon"><img width="80%" src="{{url('assets/img/instagram.webp')}}"></i></span>

              <div class="info-box-content">
                <!-- <span class="info-box-text">Instagram</span> -->
                <!-- <span class="info-box-number">5,200</span> -->
                <h4 class="card-title font-weight-bold">{{$instagram['username']}}</h4>
                <p class="card-text font-weight-bold">Our Instagram Followers: {{$instagram['followers'] }}</p>
              </div>
              <!-- /.info-box-content -->
            </div>
          <!-- </div> -->
      </a>
        <!-- </div> -->
          <a href="https://www.facebook.com/MeWoWorkNest/" target="_blank">
            <div class="info-box mb-3" style="background-color: #3b5998; color: black;">
              <span class="info-box-icon"><img width="80%" src="{{url('assets/img/facebook.webp')}}"></span>

              <div class="info-box-content">
                <!-- <span class="info-box-text">Facebook</span>s
                <span class="info-box-number">5,200</span> -->
              <h4 class="card-title font-weight-bold">{{$userData['name']}}</h4>
              <p class="card-text font-weight-bold">Our Fancount: {{$userData['fan_count'] }}</p>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <div class="info-box mb-3" style="background-color: #3A71F5;">
              <span class="info-box-icon"><img width="80%" src="{{url('assets/img/brands-and-logotypes.png')}}"></span>

              <div class="info-box-content">
                <span class="info-box-text">Google</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
      </div>
  </div>
</div>

<!-- Social Media Accounts Info -->
<!-- <div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card booking-card" style="width:300px">
        <img class="card-img-top" src="{{$instagram['profile']}}" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title font-weight-bold">{{$instagram['username']}}</h4>
          <p class="card-text font-weight-bold">Our Instagram Followers: {{$instagram['followers'] }}</p>
          <a href="https://www.instagram.com/{{$instagram['username']}}/" target="_blank" class="btn btn-primary">See Profile</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card booking-card" style="width:300px">
        <img class="card-img-top" src="{{$profilePic}}" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title font-weight-bold">{{$userData['name']}}</h4>
          <p class="card-text font-weight-bold">Our Fancount: {{$userData['fan_count'] }}</p>
          <a href="https://www.facebook.com/MeWoWorkNest/" target="_blank" class="btn btn-primary">See Profile</a>
        </div>
      </div>
    </div> -->
    <!-- 
     <div class="col-md-4 col-sm-4">
      <div class="card booking-card" style="width:300px">
        <img class="card-img-top" src="" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title font-weight-bold"></h4>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">See Profile</a>
        </div>
      </div>
    </div>  -->
  </div>
</div>



<script type="text/javascript">
  FusionCharts.ready(function() {
    var chart = new FusionCharts({
      type: "column3d",
      renderAt: "mom-chart",
      width: '100%',
      height: '500',
      id: "hello-world-chart",
      dataFormat: "json",
      dataSource: {
        chart: {
          "numDivLines": "5",
          // bgcolor:"black",
         "palettecolors": "000000",
          caption: "MOM Revenue",
          xAxisname: "Months",
          yAxisName: "Revenues(INR)",
          theme: "fusion",
          numberScaleUnit: "K,L,C",
          thousandSeparatorPosition: "2,3",
          numberSuffix: "%",
          plotToolText: "$label: <b>$dataValue</b>"
        },

        data: @json($revenue_data),
      },
      events: {
         dataPlotClick: function(ev, props) {
          window.location.href = "/bar-click-revenue/" + props.categoryLabel + "/0";
         }
      }
    }).render();
  });
</script>

<script type="text/javascript">
  FusionCharts.ready(function() {
    var chartObj = new FusionCharts({
      type: 'mscolumn3d',
      renderAt: 'revenue-expense',
      width: '100%',
      height: '500',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "numDivLines": "5",
          "theme": "fusion",
          "caption": "Revenue vs Expense",
          "xAxisname": "Months",
          "yAxisName": "Revenu,Expense(INR)",
          "numberPrefix": "₹",
          "plotFillAlpha": "80",
          "numberScaleUnit": "K,L,C",
          "thousandSeparatorPosition": "2,3",
          "divLineIsDashed": "1",
          "divLineDashLen": "1",
          "divLineGapLen": "1",
          "palettecolors": "FF0000,000000"
        },
        "categories": [{
          "category": @json($dates)
        }],
        "dataset": [{
          "seriesname": "Expenses",
          "data": @json($expense)

        }, {
          "seriesname": "Revenue",
          "data": @json($revenue)
        }],
      },
      events: {
         dataPlotClick: function(ev, props) {
          window.location.href = "/bar-click/" + props.categoryLabel + "/0";
         }
      }
    });
    chartObj.render();
  });
</script>





<script type="text/javascript">
  function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
  }

  function addSlice(sliceSize, pieElement, offset, sliceID, color) {
    $(pieElement).append("<div class='slice " + sliceID + "'><span></span></div>");
    var offset = offset - 1;
    var sizeRotation = -179 + sliceSize;
    $("." + sliceID).css({
      "transform": "rotate(" + offset + "deg) translate3d(0,0,0)"
    });
    $("." + sliceID + " span").css({
      "transform": "rotate(" + sizeRotation + "deg) translate3d(0,0,0)",
      "background-color": color
    });
  }

  function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
    var sliceID = "s" + dataCount + "-" + sliceCount;
    var maxSize = 179;
    if (sliceSize <= maxSize) {
      addSlice(sliceSize, pieElement, offset, sliceID, color);
    } else {
      addSlice(maxSize, pieElement, offset, sliceID, color);
      iterateSlices(sliceSize - maxSize, pieElement, offset + maxSize, dataCount, sliceCount + 1, color);
    }
  }

  function createPie(dataElement, pieElement) {
    var listData = [];
    $(dataElement + " span").each(function() {
      listData.push(Number($(this).html()));
    });
    var listTotal = 0;
    for (var i = 0; i < listData.length; i++) {
      listTotal += listData[i];
    }
    var offset = 0;
    var color = [
      "black",
      "red",
    ];
    for (var i = 0; i < listData.length; i++) {
      var size = sliceSize(listData[i], listTotal);
      iterateSlices(size, pieElement, offset, i, 0, color[i]);
      $(dataElement + " li:nth-child(" + (i + 1) + ")").css("border-color", color[i]);
      offset += size;
    }
  }
  createPie(".pieID.legend", ".pieID.pie");
</script>
<script type="text/javascript">
  $('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            });
</script>

@endsection
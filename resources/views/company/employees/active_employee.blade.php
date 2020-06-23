@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    #datatable-buttons_previous,#datatable-buttons_next{
        text-transform: uppercase;
    }
    </style>
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <!--  <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i> ACTIVE MEMBERS = {{$activeMembersCount}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


        <div class="wrapper">
            <div class="container-fluid">


                <div class="row">
                       <div class="col-xl-12">
                        <div class="card m-b-30 dashboard_card">
                            <div class="card-body">
                                <!-- <div style="margin-left: 400px;" class="row font_family r" > -->
                                <div class="row font_family r" >
                                        
                              <h4  style="
                                font-size: 1.8em;
                                font-weight: 700;
                                font-variant: normal;
                                letter-spacing: 2px;"><b>Ratio</b>-<span style="color:#4BBBCE;">Male</span> : <span style="color: #2F8EE0">Female</span><span style="color:#4BBBCE;" > = {{$gender["male"]}}</span><span>:</span><span style="color: #2F8EE0">{{$gender["female"]}}</span></h4>
                                </div>
                                <div  id="gender-ratio-pie-chart" style="margin-bottom: 25px; margin-left: 160px; height: auto" align="center" class="dash-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body text-center">

                                <!-- <h4 class="mt-0 header-title">Buttons example</h4> -->

                                <table style="font-size: 18px;"  id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white">
                                    <tr>
                                        <th><b>Sr.No</b></th>
                                        <th><b>company name</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($ActiveCompany as $key=>$company)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$company->company_registered_name}}</td>
                                        @if($company->status = "1")
                                        <td><b class="text-success">Active</b></td>
                                        @else
                                        <td><b class="text-danger">Inactive</b></td>
                                        @endif
                                        <td>
                                            @if (Auth::user()->isAuthenticated("Member", "v"))
                                            <a href="{{url('fonik_active_employee_list')}}/{{$company->id}}" class="btn btn-info">More</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

@include('includes/footer_start')
<!-- Put Extra Js here -->

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- Required datatable js -->

   <!--      <script type="text/javascript" src="assets/plugins/d3/d3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/c3/c3.min.js"></script>
    <script src="assets/pages/c3-chart-init.js"></script>
 -->

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



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Gender', 'No. of male and female'],
  ['Male', {{(int)$gender["male"]}}],
  ['Female', {{(int)$gender["female"]}}],
]);
  // Optional; add a title and set the width and height of the chart
  var options = {'title': '', 'backgroundColor': 'transparent', 'width': 800, 'height': 450, 'colors': ["#4BBBCE", "#2F8EE0"]};
  // Display the chart inside the <div> element with id="gender-ratio-pie-chart"
  var chart = new google.visualization.PieChart(document.getElementById('gender-ratio-pie-chart'));
  chart.draw(data, options);
}

// var chart = new CanvasJS.Chart("pie-chart", {
    
//     exportEnabled: true,
//     animationEnabled: true,
//     title:{
//         // text: "Total Seats Distribution(90 Seats)"
//     },
//     legend:{
//         cursor: "pointer",
//         itemclick: explodePie
//     },
//     data: [{
//         type: "pie",
//         showInLegend: false,
//         indexLabelFontSize: 16,
//         radius: 360,
//         startAngle: 270,
//         toolTipContent: "{name}: <strong>{y}%</strong>",
//         indexLabel: "{name} - {y}%",
//         dataPoints: [
//             @foreach(array_reverse($pie_chart) as $key =>$value)
//                 {y: {{$value["seats"]}}, name: '{{$value["company_name"]}}'},
//             @endforeach
//         ]
//     }]
// });
// chart.render();

// function explodePie (e) {
//     if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
//         e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
//     } else {
//         e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
//     }
//     e.chart.render();

// }


</script>
@include('includes/footer_end')
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
    text{
        fill: #000000;
    }
    </style>
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i> ACTIVE MEMBERS = {{count($employees)}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


        <div class="wrapper">
            <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div  class="card m-b-20">
                        <div class="card-body">
                          <div class="row">

                            <div   class="col-xl-12">
                                <div style="" class="card-body">
                                    <div class="row font_family">
                                        <h4 style="font-size: 1.8em;
                                    font-weight: 700;
                                    font-variant: normal;
                                    letter-spacing: 2px; color: white;"><b>Ratio</b>-<span style="color:#4BBBCE;">Male</span><span style="color: #2F8EE0">:Female</span><span style="color:#4BBBCE;" > = {{$male}}</span><span>:</span><span style="color: #2F8EE0">:{{$female}}</span></h4>


                                   <!--  <h4  style="
                                font-size: 1.8em;
                                font-weight: 700;
                                font-variant: normal;
                                letter-spacing: 2px;"><b>Ratio</b>-<span style="color:#4BBBCE;">Male</span> : <span style="color: #2F8EE0">Female</span><span style="color:#4BBBCE;" > = {{$male}}</span><span>:</span><span style="color: #2F8EE0">{{$female}}</span></h4> -->

                                    </div>
                                    <div id="gender-ratio-pie-chart" style="margin-bottom: 8px; margin-left: 160px; height: auto; color: white;" align="center" class="dash-chart">
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body text-center">

                                <h4 class="">{{$member_name}}</h4>
                                <br>
                                @if($a[0]==0)
                                <div class="alert alert-danger" style="font-size:35px ">Employee Record Not found</div>
                                @else
                                 <table style="font-size: 18px;"  id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white">
                                    <tr class="busines_data1">
                                        <th><b>Sr.No</b></th>
                                        <th><b>Employee Name</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Contact</b></th>
                                        <th><b>Gender</b></th>
                                        <th><b>Designation</b></th>
                                         <th><b>Date of Joining</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $key=>$data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->customer_Name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->contact}}</td>
                                        <td>{{$data->gender}}</td>
                                        <td>{{$data->designation}}</td>
                                        <td>{{$data->DOB}}</td>
                                        @if($data->status == "1")
                                        <td>
                                            <b class="text-success">Active</b>
                                        </td>
                                        @else
                                        <td>
                                            <b class="text-danger">Inactive</b>
                                        </td>
                                        @endif
                                        <td>
                                        @if (Auth::user()->isAuthenticated("Member", "v"))
                                            <a href="{{url('/employeeDetails')}}/{{$data->id}}" class="btn btn-primary ">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Required datatable js -->
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
@if($a[0]==0)
  var data = google.visualization.arrayToDataTable([
  ['Gender', 'No. of male and female'],
  ['No data',1],
]);
  // Optional; add a title and set the width and height of the chart
  
// var options = {'title': '', 'backgroundColor': 'transparent', 'width': 600, 'height': 400, 'sliceVisibilityThreshold':0, 'colors': ["#4BBBCE", "#2F8EE0"]};
@else
  var data = google.visualization.arrayToDataTable([
  ['Gender', 'No. of male and female'],
  ['Male', {{(int)$male}}],
  ['Female', {{(int)$female}}],
]);
  // Optional; add a title and set the width and height of the chart

       var options = {'title': '', 'backgroundColor': 'transparent', 'width': 800, 'height': 450, 'colors': ["#4BBBCE", "#2F8EE0"]};
  
   
@endif


  // Display the chart inside the <div> element with id="gender-ratio-pie-chart"
  var chart = new google.visualization.PieChart(document.getElementById('gender-ratio-pie-chart'));
  chart.draw(data, options);
}
</script>
    
@include('includes/footer_end')
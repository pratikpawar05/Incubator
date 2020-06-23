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
    .busines_data1{
        font-size: 1.9em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
        text-decoration: underline;
    }
    .table{
        table-layout: fixed;
    }
    thead{
        font-size: 14px;
        overflow:hidden;
        white-space: nowrap;
    }
    .srno{
        width:8%;
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
                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i> ACTIVE COMPANIES = {{count($ActiveCompany)}}</h4>
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
                        <div class="card m-b-20">
                            <div class="card-body">

                                <!-- <h4 style="text-align: center;" class="busines_data1">SEATS DISTRIBUTION</h4> -->

<!--                                 <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                                    <li class="list-inline-item">
                                        <h5 class="mb-0">86541</h5>
                                        <p class="text-muted font-14">Activated</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="mb-0">2541</h5>
                                        <p class="text-muted font-14">Pending</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="mb-0">102030</h5>
                                        <p class="text-muted font-14">Deactivated</p>
                                    </li>
                                </ul> -->
                                <div id="pie-chart" style="height: 500px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body text-center">

                                <!-- <h4 class="mt-0 header-title">Buttons example</h4> -->
                                <table style="font-size: 16px;"  id="datatable-buttons" class="table bg-white table-bordered " cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white">
                                    <tr>
                                        <th class='srno'><b>SR No.</b></th>
                                          <th><b>COMPANY NAME </b></th>
                                          <th><b>BRAND NAME</b></th>
                                          <th><b>AGREEMENT</b></th>
                                          <th class='srno'><b>LOCK IN</b></th>
                                          <th><b>START DATE</b></th>
                                          <th><b>END DATE</b></th>
                                          <th style="width:130px;"><b>ACTION</b></th>
                                          <th><b>EMPLOYEE LIST</b></th>
                                    </tr>
                                    </thead>


                                            
                                            <tbody id="myTable">
                                                @if(isset($ActiveCompany))
                                            @foreach($ActiveCompany as $key=> $act_company)
                                            <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$act_company->company_registered_name}}</td>
                                            <td>{{$act_company->brand_name}}</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$act_company->tenure}}</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$act_company->lock_in}}</td>
                                            <td>{{$act_company->start_date}}</td>
                                            <td>{{$act_company->end_date}}</td>
                                            <!-- <td>{{$act_company->status}}</td> -->
                            
                                            <div class="row">
                                                

                                            <td>
                                                @if (Auth::user()->isAuthenticated("Company", "d"))
                                                <a style="color: white;"  class="btn btn-danger" data-toggle="modal"  data-target="#myModal"  id="{{$act_company->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                @endif

                                                @if (Auth::user()->isAuthenticated("Company", "u"))
                                                <a href="{{url('/edit_member_list')}}/{{$act_company->id}}" class="btn btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endif

                                                @if (Auth::user()->isAuthenticated("Company", "v"))
                                                <a href="{{url('/member_show')}}/{{$act_company->id}}/0" class="btn btn-primary ">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @endif
                                            </td>
                                            </div>

                                            <td>
                                             @if (Auth::user()->isAuthenticated("Member", "v"))
                                                    <a href="/fonik_active_employee_list/{{$act_company->id}}">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-users"></i></button>
                                                    </a>
                                                @endif
                                            </td>
                                            </tr>
                                            @endforeach
                                            @endif
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

    <!-- <link data-require="c3.js@0.4.9" data-semver="0.4.9" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/c3/0.4.9/c3.css" />
  <script data-require="c3.js@0.4.9" data-semver="0.4.9" src="//cdnjs.cloudflare.com/ajax/libs/c3/0.4.9/c3.js"></script>
  <script data-require="d3@3.5.3" data-semver="3.5.3" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.js"></script> -->
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


    <script type="text/javascript">
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });
    });
    </script>


<script type="text/javascript">

var chart = new CanvasJS.Chart("pie-chart", {
    
	exportEnabled: false,
	animationEnabled: true,
	title:{
		// text: "Total Seats Distribution(90 Seats)"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie,
	},
	data: [{
		type: "pie",
		showInLegend: false,
        indexLabelFontSize: 16,
        radius: 360,
		startAngle: 270,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} - {y}%",
		dataPoints: [
            @foreach(array_reverse($pie_chart) as $key =>$value)
	    		{y: {{$value["seats"]}}, name: '{{$value["company_name"]}}'},
            @endforeach
		]
	}]
});
chart.render();

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}


// var chart = new CanvasJS.Chart("pie-chart", {
// 	animationEnabled: true,
// 	title: {
// 		text: "Total Seats Distribution:-90 Seats"
// 	},
// 	data: [{
// 		type: "pie",
// 		startAngle: 240,
// 		yValueFormatString: "##0.00\"%\"",
// 		indexLabel: "{label} {y}",
// 		dataPoints: [
//             @foreach($pie_chart as $key =>$value)
// 	    		{y: {{$value["seats"]}}, label: '{{$value["company_name"]}}'},
//             @endforeach
// 		]
// 	}]
// });
// chart.render();




/////C3.js Pie Chart Code
// var chart = c3.generate({
//     data: {
//         // iris data from R
//         columns: [
//             ['{{$value["company_name"]}}', {{$value["seats"]}}],
//             
//         ],
//         type : 'pie',
//     },
//     pie:{
//     label: {
//        format: function (value, ratio, id) {
//           return value;
//         }
//     }
// }
// });
</script>
@include('includes/footer_end')
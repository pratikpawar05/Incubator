@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .busines_data1{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    </style>
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <h4 class="page-title busines_data1"> <i class="dripicons-blog"></i> MONTHLY OCCUPANCY = {{round($occupied_data / config('global.total_seats') * 100)}}%</h4>
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

                                <!-- <h4 style="text-align: center; text-decoration: underline;" class="busines_data1">SEATS DISTRIBUTION</h4> -->
                                <!-- <div id="pie-chart" style="height: 500px; width: 100%;"></div> -->
                                <div id="container" style="height: 300px; margin: 0 auto;"></div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body text-center">

                                <!-- <h4 class="mt-0 header-title">Buttons example</h4> -->
                                <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;"> 
                                    <tr>
                                        <th><b>SR NO.</b></th>
                                          <th><b>COMPANY NAME</b></th>
                                          <th><b>SEATS</b></th>
                                          <th><b>OCCUPANCY</b></th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @for ($i = 0; $i < 7; $i++)
                                            <tr>
                                                <td>{{$i+1}}</td>
                                                <td>{{$company[$i]["company_name"]}}</td>
                                                <td>{{$company[$i]["seats"]}}</td>
                                                <td>{{round($company[$i]["seats"] / config('global.total_seats') * 100)}}%</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                    <tr style="background-color: #134C80;color: white;">
                                    <td colspan="2"><b>TOTAL OCCUPANCY </b></td>
                                    <td style="display: none;"></td>
                                    <td><b>{{$occupied_data}}</b></td>
                                    <td><b>{{round($occupied_data / config('global.total_seats') * 100)}}%</b></td>
                                </tr>
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




<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="http://code.highcharts.com/modules/data.js"></script>
<script src="http://code.highcharts.com/modules/heatmap.js"></script>


<script type="text/javascript">
var check = new Intl.NumberFormat("en-IN");
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar',
            // backgroundColor: 'transparent',
            // backgroundColor: '#fff',
        },

        exporting: {
            enabled: false,
        },

        title: {
            text: ' ',
        },

        xAxis: {
            categories: ['Occupancy'],
        },
        yAxis: {
            min: 2,
            title: {
                text: ' ',
            },
        },
        legend: {
            reversed: false,
            enabled: false
        },
        colors: [
            @foreach ($colors as $color)
                "hsl({{$color[0]}}, {{$color[1]}}%, {{$color[2]}}%)",
            @endforeach
        ],
        plotOptions: {
            series: {
                stacking: 'normal'
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    distance : 0,
                    formatter: function() {
                        lb = "" + "<br>";
                        lb += (this.y / {{config('global.total_seats')}} * 100).toFixed(2) + "%";
                        return lb;
                     },
                    style: {
                        color: 'white',
                    },
                },
                
            },
        },
        tooltip: {
            formatter:function(){

            return this.point.series.name + ': <b>' + check.format(Object.values(this.point.options)) + '</b><br/>';
                // console.log(typeof Object.entries(this.point.options);
            }
        },
        series: [
        {
            name: "Unsold Seats",
            data: [{{$unoccupied_data}}]
        },
        @foreach(array_reverse($company) as $value)
        {
            name: '{{$value["company_name"]}} Seats',
            data: [{{$value["seats"]}}],
        },
        @endforeach
        ]
    });
});
</script>


 @include('includes/footer_end')
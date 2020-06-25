<style type="text/css">
    .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    .busines_data1{
        font-size: 1.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    #datatable-buttons_previous,#datatable-buttons_next{
        text-transform: uppercase;
    }
</style>
@include('includes/header_start')

<!-- Put extra Css here -->
<!-- DataTables -->
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<style type="text/css">
    .monthly_revenue_table .container-fluid {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

</style>
@include('includes/header_end')


<!-- <div class="row">
    <div class="col-md-12">
        <div id="morris-bar" class="dash-chart"></div>
    </div>
</div> -->

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <form class="float-right ">
                    <!-- <input type="text" placeholder="Search..." class="form-control"> -->
                    <!-- <button type="submit"></button> -->
                </form>
                <h4 class="page-title busines_data" style="text-transform: uppercase;"> <i class="dripicons-blog"></i>{{$month}} {{$year}} REVENUES = INR <?php $fmt = new NumberFormatter($locale = "en_IN", NumberFormatter::DECIMAL); echo $fmt->format($total); ?></h4>
            </div>
             @if (Auth::user()->isAuthenticated("Monthly Revenues Card", "v")) 
                <center style="padding: 2%;">
                    @if ($prevState == 1)
                        <!-- <button class="btn btn-outline-light ml-1 waves-effect waves-light" readonly>Prev</button> -->
                    @else
                        <a href="/combined_revenue/-1/{{$year . '-' . $month}}/" class="btn btn-outline-light ml-1 waves-effect waves-light">Prev</a>
                    @endif
                    <button class="btn btn-outline-info ml-1 waves-effect waves-blue">{{$year . '-' . $month}}</button>
                    @if ($nextState == 1)
                        <!-- <button class="btn btn-outline-light ml-1 waves-effect waves-light" readonly>Next</button> -->
                    @else
                        <a href="/combined_revenue/1/{{$year . '-' . $month}}/" class="btn btn-outline-light ml-1 waves-effect waves-light">Next</a>
                    @endif
            @endif
                </center>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12 mb-4">
            <div id="revenue-container" style="height: 300px; margin: 0 auto"></div>
            <!-- <div id="container" style="height: 300px; margin: 0 auto;"></div> -->

            <!-- <div id="morris-bar-example" class="dash-chart"></div> -->

            <div class="mt-4 text-center">
                <!-- <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Year 2017</button> -->
                <a href="/show_occupancy/">
                    <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Monthly Occupancy&nbsp;: {{$occupancy_percentage_data}}%</button>
                </a>
                <a href="{{ url('/activeCompany') }}">
                    <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Active Company&nbsp;: <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($member_count)?></button>
                </a>
                <a href="{{ url('/fonik_active_member') }}">
                    <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Active Members&nbsp;: <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($employee_count)?></button>
                </a>


            </div>
        </div>
    </div>
</div>
</div>


<div class="wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body monthly_revenue_table">

                         <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;">
                                <tr class="text-center">
                                    <th><b>SR. NO.</b></th>
                                    <th><b>COMPANY NAME</b></th>
                                    <th><b>SEATS</b></th>
                                    <th><b>{{$month}}
                                     REVENUES(INR)</b></th>
                                    <th><b>OCCUPANCY %</b></th>
                                    <th><b>STATUS</b></th>
                                    @if (Auth::user()->isAuthenticated("Monthly Revenues Card", "v"))
                                    <th><b>MORE</b></th>
                                    @endif
                                </tr>
                            </thead>
                            @php
                                $occupancy=0;
                                $seats=0;
                                $pay=0;
                                @endphp
                                @foreach ($records as $index => $record)
                                @php 
                                $occupancy+=round($record["occupancy"] / 90 * 100); 
                                $seats+=$record["seats"];
                                $pay+=$record["to_pay"]  
                                @endphp
                            <tbody class="text-center">
                                
                                
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$record["company_name"]}}</td>
                                    <td>{{$record["seats"]}}</td>
                                    <td class="money">{{$record["to_pay"]}}</td>
                                    <td>{{round($record["seats"] / 90 * 100)}}%</td>
                                    @if ($record["due_amount"] > 0)
                                    <td>Unpaid</td>
                                    @else
                                    <td>Paid</td>
                                    @endif
                                     @if (Auth::user()->isAuthenticated("Monthly Revenues Card", "v"))
                                    <td><a href="/revenue/company/{{$record['company_name']}}" class="btn btn-info">More</a></td>
                                    @endif
                                </tr>
                                
                            </tbody>
                                @endforeach
                                <tr class="text-center" style="background-color: #134C80;color: white;">
                                    <td style="font-weight: bold;" colspan="2">Total</td>
                                    <td  style="display: none;font-weight: bold;">Total</td>
                                    <td style="font-weight: bold;" >{{$seats}}</td>
                                    <td style="font-weight: bold;" class="money">{{$pay}}</td>
                                    <td style="font-weight: bold;" >{{$seats}}%</td>
                                    <td style="font-weight: bold;" ></td>
                                    @if (Auth::user()->isAuthenticated("Monthly Revenues Card", "v"))
                                    <td style="font-weight: bold;" ></td>
                                    @endif
                                </tr>

                        </table>

                    </div>
                </div>
            </div> 
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



@include('includes/footer_end')



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
            @foreach ($colors1 as $color)
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
        @foreach(array_reverse($records) as $value)
        {
            name: '{{$value["company_name"]}} Seats',
            data: [{{$value["occupancy"]}}],
        },
        @endforeach
        ]
    });
});
</script>

<script type="text/javascript">
var check = new Intl.NumberFormat("en-IN");
$(function () {
    $('#revenue-container').highcharts({
        chart: {
            type: 'bar',
            // backgroundColor: 'transparent',
            // backgroundColor: '#fff',
        },
        exporting: {
            enabled: false,
        },
        title: {
            style: {
            color: 'blue',
            font: 'bold 24px "Trebuchet MS", Verdana, sans-serif'
            },
            text: ' ',
        },
        xAxis: {
            categories: [''],
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
                        lb += this.y + "%";
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
            return this.series.name;
                // console.log(typeof Object.entries(this.point.options);
            }
        },
        series: [
        @foreach(array_reverse($records) as $value)
        {
            name: '{{$value["company_name"]}} <b> : INR {{$fmt->format(round($value["to_pay"]))}}</b>',
            data: [{{round($value["to_pay"]/ $total * 100)}}],
        },
        @endforeach
        ]
    });
});
</script>

<script type="text/javascript">
    $('.money').each(function() {
        var monetary_value = $(this).text();
        var i = new Intl.NumberFormat("en-IN").format(monetary_value);
        $(this).text(i);
    });
</script>
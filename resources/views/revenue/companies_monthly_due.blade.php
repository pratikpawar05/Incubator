<script type="text/javascript">
$('.money').each(function() { 
var monetary_value = $(this).text(); 
var i = new Intl.NumberFormat("en-IN").format(monetary_value);
$(this).text(i); 
});

</script>
@include('includes/header_start')

<!-- Put extra Css here -->
    <style>
        .dashboard_card {
            border: 2px solid #2E8BDC !important;
        }
        .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    </style>
    <style type="text/css">
        .width_change{
            display: inline-block;
            height: 100px;
            border-radius: 5px;
            margin: 1rem;
            position: relative;
            width: 224px;
        }
        .company_page .container-fluid {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        .dataTables_filter{
            float: right;
        }
        .dataTables_filter label {
            margin-top: -15px;
        }

    </style>
<link rel="stylesheet" href="/assets/plugins/morris/morris.css">
   
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>
                            TOTAL OUTSTANDING - 
                            @php
                                $dateObj   = \DateTime::createFromFormat('Y-m-j', $company_due[0]->payment_month . "-10");
                                $monthName = $dateObj->format('Y-F');
                                echo $monthName;
                            @endphp
                        </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="mt-4 text-center">
                            <div id="morris-bar-example" class="dash-chart"></div>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body company_page">

                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Company Name</th>
                                    <th>Outstanding Dues</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($company_due as $key => $value)
                                
                                <tr>
                                    <td>{{$key+1}}</td>
                                    
                                    <td>{{$value->brand_name}}</td>
                                    
                                    <td class="money">{{$value->outstanding}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@include('includes/footer_start')

<script type="text/javascript">
    $('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            });
</script>
    
<!-- Put Extra Js here -->
    <!-- Required datatable js -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables/jszip.min.js"></script>
    <script src="/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="/assets/pages/datatables.init.js"></script>


<script src="/assets/plugins/morris/morris.min.js"></script>
<script src="/assets/plugins/raphael/raphael-min.js"></script>

<script type="text/javascript">
$(function() {
/*
 Template Name: Fonik - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Dashboard js
 */
!function ($) {
    "use strict";
    var Dashboard = function () {
    };

        //creates Bar chart
        Dashboard.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys:ykeys,
                labels: labels,
                gridLineColor: 'rgba(255,255,255,0.1)',
                gridTextColor: '#fff',
                barSizeRatio: 0.2,
                resize: true,
                hideHover: 'auto',
                stacked: true,
                postUnits:'%',
                barColors: lineColors,
            });
        },

        //creates area chart
        Dashboard.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
            Morris.Area({
                element: element,
                pointSize: 0,
                lineWidth: 0,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                resize: true,
                gridLineColor: '#eee',
                hideHover: 'auto',
                lineColors: lineColors,
                fillOpacity: .6,
                behaveLikeLine: true
            });
        },
        //creates Donut chart
        Dashboard.prototype.createDonutChart = function (element, data, colors) {
            Morris.Donut({
                element: element,
                data: data,
                resize: true,
                colors: colors,

            });
        },
        Dashboard.prototype.init = function (element, data, xkey, ykeys, labels, lineColors) {
            //creating bar chart
            var $barData = [
                @foreach ($company_due as $value)
                    {y: '{{$value->brand_name}}', a: '{{$value->amount_received / $value->monthly_rent * 100}}', b:'{{($value->monthly_rent - $value->amount_received) / $value->monthly_rent * 100}}'  },
                @endforeach
            ];
            this.createBarChart('morris-bar-example', $barData, 'y', ['a','b'], ['Monthly Collection', 'Monthly Due'],['#6FD08B','#FF2801']);

        },
        //init
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),
//initializing
    function ($) {
        "use strict";
        $.Dashboard.init();
        $("#morris-bar-example svg").attr("height", 500);
    }(window.jQuery);
        })



</script>

@include('includes/footer_end')
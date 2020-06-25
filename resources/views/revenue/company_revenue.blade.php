@include('includes/header_start')

<!-- Put extra Css here -->
    <style>
        .dashboard_card {
            border: 2px solid #2E8BDC !important;
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
        .busines_data{
        font-size: 1.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    table {table-layout:fixed}
td{overflow:hidden; white-space:nowrap}
    </style>
<link rel="stylesheet" href="/assets/plugins/morris/morris.css">
   
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                    
                            <h4 class="page-title busines_data"> <i class="dripicons-meter"></i><span style="text-transform: uppercase;">{{ $company_name }}</span> REVENUES TILL DATE = INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format(round($total)) ?></h4>

                        </div>
                    </div>
                </div>

                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="morris-bar-example" class="dash-chart"></div>

                        <div class="mt-4 text-center">
                            <a href="/revenue/company/{{$company_name}}"><button type="submit" class="btn btn-outline-info ml-1 waves-effect waves-light">Home</button></a>
                            
                            <a href="/fonik_employee_list/{{$revenues[0]['company_id']}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Member Details</button></a>
                            
                            <a href="/member_show/{{$revenues[0]['company_id']}}/{{1}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Company KYC</button></a>
                             
                             <a href="/member_agreement/{{$revenues[0]['company_id']}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Agreement</button></a>
                           
                            <a href="/revenue/company/invoice/{{$company_name}}"><button type="submit" class="btn btn-outline-light ml-1 waves-effect waves-light">Tax Invoice </button></a>
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
                    <div class="card-body company_page">
                        <table style="font-size: 16px;text-align: center;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;">
                                <tr>
                                    <th><b>SR. NO.</b></th>
                                    <th><b>MONTH</b></th>
                                    <th><b>REVENUES</b></th>
                                    <th><b>SEATS</b></th>
                                    <th><b>PER SEATS PRICE</b></th>
                                    <th><b>OCCUPANCY %</b></th>
                                    <th><b>MEETING REVENUES</b></th>
                                    <th><b>TOTAL REVENUES</b></th>
                                    <th><b>DUE AMOUNT</b></th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($b as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value['date']}}</td>
                                    <td class="money">{{round($value['monthly_rent'])}}</td>
                                    <td>{{$value['no_of_seats']}}</td>
                                    <td class="money">{{$value['price_per_seat']}}</td>
                                    <td>{{$value['percentage']}}</td>
                                    <td class="money">{{round($value['meeting_revenue'])}}</td>
                                    <td class="money">{{round($value['total_revenue'])}}</td>
                                    <td class="money">{{round($value['due_amount'])}}</td>
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
                hoverCallback: function(index, options, content, row){
                    var revenues = @json($revenues);
                    var html = $.parseHTML(content);

                    var i = new Intl.NumberFormat("en-IN");
                    var revenue_amount = i.format(revenues[index]["total_revenue"]);
                    $(html).eq(1).text("Monthly Revenue- INR " + revenue_amount);
                    $(html).eq(2).text("");
                    if (row['b'] > '0') {

                        $(html).eq(1).append('<br>-----------');

                        $(html).eq(2).html("Unpaid: " + row['b'] + "%<br>Paid: " + row['a'] + "%");
                    }
                    else {
                        $(html).eq(1).append('<br>-----------');
                        $(html).eq(2).html("Paid: " + row['a'] + "%");
                    }

                    
                    return(html);
                },

            });
        },

        Dashboard.prototype.init = function (element, data, xkey, ykeys, labels, lineColors) {
            //creating bar chart
            var $barData = [
                @foreach($revenues as $key=>$value)
                {y: '{{$value["date"]}}', a: '{{round((round($value["amount_received"])/round($value['total_revenue']))*100)}}',b:'{{100-round((round($value["amount_received"])/round($value['total_revenue']))*100)}}'  },
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
    }(window.jQuery);
        })

</script>
<script type="text/javascript">
    $('.money').each(function() { 
        var monetary_value = $(this).text(); 
        var i = new Intl.NumberFormat("en-IN").format(monetary_value);
        $(this).text(i); 
    }); 
</script>

@include('includes/footer_end')
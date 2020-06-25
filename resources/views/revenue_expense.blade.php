@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css">
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .morris-hover{
            position: absolute;
            z-index:1000;
        }
        .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    table{
        table-layout: fixed;
    }
    td{
        overflow: hidden;
    }
    #datatable-buttons_previous,#datatable-buttons_next{
        text-transform: uppercase;
    }
    </style>
@include('includes/header_end')
<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title busines_data">&nbsp;&nbsp;<i class="dripicons-blog"></i>{{strtoupper($monthYear[0])}} MONTHLY P&L= INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL); echo $fmt->format($profit[0]["value"]) ?>  </h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="morris-bar-example" class="dash-chart"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                   <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered  text-center" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;"> 
                                    <tr>
                                        <th><b>SR. No.</b></th>
                                        <th><b>MONTH</b></th>
                                        <th><b>RENTAL REVENUES</b></th>
                                        <th><b>ALTERNATE CHANNEL REVENUES</b></th>
                                        <th><b>TOTAL REVENUES</b></th>
                                        <th><b>TOTAL EXPENSES</b></th>
                                        <th><b>MONTH P&L</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($profits=0);

                                    @for ($i = 0; $i < count($dates); $i++)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$dates[$i]}}</td>
                                        <td>
                                            <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($rent[$i]) ?>
                                        </td>
                                        <td>
                                            <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($alternate[$i]) ?>
                                        </td>
                                        <td>
                                            <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($total_revenue[$i]) ?>
                                        </td>
                                        <td>
                                            <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($expense[$i]) ?>
                                        </td>
                                        <td>
                                            <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($profit[$i]["value"]) ?>
                                            @php($profits+=$profit[$i]["value"])
                                        </td>
                                    </tr>
                                    @endfor
                                    </tbody>
                                    <tr style="background-color: #134C80;color: white;">
                                        <td colspan="2">Total</td>
                                        <td style="display: none;"></td>
                                        <td class="money">{{array_sum($rent)}}</td>
                                        <td class="money">{{array_sum($alternate)}}</td>
                                        <td class="money">{{array_sum($total_revenue)}}</td>
                                        <td class="money">{{array_sum($expense)}}</td>
                                        <td class="money">{{$profits}}</td>
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
    <!-- Required datatable js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
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


<script src="/assets/plugins/morris/morris.min.js"></script>
<script src="/assets/plugins/raphael/raphael-min.js"></script>

<script type="text/javascript">
    $('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            });
</script>
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
                    var revenue = @json($total_revenue);
                    var expense = @json($expense);
                    index = revenue.length - 1 - index;
                    var html = $.parseHTML(content);
                    var loss = Math.round(100 - (revenue[index] / expense[index] * 100));
                    var burn=revenue[index]-expense[index];
                    var i = new Intl.NumberFormat("en-IN");

                    burn=i.format(burn);
                    $(html).eq(1).text("Burns- INR " +burn + " ("+loss + "%)").append('<br />-----------');
                    
                    var rev=i.format(revenue[index])+" ("+(100-loss)+ "%)";
                    $(html).eq(2).html("Revenue- INR " + rev );
                    
                    var exp=i.format(expense[index])
                    $(html).eq(3).html("Expense- INR <span class='amount'>" + exp + "</span>");

                    return(html);
                },
            });
        },

        Dashboard.prototype.init = function (element, data, xkey, ykeys, labels, lineColors) {
            //creating bar chart
            var $barData = [
                @for ($i = count($dates) - 1; $i >= 0; $i--)

                    <?php 
                        if ((($total_revenue[$i] - $expense[$i]) / $expense[$i]) > 0) {
                            $profit = abs(round(($total_revenue[$i] - $expense[$i]) / $expense[$i] * 100));
                            $revenue_value = 100;
                            $loss = 0;
                        }
                        else {
                            $profit = 0;
                            $revenue_value = abs(round(($total_revenue[$i] - $expense[$i]) / $expense[$i] * 100));
                            $loss = (round(($total_revenue[$i] - $expense[$i]) / $expense[$i] * 100));                   
                        }
                     ?>

                    {y: '{{$dates[$i]}}', a: '{{$revenue_value}}', b:'{{$loss}}', c: '{{$profit}}',  },
                @endfor
            ];
            this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c'], ['Revenue', 'Loss', 'Profit'],['#6FD08B','#FF2801', '#0FA325']);

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


@include('includes/footer_end')
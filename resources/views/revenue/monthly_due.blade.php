@include('includes/header_start')

<!-- Put extra Css here -->
    <style>
        .dashboard_card {
            border: 2px solid #2E8BDC !important;
        }
        .busines_data{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    .busines_data2{
        font-size: 2em;
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
        #datatable-buttons_previous,#datatable-buttons_next{
        text-transform: uppercase;
    }
    </style>
<link rel="stylesheet" href="/assets/plugins/morris/morris.css">
   
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i><span id="month_heading">
                            {{strtoupper($yearMonth)}}</span>
                            TOTAL OUTSTANDING = INR <span id="inr_heading"><?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format((int)$monthly_due[count($monthly_due)-1]["monthly_due"]) ?></span>
                            </h4>
                        
                        </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="morris-bar-example" class="dash-chart"></div>
                    </div>
                </div>



        </div>
    </div>

<div class="wrapper">
    <div class="container-fluid">

        <!-- <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div id="monthly_due" style="font-size: 20px;">
                            @if($monthly_due[count($monthly_due)-1]["monthly_due"]!=0)
                                <td>Month Year- {{$monthly_due[count($monthly_due)-1]["month"]}}</td><br>
                                Outstanding Dues- <td class="money"><?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format((int)$monthly_due[count($monthly_due)-1]["monthly_due"]) ?></td><br>
                                <td>Outstanding- {{$monthly_due[count($monthly_due)-1]["monthly_due_percentage"]}} %</td><br>
                            @else
                                <td>Month Year</td><br>
                                <td>Outstanding Dues</td><br>
                                <td>Outstanding %</td><br>
                            @endif
                        </div>
                    <!--     <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Month Year</th>
                                    <th>Outstanding Dues</th>
                                    <th>Outstanding %</th>
                                </tr>
                            </thead>
                            <tbody id="monthly_due"> -->

                                <!-- <tr>
                                    @if($monthly_due[0]["monthly_due"]==1)
                                        <td class="alert alert-danger text-center" colspan="4"><i>No Dues Left- {{$monthly_due[0]["month"]}} </i></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                     @else
                                        <td>1</td>
                                        <td>{{$monthly_due[
                                    count($monthly_due)-1]["month"]}}</td>
                                        <td class="money">{{$monthly_due[count($monthly_due)-1]["monthly_due"]}}</td>
                                        <td>{{$monthly_due[count($monthly_due)-1]["monthly_due_percentage"]}}</td>
                                       <td><a href="/companies_monthly_due/{{$monthly_due[count($monthly_due)-1]['payment_month']}}" class="btn btn-success">More</a></td> 
                                    @endif

                                </tr> 
                            </tbody>
                        </table>-->

                    <!-- </div> -->
                 <!-- </div> -->
                <!-- </div> -->
            <!-- </div>  -->

            <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body company_page ">
                         
                        <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered text-center" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;"> 
                                <tr>
                                    <th><b>SR. NO.</b></th>
                                    <th><b>COMPANY NAME</b></th>
                                    <th><b>OUTSTANDING DUES</b></th>
                                </tr>
                            </thead>
                            <tbody id="company_due">
                                @foreach($company_due as $key => $value)
                                @if($value->outstanding!='0')
                                <tr>
                                    <td>{{$key+1}}</td>
                                    
                                    <td>{{$value->brand_name}}</td>

                                    <td >INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($value->outstanding) ?></td>
                                </tr>
                                @endif
                                @endforeach
                                <tr style="background-color: #134C80;color: white;">
                                    <td colspan="2"><b>TOTAL OUTSTANDING</b></td>
                                    <td style="display: none;"></td>
                                    <td><b>INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format((int)$monthly_due[count($monthly_due)-1]["monthly_due"]) ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div> 
    </div> 
</div>
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
            }).on('click', function(i, row){
                $.ajax({
                    url: "/monthly_due_bar_click/" + row.y,
                    headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    method: 'get',
                    type: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(obj) {
                        console.log(obj);
                         var i = new Intl.NumberFormat("en-IN").format(obj.data.monthly_due);
                        $("#month_heading").html(obj.data.month);
                        $("#inr_heading").html(i);
                        if(obj.data.monthly_due!=0){

                        // var text = `<label style='font-size: 20px;'>Month-Year: ${obj.data.month} </label><br/>
                        // <label style='font-size: 20px;'>Outstanding Dues: ${i}</label> <br/>
                        // <label style='font-size: 20px;'>Outstanding: ${obj.data.monthly_due_percentage} % `;
                        // $("#monthly_due").html(text);
                            
                            $(".tp").show();
                            $("#company_due tr").remove();
                            obj['company_due'].forEach((data,i)=>{
                            if(data.outstanding!='0'){
                            $("#company_due").append('\
                            <tr>\
                            <td>'+(i+1)+'</td>\
                            <td>'+data.company_registered_name+'</td>\
                            <td class="money">'+parseInt(data.outstanding)+'</td>\
                            </tr>\
                            ');
                            }
                            });

                        }
                        else{
                        $("#company_due").html("\
                            <tr>\
                                <td class='alert alert-danger text-center' colspan='3'><i>No Dues Left-"+ obj.data.month +"</i></td>\
                                <td style='display: none'></td>\
                                <td style='display: none'></td>\
                            </tr>\
                            ");

                        $(".tp").hide();
                        
                        }

                    $('.money').each(function() { 
                            var monetary_value = $(this).text(); 
                            var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                            $(this).text(i); 
                        }); 

                    },
                    error: function(obj) {
                      if (obj.status == 401) {
                        swal(
                          'Warning',
                          'You are not Authorized!',
                          'warning'
                        );
                      }

                        
                        alert("Error");
                    }
                });
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
                @foreach($monthly_due as $key => $value)
                {y: '{{$value["month"]}}', a: '{{100 - (int)$value["monthly_due_percentage"]}}',b:'{{(int)$value["monthly_due_percentage"]}}'},
                @endforeach
    
            ];
            this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Monthly Collection', 'Monthly Due'],['#6FD08B','#FF2801']);
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


<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar',
            // backgroundColor: '#fff',
        },
        title: {
            text: 'Monthly Due'
        },
        xAxis: {
            categories: ['Months']
        },
        yAxis: {
            min: 2,
            title: {
                text: 'Overall Monthly Dues'
            }
        },
        legend: {
            reversed: true
        },
        
        plotOptions: {
            series: {
                stacking: 'normal'
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    distance : -50,
                    formatter: function() {
                        var dlabel = this.series.name + '<br/>';
                        dlabel += Math.round((this.percentage*100)/100) + ' %';
                            return dlabel
                     },
                    style: {
                        color: 'white',
                    },
                },
                
            },
        },
        series: [
        @foreach($monthly_due as $key=>$value)
        {
            name: '{{$value["month"]}}',
            data: [{{$value["monthly_due"]}}]
        },
        @endforeach
        ]
    });
});
</script>
 -->
 @include('includes/footer_end')
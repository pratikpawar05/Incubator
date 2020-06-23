@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .busines_data{
        font-size: 3.5em;
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
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            
                          <h4 class="page-title busines_data">&nbsp;&nbsp;&nbsp;<i class="dripicons-blog"></i>SECURITY DEPOSITS = INR 
                            <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($Total_Deposites[0]->deposite) ?>
                                        </h4>
                        </div>
                    </div>
                </div>
    </div>
                <!-- end page title end breadcrumb -->
</div>

        <div class="wrapper">
            <div class="container-fluid">


            <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <div id="container" style=" height: 400px; margin: 0 auto"></div>
                                        <!-- min_width=300 ,max_width=800 -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body text-center">
                              <div class="container-fluid">
                                <!-- <h4 class="mt-0 header-title">Buttons example</h4> -->
                                <!-- <h6 ><b id="total">Total  Deposits Till Date : 
                                </b><span class="money">{{$Total_Deposites[0]->deposite}}</span>
                                </h6>
                                <h6 ><b id="total">Total Deposits Received Till Date : 
                                </b><span class="money">{{$DepositeReceived[0]->deposite_receives}}</span>
                                </h6>
                              </div> -->
                                 <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;"> 
                                    <tr>
                                        <th><b>SR. NO.</b></th>
                                        <th><b>COMPANY NAME</b></th>
                                        <!-- <th>No Of Seats</th> -->
                                        <!-- <th>Price Per Seats</th> -->
                                        <!-- <th>Total Amount</th> -->
                                        <!-- <th>Amount In Month</th> -->
                                        <th><b>SD AMOUNT</b></th>
                                        <!-- <th>Deposits Received</th> -->
                                        <!-- <th>Date Received</th> -->
                                        <!-- <th>Reference No</th> -->
                                        <!-- <th>Start Date</th> -->
                                        <th><b>%SD AMOUNT</b></th>
                                    </tr>
                                    </thead>
                                    @php
                                    $deposit=0;
                                    $deposit_percentage=0;
                                    @endphp
                                    @foreach($SecurityDeposite as $key=>$deposits)
                                    <tbody>
                                    <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$deposits->company_registered_name}}</td>
                                      <!-- <td>{{$deposits->no_of_desk}}</td> -->
                                      <!-- <td class="money">{{$deposits->price_per_seat}}</td> -->
                                      <!-- <td class="money">{{$deposits->net_total}}</td> -->
                                      <!-- <td>{{$deposits->deposits_in_month}}</td> -->
                                      <td class="money">{{$deposits->deposit_amount}}</td>
                                      <td>{{round($deposits->deposit_amount / $Total_Deposites[0]->deposite * 100)}}%</td>
                                      @php
                                      $deposit+=$deposits->deposit_amount;
                                      $deposit_percentage+=round($deposits->deposit_amount / $Total_Deposites[0]->deposite * 100)
                                      @endphp
                                      <!-- <td class="money">{{$deposits->deposit_received}}</td> -->
                                      <!-- <td>{{$deposits->deposits_received_date}}</td> -->
                                      <!-- <td>{{$deposits->deposits_reference_no}}</td> -->
                                       <!-- <td>{{$deposits->start_date}}</td> -->
                                      </tr>
                                      </tbody>
                                      
                                      @endforeach
                                      <tr style="background-color: #134C80;color: white;">
                                          <td colspan="2">Total</td>
                                          <td style="display: none;"></td>
                                          <td class="money">{{$deposit}}</td>
                                          <td> {{$deposit_percentage}}%</td>

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
$('.money').each(function() { 
var monetary_value = $(this).text(); 
var i = new Intl.NumberFormat("en-IN").format(monetary_value);
$(this).text(i); 
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
            // backgroundColor: '#fff',
        },
        title: {

            style: {
            // color: '#000',
            font: 'bold 24px "Trebuchet MS", Verdana, sans-serif'
            },
            text: '<?php $fmt = new NumberFormatter($locale = "en_IN", NumberFormatter::DECIMAL); echo "INR " . $fmt->format($Total_Deposites[0]->deposite); ?>'
        },
        xAxis: {
            // categories: ['Security Deposits'],
        },
        yAxis: {
            min: 2,
            title: {
                text: 'Security Deposits',
            }
        },
        legend: {
            reversed: false,
            enabled: false
        },
        exporting: {
            enabled: false,
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


                        var dlabel = "" + '<br/>';
                        dlabel += Math.round(this.y / {{$Total_Deposites[0]->deposite}} * 100) + '%';
                        // dlabel += this.y;
                            return dlabel
                     },
                    style: {
                        color: 'white',
                    },
                },
                
            },
        },
        tooltip: {
            formatter:function(){

            return this.point.series.name + ': <b>INR ' + check.format(Object.values(this.point.options)) + '</b><br/>';
                // console.log(typeof Object.entries(this.point.options);
            }
        },
        series: [
        @foreach(array_reverse($SecurityDeposite) as $key=>$value)
        {
            name: '{{$value->company_registered_name}}',
           data: [{{$value->deposit_amount}}],

        },
        @endforeach
        ]
    });
});
</script>
@include('includes/footer_end')
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
        .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
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
#myChart {
  image-rendering: -moz-crisp-edges;
  image-rendering: -webkit-crisp-edges;
  image-rendering: pixelated;
  image-rendering: crisp-edges;
  height: 100%;
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
                                            @php
                                                $dateObj   = \DateTime::createFromFormat('Y-m-j',  $revenue_data[0]->label . "-10");
                                                $monthName = $dateObj->format('Y-F');
                                                echo $monthName;
                                            @endphp 



                                             AVERAGE PRICE = INR 

                                             <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format(round($revenue_data[0]->value)) ?>
                                             </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
<!-- 
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="mt-4 text-center">
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
<div class="wrapper">
    <div class="container-fluid">


        <div class="row">
                    <div class="col-12">
                        <div style="height:300px;" class="card m-b-20">
                            <div class="card-body">
                            
                                <div id="myChart"></div>

                           </div>
                        </div>
                    </div> <!-- end col -->
                </div>



        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body company_page text-center">

                        <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;">
                                <tr>
                                    <th><b>SR. NO.</b></th>
                                    <th><b>YEAR/MONTH</b></th>
                                    <th><b>AVERAGE PRICE</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $avg_price=0;
                                @endphp
                                @foreach($revenue_data as $key=>$avg_data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @php
                                                $dateObj   = \DateTime::createFromFormat('Y-m-j', $avg_data->label . "-10");
                                                $monthName = $dateObj->format('Y-F');
                                                echo $monthName;
                                            @endphp
                                        </td>
                                        <td class="money">{{(int)($avg_data->value)}}</td>
                                        @php($avg_price+=(int)($avg_data->value))
                                    </tr>
                                    @endforeach
                                    <tr style="background-color: #134C80;color: white;">
                                      <td colspan="2">Total</td>
                                      <td style="display: none;"></td>
                                      <td  class="money">{{$avg_price}}</td>
                                    </tr>
                                  
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>





<script type="text/javascript">


$(function () {

var chart = new CanvasJS.Chart("myChart", {
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  animationEnabled: true,

  toolTip:{
   content:"{label}: <b>INR {y}</b>" ,
  },
  
  data: [{        
    type: "spline",
    dataPoints: [
      @foreach($graph as $value)     
        { label: '{{$value[0]}}', y: {{$value[1]}}, indexLabel: "{{$value[2]}}", markerType: "circle",  markerColor: "#6B8E23" },
      @endforeach 
    ],
  }]
});
chart.render();
});

</script>



<script type="text/javascript">
    $('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            });
</script>
    

@include('includes/footer_end')
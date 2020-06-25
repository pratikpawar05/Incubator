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
        .businees_table{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
        }

    </style>
<link rel="stylesheet" href="/assets/plugins/morris/morris.css">
   
@include('includes/header_end')


<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div style="line-height: 25px; color: white;">

                            <h4 class="page-title businees_table "> <i class="sdripicons-blog"></i>

                             {{strtoupper($company_name)}} :INVOICE</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12 mb-4">
                        <figure class="highcharts-figure">
                            <div id="tax-container"></div>
                        </figure>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <!-- <div id="morris-bar-example" class="dash-chart"></div> -->

                        <div class="mt-4 text-center">
                            <a href="/revenue/company/{{$company_name}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">HOME</button></a>

                            <a href="/fonik_employee_list/{{$company_invoice[0]['company_id']}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">MEMBER DETAILS</button></a>
                            
                            <a href="/member_show/{{$company_invoice[0]['company_id']}}/{{1}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">COMPANY KYC</button></a>

                             <a href="/member_agreement/{{$company_invoice[0]['company_id']}}">
                                <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">AGREEMENT</button></a>
                            
                            <a href="/revenue/company/invoice/{{$company_name}}"><button type="button" class="btn btn-outline-info ml-1 waves-effect waves-light">TAX  INVOICE</button></a>
                            
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
                    <div class="card-body company_page text-center">
                        <!-- <h5 class="" ><span style="text-transform: uppercase;"></span> Company Invoice</h5> -->
                            <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                            <thead style="background-color: #134C80;color: white;">
                                <tr>
                                    <th><b>SR. NO.</b></th>
                                    <th><b>MONTH</b></th>
                                    <th><b>GST AMOUNT</b></th>
                                    <th><b>PAID/UNPAID</b></th>
                                    <th><b>TDS AMOUNT</b></th>
                                    <th><b>STATUS</b></th>
                                    <th style="text-align: center;"><b>REVENUE INVOICE</b></th>
                                    <th style="text-align: center;"><b>ADDITIONAL REVENUE INVOICE</b></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($monthly_invoice as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value['date']}}</td>
                                    <td>NA</td>
                                    <td>NA</td>
                                    <td>{{ round(($value['total_revenue']*10)/100) }}</td>
                                        @if (round(($value["tds_received"] / (($value["total_revenue"]*10)/100)) * 100) == 100)
                                            <td>Paid</td>
                                        @else
                                            <td>Paid</td>
                                        @endif
                                    <td align="center">
                                        @if(file_exists(public_path().'/assets/company_documents/'.$company_name.'/invoices/'.$value["payment_month"].'/Revenue-'.$value["date"].'.pdf'))

                                        <a href="/assets/company_documents/{{$company_name}}/invoices/{{$value['payment_month']}}/Revenue-{{$value['date']}}.pdf" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>&nbsp; Preview</button></a>
                                        @else
                                        <h2>-</h2>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if(file_exists(public_path().'/assets/company_documents/'.$company_name.'/invoices/'.$value["payment_month"].'/Additional-'.$value["date"].'.pdf'))

                                        <a href="/assets/company_documents/{{$company_name}}/invoices/{{$value['payment_month']}}/Additional-{{$value['date']}}.pdf" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>&nbsp; Preview</button></a>

                                        @else
                                        <h2>-</h2>

                                        @endif
                                    </td>
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

<!-- <script src="assets/pages/dashborad.js"></script> -->


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<script type="text/javascript">

Highcharts.chart('tax-container', {

  chart: {
    type: 'column',
    backgroundColor: 'transparent'
  },
   exporting: {
            enabled: false,
        },

  title: {
    useHTML: true,
    text: '&nbsp;',
  },

  legend: {
    itemStyle: {
        color: 'white'
    },
  },

  xAxis: {
    categories: [
        @foreach($company_invoice as $key=>$value)
            '{{$value["date"]}}',
        @endforeach
    ],
    labels: {
        style: {
            color: 'white',
        }
    },
  },

  yAxis: {
    allowDecimals: false,
    min: 0,
    title: {
      text: 'Amount in %',
      style: {
        color: 'white',
      }
    },
    gridLineColor: '#4a5b8a',
    labels: {
        style: {
            color: 'white',
        },
        formatter: function() {
            return this.value + "%";
        }
    },
  },

  tooltip: {
    formatter: function () {
        if (this.series.name == "GST")
            var tlabel = '<b>' + this.x + '</b><br/>' + this.series.name + ': N.A.<br/>';
        else
            var tlabel = '<b>' + this.x + '</b><br/>' + this.series.name + ': ' + this.y + '%<br/>';
        return tlabel;
    }
  },

  plotOptions: {
    column: {
      stacking: 'normal'
    },
    series: {
        states: {
          inactive: {
            opacity: 1,
          }
        }
    },
  },

  series: [
     {
        name: 'GST',
        data: [
        @foreach($company_invoice as $key=>$value)
            100,
        @endforeach
        ],
        color: '#D3D3D3',
        stack: 'GST'
      }, {
        name: 'GST Unpaid',
        data: [
        @foreach($company_invoice as $key=>$value)
            0,
        @endforeach
        ],
        color: '#FE2700',
        stack: 'GST'
      }, {
        name: 'GST Paid',
        data: [
        @foreach($company_invoice as $key=>$value)
            0,
        @endforeach
        ],
        color: '#62B97B',
        stack: 'GST'
      }, {
        name: 'TDS Unpaid',
        data: [
        @foreach($company_invoice as $key=>$value)
        (100 - {{round(($value["tds_received"] / (($value["total_revenue"]*10)/100)) * 100)}}),
        @endforeach
        ],
        color: '#FE2700',
        stack: 'TDS'
      }, {
        name: 'TDS Paid',
        data: [
        @foreach($company_invoice as $key=>$value)
            {{round(($value["tds_received"] / (($value["total_revenue"]*10)/100)) * 100)}},
        @endforeach
        ],
        color: '#62B97B',
        stack: 'TDS'
      },
  ]
});

</script>
@include('includes/footer_end')
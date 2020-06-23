@include('includes/header_start')

<!-- Put extra Css here -->
<!--     <style>
        .dashboard_card {
            border: 2px solid #2E8BDC !important;
        }
    </style> -->
<style type="text/css">
    .width_change {
        display: inline-block;
        height: 100px;
        border-radius: 5px;
        margin: 1rem;
        position: relative;
        width: 224px;
    }
    .busines_data1{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }

    .dataTables_filter {
        float: left;
        margin:1px;
    }

    .dataTables_filter label {
        margin-top: -15px;
    }
    .align{
        float: right;
        /*padding: 2px;*/
    }
</style>
<link rel="stylesheet" href="/assets/plugins/morris/morris.css">

@include('includes/header_end')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div style="line-height: 24px; color: white;" class="">
                <h4 class="page-title busines_data1"> <i class="dripicons-meter"></i> {{strtoupper($company_name)}} : MEMBERS DETAILS</h4>

            </div>
        </div>
    </div>


<!--         <div class="row">
            <div class="col-12">
                <div style="height:370px;" class="card m-b-20">
                    <div class="card-body">
 -->                        <div class="row">
                            <div style="margin-left: 350px; margin-top:-10px;" class="col-xl-12">
                                <div style="" class="card-body">
                                    <div class="row font_family">
                                      <!--   <h4 class="" style="= 
                                "><b>Ratio</b>-<span style="color:#4BBBCE;">Male</span> : <span style="color: #2F8EE0">Female</span><span style="color:#4BBBCE;"> = {{$male}}</span><span>:</span><span style="color: #2F8EE0">{{$female}}</span></h4> -->
                                    </div>
                                    <div id="gender-ratio-pie-chart" class="dash-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--</div>
            </div>
        </div>-->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="mt-4 text-center">

                <a href="/revenue/company/{{$company_name}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">HOME</button></a>

                <a href="/fonik_employee_list/{{$member_id}}"><button type="button" class="btn btn-outline-info ml-1 waves-effect waves-light">MEMBER Details</button></a>

                <a href="/member_show/{{$member_id}}/{{1}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">COMPANY KYC</button></a>

                <a href="/member_agreement/{{$member_id}}">
                    <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">AGREEMENT</button></a>

                <a href="/revenue/company/invoice/{{$company_name}}">
                    <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">TAX INVOICE</button></a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end page title end breadcrumb -->






<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body text-center">
                        <div class="row ">
                           <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                                    <thead style="background-color: #134C80;color: white;">
                                    <tr>
                                        <th><b>SR.NO.</b></th>
                                        <th><b>NAME</b></th>
                                        <th><b>EMAIL</b></th>
                                        <th><b>CONTACT</b></th>
                                        <th><b>GENDER</b></th>
                                        <th><b>DESIGNATION</b></th>
                                        <!-- <th><b>DATE OF JOINING</b></th> -->
                                        <th><b>STATUS</b></th>
                                        <th style="width: 170px;"><b>ACTION</b></th>


                                    </tr>
                                </thead>
                                @if(isset($employees))
                                @foreach($employees as $key=> $employee)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$employee->customer_Name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->contact}}</td>
                                    <td>{{$employee->gender}}</td>
                                    <td>{{$employee->designation}}</td>
                                    <!-- <td>{{$employee->date_of_joining}} N.A.</td> -->
                                    @if ($employee->status==1)
                                    <td>Active</td>
                                    @else
                                    <td>In-Active</td>
                                    @endif
                                    <td>

                                    @if (Auth::user()->isAuthenticated("Member", "d"))
                                        <a type="button" class="btn btn-danger delete_visitor_btn align" data-toggle="modal" data-target="#myModal" id="{{$employee->id}}">
                                            <span style="color: #fff;"><i class="fa fa-trash" title="Delete Employee"></i></span>
                                        </a>
                                    @endif

                                    @if (Auth::user()->isAuthenticated("Member", u))
                                        <a href="{{url('/editEmployee')}}/{{$employee->id}}" class="align">
                                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                        </a>
                                    @endif

                                    @if (Auth::user()->isAuthenticated("Member", "v"))
                                        <a href="{{url('/employeeDetails')}}/{{$employee->id}}" class="align">
                                            <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        </a>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
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


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Gender', 'No. of male and female'],
                    ['Male', 
                            {{(int) $male}}
                    
                    ],
                    ['Female', 
                           {{ (int) $female }}
                    
                    ],
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    // 'title': 'Male:Female Ratio',
                     titleTextStyle: {
                        color: 'white',   
                        fontName: 'Times New Roman',
                        fontSize: '18', 
                        bold: 'true',    // true or false
                        italic: 'false'  // true of false
                    },
                    legend: {
                       textStyle: { color: 'white',
                        fontSize:'15',
                        }
                     },
                    'backgroundColor': 'transparent',
                    'width': 600,
                    'height': 400,
                    'colors': ["#4BBBCE", "#2F8EE0"]
                };

                // Display the chart inside the <div> element with id="gender-ratio-pie-chart"
                var chart = new google.visualization.PieChart(document.getElementById('gender-ratio-pie-chart'));
                chart.draw(data, options);
            }
        </script>


        @include('includes/footer_end')
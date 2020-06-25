@include('includes/header_start')

<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <style>
        tr th, td {
            text-align: center;
        }
        .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
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
        <div  class="row">
            <div class="col-sm-12">
                <div class="page-title-box">

                    
                    <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>
                        {{strtoupper($company->company_name)}}: AGREEMENT</h4>
                        <br>
                        <img src='{{url("$image_mewo")}}' width="100%" height="350px">
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

                <div style="background-color:;" class="row">
                    <div class="col-12 mb-4">
                        <!-- <div id="morris-bar-example" class="dash-chart"></div> -->
                        <div class="mt-4 text-center">

                            <a href="/revenue/company/{{$company->company_name}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Home</button></a>

                            <a href="/fonik_employee_list/{{$company->id}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Member Details</button></a>

                            <a href="/member_show/{{$company->id}}/{{1}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Company KYC</button></a>

                            <a href="/member_agreement/{{$company->id}}"><button type="button" class="btn btn-outline-info ml-1 waves-effect waves-light">Agreement</button></a>

                            <a href="/revenue/company/invoice/{{$company->company_name}}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Tax Invoice</button></a>
                        
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
                    <div class="card-body text-center">

                        <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
                            <thead style="background-color: #134C80;color: white;">
                                <tr>
                                    <th><b>SR. NO.</b></th>
                                    <th><b>TENURE (In Months)</b></th>
                                    <th><b>LOCK-IN (In Months)</b></th>
                                    <th><b>START DATE</b></th>
                                    <th><b>END DATE</b></th>
                                    <th><b>ACTION</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$company->tenure}}</td>
                                    <td>{{$company->lock_in}}</td>
                                    <td>{{$company->start_date}}</td>
                                    <td>{{$company->end_date}}</td>
                                    <td>
                                        <a href="/assets/company_documents/{{$company->id}}/{{$company->company_name}} agreement.pdf" class="btn btn-success" target="_blank">View</a>
                                    </td>
                                </tr>
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


<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>


@include('includes/footer_end')
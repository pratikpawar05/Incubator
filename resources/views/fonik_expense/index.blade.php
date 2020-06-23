@include('includes/header_start')
<!-- Put extra Css here -->
<!-- DataTables -->


<style type="text/css">
  /* table tbody tr:hover {
    color: white;
    background-color: blue;
  } */
</style>
<style>
        .dashboard_card {
            border: 2px solid #2E8BDC !important;
        }
        .width_change{
            display: inline-block;
            height: 100px;
            border-radius: 5px;
            margin: 1rem;
            position: relative;
            width: 224px;
        }
        .size_badhao{
    color: grey;
    font-size: 1.1em;
    font-weight: 900;
    font-variant: normal;
        }
        .size_badhao2{
    color: grey;
    font-size: 0.8em;
    font-weight: 900;
    font-variant: normal;
        }
        .size_badhao1{
    font-size: 1.6em;
    font-weight: 900;
    font-variant: normal;
        }

a{
  text-decoration:none;
  color: #0062cc;
}

.box{
    padding:30px 0px;
}

.box-part{
    background:#FFF;
    border-radius:0;
    /*padding:15px 10px;*/
    margin:10px 0px;
    width: 250px;
}
.text{
    margin:20px 0px;
}

.fa{
     color:#4183D7;
}


table, tr, td, th
{
    border: 1px solid black;
    border-collapse:collapse;
}
tr.header
{
    cursor:pointer;
}
.header .sign:after{
  content:"+";
  display:inline-block;      
}
.header.expand .sign:after{
  content:"-";
 }
    </style>
    <!-- <style type="text/css">
      .table td, .table th {
    padding: 2px !important;
    </style> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.5/css/autoFill.dataTables.min.css">
@include('includes/header_end')


<div class="container-fluid">

  <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title busines_data"> <i class="dripicons-blog"></i>
                              @php
                                  $dateObj   = \DateTime::createFromFormat('Y-m-j',  $data[0]->date . "-10");
                                  $monthName = $dateObj->format('Y-F');
                                  echo $monthName;
                              @endphp
                              MONTHLY EXPENSE = INR 
                              <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                              echo $fmt->format($data[0]->total) ?>

                                  </h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="morris-bar-example" class="dash-chart"></div>
                    </div>
                    
                </div>

  <div class="row">
    <label style="color: red" id="date_error"></label>
  </div>
</div>
</div>



<div class="wrapper">
  <div class="container-fluid">

<div class="row">
    
        <div class="width_change">
          <div class="card text-center m-b-30 dashboard_card">
            <div class="mb-2 card-body text-muted">
              <h4 class="text-info size_badhao1">INR
                <span class="money">7300000</span>
              </h4>
              <span class="size_badhao"> Approved Budget</span>
            </div>
          </div>
        </div>

    <div class="width_change">
      <a href="">
        <div class="card text-center m-b-30 dashboard_card">
          <div class="mb-2 card-body text-muted">
            <h4 class="text-purple size_badhao1">INR
              <span class="money">2818578</span>
            </h4>
            <span class="size_badhao">Consumed Budget</span>
          </div>
        </div>
      </a>
    </div>

    <div class="width_change">
      <div class="card text-center m-b-30 dashboard_card">
        <div class="mb-2 card-body text-muted">
          <h4 class="text-danger size_badhao1">INR
            <span class="money">4481422</span>
          </h4>
          <span class="size_badhao">Balance Budget</span>
        </div>
      </div>
    </div>
    <div class="width_change">
      <div class="card text-center m-b-30 dashboard_card">
        <div class="mb-2 card-body text-muted">
          <h4 class="text-danger size_badhao1">INR
            <span class="money">769000</span>
          </h4>
          <span class="size_badhao">Approved Monthly</span>
        </div>
      </div>
    </div>
    <div class="width_change">
      <div class="card text-center m-b-30 dashboard_card">
        <div class="mb-2 card-body text-muted">
          <h4 class="text-danger size_badhao1">INR
            <span class="money">{{abs($burns[0]["amount"])}}</span>
          </h4>
          <!-- 3905802 -->
          <span class="size_badhao">Monthly P & L</span>
        </div>
      </div>
    </div>
    </div>

    <br>

    <div class="row">
      <div class="col-12">
        <div class="card m-b-20">
          <div class="card-body">

<!-- <div class="row" style=" color: #ffffff; ">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="sel1">Expense Month:</label>
        <select name="month" class="form-control" id="month" placeholder="Select">
          <option value="">--Select--</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
      </div>
    </div>
    <div class="col-sm-3" >

      <div class="form-group">
        <label for="sel1">Expense Year</label>
        <select name="month" class="form-control" id="year">
          <option value="">--Select--</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
        </select>
      </div>
  </div>

  <div class="col-sm-3" style="margin-top: 25px;">
    <div class="form-group">
        <button  id="filter" class="btn btn-success ">Filter</button>
    </div>
</div>

    <div class="col-sm-3" style="margin-top: 15px;text-align:right">
    <div class="form-group">
      <a class="btn btn-info btn-lg"  href="/expense/create">Add Expense</a>
    </div>
   
  </div>
</div> -->
            <!-- <h3>Expense Module</h3> -->
           <table style="font-size: 16px; border: 2px solid black;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
            <thead style="background-color: #134C80;color: white;">
              
              <tr>
                @if (Auth::user()->isAuthenticated("Expense", "v")) 
                <th style="font-weight: bold;" class='fix' colspan="3">Action</th>
                @endif
                @foreach ($records as $record)
                <th style="padding: .0px;">
                  @if (Auth::user()->isAuthenticated("Expense", "d"))
                    <a type="button" class="btn btn-danger expense_delete_button"  data-toggle="modal"  data-target="#myModal"  id="{{$record['id']}}">
                        <span style="color: #fff;"><i class="fa fa-trash" title="Delete Sales"></i></span>
                    </a>
                  @endif

                  @if (Auth::user()->isAuthenticated("Expense", "u"))
                    <a href="{{route('edit_expense',$record['id'])}}">
                      <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                    </a>
                  @endif
                </th>
                @endforeach
              
              </tr>
              
              <tr>
                <th style="font-weight: bold;" class='fix'>SR. No.</th>
                <th style="font-weight: bold;" class='fix'>Type</th>
                <th style="font-weight: bold;" class='fix'>Budgets</th>
                <?php
                foreach ($records as $record) {
                  echo "<th style='font-weight:bold;' class='" . $record['id'] . "'>" . $record['date'] . "</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>

              <?php
              if (!empty($keys)) {
                $key = 0;
                $in = 1;
                $sr_no = 1;
                for ($index = 0; $index < count($types); $index++) {
                  
                  // echo "<tr>";  

                  if (($index == 0) || ($index == 4)  || ($index == 5) || ($index == 8) || ($index == 9) || ($index == 13) || ($index == 14) || ($index == 18) || ($index == 22) || ($index == 23) || ($index == 30) || ($index == 33)) {            //For serial number

                    if ($index == count($types) - 1) {    // For Total monthly expense
                      echo "<tr class='header'>";  
                      echo "<td class='fix'><i class='fa fa-check'></i></td>";
                    }
                    else if ($index == 14 || $index == 30) {
                      echo "<tr class='header' style='display: none;'>";  
                      echo "<td class='fix'>" . $sr_no . "</i></td>";
                      $sr_no--;
                    }
                    else {                                // Rest of categories
                      echo "<tr class='header expand'>";  
                      echo "<td class='fix'>" . $sr_no . "<span class='sign' style='float:right;'></span></td>";
                    }
                    $sr_no++;
                  }
                  else {                // For empty serial number
                    echo "<tr>";  
                    echo "<td class='fix'></td>";
                  }
                  echo "<td class='fix' >" . $types[$index] . "</td>";
                  if (($index == 0) || ($index == 4) || ($index == 5) || ($index == 8) || ($index == 9) || ($index == 13) || ($index == 14) || ($index == 18) || ($index == 22) || ($index == 23) || ($index == 30)) {       //  For budgets
                    echo "<td class='fix money'>" . $budgets[$key] . "</td>";
                    $key++;
                  } else                  //For empty budget cell
                    echo "<td class='fix'></td>";

                  foreach ($records as $record) {             //For actual data
                    if (($index == 0) || ($index == 4) || ($index == 5) || ($index == 8) || ($index == 9) || ($index == 13) || ($index == 14) || ($index == 18) || ($index == 22) || ($index == 23) || ($index == 30)) {                  // For all categories
                      if ($budgets[$key - 1] > $record[$keys[$index]])      // If expense is less than budget
                        echo "<td class='" . $record['id'] . " money' style='background-color:#33ff00;'>" . $record[$keys[$index]] . "</td>";
                      else                          // Expense is greater than budget
                        echo "<td class='" . $record['id'] . " money' style='background-color:yellow;'>" . $record[$keys[$index]] . "</td>";
                    }
                    else                  //  For all Sub categories
                      echo "<td class='" . $record['id'] . " money'>" . $record[$keys[$index]] . "</td>";
                  }


              ?>
                  </tr>
              <?php
                }  //outer loop
              }  // if
              ?>
              <tr class="header">
                <td class="fix"><i class="fa fa-check"></i></td>
                <td class="fix">MONTHLY REVENUES</td>
                <td class="fix"></td>
                @foreach ($revenues as $revenue)
                  @if (isset($revenue['id']))
                    <td class="money {{$revenue['id']}}">{{$revenue["amount"]}}</td>
                  @endif
                @endforeach
              </tr>

              <tr class="header">
                <td class="fix"><i class="fa fa-check"></i></td>
                <td class="fix">MONTHLY P & L</td>
                <td class="money fix">
                  @if (count($budgets) > 0)
                    {{$budgets[count($budgets) - 1]}}</td>
                  @endif
                @foreach ($burns as $burn)
                  <td class="money {{$burn['id']}}">{{$burn["amount"]}}</td>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
  </div>
</div>
</div>

<!-- ====Delete Visitor required modal Starts========== -->

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

          <div class="modal-body">
              
            <div class="thank-you-pop text-center">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this Member?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger member_delete_btn" data-dismiss="modal">Delete</button>
      </div>

      </div>
  </div>
</div>

<!-- ====Delete Visitor required modal ends========== -->



@include('includes/footer_start')
<!-- Put Extra Js here -->
<!-- Required datatable js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.5/js/dataTables.autoFill.min.js"></script>

<!-- Put extra Css here -->
    <!--Morris Chart-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- <script src="assets/pages/dashborad.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
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
                ykeys: ykeys,
                labels: labels,
                gridLineColor: 'rgba(255,255,255,0.1)',
                gridTextColor: '#fff',
                barSizeRatio: 0.2,
                stacked: true,
                resize: true,
                hideHover: 'auto',
                barColors: lineColors,
                lableColor:'#98a6ad',
                yLabelFormat: function(y) {
                  var i = new Intl.NumberFormat("en-IN");
                  y = i.format(y);
                  return y;
                },
                hoverCallback: function(index, options, content, row) {
                  var revenue_array = @json(array_reverse($revenues));
                  var expense_array = @json(array_reverse($records));
                  var keys = @json(array_keys(array_reverse($records)));
                  var revenue_keys = @json(array_keys(array_reverse($revenues)));
                  var i = new Intl.NumberFormat("en-IN");
                  
                  var expense = i.format(expense_array[keys[index]]["total"]);
                  
                  var revenue = i.format(revenue_array[revenue_keys[index]]["amount"]);
                  var budget = i.format(Number(revenue_array[revenue_keys[index]]["amount"]) + {{$budgets[count($budgets) - 1]}} - Number(expense_array[keys[index]]["total"]));

                  var surplus_budget = Math.round((Number(revenue_array[revenue_keys[index]]["amount"]) + {{$budgets[count($budgets) - 1]}} - Number(expense_array[keys[index]]["total"])) / {{$budgets[count($budgets) - 1]}} * 100);

                  var html = $.parseHTML(content);
                  
                  $(html).eq(1).html("Surplus Budget: INR " + budget + " (" + surplus_budget + "%)");
                  
                  $(html).eq(2).text("------------------------");
                  
                  $(html).eq(3).text("Monthly Revenues: INR " + revenue + " (" + (Math.round(revenue_array[revenue_keys[index]]["amount"] / {{$budgets[count($budgets) - 1]}} * 100)) + "%)");
                  
                  $(html).eq(4).text("Monthly Expenses: INR " + expense + " (" + (Math.round(expense_array[keys[index]]["total"] / {{$budgets[count($budgets) - 1]}} * 100)) + "%)");
                  
                  $(html).eq(5).text("");
                  
                  return html;
                }
            });
        },
        Dashboard.prototype.init = function (element, data, xkey, ykeys, labels, lineColors) {
            //creating bar chart
            var $barData = [
            @for($i = count($records) - 1; $i >= 0; $i--)
               {
                <?php
                  if ($revenues[array_keys($revenues)[$i]]["amount"] > $budgets[count($budgets) - 1]) {
                    $revenue_temp = 0;
                    $expense_temp = 0;
                    $budget = 0;
                    $expense = 0;
                    $revenue = $revenues[array_keys($revenues)[$i]]["amount"];
                  }
                  else if ($records[$i]["total"] > $budgets[count($budgets) - 1]) {
                    $revenue_temp = 0;
                    $expense_temp = 0;
                    $budget = 0;
                    $expense = $records[$i]["total"];
                    $revenue = 0;
                  }
                  else {
                    if ($records[$i]["total"] > $revenues[array_keys($revenues)[$i]]["amount"]) {
                      $revenue_temp = $revenues[array_keys($revenues)[$i]]["amount"];
                      $expense_temp = $records[$i]["total"] - $revenues[array_keys($revenues)[$i]]["amount"];
                      $expense = 0;
                      $revenue = 0;
                      $budget = $budgets[count($budgets) - 1] - $records[$i]["total"];
                    }
                    else {
                      $revenue_temp = 0;
                      $expense_temp = 0;
                      $expense = $records[$i]["total"];
                      $revenue = $revenues[array_keys($revenues)[$i]]["amount"] - $records[$i]["total"];
                      $budget = $budgets[count($budgets) - 1] - $revenues[array_keys($revenues)[$i]]["amount"];
                    }
                  }
                ?>
                  y: '{{$records[$i]["date"]}}',
                  a: {{$revenue_temp}},
                  b: {{$expense_temp}},
                  c: {{$expense}},
                  d: {{$revenue}},
                  e: {{$budget}},
               },
            @endfor
            ];
            this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c', 'd', 'e'], ['Revenue INR', 'Expense INR', 'Expense INR', 'Revenue INR', 'Budget INR'], ['#0FA325', '#FF2801', '#FF2801','#0FA325', '#4782D6']);
        },
        //init
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),
//initializing
    function ($) {
        "use strict";
        $.Dashboard.init();
    }(window.jQuery);
        });
</script>

<script type="text/javascript">
  $(function() {
    $(".expense_delete_button").on("click", function(e) {
      jQuery.noConflict();
      var col = $(this).parent().parent().children().index($(this).parent());
      var expense_id = $(this)[0].id
      var delete_expense_url = '/expense/delete/' + expense_id
      $("#myModal .expense_delete_button").attr("id", expense_id)
      $('#myModal').modal('show');
      $(".member_delete_btn").on("click", function(e) {
        e.preventDefault();
        $.ajax({
          url: delete_expense_url,
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          method: 'get',
          type: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {
            // $('#loading_icon').show();
          },
          success: function(obj) {
            // console.log(obj)
            $(".alert-danger").remove();
            if (obj.status = "success") {
            // console.log(expense_id)

              swal(
                'Success',
                'An Expense deleted <b style="color:green;">successfully</b>!',
                'success'
              )
                location.reload();
            }
            // $("#expense_table tr#"+expense_id).fadeOut()
            $("tr").each(function() {
              $(this).children().filter("td:eq(" + (col + 3) + ")").remove();
              $(this).children().filter("th:eq(" + (col + 3) + ")").remove();
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


            console.log(obj)
            $(".alert-danger").remove();
            console.log(obj.responseJSON.errors)
            $.each(obj.responseJSON.errors, function(key, val) {
              $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>" + val + "</li></ul>")
            });
          },
          complete: function() {
            $('#loading_icon').hide();
          }
        })

      })
    })
  });
</script>


<script>
  $("#filter").on("click", function(e) {
    e.preventDefault()

    var year = $('#year').val()
    var month = $('#month').val()
    if (year == "--Select--" || month == '') {
      $('#date_error').text("Year or Month can't be empty")
    } else {
      $.ajax({
        url: '/filter/' + year + "/" + month,
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'get',
        type: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {
          // alert(obj.id)
          $(".alert-danger").remove();
          if (obj.status == "Expense already exists!") {
            swal(
              'Warning',
              'This Expense Report already exists!',
              'warning'
            )
          }

          $("th,td").not('.fix').hide();
          $("." + obj.id).show();

        },
        error: function(obj) {

          if (obj.status == 401) {
            swal(
              'Warning',
              'You are not Authorized!',
              'warning'
            );
          }


          alert("Expense Report for this month does not exists")
          $(".alert-danger").remove();
          console.log(obj.responseJSON.errors)
          $.each(obj.responseJSON.errors, function(key, val) {
            $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>" + val + "</li></ul>")
          });
        },
        complete: function() {
          $('#loading_icon').hide();
        }
      })
    }
  });
</script>


<script type="text/javascript">
  $("tr:eq(2)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(6)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(7)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(10)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(11)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(15)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(16)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(20)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(24)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(25)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(32)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(32)").css({"text-transform": "uppercase", "font-weight": "bold"});
  $("tr:eq(35)").css({"background-color": "#14497B", "text-transform": "uppercase", "font-weight": "bold", "color": "white"});
  $("tr:eq(36)").css({"background-color": "#14497B", "text-transform": "uppercase", "font-weight": "bold", "color": "white"});
  $("tr:eq(37)").css({"background-color": "#124c7f", "text-transform": "uppercase", "font-weight": "bold", "color": "white"});


$(".header").toggleClass('expand').nextUntil('tr.header').slideToggle(100);
$('.header').click(function() {
  $(this).toggleClass('expand').nextUntil('tr.header').fadeToggle(700);
});


  $('.money').each(function() {
    var monetary_value = $(this).text();
    var i = new Intl.NumberFormat("en-IN").format(monetary_value);
    $(this).text(i);
  });
</script>
@include('includes/footer_end')
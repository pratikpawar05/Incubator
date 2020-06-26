    @include('includes/header_start')
<!-- Put extra Css here -->
    <!--Morris Chart CSS -->
    <style type="text/css">
        .size_badhao{
    color: grey;
    font-size: 1.1em;
    font-weight: 900;
    font-variant: normal;
        }
        .size_badhao1{
    font-size: 1.6em;
    font-weight: 900;
    font-variant: normal;
        }
    </style>
<style type="text/css">

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
    </style>

    <style type="text/css">
    .css_changes{
        font-size: 25px;
        font-weight: 900;
        font-variant: normal;
        letter-spacing: 1px;color: grey;
    }
    .busines_data1{
        font-size: 2em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    .busines_titile{
        color:#00A86B;font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing: 2px;
    }

    .busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    .busines1{
        font-size: 2.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }
    .business_sq{
        color:grey;font-size:1.5em;
        font-weight: 900;
        font-variant: normal;
    }
    .per_person_css{
        color:black;font-size: 2.8em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing: 2px;
    }
    .per_person_css2{
        color:grey;font-size:1.5em;
        font-weight: 900;
        font-variant: normal;
    }
    .font_family{
        /* font-family: cursive; */
    }
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
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

                            <h4 style="font-weight: 900px;" class="page-title busines_data "> <i class="dripicons-meter"></i> DASHBOARD</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12 mb-4">
                        <div id="morris-bar-example" class="dash-chart"></div>

                        <div class="mt-4 text-center">
                            <!-- <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Year 2017</button> -->
                            

<!--                             <a href="/show_occupancy/">
                            <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Monthly Occupancy&nbsp;:&nbsp;{{$occupency[0]}}%</button></a>
 -->                            
                            <a href="/show_occupancy/">
                            <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Monthly Occupancy&nbsp;:&nbsp;{{$occupency[0]}}%</button>
                            </a>
                            

                            <!-- <button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Monthly Collection %</button> -->
                            @if (Auth::user()->isAuthenticated("Dashboard Button", "r"))

                            <a href="{{ url('/activeCompany') }}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Active Company&nbsp;:&nbsp;<?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($member_count)?></button>
                            </a>
                            @endif

                            @if (Auth::user()->isAuthenticated("Dashboard Button", "r"))
                            <a href="{{ url('/fonik_active_member') }}"><button type="button" class="btn btn-outline-light ml-1 waves-effect waves-light">Active Members&nbsp;:&nbsp;<?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($employee_count)?></button>
                            </a>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="container-fluid">
                @if (Auth::user()->isAuthenticated("Cards", "r"))
                <div class="row">
                    <a href="{{url('combined_revenue')}}">

                        <div class="width_change">
                            <div class="card text-center m-b-30 dashboard_card">
                                <div class="mb-2 card-body text-muted">
                                    <h4 class="text-info size_badhao1 ">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($total_revenue_value1) ?> </h4>
                                    <span class="size_badhao" >Monthly Revenues</span>
                                </div>
                            </div>
                    </a>
                    </div>
                    <div class="width_change">
                        <a href="{{url('expense/index')}}">
                            
                        <div class="card text-center m-b-30 dashboard_card">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-purple size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($db_expense1[0]->total) ?></h4>
                                
                                            <span class="size_badhao">Monthly Expense</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="width_change">
                        <a href="{{url('/profit_vs_burns')}}">
                        <div class="card text-center m-b-30 dashboard_card">
                            <div class="mb-2 card-body text-muted">
                                <?php
                                    if ($profit_value1 > 0) {
                                 ?>
                                <h4 class="text-success size_badhao1">
                                   INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($profit_value1) ?>
                                </h4>
                                <?php
                                 }
                                 else {
                                    ?>
                                <h4 class="text-danger size_badhao1">
                                    INR -<?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format(-$profit_value1) ?>
                                </h4>

                                <?php
                                 }
                                 ?>

                                <span class="size_badhao">Monthly P&L</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="width_change">
                        <a href="{{url('/monthly_due')}}">
                        <div class="card text-center m-b-30 dashboard_card">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-danger size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($may_due_amount) ?></h4>
                                <span class="size_badhao">Monthly Due</span>
                            </div>
                        </div>
                       </a>
                    </div>

                    <div class="width_change">
                        <a href="{{url('activeCompany')}}">
                        <div class="card text-center m-b-30 dashboard_card">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-purple size_badhao1">{{$member_count}}</h4>
                                <span class="size_badhao"> Active Companies</span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- end row -->
                </div>
                @endif
                <br>
                        @if (Auth::user()->isAuthenticated("Investor cards", "r"))
                        <div class="container-fluid">
                            
                    <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('combined_revenue')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-info size_badhao1 ">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($total_revenue_value1) ?> </h4>
                                    <span class="size_badhao" >Monthly Revenues</span>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('expense/index')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-purple size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($db_expense1[0]->total) ?></h4>
                                        <span class="size_badhao">Monthly Expense</span>
                            </div>
                             </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('/profit_vs_burns')}}">
                            <div class="mb-2 card-body text-muted ">
                                <?php
                                    if ($profit_value1 > 0) {
                                 ?>
                                <h4 class="text-success size_badhao1">
                                   INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($profit_value1) ?>
                                </h4>
                                <?php
                                 }
                                 else {
                                    ?>
                                <h4 class="text-danger size_badhao1">
                                    INR -<?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format(-$profit_value1) ?>
                                </h4>

                                <?php
                                 }
                                 ?>

                                <span class="size_badhao">Monthly P&L</span>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                             <a href="{{url('/monthly_due')}}">
                            <div class="mb-2 card-body text-muted ">
                               <h4 class="text-danger size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($may_due_amount) ?></h4>
                                <span class="size_badhao">Monthly Due</span>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                     <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                           <a href="{{url('security_deposits')}}">
                            <div class="mb-2 card-body text-muted ">
                               <h4 class="text-danger size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($DepositeReceived) ?>
                                            
                                            </h4>
                                <span class="size_badhao">Security Deposit</span>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('averagePrice')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-info size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format((int)($avg_data)) ?>
                                            
                                    </h4>
                                    <span class="size_badhao">Average Price</span>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                             <a href="{{url('operational_breakeven')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-purple size_badhao1">INR 7,900</h4>
                                <span class="size_badhao">Operational Breakeven</span>                            </div>
                             </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('/read_return_sd')}}">
                            <div class="mb-2 card-body text-muted ">
                                <h4 class="text-primary size_badhao1">
                                INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format((int)($return_sd_amount)) ?>                                
                                </h4>
                                <span class="size_badhao">Returns on SD</span>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </div> 
                @endif
                @if (Auth::user()->isAuthenticated("Fin-head_Fin-exe Cards", "r"))
                <div style="margin-left: 140px;" class="container-fluid">
                            
                    <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('combined_revenue')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-info size_badhao1 ">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($total_revenue_value1) ?> </h4>
                                    <span class="size_badhao" >Monthly Revenues</span>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('expense/index')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-purple size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($db_expense1[0]->total) ?></h4>
                                        <span class="size_badhao">Monthly Expense</span>
                            </div>
                             </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('/profit_vs_burns')}}">
                            <div class="mb-2 card-body text-muted ">
                                <?php
                                    if ($profit_value1 > 0) {
                                 ?>
                                <h4 class="text-success size_badhao1">
                                   INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($profit_value1) ?>
                                </h4>
                                <?php
                                 }
                                 else {
                                    ?>
                                <h4 class="text-danger size_badhao1">
                                    INR -<?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format(-$profit_value1) ?>
                                </h4>

                                <?php
                                 }
                                 ?>

                                <span class="size_badhao">Monthly P&L</span>
                            </div>
                        </a>
                        </div>
                    </div>
                   
                </div>

                <div class="row">

                     <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                             <a href="{{url('/monthly_due')}}">
                            <div class="mb-2 card-body text-muted ">
                               <h4 class="text-danger size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($may_due_amount) ?></h4>
                                <span class="size_badhao">Monthly Due</span>
                            </div>
                        </a>
                        </div>
                    </div>

                     <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                           <a href="{{url('security_deposits')}}">
                            <div class="mb-2 card-body text-muted ">
                               <h4 class="text-danger size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format($DepositeReceived) ?>
                                            
                                            </h4>
                                <span class="size_badhao">Security Deposit</span>
                            </div>
                        </a>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('averagePrice')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-info size_badhao1">INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format((int)($avg_data)) ?>
                                            
                                    </h4>
                                    <span class="size_badhao">Average Price</span>
                            </div>
                            </a>
                        </div>
                    </div> -->
                   <!--  <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                             <a href="{{url('operational_breakeven')}}">
                            <div class="mb-2 card-body text-muted">
                                <h4 class="text-purple size_badhao1">INR 7,900</h4>
                                <span class="size_badhao">Operational Breakeven</span></div>
                             </a>
                        </div>
                    </div> -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center m-b-30 dashboard_card">
                            <a href="{{url('/read_return_sd')}}">
                            <div class="mb-2 card-body text-muted ">
                                <h4 class="text-primary size_badhao1">
                                INR <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
                                            echo $fmt->format((int)($return_sd_amount)) ?>                                
                                </h4>
                                <span class="size_badhao">Returns on SD</span>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </div> 
                @endif


                 </div>
                    <!-- </div> --> -->

                <div class="row">

                    <div style="margin-left: 50px;"  class="col-xl-5">
                        <div class="card m-b-30 dashboard_card">
                            <div style=" height: 590px;" class="card-body text-center">
                                <span style="text-decoration: underline;" class="busines_data1">UPCOMING EVENT</span>
                                
                                <img src="{{url('assets/images/ComingSoon.png')}}" style=" border-radius: 5px;" height="480px">
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>

                        <div  class="col-xl-6">
                        <div class="card m-b-30 dashboard_card">
                        <div style="height:590px;" class="card-body">
                            <center>
                                    <span style="text-decoration: underline;" class="busines_data1">SOCIAL PENETRATION</span>
                                </center>
                        <div  class="box">
                        <div class="container">

                        <div class="row">

                        <div  class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="box-part text-center">

                        <i class="fa fa-google fa-3x" aria-hidden="true"></i>

                        <div class="title">
                        <h4 class="size_badhao1" >GOOGLE :REVIEW</h4>
                         <span style=" color:#449D44;font-size: 1.5em;
                              font-weight: 700;
                              font-variant: normal;
                              letter-spacing: 1px;">76</span>
                        </div>


                        <a href="https://www.google.com/search?sxsrf=ALeKk001p6jtxhGJlomJUeLgk55wYcLCJg%3A1588410274265&ei=ojetXsnaD5vcrQG64aHYCA&q=mewo+reviews&oq=mewo+reviews&gs_lcp=CgZwc3ktYWIQAzoECAAQRzoECCMQJzoGCAAQChAeOgQIABAeOgYIABANEB46BggAEBYQHjoICAAQFhAKEB46BQghEKABUKcqWJk8YPE-aABwAngAgAHDA4gBxw6SAQkwLjIuNS4wLjGYAQCgAQGqAQdnd3Mtd2l6&sclient=psy-ab&ved=0ahUKEwjJs56x6ZTpAhUbbisKHbpwCIsQ4dUDCAw&uact=5#lrd=0x3bbfc1ade1338acd:0xc68e78c683a47e8d,1" target="_blank">Learn More</a>

                        </div>
                        </div>


                        <div style="padding-left:160px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="box-part text-center">

                        <i class="fa fa-google fa-3x" aria-hidden="true"></i>

                        <div class="title">
                        <h4 class="size_badhao1">GOOGLE :LIKES</h4>
                         <span style=" color:#449D44;font-size: 1.5em;
                                              font-weight: 700;
                                              font-variant: normal;
                                              letter-spacing: 1px;">104</span>
                        </div>


                        <a href="https://www.google.com/search?sxsrf=ALeKk001p6jtxhGJlomJUeLgk55wYcLCJg%3A1588410274265&ei=ojetXsnaD5vcrQG64aHYCA&q=mewo+reviews&oq=mewo+reviews&gs_lcp=CgZwc3ktYWIQAzoECAAQRzoECCMQJzoGCAAQChAeOgQIABAeOgYIABANEB46BggAEBYQHjoICAAQFhAKEB46BQghEKABUKcqWJk8YPE-aABwAngAgAHDA4gBxw6SAQkwLjIuNS4wLjGYAQCgAQGqAQdnd3Mtd2l6&sclient=psy-ab&ved=0ahUKEwjJs56x6ZTpAhUbbisKHbpwCIsQ4dUDCAw&uact=5#lrd=0x3bbfc1ade1338acd:0xc68e78c683a47e8d,1" target="_blank">Learn More</a>

                        </div>
                        </div>
                        </div>

                        <div class="row">


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="box-part text-center">

                        <i class="fa fa-facebook fa-3x" aria-hidden="true"></i>

                        <div class="title">
                        <h4 class="size_badhao1">FACEBOOK : LIKES</h4>
                        <span class="" style=" color:#449D44;font-size: 1.5em;
                                                  font-weight: 700;
                                                  font-variant: normal;
                                                  letter-spacing: 1px;">{{ $facebook_like_count }}</span>
                        </div>


                        <a href="https://www.facebook.com/MeWoWorkNest/" target="_blank">Learn More</a>

                        </div>
                        </div>  

                        <div style="padding-left:160px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="box-part text-center">

                        <i class="fa fa-facebook fa-3x" aria-hidden="true"></i>

                        <div class="title">
                        <h4 class="size_badhao1">FACEBOOK :FOLLOW</h4>
                        <span style=" color:#449D44;font-size: 1.5em;
                                                      font-weight: 700;
                                                      font-variant: normal;
                                                      letter-spacing: 1px;">{{ $facebook_follower_count }}</span>
                        </div>


                        <a href="https://www.facebook.com/MeWoWorkNest/" target="_blank">Learn More</a>

                        </div>
                        </div>   

                        </div> 

                        <div class="row">



                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="box-part text-center">

                        <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>

                        <div class="title">
                        <h4 class="size_badhao1">TWITTER :FOLLOW</h4>
                         <span style=" color:#449D44;font-size:1.5em;
                                                      font-weight: 700;
                                                      font-variant: normal;
                                                      letter-spacing: 1px;">{{$tw_followers}}</span>
                        </div>

                        <!-- <div class="text">
                        </div> -->

                        <a href="{{url('https://twitter.com/MeWoWorkNest')}}" target="_blank">Learn More</a>

                        </div>
                        </div>

                        <div style="padding-left:160px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="box-part text-center">

                        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>

                        <div class="title">
                        <h4 class="size_badhao1">INSTAGRAM :FOLLOW</h4>
                        <span style=" color:#449D44;font-size: 1.5em;
                                              font-weight: 700;
                                              font-variant: normal;
                                              letter-spacing: 1px;">{{ $instagram['followers'] }}</span>
                        </div>     

                        <a href="https://www.instagram.com/mewoworknest" target="_blank">Learn More</a>

                        </div>
                        </div>
                        </div>
                        </div>      
                        </div>
                        </div>
                        </div>
                        </div>
            </div>


                <!-- <div style="" class="row">
                    <div class="col-xl-6 offset-md-1">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h2 style="font-variant: normal;
                                letter-spacing: 1px;color: grey;font-weight: 900;">Operational Breakeven : 7,900</h2>
                                <div class="table-responsive">
                                    <table class="table m-t-20 mb-0 table-vertical">

                                        <thead>
                                            <th>Sr No</th>
                                            <th>Cost Title</th>
                                            <th>Cost Per Person</th>
                                            <th>More</th>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>Management</td>
                                            <td>
                                               INR {{ (int)($mewo[0]->salaries/90)}}
                                            </td>
                                            <td>
                                                <a href="{{url('#')}}" class="btn btn-info">More</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>Electricity</td>
                                            <td>
                                                INR {{ (int)($mewo[0]->electricity/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                4
                                            </td>
                                            <td>Housekeeping</td>
                                            <td>
                                                INR {{ (int)($mewo[0]->huose_keeping/90)}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                5
                                            </td>
                                            <td>CCD</td>
                                            <td>
                                               INR {{ (int)($mewo[0]->ccd_materials/90)}}
                                            </td>

                                            <td>
                                               <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                6
                                            </td>
                                            <td>Entertainment</td>
                                            <td>
                                                INR {{(int) ($mewo[0]->entertainment/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                7
                                            </td>
                                            <td>Water</td>
                                            <td>
                                               INR {{ (int)($mewo[0]->water_bills/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                8
                                            </td>
                                            <td>Internet</td>
                                            <td>
                                               INR {{ (int)($mewo[0]->internet_cable_rent/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                9
                                            </td>
                                            <td>Stationary</td>
                                            <td>
                                              INR  {{ (int)($mewo[0]->stationery/90)}}                                                

                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                10
                                            </td>
                                            <td>Marketing</td>
                                            <td>
                                            INR {{ (int)($mewo[0]->marketing/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                11
                                            </td>
                                            <td>Tech</td>
                                            <td>
                                               INR {{ (int)($mewo[0]->tech/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                12
                                            </td>
                                            <td>Generator</td>
                                            <td>
                                                INR {{ (int)($mewo[0]->generators/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                13
                                            </td>
                                            <td>Travel</td>
                                            <td>
                                                INR {{(int) ($mewo[0]->travel/90)}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                14
                                            </td>
                                            <td>Gifting</td>
                                            <td>
                                                INR {{(int) ($mewo[0]->gifting/90)}}   
                                            </td> 

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                15
                                            </td>
                                            <td>Pest Control</td>
                                            <td>
                                                INR {{ (int) ($mewo[0]->pest_control_monthly/90)}} 
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                16
                                            </td>
                                            <td>Misc.& Sundry</td>
                                            <td>
                                                INR {{(int) ($mewo[0]->misc_total/90)}} 
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info">More</button>
                                            </td>  
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
<!-- 
                    <div class="col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                             <h2 style="font-variant: normal;
                                letter-spacing: 1px;color: grey;font-weight: 900;">Active Meetings</h2>

                                <div class="table-responsive">
                                    <table class="table m-t-20 mb-0 table-vertical">
                                        <thead>
                                            <th>Sr No</th>
                                            <th>Company</th>
                                            <th>Time</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Fedex</td>
                                                <td>7:30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>amazon</td>
                                                <td>11:30</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Mcaffen</td>
                                                <td>10:30</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>google</td>
                                                <td>12:30</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>microsoft</td>
                                                <td>7:30</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>swift</td>
                                                <td>5:30</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>swift</td>
                                                <td>5:30</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>swift</td>
                                                <td>5:30</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                        <span class="pull-right" style="-webkit-text-decoration-line: underline; /* Safari */
                                        text-decoration-line: underline;color: blue; ">View all meetings</span>
                                 </div>                                
                            </div> -->
<!--                             <div class="card-body">
                                <h3 style="font-variant: normal;
                                letter-spacing: 1px;color: grey;font-weight: 900;">Ended Meetings</h3>

                                <div class="table-responsive">
                                    <table class="table m-t-20 mb-0 table-vertical">
                                        <thead>
                                            <th>S No</th>
                                            <th>Company</th>
                                            <th>Time</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Fedex</td>
                                                <td>7:30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>amazon</td>
                                                <td>11:30</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Mcaffen</td>
                                                <td>10:30</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>google</td>
                                                <td>12:30</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>microsoft</td>
                                                <td>7:30</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>swift</td>
                                                <td>5:30</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>swift</td>
                                                <td>5:30</td>
                                            </tr>
                                          <tr>
                                                <td>8</td>
                                                <td>swift</td>
                                                <td>5:30</td>
                                            </tr> -->
<!--                                         </tbody>
                                    </table>
                                    <hr>
                                        <span class="pull-right" style="-webkit-text-decoration-line: underline; /* Safari */
                                        text-decoration-line: underline;color: blue; ">View all meetings</span>
                                 </div> -->
                                 
                                
                            </div> 

                        </div>
                    </div>


                </div>
                <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

@include('includes/footer_start')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>

<!-- Put extra Css here -->
    <!--Morris Chart-->
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>

    <!-- <script src="assets/pages/dashborad.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                postUnits:'%',
                barColors: lineColors,
                lableColor:'#98a6ad'
            });
        },
        Dashboard.prototype.init = function (element, data, xkey, ykeys, labels, lineColors) {
            //creating bar chart
            var $barData = [
            @foreach($check as $key =>$value)
               {y: '{{$value["date"]}}', a: {{round(($value["amount_received"] / $value["total_revenue"])*100) }}, b: {{ round(($value["no_of_seats"]/90)*100) }} },
            @endforeach
                // {y: '2018', a: 90, b: 75}    
            ];
            this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Monthly Collection','Monthly Occupancy'], ['#2D8AD9','#4bbbce']);
          
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Gender', 'No. of male and female'],
  ['Male', {{(int)$male}}],
  ['Female', {{(int)$female}}],
]);
  // Optional; add a title and set the width and height of the chart
  var options = {'title': 'Male:Female Ratio', 'backgroundColor': 'transparent', 'width': 600, 'height': 400, 'colors': ["#4BBBCE", "#2F8EE0"]};
  // Display the chart inside the <div> element with id="gender-ratio-pie-chart"
  var chart = new google.visualization.PieChart(document.getElementById('gender-ratio-pie-chart'));
  chart.draw(data, options);
}
</script>

<script type="text/javascript">

$('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            }); 


</script>

@include('includes/footer_end')
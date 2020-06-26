<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>BIZ Nest - Log In ::</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="https://static.wixstatic.com/media/f3c562_5753176a76144c6db8698c3ccb8580e7~mv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/f3c562_5753176a76144c6db8698c3ccb8580e7~mv2.png">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <style type="text/css">
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input { 
            opacity: 0;
            width: 0;
            height: 0;
            }

            .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            }

            .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            }

            input:checked + .slider {
            background-color: #2196F3;
            }

            input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
            border-radius: 34px;
            }

            .slider.round:before {
            border-radius: 50%;
            }
        </style>
    </head>
    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="{{ url('/') }}" class="logo logo-admin"><img src="https://static.wixstatic.com/media/f3c562_4b6baf0c30cd4cea8ec0d9ccd719a564~mv2_d_4800_1800_s_2.png/v1/fill/w_151,h_59,al_c,q_85,usm_0.66_1.00_0.01/BIZ%20Nest%204800%20x%204800.webp" height="30" alt="BIZ Nest Logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Toggle Company</h4>

                        <!-- <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4> -->
                        <p class="text-muted text-center">Please check any one company from below & submit.</p>

                        <form class="form-horizontal m-t-30"  method="POST" action="{{ url('/submitCompany') }}">
                            @csrf
                            <label class="switch">
                                <input type="radio" name="company" value="Millenial POD">
                                <span class="slider round"></span>
                            </label>
                            <span style="font-size: 20px;font-weight: bold;position: absolute;">&nbsp;Millenial POD</span>
                            <br>
                            <br>
                            <label class="switch">
                                <input type="radio" name="company" value="MeWo">
                                <span class="slider round"></span>
                            </label>
                            <span style="font-size: 20px;font-weight: bold;position: absolute;">&nbsp;MeWo</span>
                            <br>
                            <br>

                            <input type="submit" class='btn btn-info' name="" id="">
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Don't have an account ? <a href="{{ url('/register') }}" class="font-500 font-14 text-primary font-secondary"> Signup Now </a> </p>
                <p>© 2020 TechnoMatrix &nbsp;<i class="mdi mdi-heart text-danger"></i> by R-TechSolutions Pvt. Ltd.</p>
            </div>

        </div>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>
    <style type="text/css">
        body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
pre {
  margin: 20px 0;
  padding: 20px;
  background: #fafafa;
}
.busines_data{
        font-size: 3.5em;
        font-weight: 900;
        font-variant: normal;
        letter-spacing:0.5px;
    }

.round { border-radius: 50%; }

.navigation-menu-distance li {
    padding-right: 2%;
}

    </style>
    <script type="text/javascript">
    /*
     * LetterAvatar
     * 
     * Artur Heinze
     * Create Letter avatar based on Initials
     * based on https://gist.github.com/leecrossley/6027780
     */
    (function(w, d){


        function LetterAvatar (name, size) {

            name  = name || '';
            size  = size || 60;

            var colours = [
                    "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
                    "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                ],

                nameSplit = String(name).toUpperCase().split(' '),
                initials, charIndex, colourIndex, canvas, context, dataURI;


            if (nameSplit.length == 1) {
                initials = nameSplit[0] ? nameSplit[0].charAt(0):'?';
            } else {
                initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
            }

            if (w.devicePixelRatio) {
                size = (size * w.devicePixelRatio);
            }
                
            charIndex     = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
            colourIndex   = charIndex % 20;
            canvas        = d.createElement('canvas');
            canvas.width  = size;
            canvas.height = size;
            context       = canvas.getContext("2d");
             
            context.fillStyle = colours[colourIndex - 1];
            context.fillRect (0, 0, canvas.width, canvas.height);
            context.font = Math.round(canvas.width/2)+"px Arial";
            context.textAlign = "center";
            context.fillStyle = "#FFF";
            context.fillText(initials, size / 2, size / 1.5);

            dataURI = canvas.toDataURL();
            canvas  = null;

            return dataURI;
        }

        LetterAvatar.transform = function() {

            Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
                name = img.getAttribute('avatar');
                img.src = LetterAvatar(name, img.getAttribute('width'));
                img.removeAttribute('avatar');
                img.setAttribute('alt', name);
            });
        };


        // AMD support
        if (typeof define === 'function' && define.amd) {
            
            define(function () { return LetterAvatar; });
        
        // CommonJS and Node.js module support.
        } else if (typeof exports !== 'undefined') {
            
            // Support Node.js specific `module.exports` (which can be a function)
            if (typeof module != 'undefined' && module.exports) {
                exports = module.exports = LetterAvatar;
            }

            // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
            exports.LetterAvatar = LetterAvatar;

        } else {
            
            window.LetterAvatar = LetterAvatar;

            d.addEventListener('DOMContentLoaded', function(event) {
                LetterAvatar.transform();
            });
        }

    })(window, document);
</script>
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->


                    <!-- Image Logo -->
                    <!-- <a href="{{ URL:: to('index') }}" class="logo">
                        <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small">
                        <img src="assets/images/logo.png" alt="" height="24" class="logo-large">
                    </a> -->

                </div> 
                <div class="menu-extras topbar-custom">                    
                    <ul class="list-inline float-left mb-0">
                        <!-- notification-->
                        <li class="list-inline-item dropdown notification-list">
                            <div style="" class="text-center">                        
                               <span class="busines_data" style="color: white; font-size:32px;font-weight:1000px;">TechnoMatrix</span>     
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="menu-extras topbar-custom">
                    

                    <ul class="list-inline float-right mb-0">
                        <!-- notification-->
                        <li class="list-inline-item dropdown notification-list">
                        </li>
                        <!-- User-->
                        
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">                                                 
                            <img class="round" width="60" height="60" avatar="{{ Auth()->user()->name['0'] }}">

                            <span class="ml-1">{{ Auth()->user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <a class="dropdown-item" href="{{url('/profile')}}"><i class="fa fa-user"></i> Profile</a>
                                <a style="color:black; border-radius: 5px;" class="nav-link dropdown-item" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="dripicons-exit text-muted"></i>Logout</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                              </form>
                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu navigation-menu-distance">

                        <li class="has-submenu">
                            <a href="{{ URL::to('admin') }}"><i class="dripicons-device-desktop"></i>Dashboard</a>
                        </li>


                         @if (Auth::user()->isAuthenticated("Navigations", "r")) 
                        <li class="has-submenu">
                            <a href="#"><i class="dripicons-suitcase"></i>Navigation<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                       <li><a href="{{url('combined_revenue')}}">Monthly Revenues</a></li>
                                        <li><a href="{{url('expense/index')}}">Monthly Expense</a></li>
                                        <li><a href="{{ url('profit_vs_burns')}}">Monthly P&L</a></li>
                                        <li><a href="{{ url('monthly_due') }}"> Monthly Due</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="{{ url('activeCompany') }}">Active Companies</a></li>
                                        <li><a href="{{ url('fonik_active_member') }}"> Active Members</a></li>
                                        <li><a href="{{url('meeting_room_without_login')}}">Meeting Room hours</a></li>
                                        <li><a href="#">Monthly Events</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif                        

                        @if (Auth::user()->isAuthenticated("Navigations", "r")) 
                        <li class="has-submenu">
                            <a href="#"><i class="dripicons-trophy"></i>Company<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu">
                                <li><a style="color: black;" href="{{url('add_company')}}">Add New Company</a></li>
                                <li><a style="color: black;" href="{{url('companyDetails')}}">All Company List</a></li>
                                <li><a href="{{ URL::to('activeCompany') }}">Active Company List</a></li>
                               <!--  <li><a href="{{ URL::to('advanced-alertify') }}">Alertify</a></li>
                                <li><a href="{{ URL::to('advanced-rangeslider') }}">Range Slider</a></li>
                                <li><a href="{{ URL::to('advanced-sessiontimeout') }}">Session Timeout</a></li> -->
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="dripicons-trophy"></i>Member<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu">
                                <li><a style="color: black;" href="{{url('addMembers')}}">Add New Member</a></li>
                                <li><a style="color: black;" href="{{url('employeList')}}">All Member List</a></li>
                                <!-- <li><a href="{{ URL::to('activeCompany') }}">Active Company List</a></li> -->
                               <!--  <li><a href="{{ URL::to('advanced-alertify') }}">Alertify</a></li>
                                <li><a href="{{ URL::to('advanced-rangeslider') }}">Range Slider</a></li>
                                <li><a href="{{ URL::to('advanced-sessiontimeout') }}">Session Timeout</a></li> -->
                            </ul>
                        </li>

                        

                        <li class="has-submenu">
                            <a href="#"><i class="dripicons-copy"></i>Expense<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="{{ url('expense/create') }}">Add Expense</a></li>
                                        <li><a href="{{ url('expense/index/') }}">View Expense</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="dripicons-to-do"></i>Revenues <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu">
                                <li class="has-submenu">
                                    <a href="#">General Revenues</a>
                                    <ul class="submenu">
                                 @if (Auth::user()->isAuthenticated("Revenue", "c"))
                                        <li><a href="{{ url('revenue_data') }}">Add Revenue</a></li>
                                @endif
                                    @if (Auth::user()->isAuthenticated("Revenue", "r"))
                                        <li><a href="{{url('revenue')}}">View Revenue</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">Additional Revenues</a>
                                    <ul class="submenu">
                                        @if (Auth::user()->isAuthenticated("Additional Revenue", "c"))
                                        <li><a href="{{ url('add_revenue') }}">Add Additional Revenue</a></li>
                                        @endif
                                        @if (Auth::user()->isAuthenticated("Additional Revenue", "r"))
                                         <li><a href="{{ url('additionalRevenue') }}">View Additional Revenue</a></li>
                                         @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="has-submenu">
                            <a href="#"><i class="dripicons-copy"></i>Sales<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        @if (Auth::user()->isAuthenticated("Sales", "c"))
                                        <li><a href="{{ url('sales_form') }}">Add Sales</a></li>
                                        @endif
                                        @if (Auth::user()->isAuthenticated("Sales", "r"))
                                        <li><a href="{{ url('sales/index') }}">View Sales</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        @if (Auth::user()->isAuthenticated("Privileges", "r"))
                        <li class="has-submenu">
                            <a href="#"><i class="fa fa-users"></i>Privileges <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu">
                                <li class="has-submenu">
                                    <a href="#">Users</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/users/create') }}">Add New User</a></li>
                                        <li><a href="{{ url('/users') }}">All User List</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('/role-permission/')}}">Grant/Revoke</a>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">Roles</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/role/create/') }}">Add New Roles</a></li>
                                        <li><a href="{{ url('/role/') }}">All Role List</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">Permissions</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/permission/create/') }}">Add New Permissions</a></li>
                                        <li><a href="{{ url('/permission/') }}">Permission List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @endif

<!-- 
                        <li class="has-submenu">
                            <a href="#"><i class="dripicons-copy"></i>Return SD<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="{{ url('create_return_sd') }}">Add Return SD</a></li>
                                        <li><a href="{{ url('read_return_sd') }}">View Return SD</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->

                        <!-- <li class="has-submenu">
                            <a href="{{ URL::to('admin') }}"><i class="dripicons-device-desktop"></i>Events</a>
                        </li> -->

                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
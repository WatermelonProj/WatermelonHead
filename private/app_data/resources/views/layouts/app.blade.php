<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NutriLive</title>

    {{--Bootstrap--}}
    <link href="{{ asset('theme/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    {{--Font Awesome--}}
    <link href="{{ asset('theme/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    {{--Custom theme--}}
    <link href="{{ asset('theme/gentelella/build/css/custom.min.css') }}" rel="stylesheet">

    @section('links')
    @show

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-pie-chart" ></i> <span>Nutrição Escolar</span></a>
                </div>

                <div class="clearfix"></div>

                <br/>

                {{--Sidebar--}}
                @section('sidebar')
                    @include('sidebar.main_sidebar')
                @show
                {{--Sidebar--}}

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        {{--Faz a verificação se o usuário está logado--}}
                        @if(Auth::check())
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <img src="{{ asset('img/icone.svg') }}" alt="">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profile</a></li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>
                                    {{--<li><button href="{{ Auth::logout() }}"><i class="fa fa-sign-out pull-right"></i> Log Out</button></li>--}}
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="{{ url('/login')}}" class="user-profile">
                                <i class="fa fa-user " aria-hidden="true"></i>
                                    Login
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!--Main-->
        <div class="right_col" role="main">
            @yield('content')
        </div>

    </div>
</div>



</body>
</html>

{{--jQUery--}}
<script src="{{ asset('theme/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
{{--bootstrap--}}
<script src="{{ asset('theme/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
{{--theme scripts--}}
<script src="{{asset('theme/gentelella/build/js/custom.min.js')}}"></script>

@section('scripts')
@show

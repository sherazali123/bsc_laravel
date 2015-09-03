<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @if (isset($controller_heading))
           CSP | {{ $controller_heading }}
        @else
            CSP
        @endif
    </title>
    {!!HTML::style('/css/style.default.css')!!}
    {!!HTML::style('/prettify/prettify.css')!!}
    {!!HTML::script('/prettify/prettify.js')!!}
    {!!HTML::script('/js/jquery-1.8.3.min.js')!!}
    {!!HTML::script('/js/jquery-ui-1.9.2.min.js')!!}
    {!!HTML::script('/js/jquery.validate.min.js')!!}
    {!!HTML::script('/js/bootstrap.min.js')!!}
    {!!HTML::script('/js/dev.js')!!}
    {!!HTML::script('/js/views/application/application.js')!!}
    {!!HTML::script('/js/custom.js')!!}

    @yield('custom_assets')
</head>
<body>
    <div class="mainwrapper">

        <!-- START OF LEFT PANEL -->
        <div class="leftpanel">

            <div class="logopanel">
                <h1><a href="{{URL::to('/dash-board')}}">CSP <span>v1.1</span><br/><span style="font-size: 14px;">Corporate Strategic Planning</span></a></h1>
            </div><!--logopanel-->

            <div class="datewidget">Today is {{ Carbon\Carbon::today()->format('l, M j, Y h:i a') }}</div>
               <div class="leftmenu">
                <ul class="nav nav-tabs nav-stacked">
                    <li class="nav-header">Main Navigation</li>
                    <li class="{{ Request::is('dash-board') ? 'active' : '' }}"><a href="{{URL::to('/dash-board')}}"><span class="icon-align-justify"></span> Dashboard</a></li>
                    @if (Auth::User()->role == 1)
                        <li class="dropdown"><a href="{{url('/users')}}"><span class="icon-briefcase"></span> Users</a>
                        <ul>
                            <!-- <li><a href="{{url('/measures/create')}}">Add new</a></li> -->
                            <li><a href="{{url('/users')}}">Users</a></li>
                        </ul>
                    </li>
                    @elseif (Auth::User()->role == 2)
                        <li class="{{ Request::is('plans') ? 'active' : '' }}"><a href="{{url('/plans')}}"><span class="icon-briefcase"></span> Plans</a>
                           <!-- <ul>
                                <li><a href="{{url('/plans/create')}}">Add new</a></li>
                                <li><a href="{{url('/plans')}}">Plans</a></li>
                            </ul>-->
                        </li>
                        <li class="{{ Request::is('dimensions') ? 'active' : '' }}"><a href="{{url('/dimensions')}}"><span class="icon-briefcase"></span> Dimensions</a>
                            <!--<ul>
                                <li><a href="{{url('/dimensions/create')}}">Add new</a></li>
                                <li><a href="{{url('/dimensions')}}">Dimensions</a></li>
                            </ul> -->
                        </li>
                        <li class="{{ Request::is('objectives') ? 'active' : '' }}"><a href="{{url('/objectives')}}"><span class="icon-briefcase"></span> Objectives</a>
                            <!--<ul>
                                <li><a href="{{url('/objectives/create')}}">Add new</a></li>
                                <li><a href="{{url('/objectives')}}">Objectives</a></li>
                            </ul> -->
                        </li>
                        <li class="{{ Request::is('initiatives') ? 'active' : '' }}"><a href="{{url('/initiatives')}}"><span class="icon-briefcase"></span> Initiatives</a>
                            <!--<ul>
                                <li><a href="{{url('/initiatives/create')}}">Add new</a></li>
                                <li><a href="{{url('/initiatives')}}">Initiatives</a></li>
                            </ul>-->
                        </li>
                        <li class="{{ Request::is('measures') ? 'active' : '' }}"><a href="{{url('/measures')}}"><span class="icon-briefcase"></span> Measures</a>
                            <!--<ul>
                                <li><a href="{{url('/measures/create')}}">Add new</a></li>
                                <li><a href="{{url('/measures')}}">Measures</a></li>
                            </ul>-->
                        </li>
                    @else
                        
                    @endif
                    
                    
                </ul>
            </div><!--leftmenu-->

        </div><!--mainleft-->
        <!-- END OF LEFT PANEL -->

    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
        <div class="headerpanel" style="min-height: 89px;">
            <a href="#" class="showmenu" style="float: left;"></a>
            <div style="font-size: 18px; color: #FFF;font-family: 'RobotoBold', 'HelveticaNeue', Arial, sans-serif;width: 67%;display: block;float: left;margin-left: 60px;margin-top: 25px;text-align: center;position: relative;">Implement your Strategic Plan using Balance Score Card <br/>An enterprise performance management solution by Dr.Rashed Al-jalahma</div>
            <div class="headerright">
                <div class="dropdown notification">
                 
                    <ul class="dropdown-menu">
                        <li class="nav-header">Notifications</li>
                        <li>
                            <a href="#">
                            <strong>3 people viewed your profile</strong><br />
                            <img src="img/thumbs/thumb1.png" alt="" />
                            <img src="img/thumbs/thumb2.png" alt="" />
                            <img src="img/thumbs/thumb3.png" alt="" />
                            </a>
                        </li>
                        <li><a href="#"><span class="icon-envelope"></span> New message from <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href="#"><span class="icon-envelope"></span> New message from <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href="#"><span class="icon-user"></span> <strong>Bruce</strong> is now following you <small class="muted"> - 2 days ago</small></a></li>
                        <li class="viewmore"><a href="#">View More Notifications</a></li>
                    </ul>
                </div><!--dropdown-->

                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">Hi, {!! Auth::User()->name !!}! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('users.edit',Auth::User()->id) }}"><span class="icon-edit"></span> Edit Profile</a></li>
                        <!-- <li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href="#"><span class="icon-eye-open"></span> Privacy Settings</a></li> -->
                        <li class="divider"></li>
                        <li><a href="{!! URL::TO('/logout') !!}"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->

            </div><!--headerright-->

        </div><!--headerpanel-->
        @if(Session::has('message'))
        <p style="margin: 12px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{!! Session::get('message') !!}</p>
        @endif
        <div class="breadcrumbwidget">
            <span><strong>legend Color:</strong>Red - High Risk, Orange - Medium Risk and Green - Low/No Risk</span>
        </div><!--breadcrumbs-->
        <div class="alert alert-class" style="margin: 0px auto;width: 92%;margin-top: 20px;"><b>legend Color: </b>  <span style="color:red">Red</span> - High Risk, <span style="color:#FF9900">Orange</span> - Medium Risk and <span style="color:#55BF3B">Green</span> - Low/No Risk</div>
        @yield('main')

    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->

    <div class="clearfix"></div>

    <div class="footer">
        <div class="footerleft"></div>
        <div class="footerright">&copy; BSC </div>
    </div><!--footer-->


    </div><!--mainwrapper-->
    @yield('before_footerjs')
    @yield('footer_js')

</body>
</html>

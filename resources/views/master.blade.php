<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSC | Dashboard</title>
    {!!HTML::style('/css/style.default.css')!!}
    {!!HTML::style('/prettify/prettify.css')!!}
    {!!HTML::script('/prettify/prettify.js')!!}
    {!!HTML::script('/js/jquery-1.8.3.min.js')!!}
    {!!HTML::script('/js/jquery-ui-1.9.2.min.js')!!}
    {!!HTML::script('/js/jquery.validate.min.js')!!}
    {!!HTML::script('/js/bootstrap.min.js')!!}
    {!!HTML::script('/js/custom.js')!!}

    @yield('custom_assets')
</head>
<body>
    <div class="mainwrapper">

        <!-- START OF LEFT PANEL -->
        <div class="leftpanel">

            <div class="logopanel">
                <h1><a href="dashboard.html">Katniss <span>v1.0</span></a></h1>
            </div><!--logopanel-->

            <div class="datewidget">Today is Tuesday, Dec 25, 2012 5:30pm</div>

            <div class="searchwidget">
                <form action="http://themepixels.com/main/themes/demo/webpage/katniss/results.html" method="post">
                    <div class="input-append">
                        <input type="text" class="span2 search-query" placeholder="Search here...">
                        <button type="submit" class="btn"><span class="icon-search"></span></button>
                    </div>
                </form>
            </div><!--searchwidget-->

            <div class="plainwidget">
                <small>Using 16.8 GB of your 51.7 GB </small>
                <div class="progress progress-info">
                    <div class="bar" style="width: 20%"></div>
                </div>
                <small><strong>38% full</strong></small>
            </div><!--plainwidget-->

            <div class="leftmenu">
                <ul class="nav nav-tabs nav-stacked">
                    <li class="nav-header">Main Navigation</li>
                    <li class="active"><a href="dashboard.html"><span class="icon-align-justify"></span> Dashboard</a></li>
                    <li class="dropdown"><a href="{{url('/dimensions')}}"><span class="icon-briefcase"></span> Dimensions</a>
                        <ul>
                            <li><a href="{{url('/dimensions/create')}}">Add new</a></li>
                            <li><a href="{{url('/dimensions')}}">Dimensions</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span class="icon-briefcase"></span> Objectives</a>
                        <ul>
                            <li><a href="#">Add new</a></li>
                            <li><a href="#">Objectives</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span class="icon-briefcase"></span> Initiatives</a>
                        <ul>
                            <li><a href="#">Add new</a></li>
                            <li><a href="#">Initiatives</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span class="icon-briefcase"></span> Measures</a>
                        <ul>
                            <li><a href="#">Add new</a></li>
                            <li><a href="#">Measures</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--leftmenu-->

        </div><!--mainleft-->
        <!-- END OF LEFT PANEL -->

    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
        <div class="headerpanel">
            <a href="#" class="showmenu"></a>

            <div class="headerright">
                <div class="dropdown notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">
                        <span class="iconsweets-globe iconsweets-white"></span>
                    </a>
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
                        <li><a href="editprofile.html"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href="#"><span class="icon-eye-open"></span> Privacy Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{!! URL::TO('/logout') !!}"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->

            </div><!--headerright-->

        </div><!--headerpanel-->
        @yield('breadcrumbwidget')
        @yield('main')

    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->

    <div class="clearfix"></div>

    <div class="footer">
        <div class="footerleft">Katniss Premium Admin Template v1.0</div>
        <div class="footerright">&copy; ThemePixels - <a href="http://twitter.com/themepixels">Follow me on Twitter</a> - <a href="http://dribbble.com/themepixels">Follow me on Dribbble</a></div>
    </div><!--footer-->


    </div><!--mainwrapper-->
    @yield('before_footerjs')
    @yield('footer_js')

</body>
</html>

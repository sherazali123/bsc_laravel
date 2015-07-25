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
    {!!HTML::script('/js/jquery.flot.min.js')!!}
    {!!HTML::script('/js/jquery.flot.resize.min.js')!!}
    {!!HTML::script('/js/bootstrap.min.js')!!}
    {!!HTML::script('/js/custom.js')!!}
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
                    <li class="dropdown"><a href="#"><span class="icon-briefcase"></span> Dimensions</a>
                        <ul>
                            <li><a href="elements.html">Add new</a></li>
                            <li><a href="bootstrap.html">Dimensions</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Tables</a>
                        <ul>
                            <li><a href="table-static.html">Static Table</a></li>
                            <li><a href="table-dynamic.html">Dynamic Table</a></li>
                        </ul>
                    </li>
                    <li><a href="typography.html"><span class="icon-font"></span> Typography</a></li>
                    <li><a href="charts.html"><span class="icon-signal"></span> Graph &amp; Charts</a></li>
                    <li><a href="messages.html"><span class="icon-envelope"></span> Messages</a></li>
                    <li><a href="buttons.html"><span class="icon-hand-up"></span> Buttons &amp; Icons</a></li>
                    <li class="dropdown"><a href="#"><span class="icon-pencil"></span> Forms</a>
                        <ul>
                            <li><a href="forms.html">Form Styles</a></li>
                            <li><a href="wizards.html">Wizard Form</a></li>
                            <li><a href="wysiwyg.html">WYSIWYG</a></li>
                        </ul>
                    </li>
                    <li><a href="calendar.html"><span class="icon-calendar"></span> Calendar</a></li>
                    <li><a href="animations.html"><span class="icon-play"></span> Animations</a></li>
                    <li class="dropdown"><a href="#"><span class="icon-book"></span> Other Pages</a>
                        <ul>
                            <li><a href="404.html">404 Error Page</a></li>
                            <li><a href="invoice.html">Invoice Page</a></li>
                            <li><a href="editprofile.html">Edit Profile</a></li>
                            <li><a href="grid.html">Grid Styles</a></li>
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
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">Hi, ThemePixels! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.html"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href="#"><span class="icon-eye-open"></span> Privacy Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="index.html"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
            
            </div><!--headerright-->
            
        </div><!--headerpanel-->
        <div class="breadcrumbwidget">
            <ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed selected"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
            <ul class="breadcrumb">
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active">Dashboard</li>
            </ul>
        </div><!--breadcrumbs-->
      <div class="pagetitle">
            <h1>Dashboard</h1> <span>This is a sample description for dashboard page...</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
            <div class="contentinner content-dashboard">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Welcome!</strong> This alert needs your attention, but it's not super important.
                </div><!--alert-->
                
                <div class="row-fluid">
                    <div class="span8">
                        <ul class="widgeticons row-fluid">
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/location.png" alt="" /><span>Maps</span></a></li>
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/image.png" alt="" /><span>Media</span></a></li>
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/reports.png" alt="" /><span>Reports</span></a></li>
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/edit.png" alt="" /><span>New Article</span></a></li>
                            <li class="one_fifth last"><a href="#"><img src="img/gemicon/mail.png" alt="" /><span>Check Mail</span></a></li>
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/calendar.png" alt="" /><span>Events</span></a></li>
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/users.png" alt="" /><span>Manage Users</span></a></li>
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/settings.png" alt="" /><span>Settings</span></a></li>
                            <li class="one_fifth"><a href="#"><img src="img/gemicon/archive.png" alt="" /><span>Archives</span></a></li>
                            <li class="one_fifth last"><a href="#"><img src="img/gemicon/notify.png" alt="" /><span>Notifications</span></a></li>
                        </ul>
                        
                        <br />
                        
                        <h4 class="widgettitle">Report Summary</h4>
                        <div class="widgetcontent">
                            <div id="chartplace2" style="height:300px;"></div>
                        </div><!--widgetcontent-->
                        
                        <h4 class="widgettitle">Recent Articles</h4>
                        <div class="widgetcontent">
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1"><span class="icon-forward"></span> Technology</a></li>
                                    <li><a href="#tabs-2"><span class="icon-eye-open"></span> Entertainment</a></li>
                                    <li><a href="#tabs-3"><span class="icon-leaf"></span> Fitness &amp; Health</a></li>
                                </ul>
                                <div id="tabs-1">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Submitted By</th>
                                                <th>Date Added</th>
                                                <th class="center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#"><strong>Excepteur sint occaecat cupidatat non...</strong></a></td>
                                                <td><a href="#">admin</a></td>
                                                <td>Jan 02, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus...</strong></a></td>
                                                <td><a href="#">themepixels</a></td>
                                                <td>Jan 02, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus</strong></a></td>
                                                <td><a href="#">johndoe</a></td>
                                                <td>Jan 01, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Quis autem vel eum iure reprehenderi...</strong></a></td>
                                                <td><a href="#">amanda</a></td>
                                                <td>Jan 01, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Nemo enim ipsam voluptatem quia</strong></a></td>
                                                <td><a href="#">mandylane</a></td>
                                                <td>Dec 31, 2012</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="tabs-2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Submitted By</th>
                                                <th>Date Added</th>
                                                <th class="center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#"><strong>Nemo enim ipsam voluptatem quia</strong></a></td>
                                                <td><a href="#">mandylane</a></td>
                                                <td>Jan 04, 2012</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Excepteur sint occaecat cupidatat non...</strong></a></td>
                                                <td><a href="#">admin</a></td>
                                                <td>Jan 02, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus...</strong></a></td>
                                                <td><a href="#">themepixels</a></td>
                                                <td>Jan 02, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus</strong></a></td>
                                                <td><a href="#">johndoe</a></td>
                                                <td>Jan 01, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Quis autem vel eum iure reprehenderi...</strong></a></td>
                                                <td><a href="#">amanda</a></td>
                                                <td>Jan 01, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="tabs-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Submitted By</th>
                                                <th>Date Added</th>
                                                <th class="center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#"><strong>Quis autem vel eum iure reprehenderi...</strong></a></td>
                                                <td><a href="#">amanda</a></td>
                                                <td>Jan 03, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Nemo enim ipsam voluptatem quia</strong></a></td>
                                                <td><a href="#">mandylane</a></td>
                                                <td>Dec 31, 2012</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Excepteur sint occaecat cupidatat non...</strong></a></td>
                                                <td><a href="#">admin</a></td>
                                                <td>Jan 02, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus...</strong></a></td>
                                                <td><a href="#">themepixels</a></td>
                                                <td>Jan 02, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus</strong></a></td>
                                                <td><a href="#">johndoe</a></td>
                                                <td>Jan 01, 2013</td>
                                                <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                </div>
                            </div><!--#tabs-->
                        </div><!--widgetcontent-->
                        
                        
                    </div><!--span8-->
                    <div class="span4">
                        <h4 class="widgettitle nomargin">Some Simple Instructions</h4>
                        <div class="widgetcontent bordered">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </div><!--widgetcontent-->
                        
                        <h4 class="widgettitle nomargin">Events this month</h4>
                        <div class="widgetcontent">
                            <div id="calendar" class="widgetcalendar"></div>
                        </div><!--widgetcontent-->
                        
                        <h4 class="widgettitle">Site Impressions</h4>
                        <div class="widgetcontent">
                            <div id="bargraph2" style="height:200px;"></div>
                        </div><!--widgetcontent-->
                        
                        <h4 class="widgettitle">Recently Added Articles</h4>
                        <div class="widgetcontent">
                            <div id="accordion" class="accordion">
                                    <h3><a href="#">Mauris mauris ante, blandit et</a></h3>
                                    <div>
                                        <p>
                                        Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                                        </p>
                                    </div>
                                    <h3><a href="#">Donec et ante phasellus eu ligula</a></h3>
                                    <div>
                                        <p>
                                        Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                        purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                        velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                        suscipit faucibus urna.
                                        </p>
                                    </div>
                                    <h3><a href="#">Quam ante aliquam nisi</a></h3>
                                    <div>
                                        <p>
                                        Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                        Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                        ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                        lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                        </p>
                                        <ul class="margin1020">
                                            <li>List item one</li>
                                            <li>List item two</li>
                                            <li>List item three</li>
                                        </ul>
                                    </div>
                                    <h3><a href="#">Pellentesque habitant morbi</a></h3>
                                    <div>
                                        <p>
                                        Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                        et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                        mauris vel est.
                                        </p>
                                        <p>
                                        Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                        inceptos himenaeos.
                                        </p>
                                   </div>
                            </div><!--#accordion-->
                        </div><!--widgetcontent-->
                    </div><!--span4-->
                </div><!--row-fluid-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
        <div class="footerleft">Katniss Premium Admin Template v1.0</div>
        <div class="footerright">&copy; ThemePixels - <a href="http://twitter.com/themepixels">Follow me on Twitter</a> - <a href="http://dribbble.com/themepixels">Follow me on Dribbble</a></div>
    </div><!--footer-->


    </div><!--mainwrapper-->
    {!!HTML::script('/js/views/master.js')!!}
</body>
</html>
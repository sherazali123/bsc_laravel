<!-- -->
@extends('master')
 
@section('custom_assets')
    {!!HTML::script('/js/jquery.flot.min.js')!!}
    {!!HTML::script('/js/jquery.flot.resize.min.js')!!}
    
@endsection

@section('main')
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
        
 @section('footer_js')
 	{!!HTML::script('/js/views/master.js')!!}
	<script type="text/javascript">

	</script>

@endsection

@stop
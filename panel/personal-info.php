
<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - My Info</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/personal-info.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

    <!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo" /></a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="chart-showcase.html">Charts</a></li>
                <li><a href="user-list.html">Users</a></li>
                <li><a href="form-showcase.html">Forms</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="tables.html">Tables</a></li>
                <li><a href="ui-elements.html">UI Elements</a></li>
                <li class="visible-lg">
                    <input class="search" type="text" style="margin-left:30px;" />
                </li>
            </ul>
        </nav>        
    </header>
    <!-- end navbar -->

	<!-- main container .wide-content is used for this layout without sidebar :)  -->
    <div class="content wide-content">
        <div class="settings-wrapper" id="pad-wrapper">
            <div class="row">
                <!-- avatar column -->
                <div class="col-md-3 col-md-offset-1 avatar-box">
                    <div class="personal-image">
                        <img src="img/personal-info.png" class="avatar img-circle" alt="avatar" />
                        <p>Upload a different photo...</p>
                        
                        <input type="file" />
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-7 personal-info">
                    <div class="alert alert-info">
                        <i class="icon-lightbulb"></i>
                        This page shows an example of an alternative layout with the main navbar on the top
                        <br> using <strong>.content.wide-content</strong> for this main container
                    </div>
                    <h5 class="personal-title">Personal info</h5>

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">First name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="Alejandra" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Last name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="Galvan" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Company:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="Design Co." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="alejandra@design.com" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Time Zone:</label>
                            <div class="col-lg-8">
                                <div class="ui-select">
                                    <select id="user_time_zone" name="user[time_zone]">
                                        <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                        <option value="Alaska">(GMT-09:00) Alaska</option>
                                        <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                        <option value="Arizona">(GMT-07:00) Arizona</option>
                                        <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                        <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                        <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                        <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Username:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="alegalvan" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Password:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="password" value="blablablabla" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Confirm password:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="password" value="blablablabla" />
                            </div>
                        </div>
                        <div class="actions">
                            <input type="button" class="btn-glow primary" value="Save Changes">
                            <span>OR</span>
                            <input type="reset" value="Cancel" class="reset">
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>
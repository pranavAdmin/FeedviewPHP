<?php 

	include("./config.php");
	include("class/class.db.php");
	include("class/class.query.php");
	$_SESSION['registerUser']='';
	if(!isset($_SESSION['registerUser']) && $_SESSION['registerUser']==""){
			//header("Location:login.php");
	}
	?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>FLAT - Dashboard</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- chosen -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/chosen/chosen.css">
	<!-- select2 -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>themes.css">


	<!-- jQuery -->
	<script src="<?php echo SITE_JS; ?>jquery.min.js"></script>
	
	
	<!-- Nice Scroll -->
	<script src="<?php echo SITE_PLUGIN_JS;?>nicescroll/jquery.nicescroll.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo SITE_PLUGIN_JS;?>jquery-ui/jquery.ui.core.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- Touch enable for jquery UI -->
	<script src="<?php echo SITE_PLUGIN_JS;?>touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="<?php echo SITE_PLUGIN_JS;?>slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo SITE_JS; ?>bootstrap.min.js"></script>
	<!-- vmap -->
	<script src="<?php echo SITE_PLUGIN_JS;?>vmap/jquery.vmap.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>vmap/jquery.vmap.world.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>vmap/jquery.vmap.sampledata.js"></script>
	<!-- Bootbox -->
	<script src="<?php echo SITE_PLUGIN_JS;?>bootbox/jquery.bootbox.js"></script>
	<!-- Flot -->
	<script src="<?php echo SITE_PLUGIN_JS;?>flot/jquery.flot.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>flot/jquery.flot.bar.order.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>flot/jquery.flot.resize.min.js"></script>
	<!-- imagesLoaded -->
	<script src="<?php echo SITE_PLUGIN_JS;?>imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- PageGuide -->
	<script src="<?php echo SITE_PLUGIN_JS;?>pageguide/jquery.pageguide.js"></script>
	<!-- FullCalendar -->
	<script src="<?php echo SITE_PLUGIN_JS;?>fullcalendar/fullcalendar.min.js"></script>
	<!-- Chosen -->
	<script src="<?php echo SITE_PLUGIN_JS;?>chosen/chosen.jquery.min.js"></script>
	<!-- select2 -->
	<script src="<?php echo SITE_PLUGIN_JS;?>select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo SITE_PLUGIN_JS;?>icheck/jquery.icheck.min.js"></script>

	<!-- Theme framework -->
	<!--<script src="<?php echo SITE_JS; ?>eakroko.min.js"></script>-->
	
	<!-- Theme scripts -->
	<script src="<?php echo SITE_JS; ?>application.min.js"></script>
	<!-- Just for demonstration -->
<!--	<script src="<?php echo SITE_JS; ?>demonstration.min.js"></script>-->
	
	<!--[if lte IE 9]>
		<script src="<?php echo SITE_PLUGIN_JS;?>placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->

	<!-- Favicon -->
	<script src="<?php echo SITE_JS; ?>customFunctions.js"></script>
	<link rel="shortcut icon" href="<?php echo SITE_IMG;?>favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo SITE_IMG;?>apple-touch-icon-precomposed.png" />

</head>
<body>
<script type="text/javascript">
	$(document).ready(function(e) {
		$("#signOut").click(function(e) {
			$.post("../admin/include/commonAjax.php",{"ajax":"1","action":"signout"}).done(function(str){if(str==1){document.location="login.php"}});
        });
    });
	</script>
<div id="navigation">
		<div class="container-fluid">
			<a href="index.php" id="brand">FLAT</a>
			<ul class='main-nav'>
				<li class='active'>
					<a href="index.php">
						<span>Dashboard</span>
					</a>
				</li>
			</ul>
			<div class="user">
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">John Doe <img src="<?php echo SITE_IMG;?>demo/user-avatar.jpg" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="#">Edit profile</a>
						</li>
						<li>
							<a href="#">Account settings</a>
						</li>
						<li>
							<a id="signOut" class="signOut" style="cursor:pointer;">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <div class="container-fluid" id="content">
		<!-- Menu Bar -->
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
                        
							<a href=""><?php echo ucfirst($file_name); ?></a>
						</li>
					</ul>
				</div>			
		
		

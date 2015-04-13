<?php
include_once("config.php");
include_once 'include/class/class.db.php';

if(isset($_POST['submit'])&& $_POST['submit']=="Sign me in"){
	$data=new db();
	$error=array();
	if($_POST['uemail']=="" && !isset($_POST['uemail'])){
		$error[]="Please insert user name or email";
	}
	if(!isset($_POST['upw']) && $_POST['upw']==""){
		$error[]="Please insert password";
	}
	$users=$data->select(TAB_USER,"name='".$_POST['uemail']."' AND password=md5('".$_POST['upw']."')");
	foreach ($users as $user){
		if(count($user)==0){
			$error[]="User or Password not in our account";
		}
		else if($user['name']!=$_POST['uemail'] && $user['password']!=md5($_POST['upw'])){
			$error[]="User name or password in invalid";
		}
		else if($user['name']==$_POST['uemail'] && $user['password']==md5($_POST['upw'])){
			$_SESSION['registerUser']=base64_encode($user['user_id']."/".$user['name']);
			header("Location:dashboard.php");
			
		}
	}
	
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
	
	<title><?php echo str_replace("_", " ", $project_name);?></title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap-responsive.min.css">
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
	<!-- Validation -->
	<script src="<?php echo SITE_PLUGIN_JS;?>validation/jquery.validate.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo SITE_PLUGIN_JS;?>icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo SITE_JS; ?>bootstrap.min.js"></script>
	<script src="<?php echo SITE_JS; ?>eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo SITE_IMG;?>favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo SITE_IMG;?>apple-touch-icon-precomposed.png" />

</head>

<body class='login'>
	<div class="wrapper">
		<h1><a href="#"><img src="<?php echo SITE_IMG;?>logo-big.png" alt="" class='retina-ready' width="59" height="49"><?php echo ucwords(str_replace("_", " ", $project_name));?></a></h1>
		<?php if(isset($error) && count($error)>0){ ?><div class="error"><?php foreach ($error as $errors){ echo "<span>".$errors."</span>";}?></div><?php }?>
		<div class="login-body">
			<h2>SIGN IN</h2>
			<form action="" method="post" class='form-validate' id="test">
				<div class="control-group">
					<div class="email controls">
					<input type="text" name='uemail' placeholder="User Name" autosuggest="off" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="upw" placeholder="Password" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<div class="remember">
						<input type="checkbox" name="remember" class='icheckbox_square-blue' data-skin="square" data-color="blue" id="remember"> 
			            <label for="remember">Remember me</label>
					</div>
					<input type="submit" name="submit" value="Sign me in" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget">
				<a href="#"><span>Forgot password?</span></a>
			</div>
		</div>
	</div>
</body>

</html>

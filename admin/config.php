<?php 
	ob_start();
	$pagename=basename($_SERVER['PHP_SELF']);

	$info = pathinfo($pagename);
	$file_name =  basename($pagename,'.'.$info['extension']);

	define("NOOFRECORD",6);	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	session_start();

//	include("include/class/pdo.class.php");

	//====== DATABASE Settings========

/*	define("HOST","localhost");
	define("DATABASE","");
	define("USER","root");
	define("PASSWORD","");*/
	$project_name="all_structure";
	define("DS",DIRECTORY_SEPARATOR);
	
	
	//====== SITE url ================
	$site=$_SERVER['HTTP_HOST'];
	define("SITE_ROOT","http://".$site.DS.$project_name."/admin/");
	define('SITE_URL',SITE_ROOT);
	define('SITE_URL_ADMIN', SITE_URL.'admin/');
	define('HTTP_COOKIE_PATH', SITE_ROOT);  
	define('SITE_INCLUDE',SITE_URL."include/");
	define('SITE_CSS', SITE_INCLUDE .'css/');
	define('SITE_WS_IMAGES', SITE_INCLUDE.'images/');
	define('SITE_WS_VIDEOS', SITE_INCLUDE.'videos/');
	define('SITE_WS_MAILP', SITE_INCLUDE.'openinviter/');
	define('SITE_WS_ADVE', SITE_WS_IMAGES.'advertise/');
	define('SITE_WS_SLIDESHOW', SITE_WS_IMAGES.'slide_show/');	
	define('SITE_WS_GRAPH', SITE_INCLUDE.'graph/');	
	define('SITE_IMG', SITE_INCLUDE . 'img/');
	define('SITE_JS', SITE_INCLUDE.'js/');
	define('SITE_PLUGIN_JS', SITE_INCLUDE.'js/plugins/');	
	define('SITE_ADMIN', SITE_URL );
	define('SITE_ADMIN_CSS',SITE_ADMIN.'admin/include/css/');
	define('SITE_ADMIN_IMG', SITE_ADMIN . 'include/images/');			
	
	/****DIR URL******/
	$dir=$_SERVER['DOCUMENT_ROOT'].DS;

	define('DIR_FS',$dir.$project_name.DS);
	define('DIR_FS_ADMIN',DIR_FS.'admin/');
	define('DIR_FS_IMG', DIR_FS.'images/');
	define('DIR_FS_VID', DIR_FS.'videos/');
	define('DIR_FS_MAILP', DIR_FS.'openinviter/');
	define('DIR_FS_IMG_ADVR', DIR_FS_IMG.'advertise/');
	define('DIR_FS_IMG_SLIDESHOW', DIR_FS_IMG.'slide_show/');	
	define('DIR_FS_SITE_IMG', DIR_FS_IMG.'site/');
	define('DIR_FS_ADM_IMG', DIR_FS_IMG.'cp/');
	define('DIR_FS_INCLUDES',DIR_FS.'include/');
	define('DIR_FS_JS',DIR_FS_INCLUDES.'javascripts/');


	/******table********/
	define("TAB_USER", "user");
	define("TAB_ADMIN_MENU","admin_menu");
	define("TAB_CMS_MANAGER","cms_manager");
	define("TAB_GALLERY","gallery");
	define("TAB_ANDROID_API","android_api");
	
	define('NO_IMAGE', SITE_URL.'images/site/noimage.jpg');
	
?>
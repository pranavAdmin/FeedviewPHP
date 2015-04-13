<?php
	$pagename=basename($_SERVER['PHP_SELF']);
	define("NOOFRECORD",6);	
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('display_errors', 1);
	session_start();

	date_default_timezone_set ("Asia/Calcutta");
	define('HTTP_SERVER', 'http://localhost/mintuimpex'); 
	define('HTTPS_SERVER', ''); 
	define('ENABLE_SSL', false);
	define('HTTP_COOKIE_DOMAIN', 'http://localhost/mintuimpex');
	define('HTTPS_COOKIE_DOMAIN', '/');
	define('SITE_URL', 'http://localhost/mintuimpex/');
	define('SITE_NAME','groupforshop team');
	define('SITE_EMAIIL','scstestmail1@gmail.com');	

	//  slide show
	define('SITE_URL_ADMIN', SITE_URL.'webadmin/');
	define('HTTP_COOKIE_PATH', 'http://localhost/mintuimpex/');  
	define('SUPPLIER_SITE_URL',SITE_URL.'supplier/login.php');  
	define('SITE_CSS', SITE_URL.'css/');
	define('DIR_WS_IMAGES', SITE_URL.'images/');
	define('DIR_WS_VIDEOS', SITE_URL.'videos/');
	define('SITE_URL_VIDEO', SITE_URL.'video/');
	define('DIR_WS_MAILP', SITE_URL.'openinviter/');
	define('DIR_WS_ADVE', DIR_WS_IMAGES.'advertise/');
	define('DIR_WS_SLIDESHOW', DIR_WS_IMAGES.'slide_show/');	
	define('DIR_WS_INCLUDES', SITE_URL.'include/');
	define('DIR_WS_GRAPH', DIR_WS_INCLUDES.'graph/');	

	define('SITE_IMG', DIR_WS_IMAGES . 'site/');
	define('ADMIN_IMG', DIR_WS_IMAGES . 'cp/');
	define('SITE_JS', SITE_URL.'js/');
	define('ADMIN', SITE_URL . 'administrator/');
	define('ADMIN_SITE_CSS', ADMIN.'css/');
	define('ADMIN_IMG', ADMIN . 'images/');			

	define('DIR_FS','G:/xampp/htdocs/mintuimpex/');
	define('DIR_FS_ADMIN',DIR_FS.'administrator/');
	define('DIR_FS_IMG', DIR_FS.'images/');
	define('DIR_FS_VID', DIR_FS.'videos/');
	define('DIR_FS_MAILP', DIR_FS.'openinviter/');
	define('DIR_FS_IMG_ADVR', DIR_FS_IMG.'advertise/');
	define('DIR_FS_IMG_SLIDESHOW', DIR_FS_IMG.'slide_show/');	
	define('DIR_FS_SITE_IMG', DIR_FS_IMG.'site/');
	define('DIR_FS_ADM_IMG', DIR_FS_IMG.'cp/');
	define('DIR_FS_INCLUDES',DIR_FS.'include/');
	define('DIR_FS_JS',DIR_FS_INCLUDES.'javascripts/');
	if(!is_dir(DIR_FS.'order_invoice')) {
		mkdir(DIR_FS.'order_invoice', 7777);
	}

	define('DIR_FS_ORDER_INVOICE_FOLDER',DIR_FS.'order_invoice');

	define('NO_IMAGE', SITE_URL.'images/site/noimage.jpg');
	define('CUTMATDIFF', '2');
	
	define('RACKS_SEQ', 'RACKS_SEQ');
	define('PROD_DOM_SEQ', 'PROD_DOM_SEQ');
	define('PROD_INT_SEQ', 'PROD_INT_SEQ');

	define('DB_SERVER', 'localhost');
	define('DB_SERVER_USERNAME', 'root');
	define('DB_SERVER_PASSWORD', '');
	define('DB_DATABASE', 'mintuimpex');
	define('USE_PCONNECT', 'false');
	define('STORE_SESSIONS', 'mysql');
	define('RECORDS_PER_PAGE',10);

    ///////////////// difine
	define("UPDATE_CITY_MSG","State updated successfully.");

/////////////////////// Tables /////////////////////////
	define(TAB_STATE_MASTER,"go4_state_master");	
	define(TAB_DEPARTMENT_MASTER,"go4_department_master");
	define(TAB_BRAND_MASTER,"go4_brand_master");
	define(TAB_SUPPLY_CHANNEL_MASTER,"go4_supply_channel_master");
	define(TAB_ADVERTISE_POSITION_MASTER,"go4_advertise_position_master");
	define(TAB_EMAIL_TEMPLATE,"go4_email_template");	
	define(TAB_ADVERTISE_MASTER,"go4_advertise_master");
	define(TAB_USER_MASTER,"go4_user_master");
	define(TAB_CATEGORY_MASTER,"go4_category_master");
	define(TAB_COUNTRY_MASTER,"go4_country_master");
	define(TAB_MANAGE_CONTENT,"go4_manage_content");
	define(TAB_ADM_ADMIN,"adm_admin");
	define(TAB_SUPPLIER_USER,"go4_supplier_user");	
	define(TAB_CUSTOMER_PRODUCT_GROUP,"go4_customer_product_group");
	define(TAB_PRODUCT_GROUP_MEMBER,"go4_product_group_member");
	define(TAB_CUSTOMER_PRODUCT_GROUP_MEMBER,"go4_customer_product_group_member");
	define(TAB_SUPPLIER_MASTER,"g4s_supplier_master");
	define(TAB_USER_WHSH_LIST,"go4_user_wish_list");
	define(TAB_PRODUCT_MASTER,"product_master");
	define(TAB_PRODUCT_SMALL_IMAGE,"prd_small_image");
	define(TAB_SECURITY_QUESTION,"go4_security_question");
	define(TAB_DELIVERY_ADDRESS,"go4_group_new_delivery_address");
	define(TAB_CARD_MASTER,"go4_card_master");
	define(TAB_SUPPLIER_INFORMATION,"go4_supplier_information");
	define(TAB_PRO_TRADE_PRICE,"product_trade_price");
	define(TAB_MANAGE_PRODUCT,"manage_product");
	define(TAB_USER_INVITE_FRDLIST,"user_invite_friend_list");
	define(TAB_ORDER_MASTER,"go4_order_master");	
	define(TAB_ORDER_DETAILS,"go4_order_detail");
	define(TAB_CONTACT,"go4_contact_us");
	define(TAB_IMG_SLIDESHOW,"go4_image_slideshow");		
	define(TAB_SUGGEST_PRODUCT,"go4_suggest_product");
	define(TAB_COUNTRY_WISE_TAX,"country_wise_tax");
	define(TAB_SUB_CATEGORY_MASTER,'go4_sub_category_master');

	require_once(DIR_FS_INCLUDES.'functions/function.php');
	if (!function_exists('checkformnu')) {
		function checkformnu($checkstring,$full_url){
	 $newurl=explode($checkstring,$full_url);	 
	 if($newurl[0] != $full_url){
		return $checkstring;
	  }else{
	  	return '';
	  }
	}
}
	if(isset($_SESSION['user_id'])){
		$_SESSION['user_id'] =$user_id;  
	}
	else{
		$_SESSION['user_id'] =$user_id1;  
	}
?>
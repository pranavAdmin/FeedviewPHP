<?php
include_once '../config.php';
include_once 'class/class.query.php';

if (isset($_POST['ajax'])&&$_POST['action']=="signout"){
	if (isset($_SESSION['registerUser'])){
		unset($_SESSION['registerUser']);
		echo "1";
	}
	else echo "0";
}

if(isset($_POST['edit_id'])&& $_POST['edit_id']!=''){
	$table=new query();

	$rows=$table->select(TAB_CMS_MANAGER,"id='".$_POST["edit_id"]."'");
	foreach ($rows as $row){
		$description=$table->insertCk("description", html_entity_decode($row['description']));
		$Arr=array("page_name"=>$row['page_name'],"meta_title"=>$row["meta_title"],"meta_keyword"=>$row["meta_keyword"],"meta_description"=>$row["meta_description"],"tracking_code"=>$row["tracking_code"],"baner_img"=>$row["baner_img"],"c_status"=>$row["c_status"]);
	}	
	echo $description."##".json_encode($Arr);
	die;	
}

/*android api editor*/
if(isset($_POST['android_edit_id'])&& $_POST['android_edit_id']!=''){
	$table=new query();

	$rows=$table->select(TAB_ANDROID_API,"id='".$_POST["android_edit_id"]."'");
	foreach ($rows as $row){
		$description=$table->insertCk("description", html_entity_decode($row['description']));
		$Arr=array("name"=>$row['name'],"status"=>$row["status"]);
	}
	echo $description."##".json_encode($Arr);
	die;
}
/**/
/* Android feed */
if(isset($_POST['android_feed'])&& $_POST['android_feed']!=''){
	
	$table=new query();
	$rows=$table->select(TAB_ANDROID_API);
	$Tarr=array();
	foreach ($rows as $row){
		$Tarr[]=array("id"=>$row['id'],"name"=>$row['name'],"image"=>str_replace("localhost", "10.0.2.2", $table->ImageTagRemove($row['profile_image'])),"status"=>$table->filterData($row["description"]),"profilePic"=>"","timestamp"=>strtotime($row["timestamp"]),"url"=>"");
	}
	$arr=array("feed"=>$Tarr);
	header("Content-Type: application/json");
	echo json_encode($arr);
	die;
}
/*********/


if(isset($_POST['ckeditor']) && $_POST['ckeditor']==1){
	$table=new query();
	$description=$table->insertCk("description", '');
	echo $description;
}

/****deletion scripts over here*******/
if(isset($_POST['action']) && $_POST['action']=='delete' && isset($_POST['table']) && $_POST['table']==TAB_ANDROID_API && isset($_POST['id']) && $_POST['id']!=''){
	
	$table=new query();
	$table->deleteDatabase($_POST['table'], "id='".$_POST['id']."'");	
	
}	
/**/

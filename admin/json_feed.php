<?php

	include_once 'include/class/class.query.php';

	$table=new query();
	$rows=$table->select("android_api");
	$Tarr=array();
	foreach ($rows as $row){
		$Tarr[]=array("id"=>(int)$row['id'],"name"=>$row['name'],"image"=>str_replace("localhost", "10.0.2.2", $table->ImageTagRemove($row['profile_image'])),"status"=>$table->filterData($row["description"]),"profilePic"=>str_replace("localhost", "10.0.2.2", $table->ImageTagRemove($row['profile_image'])),"timeStamp"=>strtotime($row["timestamp"]),"url"=>"");
		//$Tarr[]=array("id"=>(int)$row['id'],"name"=>$row['name'],"image"=>"http://api.androidhive.info/feed/img/cosmos.jpg","status"=>$table->filterData($row["description"]),"profilePic"=>"http://api.androidhive.info/feed/img/cosmos.jpg","timeStamp"=>(string)strtotime($row["timestamp"]),"url"=>"");
	}
	$arr=array("feed"=>$Tarr);
	header("Content-Type: application/json");
	echo json_encode($arr);
	die;

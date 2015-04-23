<?php

	include_once 'include/class/class.query.php';
	error_reporting(E_ALL);
	$table=new query();
	
	$username=$table->filterData($_REQUEST['username']);
	$passwrd=$table->filterData($_REQUEST['password']);
	
	$rows=$table->select("user","name='".$username."' and password='".md5($passwrd)."'");
	$Tarr=array();
	if (is_array($rows) && count($rows)>0){
		foreach ($rows as $row){
			$Tarr[]=array("id"=>$row['id'],"name"=>$row['name'],"password"=>$row['password'],"added_date"=>$row['added_date'],"status"=>(String)$row['status']);
		}
		$arr=array("success"=>$Tarr);
	}
	else {
		$arr=array("fail"=>array("No data found"));
	}
	header("Content-Type: application/json");
	echo json_encode($arr);
	die;

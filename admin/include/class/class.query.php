<?php
include_once 'class.db.php';
include_once DIR_FS_ADMIN.'include/ckeditor/ckeditor.php';
include_once DIR_FS_ADMIN.'include/ckfinder/ckfinder.php';

class query extends db{
	
	function __construct(){
		parent::__construct();
	}
	
	function check($data=array()){
		$c=parent::select("oc_user");
		return $c;
	
	}
	
	function filterData($data){
		$data = trim(htmlentities(strip_tags($data)));
		if (get_magic_quotes_gpc())
			$data = stripslashes($data);
		//$data = mysql_real_escape_string($data);
		return $data;
	}
	
	function ImageTagRemove($html){
		$doc = new DOMDocument();
		$doc->loadHTML($html);
		$xpath = new DOMXPath($doc);
		return $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
	}
	
	function dml($table,$k_w_v,$required,$action,$ids = ""){
		
		
		$error=array();
		$valid=array(
		"blank"=>"This field required not to be blank.",
		"password"=>"Your password is wrong",
		"user"=>"User should not blank",
		"wrong user"=>"User is not valid"
		);
			if (is_array($required)){
				foreach($required as $key => $innerArray){
					if (is_array($innerArray)){
        					 if ($innerArray['name']=="") {
								$message[] = "Image". " is required";
							}
					}
					else{
        					if (empty($innerArray)) {
								$message[] .=  ucwords($key) . " is required";
							}
				  			else{
					  			$message1= "success";
							}
    				}
				}
				return $message;
			}
		
		if($action == "add"){
			$insert=parent::insert($table,$k_w_v);
		} else if($action == "upd"){
			$update = parent::update($table,$k_w_v,$ids);
				
		}
		else if($action == "delete"){
			$delete = parent::delete($table,$ids);
				
		}
		
	}
	function get($table, $where = ""){
		$s = parent::select($table, $where);
		return $s;
	}
	
	
	/*function customError($errno, $errstr) {
	  echo "<b>Error:</b> [$errno] $errstr<br>";
	  echo "Ending Script";
	  die();
	} */
	
	function tml($required,$arr=array()){
		//echo "<pre>"; print_r($required);die;
		$error=array();
		if($arr['HideMeAction']=="0"){
			if(count($arr)>0){
				foreach($arr as $key=>$value){
					if(in_array($key,$required)){
						/*Validation start for required field*/
						if($value==''){
							$error["error"][$key]="is required";
						}
 						
						/**************/
					}
				}
			}
				return $error;
			}
	}
	
	function insertDatabase($table,$info){
		parent::insert($table, $info);
	}
	
	function deleteDatabase($table,$where,$bind=""){
		parent::delete($table, $where,$bind);
	}
	
	
	function insertCk($element,$value="",$config=""){
		$CKEditor = new CKEditor();
		$CKEditor->basePath = 'include/ckeditor/';
		//CKFinder::SetupCKEditor($CKEditor,'ckfinder/' ) ;
		if($config==""){
		$CKEditor->config['toolbar'] = array(
		  array("Source"),
	      array( 'Bold', 'Italic', 'Underline', 'Strike' ),
	      array( 'Image', 'Link', 'Unlink', 'Anchor' )
	  	);
	   }
	   else if($config!=""){
		   $CKEditor->config['toolbar'] = array(
		   		array( $config)
		   );
	   }
		$CKEditor->config['filebrowserBrowseUrl'] = array('include/elfinder/elfinder.html');
		$CKEditor->config['filebrowserImageBrowseUrl'] = array('include/elfinder/elfinder.html');
		//$CKEditor->config['removePlugins'] = 'elementspath';
		$CKEditor->config['enterMode'] = 2;
		$initialValue = html_entity_decode($value);
		return $CKEditor->editor($element, $initialValue);
		
	}
}
?>
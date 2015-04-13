<?php
error_reporting(E_ALL); // Set E_ALL for debuging
$config_path= $_SERVER['DOCUMENT_ROOT']."/"."all_structure/admin";

include_once $config_path."/config.php";

$include_path=$config_path.DS."include".DS."ckeditor".DS."ckfinder".DS."php".DS;
 
include_once $include_path.'elFinderConnector.class.php';
include_once $include_path.'elFinder.class.php';
include_once $include_path.'elFinderVolumeDriver.class.php';
include_once $include_path.'elFinderVolumeLocalFileSystem.class.php';

// Required for MySQL storage connector
// include_once dirname(__FILE__).DS.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DS.'elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}
$opts = array(
	 //'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
			'path'          => DIR_FS_ADMIN.'include/images/',         // path to files (REQUIRED)
			'URL'           => SITE_ADMIN_IMG, // URL to files (REQUIRED)
			'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
		)
	)
);
//print_r($opts);die;
// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

?>
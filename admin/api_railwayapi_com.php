<?php
$api_key="20238";

$apiInUse=$_REQUEST['api'];

$requestTrainName=$_REQUEST['trainName'];
$requestTrainNo=$_REQUEST['trainNo'];

$requestStationName=$_REQUEST['stationName'];
$requestStationCode=$_REQUEST['stationCode'];

$requestAge=$_REQUEST['age'];
$requestDOJ=$_REQUEST['DOJ'];

$requestPNR=$_REQUEST['pnr'];
$requestSeatNo=$_REQUEST['seatno'];

$requestSourceStation=$_REQUEST['SourceStation'];
$requestDestinationStation=$_REQUEST['DestinationStation'];

$url="http://api.railwayapi.com/";

$forFare="http://api.railwayapi.com/fare/train/12555/source/gkp/dest/ndls/age/18/quota/PT/doj/23-11-2014/apikey/20238/";
$trailArrival="http://api.railwayapi.com/arrivals/station/gkp/hours/2/apikey/20238/";
$stationSuggest="http://api.railwayapi.com/suggest_station/name/mum/apikey/20238/";
$trainSuggest="http://api.railwayapi.com/suggest_train/trains/123/apikey/20238/";
$liveTrain="http://api.railwayapi.com/live/train/11093/doj/20141125/apikey/20238/";
$pnrStatus="http://api.railwayapi.com/pnr_status/pnr/1234567890/apikey/20238/";
$seatAvailibity="http://api.railwayapi.com/check_seat/train/12001/source/BPL/dest/NDLS/date/14-10-2014/class/CC/quota/GN/apikey/20238/";
$trainRoute="http://api.railwayapi.com/route/train/12555/apikey/20238/";
$trainBtwnStation="http://api.railwayapi.com/between/source/lko/dest/anvt/apikey/20238/";
$trainName="http://api.railwayapi.com/name_number/train/bhopal/apikey/20238/";
$stationName="http://api.railwayapi.com/name_to_code/station/luckn/apikey/20238/";
$stationCode="http://api.railwayapi.com/code_to_name/code/gkp/apikey/20238/";

$getFare=$url."fare/train/".$requestTrainNo."/source/".$requestSourceStation."/dest/ndls/age".$requestAge."quote/PT/doj/".$requestDOJ."/apikey/".$api_key;




function validateParam($api,$params){
	switch (strtoupper($api)){
		case "FARE":
			return getFare($params);
			break;
		case "TRAINARRIVAL":
			break;	
		case "TRAINSUGGEST":
			break;
		case "PNRSTATUS":
			break;
		case "STATIONSUGGEST":
			break;			
	}
	
}
function getFare($params){
	if(is_array($params)){
			
	}
}

?>
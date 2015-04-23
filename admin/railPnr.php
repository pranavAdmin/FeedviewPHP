<?php
function createHmac($val1="",$val2="",$val3=""){
  $str=strtolower($val1.$val2.$val3);
	  
}
function get_pnr_status($url, $curl = true)
{
    $responseString = '';
    if (!$curl)
    {
        /*
         *  if !$curl, use 'file_get_contents' method
        *  to get response string
        */
        $responseString = file_get_contents($url);
    }
    else
    {
        /*
         *  if $curl, use 'curl' method
        *  to get response string
        */

        // Initializing curl
        $ch = curl_init( $url );

        // Configuring curl options
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
            //Could be xml
        );

        // Setting curl options
        curl_setopt_array( $ch, $options );

        // Getting JSON encoded string
        $responseString =  curl_exec($ch);
    }
    return $responseString;
}
"20238";
$url="http://railpnrapi.com/api/route/train/12004/format/json/pbapikey/c3b5f7a02d3169491d4d8d9e4f9d6c42/pbapisign/b2f86f8cedf313d6eb9ba13f0d929e85dde626f1";
//$url="http://railpnrapi.com /api/station_by_code/code/rajkot/partial/1/format/json/pbapikey/54c5f17fc15f2b18fb897df289cb913e/pbapisign/b2f86f8cedf313d6eb9ba13f0d929e85dde626f1";
//$url = 'http://railpnrapi.com/api/check_pnr/pnr/54c5f17fc15f2b18fb897df289cb913e/format/json';
$response = get_pnr_status($url);
var_dump($response); 
?>
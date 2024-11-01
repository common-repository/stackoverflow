<?php

function sanitizeObject($d) {
    if (is_object($d)) {
        $d = get_object_vars($d);
    } 
    if (is_array($d)) {
	return array_map(__FUNCTION__, $d);
    } else {
	return $d;
    }
}

function getUserData($ids, $type=''){
    // Define Local Variables
    $site = 'stackoverflow';
    $baseurl = 'compress.zlib://http://api.stackexchange.com/2.0/users/';
    $apikey = 'sbI47iM9fyMqLqD0sA2T8A((';
    
    //Construct Url and Get Data off SO and use Sanitizer.
    if($type == ''){
        $url = $baseurl.$ids.'?key='.$apikey.'&site='.$site.'&order=desc&sort=reputation&filter=default';
    } else if ($type == 'byQuestionids'){
        $url = 'compress.zlib://http://api.stackexchange.com/2.0/questions/'.$ids.'?key='.$apikey.'&site='.$site.'&order=desc&sort=activity';
    } else{
        $url = $baseurl.$ids.'/'.$type.'?key='.$apikey.'&site='.$site.'&order=desc&sort=activity&filter=default';
    }
    $results = json_decode(file_get_contents($url, false, stream_context_create(array('http'=>array('header'=>"Accept-Encoding: gzip\r\n")))));
    $results = sanitizeObject($results);
    return $results;
}
?>
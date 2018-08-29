<?php
$res = CallAPI("https://www.eventbriteapi.com/v3/events/search/?q=bucharest&token=NPPPSRKGFIVSF3JOKWFU");				
function callAPI($url){ 	 
   return json_decode(file_get_contents($url),true);
}
$in = 0;
while($in < ($res['pagination']['page_size']-1) && $res['events'][$in] != null){
	$event_name = $res['events'][$in]['name']['text'];
	$event_url = $res['events'][$in]['url'];
	$event_start_timezone = $res['events'][$in]['start']['timezone'];
	$event_start_local = $res['events'][$in]['start']['local'];
	$event_start_utc = $res['events'][$in]['start']['utc'];
	$event_end_timezone = $res['events'][$in]['end']['timezone'];
	$event_end_local = $res['events'][$in]['end']['local'];
	$event_end_utc = $res['events'][$in]['end']['utc'];
	$event_created_date = $res['events'][$in]['created'];
	$event_changed_date = $res['events'][$in]['changed'];
	$event_capacity = $res['events'][$in]['capacity'];
	$event_status = $res['events'][$in]['status'];
	$event_is_free = $res['events'][$in]['is_free'];
	$event_currency = $res['events'][$in++]['currency'];
	
	$event_name 
	$event_url  
	$event_start_timezone  
	$event_start_local  
	$event_start_utc  
	$event_end_timezone 
	$event_end_local  
	$event_end_utc 
	$event_created_date  
	$event_changed_date 
	$event_capacity 
	$event_status = $res['events'][$in]['status'];
	$event_is_free = $res['events'][$in]['is_free'];
	$event_currency 
	
	
}



?>
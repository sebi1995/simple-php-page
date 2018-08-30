<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventsdb";

// Create cconnection
$mysqliconn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqliconn->connect_error) {
    die("Connection failed: " . $mysqliconn->connect_error);
}  

#get json
$res = json_decode(file_get_contents("https://www.eventbriteapi.com/v3/events/search/?q=bucharest&token=NPPPSRKGFIVSF3JOKWFU"),true);			

$in = 0;
$mysqliconn->autocommit(FALSE);
while($in < ($res["pagination"]["page_size"]-1) && $res["events"][$in] != null){

	##########################################################
	#	RAW
	$event_name = $res["events"][$in]["name"]["text"];
	$event_url = $res["events"][$in]["url"];
	$event_start_timezone = $res["events"][$in]["start"]["timezone"];
	$event_start_local = $res["events"][$in]["start"]["local"];
	$event_start_utc = $res["events"][$in]["start"]["utc"];
	
	$event_end_timezone = $res["events"][$in]["end"]["timezone"];
	$event_end_local = $res["events"][$in]["end"]["local"];
	$event_end_utc = $res["events"][$in]["end"]["utc"];
	
	$event_created_date = $res["events"][$in]["created"];
	$event_changed_date = $res["events"][$in]["changed"];
	$event_capacity = $res["events"][$in]["capacity"];
	$event_status = $res["events"][$in++]["status"]; 
	
$mysqliconn->query("INSERT INTO eventsdb.events_table 
			(`id`, `events_name_text`, `events_url`, `events_start_timezone`, `events_start_local`, 
			`events_start_utc`, `events_end_timezone`, `events_end_local`, `events_end_utc`, `events_created`, 
			`events_changed`, `events_capacity`, `events_status`) 
VALUES 		(null, '$event_name', '$event_url', '$event_start_timezone', '$event_start_local', 
			'$event_start_utc', '$event_end_timezone', '$event_end_local', '$event_end_utc', '$event_created_date', 
			'$event_changed_date', '$event_capacity', '$event_status')");  
 
}
$mysqliconn->commit();

$mysqliconn->close();
?>


<!--



 -->
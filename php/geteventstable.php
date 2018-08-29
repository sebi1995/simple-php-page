<?php
$res = CallAPI("https://www.eventbriteapi.com/v3/events/search/?q=bucharest&token=NPPPSRKGFIVSF3JOKWFU");				
function callAPI($url){ 	 
   return json_decode(file_get_contents($url),true);
}

$in = 0;

#awe



while($in < ($res["pagination"]["page_size"]-1) && $res["events"][$in] != null){
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
	$event_status = $res["events"][$in]["status"];
	$event_is_free = $res["events"][$in]["is_free"];
	$event_currency = $res["events"][$in++]["currency"];
	
	$eventStartDate = substr($event_start_local, 0, 10);
	$eventStartTime = substr($event_start_local, 11, 19);
	
	$eventEndDate = substr($event_end_local, 0, 10);
	$eventEndTime = substr($event_end_local, 11, 19);
	
	
	$eventDate = "";
	if($eventStartDate == $eventEndDate){
		$eventDate = $eventStartDate;
	} else {
		$eventDate = $eventStartDate . " --- " . $eventEndDate;
	}
	
	$eventTime = $eventStartTime." -- ".$eventEndTime;
	$eventUTCTime = $event_start_utc." --- ".$event_end_utc;
	#." ".$event_start_timezone
	
	echo "<table class='events-table'>";
	echo "	<tr>
				<th>
					Event name:
				</th>
				<td>"
					.$event_name
				."</td>
			</tr>
			<tr>
				<th>
					Event hoster URL: 
				</th>
				<td>
					<a href='$event_url'>".$event_url."</a>
				</td>
			</tr>";
			
	if($timeZoneDropDownOption == "LOCAL"){
		echo "
			<tr>
				<td>
					Event date: 
				</td>
				<td>
					".$eventDate
				."</td>
			</tr>
			<tr>
				<td>
					Event time ('$event_start_timezone'): 
				</td>
				<td>"
					.$eventTime
				."</td>
			</tr>";
	} else {
		echo "	
			<tr>
				<td>
					Event UTC date: 
				</td>
				<td>
					".$eventUTCDate
				."</td> 
			</tr> 
			<tr>
				<td>
					Event UTC time: 
				</td>
				<td>
					".$eventUTCTime
				."</td> 
			</tr> ";
	}
	echo "	<tr>
				<td>
					Event creation date: 
				</td>
				<td>
					".$event_created_date
				."</td>
			</tr>
			<tr>
				<td>
					Last updated at: 
				</td>
				<td>
					".$event_changed_date
				."</td>
			</tr>
			<tr>
				<td>
					Event capacity: 
				</td>
				<td>
					".$event_capacity
				."</td>
			</tr>
			<tr>
				<td>
					Event price: 
				</td>
				<td>
					".$event_is_free." ".$event_currency
				."</td>
			</tr>
			<tr>
				<td>
					Event status: 
				</td>
				<td>
					".$event_status
				."</td>
			</tr>
		</table>";
	
	
	  
	
	
	 
}



?>
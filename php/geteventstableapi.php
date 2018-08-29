<?php
function getDataTables($timeZoneDropDownOption){
$res = json_decode(file_get_contents("https://www.eventbriteapi.com/v3/events/search/?q=bucharest&token=NPPPSRKGFIVSF3JOKWFU"),true);			
 
$in = 0;
$returnStr = "";
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
		$event_status = $res["events"][$in]["status"];
		$event_is_free = $res["events"][$in]["is_free"];
		$event_currency = $res["events"][$in++]["currency"];
		
		##########################################################
		#	Custom
		##########################################################
		#	local time
		
		$eventStartDate = substr($event_start_local, 0, 10);
		$eventStartTime = substr($event_start_local, 11, 19);
		
		$eventEndDate = substr($event_end_local, 0, 10);
		$eventEndTime = substr($event_end_local, 11, 19);
		
		##########################################################
		#	utc time
		
		$eventUTCStartDate = substr($event_start_utc, 0, 10);
		$eventUTCStartTime = substr($event_start_utc, 11, 19);
		
		$eventUTCEndDate = substr($event_end_utc, 0, 10);
		$eventUTCEndTime = substr($event_end_utc, 11, 19);
		
		##########################################################
		#	local custom date
		$eventDate = "";
		if($eventStartDate == $eventEndDate){
			$eventDate = $eventStartDate;
		} else {
			$eventDate = $eventStartDate . " --- " . $eventEndDate;
		}
		
		##########################################################
		#	utc custom date
		$eventUTCDate = "";
		if($eventUTCStartDate == $eventUTCEndDate){
			$eventUTCDate = $eventUTCStartDate;
		} else {
			$eventUTCDate = $eventUTCStartDate . " --- " . $eventUTCEndDate;
		}




		##########################################################
		#	local custom time
		$eventTime = $eventStartTime." -- ".$eventEndTime;
		##########################################################
		#	utc custom time
		$eventUTCTime = $eventUTCStartTime." --- ".$eventUTCEndTime;

		
		$returnStr = $returnStr . "<table class='events-table'>";
		$returnStr = $returnStr . "	<tr>
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
				
		if($timeZoneDropDownOption == "local"){
			$returnStr = $returnStr . "
				<tr>
					<th>
						Event date: 
					</th>
					<td>
						".$eventDate
					."</td>
				</tr>
				<tr>
					<th>
						Event time ('$event_start_timezone'): 
					</th>
					<td>"
						.$eventTime
					."</td>
				</tr>";
		} else {
			$returnStr = $returnStr . "	
				<tr>
					<th>
						Event UTC date: 
					</th>
					<td>
						".$eventUTCDate
					."</td> 
				</tr> 
				<tr>
					<th>
						Event UTC time: 
					</th>
					<td>
						".$eventUTCTime
					."</td> 
				</tr> ";
		}
		$returnStr = $returnStr . "	<tr>
					<th>
						Event creation date: 
					</th>
					<td>
						".substr($event_created_date, 0, 10) . " at " . substr($event_created_date, 11, 8)
					."</td>
				</tr>
				<tr>
					<th>
						Last updated at: 
					</th>
					<td>
						".substr($event_changed_date, 0, 10) . " at " . substr($event_changed_date, 11, 8)
					."</td>
				</tr>
				<tr>
					<th>
						Event capacity: 
					</th>
					<td>
						".($event_capacity = ($event_capacity == null) ? "Not specified" : $event_capacity)
					."</td>
				</tr>
				<tr>
					<th>
						Event price: 
					</th>
					<td>
						";
		if($event_is_free == null || $event_is_free == 0){
			$event_is_free = "Free";
		} else {$event_is_free = $event_is_free . " " . $event_currency;}
		$returnStr = $returnStr . $event_is_free.
					"</td>
				</tr>
				<tr>
					<th>
						Event status: 
					</th>
					<td>
						".$event_status
					."</td>
				</tr>
			</table>";  
	}	
	return $returnStr;
}




?>
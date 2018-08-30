<?php 
function getDataFromSQL($timeZoneDropDownOption){
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

	#get from sql
	$resultarray = $mysqliconn->query("SELECT * FROM eventsdb.events_table");

	$returnStr = "";
	foreach($resultarray as $result){ 

		$event_name = $result['events_name_text']; 
		$event_url = $result['events_url'];
		$event_start_timezone = $result['events_start_timezone'];
		$event_start_local = $result['events_start_local'];
		$event_start_utc = $result['events_start_utc']; 
		
		$event_end_timezone = $result['events_end_timezone'];
		$event_end_local = $result['events_end_local']; 
		$event_end_utc = $result['events_end_utc'];
		
		$event_created_date = $result['events_created']; 
		$event_changed_date = $result['events_changed']; 
		$event_capacity = $result['events_capacity']; 
		$event_status = $result['events_status'];  
		
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
							Event status: 
						</th>
						<td>
							".$event_status
						."</td>
					</tr>
				</table>"; 
	} 	
	$mysqliconn->close();
	return $returnStr;
} 

?> 
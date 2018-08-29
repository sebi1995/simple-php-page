<?php
function callAPI($url){ 	 
   return json_decode(file_get_contents($url),true);
}

?>
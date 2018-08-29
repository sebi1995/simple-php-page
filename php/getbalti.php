<?php
/* Select queries return a resultset */
if ($result = $conn->query("SELECT * FROM test.balti")) {
    printf("Select returned %d balti.\n", $result->num_rows);
 
}  
?>
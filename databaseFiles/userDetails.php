<?php
// Including database connections
require_once 'database_connections.php'; 
// mysqli query to fetch all data from database
$query = "SELECT * from user_details ORDER BY user_id ASC";
$result = mysqli_query($con, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
	while($row = mysqli_fetch_assoc($result)) {
			$arr[] = $row;
	}
}
// Return json array containing data from the database
echo $json_info = json_encode($arr);
?>
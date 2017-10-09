<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from updated data
$id = mysqli_real_escape_string($con, $data->id);
$firstname = mysqli_real_escape_string($con, $data->firstname);
$lastname = mysqli_real_escape_string($con, $data->lastname);
$email = mysqli_real_escape_string($con, $data->email);
$password = mysqli_real_escape_string($con, $data->pass);
$contact = mysqli_real_escape_string($con, $data->contact);

// mysqli query to insert the updated data
$query = "UPDATE user_details SET user_firstname='$firstname',user_lastname='$lastname',user_email='$email',user_password='$password',user_contact='$contact' WHERE user_id=$id";
mysqli_query($con, $query);
echo true;
?>
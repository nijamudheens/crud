<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from submitting data & storing in new variables.
$firstname = mysqli_real_escape_string($con, $data->firstname);
$lastname = mysqli_real_escape_string($con, $data->lastname);
$email = mysqli_real_escape_string($con, $data->email);
/* $password = mysqli_real_escape_string($con, $data->pass); */
$contact = mysqli_real_escape_string($con, $data->contact);

// mysqli insert query
$query = "INSERT into user_details (user_firstname,user_lastname,user_email,user_contact) VALUES ('$firstname','$lastname','$email','$contact')";
// Inserting data into database
mysqli_query($con, $query);
echo true;
?>
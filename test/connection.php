<?php


$servername = "127.0.0.1";
$username = "admin";
$password = "newpassword";
$dbname = "commentsapidb";

//CREATE Conn
$conn = new mysqli($servername, $username, $password, $dbname);

//Check conn 
if ($conn->connect_error) {
  die("Connection failed:" . $conn->connect_error);
}
echo "Connected success";



?>
<?php


include_once '../test/dblogin.php';

//CREATE Conn
$conn = new mysqli($servername, $username, $password, $dbname);

//Check conn 
if ($conn->connect_error) {
  die("Connection failed:" . $conn->connect_error);
}
echo "Connected success";



?>
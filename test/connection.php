<?php
$servername = "127.0.0.1";
$username = "root";
$password = "AnaSofia";
$dbname = "commentsapidb";

//CREATE Conn
$conn = new mysqli($servername, $username, $password, $dbname);

//Check conn 
if ($conn->connect_error) {
  die("Connection failed:" . $conn->connect_error);
}
echo "Connected success";

// prepare and bind 
$sql = "SELECT * FROM Comment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  While($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. "username " . $row["username"] . $row["content"]. $row["created"];
  }
} else {
  echo "0 results";
}
$conn->close()

?>
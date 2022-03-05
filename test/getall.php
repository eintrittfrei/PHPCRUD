<?php
header ('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');


//connection 
include_once '../test/connection.php';

// require '../test/database.php';

// $database = new DB();
// $conn = $database->getConnection();

// prepare and bind 

$sql = "SELECT * FROM Comment";
$result = $conn->query($sql);

$commentArr = array();
$commentArr['body'] = array();

if ($result->num_rows > 0) {
  // output data of each row
  While($row = $result->fetch_assoc()) {
    extract($row);
    $e = array(
      "id:" => $id,
      "username" => $username,
      "content" => $content,
      "created" => $created
      );
    array_push($commentArr['body'], $e);
  }
  echo json_encode($commentArr);

} else {
  echo "0 results";
};
$conn->close();


?>

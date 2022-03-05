<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type");


// connnection 
include_once '../test/connection.php';
// conn 



// set values 
  $username = 'Tin';
  $content = 'test test';
  $created = '2021-08-12 14:15:45';
  $id = 1;
// prepare set parameters and bind  
if (!($stmt = $conn->prepare("UPDATE Comment SET username=?, content=?, created=? WHERE id=?"))) {
  echo "Prepare failed: (" .$conn->error . ") " .$conn->error;
}
if (!$stmt->bind_param("sssi", $username, $content, $created, $id)) {
  echo "binding parameters failed: (" .$stmt->error . ") " .$stmt->error;
}
// excute 
if (!$stmt->execute()) {
  echo "Execute failed: (" .$stmt->error . ") " .$stmt->error;
};

?>

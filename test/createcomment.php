<?php 
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type");
  

  include_once '../test/connection.php';


  // set parameters 

  if (!($stmt = $conn->prepare("INSERT INTO Comment (username, content, created) VALUES (?,?,?)"))) {
    echo "Prepare failed: (" . $conn->error . ") " .$conn->error; 
  }
  if (!$stmt->bind_param("sss", $username, $content, $created)) {
    echo "binding parameters failed: (" . $stmt->error . ") " . $stmt->error;
}
  $username = 'username';
  $content = 'content';
  $created = 'created';

  // bind and execute 

  

  if (!$stmt->execute()) {
    echo "Execute failed: (" .$stmt->error . ") " . $stmt->error;
  };


  


?>
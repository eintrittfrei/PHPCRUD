<?php 
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
  }


  


?>
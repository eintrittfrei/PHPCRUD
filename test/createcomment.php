<?php 
  include_once '../test/connection.php';

 

  $sql = "INSERT INTO Comment (username, content, created)
  VALUES (?,?,?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $content, $created);
  $stmt->execute();
  
  http_response_code(200);
  echo "sucess addded";
  



?>
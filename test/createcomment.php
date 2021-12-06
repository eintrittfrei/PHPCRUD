<?php 
  include_once '../test/connection.php';

  

  $sql = "INSERT INTO Comment (username, content, created)
  VALUES (?,?,?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $content, $created);
  $stmt->execute();
  
  
  echo "added";
  



?>
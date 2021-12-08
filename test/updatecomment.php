<?php

// connnection 
include_once '../test/connection.php';

  $username = 'Tin';
  $content = 'test test';
  $created = '2021-08-12 14:15:45';
  $id = 1;
// set parameters 
if (!($stmt = $conn->prepare("UPDATE Comment SET username=?, content=?, created=? WHERE id=?"))) {
  echo "Prepare failed: (" .$conn->error . ") " .$conn->error;
}
if (!$stmt->bind_param("sssi", $username, $content, $created, $id)) {
  echo "binding parameters failed: (" .$stmt->error . ") " .$stmt->error;
}


if (!$stmt->execute()) {
  echo "Execute failed: (" .$stmt->error . ") " .$stmt->error;
}


?>
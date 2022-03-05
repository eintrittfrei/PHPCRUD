<?php 

include_once '../test/connection.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Comment WHERE id=$id";

    // prepare and bind 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    if ($conn->query($sql) === TRUE) {
    echo "Record deleted";
  } else { "error deleting record: " . $conn->error;
  }
  $conn->close();
  };

  ?>
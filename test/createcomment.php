<?php 
  include_once '../test/connection.php';


  // set parameters 

  if (!($stmt = $conn->prepare("INSERT INTO Comment (username, content, created) VALUES (?,?,?)"))) {
    echo "Prepare failed: (" . $conn->error . ") " .$conn->error; 
  }
  
  $username = 'username';
  $content = 'content';
  $created = 'created';

  if (!$stmt->bind_param("sss", $username, $content, $created)) {
      echo "binding parameters failed: (" . $stmt->error . ") " . $stmt->error;
  }

  if (!$stmt->execute()) {
    echo "Execute failed: (" .$stmt->error . ") " . $stmt->error;
  }


  // $sql = "INSERT INTO Comment (username, content, created)
  // VALUES (?,?,?)";

  // if ($stmt = $conn->prepare($sql)) {
  // $stmt->bind_param("sss", $username, $content, $created);
  // //Set parameter values and execute 
  // // $username = 'username';
  // // $content = 'content';
  // // $created = 'created';
  // $conn->commit();
  // $stmt->execute();

  //   echo "Comment inserted ";
  // } else {
  //   echo $stmt -> error;
  // };

  // if ($conn->query($sql) === TRUE) {
  //   echo "New record added";
  // } else {
  //   echo "Error: " . $sql . $conn->error;
  // }

  

  // $sql = "INSERT INTO Comment (username, content, created)
  // VALUES (?,?,?)";
  
  // $stmt = $conn->prepare($sql);
  // $stmt->bind_param("sss", $username, $content, $created);
  // $stmt->execute();
  
  
  // echo "added";
  



?>
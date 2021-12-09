<?php

include_once '../test/connection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM Comment WHERE id=$id";

// prepare and bind 

$stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dataRow = $result->fetch_assoc();

http_response_code(200);
echo json_encode($dataRow);
};

?>
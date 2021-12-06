<?php

include_once '../test/connection.php';

$id = isset($_GET['id']);

// prepare and bind 
$sql = "SELECT * FROM Comment WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dataRow = $result->fetch_assoc();

http_response_code(200);
echo json_encode([$dataRow]);


?>
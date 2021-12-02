<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../class/comments.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Comment($db);

    $stmt = $items->getComments();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){

      $commentArr = array();
      $commentArr["body"] = array();
      $commentArr["itemCount"] = $itemCount;

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $e = array(
              "id" => $id,
              "username" => $username,
              "content" => $content,
              "created" => $created
          );

          array_push($commentArr["body"], $e);
      }
      echo json_encode($commentArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }

?>
<?php

    class Comment{
      //Connection
      private $conn;

      //Table
      private $db_table = "Comment";

      //Columns
      public $id;
      public $username;
      public $content;
      public $created;

      //DB connection 
      public function __consstruct($db){
          $this->conn = $db;
      }

      // Get ALL 
      public function getComments(){
          $sqlQuery = "SELECT id, username, content, created FROM " . $this->db_table . "";
          $stmt = $this->conn->prepare($sqlQuery);
          $stmt->execute();
          return $stmt;
      }

      //CREATE
      public function createComment(){
        $sqlQuery = "INSERT INTO". $this->db_table . "
                SET
                    username = :username,
                    content = :content,
                    created = :created";
                    
        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize 
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->content=htmlspecialchars(strip_tags($this->content));
        $this->created=htmlspecialchars(strip_tags($this->created));

        //bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":created", $this->created);

        if($stmt->execute()){
            return true;
        }
        return false;
      }

      //READ one
      public function getSingleComment(){
          $sqlQuery = "SELECET
                        id,
                        username,
                        content,
                        creatred
                    FROM
                      ". $this->db_table ."
                    
                    WHERE
                      id = ?
                    LIMIT 0,1";

          $stmt = $this->conn->prepare($sqlQuery);

          $stmt->bindParam(1, $this->id);

          $stmt->execute();

          $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

          $this->username = $dataRow['username'];
          $this->content = $dataRow['content'];
          $this->created = $dataRow['created'];
      }

      // UPDATE

      public function updateComment(){
          $sqlQuery = "UPDATE
                      ". $this->db_table ."
                  SET
                      username = :username,
                      content = :content,
                      created = :created,
                  WHERE
                      id = :id";
          
          $stmt = $this->conn->prepare($sqlQuery);

          $this->username=htmlspecialchars(strip_tags($this->username));
          $this->content=htmlspecialchars(strip_tags($this->content->content));
          $this->created=htmlspecialchars(strip_tags($this->created));
          $this->id=htmlspecialchars(strip_tags($this->id));

          //bind data
          $stmt->bindParam(":username", $this->username);
          $stmt->bindParam(":content", $this->content);
          $stmt->bindParam(":created", $this->created);
          $stmt->bindParam(":id", $this->id);

          if($stmt->execute()){
              return true;
          }
          return false;
          }
          
          //DELETE
          function deleteComment(){
              $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
              $stmt = $this->conn->prepare($sqlQuery);

              $this->id=htmlspecialchars(strip_tags($this->id));

              $stmt->bindParam(1, $this->id);

              if($stmt->execute()){
                  return true;
              }
              return false;
          }

  }
?>
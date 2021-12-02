<?php
    class Database {
        private $host = "127.0.0.1";
        private $database_name = "commentsapidb";
        private $username = "root";
        private $password = "AnaSofia";

        public $conn;

        public function getConnection() {
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names uft8");
            }catch(PDOException $exeption){
                echo "Database could not be connected: " . $exeption->getMessage();
            }
            return $this->conn;
        }
    }
?>

<?php
    class DataHandler {
        private $dbConn;
    
        function __construct(){
            require "credentials.php";
            $this->dbConn = new mysqli($servername, $username, $password, $db);
        }

        public function getAllUsers(){
            $stmt = $this->dbConn->prepare("SELECT * FROM Person");
            if($stmt->execute()){
                $stmt->bind_result($name);
                $stmt->fetch();
                return $name;
            }
        }

    
    }
?>

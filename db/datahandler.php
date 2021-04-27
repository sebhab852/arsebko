<?php
    class DataHandler {
        private $dbConn;
    
        function __construct(){
            require "creds.php";
            $this->dbConn = new mysqli($servername, $username, $password, $db);
        }

        public function getAllUsers(){
            $stmt = $this->dbConn->prepare("SELECT `nachname` FROM Person");
            if($stmt->execute()){
                $stmt->bind_result($name);
                $stmt->fetch();
                return $name;
            }
        }

        public function registerNewSingleUser($param){

        }

    
    }
?>

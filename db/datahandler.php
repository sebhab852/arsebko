<?php
    require_once("./model/user.class.php");
    require_once("./model/company.class.php");
    require_once("./model/address.class.php");
    
    
    class DataHandler {
        private $dbConn;
    
        function __construct(){
            require "creds.php";
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


        public function registerUser($userData) {
            // TODO
        }


        public function loginUser($userData) {
            // TODO
        }
    }
?>
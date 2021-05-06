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
            //$stmt = $this->dbConn->prepare("SELECT nachname FROM Person");
            $stmt = "SELECT * FROM Person";
            $result = $this->dbConn->query($stmt);
            $resAr = array();
            $i = 0;
            while ($zeile = $result->fetch_array()) {
                $id = $zeile['id'];
                $fname = $zeile['vorname'];
                $lname = $zeile['nachname'];

                $tmpUser = new userObjekt($id, $fname, $lname, $zeile['email'], $zeile['username'], $zeile['passwort']);
                $resAr[$i] = $tmpUser;
                $i++;
            }
            return $resAr;
        }


        public function registerUser($userData) {
            
            $username = $userData->getUsername();
            $email = $userData->getEmail();
            $password = $userData->getPassword();
            $firstname = $userData->getFirstname();
            $lastname = $userData->getLastname();

            $ort = $userData->getOrt();
            $strasse = $userData->getStrasse();
            $hausnummer = $userData->getHausnummer();
            $plz = $userData->getPlz(); 
            
            if ($this->existsByUsername($username)) throw new Exception("Username ist bereits vergeben!");

            $stmt = $this->dbConn->prepare('INSERT INTO user (username, email, password, firstname, lastname, ort, strasse, hausnummer, plz) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->bind_param("sssssssii", $username, $email, $password, $firstname, $lastname, $ort, $strasse, $hausnummer, $Plz);

            return $stmt->execute();
        }


        public function loginUser($userData) {
            // TODO
        }
            
        public function existsByUsername($userData)
        {
        $this->_getByUsername->bind_param("s", $userData);
        $this->_getByUsername->execute();
        $row = $this->_getByUsername->get_result()->fetch_assoc();
        return $row !== NULL ? $row : false;
        }
    }
?>
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


        public function registerSingleUser($userData) {
            
            $username = $userData["person"]["username"];
            $email = $userData["person"]["email"];
            $password = $userData["person"]["passwort"];
            $firstname = $userData["person"]["vorname"];
            $lastname = $userData["person"]["nachname"];

            $ort = $userData["anschrift"]["ort"];
            $strasse = $userData["anschrift"]["strasse"];
            $plz = $userData["anschrift"]["plz"];; 
            
            //if ($this->existsByUsername($username)) throw new Exception("Username ist bereits vergeben!");
            $stmt1 = $this->dbConn->prepare("INSERT INTO anschrift (`ort`,`strasse`, `plz`) VALUES (?,?,?)");
            $stmt1->bind_param("ssi",$ort,$strasse, $plz);
            $stmt1->execute();

            $stmt2 = "SELECT MAX(anschriftID) FROM `anschrift`";
            $result = $this->dbConn->query($stmt2);
            $id = $result->fetch_all();

            $stmt3 = $this->dbConn->prepare("INSERT INTO person (`vorname`,`nachname`, `username`,`email`,`passwort`,`anschriftID`, `firmaID`) VALUES (?,?,?,?,?,?,NULL)");
            $stmt3->bind_param("sssssi",$firstname ,$lastname, $username, $email, $password, $id[0][0]);
            $stmt3->execute();

            return true;
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
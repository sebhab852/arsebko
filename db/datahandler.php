<?php
    session_start();

    require_once("./model/user.class.php");
    require_once("./model/company.class.php");
    require_once("./model/address.class.php");
    require_once("./model/post.class.php");
    
    
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

        public function getUserIDbyUsername($username){
            $stmt = $this->dbConn->prepare("SELECT `id` FROM `person` WHERE `username` = ?");
            $stmt->bind_param("s", $username);
            if($stmt->execute()){
                $stmt->bind_result($id);
                $stmt->fetch();
                return $id;
            }
            return false;
        }

        public function updateUserInfo($userData){
            $username = $userData["person"]["username"];
            $email = $userData["person"]["email"];
            $firstname = $userData["person"]["vorname"];
            $lastname = $userData["person"]["nachname"];
            $personID = $this->getUserIDbyUsername($username);
            $updatePerson = $this->dbConn->prepare("UPDATE `person` SET `vorname` = ?, `nachname`=?, `email`=? WHERE `id` = ?");
            $updatePerson->bind_param("sssi",$firstname,$lastname,$email,$personID);
            if($updatePerson->execute()){
                return true;
            }
            return false;
        }

        public function registerBusiness($userData){

            $username = $userData["person"]["username"];
            $email = $userData["person"]["email"];
            $password = $userData["person"]["passwort"];
            $firstname = $userData["person"]["vorname"];
            $lastname = $userData["person"]["nachname"];

            $ort = $userData["anschriftFirma"]["ort"];
            $strasse = $userData["anschriftFirma"]["strasse"];
            $plz = $userData["anschriftFirma"]["plz"];

            $firmaName = $userData["firmaName"];

            $stmt1 = $this->dbConn->prepare("INSERT INTO anschrift(`ort`,`strasse`, `plz`) VALUES (?,?,?)");
            $stmt1->bind_param("ssi",$ort,$strasse,$plz);
            $stmt1->execute();
            $stmt1->close();

            $stmt2 = "SELECT MAX(anschriftID) FROM `anschrift`";
            $result = $this->dbConn->query($stmt2);
            $id = $result->fetch_all();

            $stmt3 = $this->dbConn->prepare("INSERT INTO person (`vorname`,`nachname`, `username`,`email`,`passwort`,`anschriftID`, `firmaID`) VALUES (?,?,?,?,?,?,NULL)");
            $stmt3->bind_param("sssssi",$firstname ,$lastname, $username, $email, $password, $id[0][0]);
            $stmt3->execute();
            $stmt3->close();

            $stmt4 = "SELECT MAX(id) FROM `person`";
            $result2 = $this->dbConn->query($stmt4);
            $id2 = $result2->fetch_all();



            $stmtInterlude = $this->dbConn->prepare("INSERT INTO firma (`firmenname`,`kontaktpersonID`,`anschriftID`) VALUES(?,?,?)");
            $stmtInterlude->bind_param("sii",$firmaName,$id2[0][0],$id[0][0]);
            $stmtInterlude->execute();
            $stmtInterlude->close();

            return true;

        }


        public function registerSingleUser($userData) {
            
            $username = $userData["person"]["username"];
            $email = $userData["person"]["email"];
            $password = $userData["person"]["passwort"];
            $firstname = $userData["person"]["vorname"];
            $lastname = $userData["person"]["nachname"];
            $password = hash('sha256', $password);

            $ort = $userData["anschrift"]["ort"];
            $strasse = $userData["anschrift"]["strasse"];
            $plz = $userData["anschrift"]["plz"];
            
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
        
        
        public function existsByUsername($userData) {
            $this->_getByUsername->bind_param("s", $userData);
            $this->_getByUsername->execute();
            $row = $this->_getByUsername->get_result()->fetch_assoc();
            
            return $row !== NULL ? $row : false;
        }


        public function loginUser($userData) {
            $username = $userData["username"];
            $passwortTmp = $userData["password"];
            $passwort = hash('sha256', $passwortTmp);

            $login_stmt = $this->dbConn->prepare("SELECT `username` FROM `person` WHERE `username` = ? AND `passwort` = ?");
            $login_stmt->bind_param("ss", $username, $passwort);
            $login_stmt->execute();

            $login_result = $login_stmt->get_result();

            if($login_result->num_rows == 1) {
                $login_object = $login_result->fetch_object();                
                $_SESSION['login'] = true;
                $_SESSION['username'] = $login_object->username;

                return $username;
            }
            else {
                return -1;
            }
        }


        public function getUserByUsername($username) {
            $getuser_stmt = $this->dbConn->prepare("SELECT * FROM `person` WHERE `username` = ?");
            $getuser_stmt->bind_param("s", $username);

            $getuser_stmt->execute();

            $getuser_result = $getuser_stmt->get_result();

            if($getuser_result->num_rows == 1) {
                $getuser_object = $getuser_result->fetch_object();

                $vorname = $getuser_object->vorname;
                $nachname = $getuser_object->nachname;
                $email = $getuser_object->email;
                $username = $getuser_object->username;
                
                $user = new userObjekt(null, $vorname, $nachname, $email, $username, null);

                return $user;
            }
        }


        public function getAdressByUsername($username) {
            $getaddressid_stmt = $this->dbConn->prepare("SELECT `anschriftID` FROM `person` WHERE `username` = ?");
            $getaddressid_stmt->bind_param("s", $username);
            $getaddressid_stmt->execute();

            $getaddressid_result = $getaddressid_stmt->get_result();
            $anschriftID = -1;

            if($getaddressid_result) {
                $getaddressid_object = $getaddressid_result->fetch_object();
                $anschriftID = $getaddressid_object->anschriftID;
            }

            $getaddressid_stmt->close();


            $getaddress_stmt = $this->dbConn->prepare("SELECT * FROM `anschrift` WHERE `anschriftID` = ?");
            $getaddress_stmt->bind_param("i", $anschriftID);
            $getaddress_stmt->execute();

            $getaddress_result = $getaddress_stmt->get_result();

            if($getaddress_result->num_rows == 1) {
                $getaddress_object = $getaddress_result->fetch_object();

                $ort = $getaddress_object->ort;
                $strasse = $getaddress_object->strasse;
                $plz = $getaddress_object->plz;
                
                $anschrift = new anschriftObjekt($ort, $strasse, null, $plz);

                return $anschrift;
            }
            else {
                return 187;
            }
        }
        
        public function editUser($userData){

            $username = $userData["person"]["username"];
            $email = $userData["person"]["email"];
            $password = $userData["person"]["passwort"];
            $firstname = $userData["person"]["vorname"];
            $lastname = $userData["person"]["nachname"];
            $password = hash('sha256', $password);
            $id = $userData["person"]["id"];

            $ort = $userData["anschrift"]["ort"];
            $strasse = $userData["anschrift"]["strasse"];
            $plz = $userData["anschrift"]["plz"];

            $stmt1 = $this->dbConn->prepare("UPDATE anschrift SET ort=?,strasse=?, plz=? where id=?");
            $stmt1->bind_param("ssii", $ort, $strasse, $plz, $id);
            $stmt1->execute();

            $stmt2 = $this->dbConn->prepare("UPDATE person SET vorname=?, nachname=?, username=?,email=?, passwort=? where id=?");
            $stmt2->bind_param("sssssi", $firstname, $lastname, $username, $email, $password, $id);
            $stmt2->execute();
            
        }


        public function uploadPost($postObject) {            
            $username = $postObject['post']['username'];
            $postTitle = $postObject['post']['title'];
            $postContent = $postObject['post']['content'];
            
            $getuserid_stmt = $this->dbConn->prepare("SELECT `id`, `firmaID` FROM `person` WHERE `username` = ?");
            $getuserid_stmt->bind_param("s", $username);
            $getuserid_stmt->execute();

            $firmaID = -2;
            $getuserid_result = $getuserid_stmt->get_result();
            if($getuserid_result) {
                $getuserid_object = $getuserid_result->fetch_object();
                $userID = $getuserid_object->id;

                if($getuserid_object->firmaID != null) {
                    $firmaID = $getuserid_object->firmaID;
                }
            }
            $getuserid_stmt->close();
            
            
            $postDate = date('d.m.Y');
            if($firmaID == -2) {
                $newpost_stmt = $this->dbConn->prepare("INSERT INTO `beitrag` (`titel`, `inhalt`, `datum`, `autorID`) VALUES (?, ?, ?, ?)");
                $newpost_stmt->bind_param("sssi", $postTitle, $postContent, $postDate, $userID);
                $newpost_stmt->execute();
            }
            else {
                $newpost_stmt = $this->dbConn->prepare("INSERT INTO `beitrag` (`titel`, `inhalt`, `datum`, `autorID`, `firmaID`) VALUES (?, ?, ?, ?, ?)");
                $newpost_stmt->bind_param("sssii", $postTitle, $postContent, $postDate, $userID, $firmaID);
                $newpost_stmt->execute();
            }
            
            return true;
        }


        public function getAllPostRows() {
            $getrows_stmt = $this->dbConn->prepare("SELECT COUNT(*) FROM `beitrag`");
            $getrows_stmt->execute();

            $getrows_stmt->bind_result($rows);
            $getrows_stmt->fetch();

            
            if($rows > 0) {
                return $rows;
            }
            else {
                return -1;
            }
        }


        public function getAllPosts() {
            $getallposts_stmt = "SELECT * FROM `beitrag` ORDER BY `datum` DESC";
            $result = $this->dbConn->query($getallposts_stmt);
            
            $postArray = array();
            $i = 0;
            while($zeile = $result->fetch_array()) {
                $titel = $zeile['titel'];
                $inhalt = $zeile['inhalt'];
                $datum = $zeile['datum'];
                $autorID = $zeile['autorID'];

                $tmpPost = new postObjekt($titel, $inhalt, $datum, $autorID);
                $postArray[$i] = $tmpPost;
                $i++;
            }
            
            return $postArray;
        }
    }
?>
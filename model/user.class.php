<?php

    
    class userObjekt {
        public $id;
        public $firstname;
        public $lastname;
        public $email;
        public $username;
        public $pw;



        public function __construct($id, $firstname, $lastname, $email, $username, $pw) {
            $this->setID($id);
            $this->setFirstname($firstname);
            $this->setLastname($lastname);
            $this->setEmail($email);
            $this->setUsername($username);
            $this->setPassword($pw);
        }


        public function setID($id){
            $this->id = $id;
        }

        public function getID(){
            return $this->$id;
        }

        public function getFirstname() {
            return $this->firstname;
        }
        public function setFirstname($firstname) {
            $this->firstname = $firstname;
        }



        public function getLastname() {
            return $this->lastname;
        }
        public function setLastname($lastname) {
            $this->lastname = $lastname;
        }



        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }



        public function getUsername() {
            return $this->username;
        }
        public function setUsername($username) {
            $this->username = $username;
        }



        public function getPassword() {
            return $this->pw;
        }
        public function setPassword($pw) {
            $this->pw = hash('sha256', $pw);
        }
    }
?>
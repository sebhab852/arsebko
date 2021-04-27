<?php

    
    class userObjekt {
        protected $firstname;
        protected $lastname;
        protected $email;
        protected $username;
        protected $pw;



        public function __construct($firstname, $lastname, $email, $username, $pw) {
            $this->setFirstname($firstname);
            $this->setLastname($lastname);
            $this->setEmail($email);
            $this->setUsername($username);
            $this->setPassword($pw);
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
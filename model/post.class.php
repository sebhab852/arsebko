<?php

    
    class postObjekt {
        public $postid;
        public $titel;
        public $inhalt;
        public $datum;
        public $private;
        public $autorID;


        
        public function __construct($postid, $titel, $inhalt, $datum, $private,$autorID) {
            $this->postid = $postid;
            $this->setTitel($titel);
            $this->setInhalt($inhalt);
            $this->setDatum($datum);
            $this->setPrivacy($private);
            $this->setAutorID($autorID);
        }

        public function getPostID(){
            return $this->postid;
        }

        public function getPrivacy(){
            return $this->private;
        }
        public function setPrivacy($priv){
            $this->private = $priv;
        }

        public function getTitel() {
            return $this->titel;
        }
        public function setTitel($titel) {
            $this->titel = $titel;
        }


        public function getInhalt() {
            return $this->inhalt;
        }
        public function setInhalt($inhalt) {
            $this->inhalt = $inhalt;
        }


        public function getDatum() {
            return $this->datum;
        }
        public function setDatum($datum) {
            $this->datum = $datum;
        }


        public function getAutorID() {
            return $this->autorID;
        }
        public function setAutorID($autorID) {
            $this->autorID = $autorID;
        }
    }
?>
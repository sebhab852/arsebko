<?php

    
    class postObjekt {
        public $titel;
        public $inhalt;
        public $datum;
        public $autorID;


        
        public function __construct($titel, $inhalt, $datum, $autorID) {
            $this->setTitel($titel);
            $this->setInhalt($inhalt);
            $this->setDatum($datum);
            $this->setAutorID($autorID);
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
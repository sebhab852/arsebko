<?php

    
    class anschriftObjekt {
        protected $ort;
        protected $strasse;
        protected $hausnummer;
        protected $plz;


        
        public function __construct($ort, $strasse, $hausnummer, $plz) {
            $this->setOrt($ort);
            $this->setStrasse($strasse);
            $this->setHausnummer($hausnummer);
            $this->setPlz($plz);
        }


        
        public function getOrt() {
            return $this->ort;
        }
        public function setOrt($ort) {
            $this->ort = $ort;
        }


        public function getStrasse() {
            return $this->strasse;
        }
        public function setStrasse($strasse) {
            $this->strasse = $strasse;
        }


        public function getHausnummer() {
            return $this->hausnummer;
        }
        public function setHausnummer($hausnummer) {
            $this->hausnummer = $hausnummer;
        }


        public function getPlz() {
            return $this->plz;
        }
        public function setPlz($plz) {
            $this->plz = $plz;
        }
    }
?>
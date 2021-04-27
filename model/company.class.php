<?php

    
    class firmaObjekt {
        protected $companyName;


        
        public function __construct($companyName) {
            $this->setCompanyName($companyName);
        }


        
        public function getCompanyName() {
            return $this->companyName;
        }
        public function setCompanyName($companyName) {
            $this->companyName = $companyName;
        }
    }
?>
<?php

    
    class kommentarObjekt {
        public $postid;
        public $kommentarID;
        public $inhalt;
        public $datumm;
        public $autorID;


        
        public function __construct($kommentarID, $autorID, $postID, $datum,$inhalt) {
            $this->kommentarID = $kommentarID;
            $this->autorID = $autorID;
            $this->postID = $postID;
            $this->datum = $datum;
            $this->inhalt = $inhalt;
        }

        
    }
?>
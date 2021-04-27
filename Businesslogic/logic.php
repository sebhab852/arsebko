<?php
    include "db/datahandler.php";
    class Logic {
        private $dh;
        function __construct() {
            $this->dh = new DataHandler();
        }
    
    
        function handleRequest($method, $param) {
            switch ($method) {
                case "getAllUsers":
                    $res = $this->dh->getAllUsers();
                    break;

                default:
                    $res = null;
                    break;
            }
            return $res;
        }
    }

?>

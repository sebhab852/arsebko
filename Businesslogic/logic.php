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

                case "registerSingleUser":
                    $res = $this->dh->registerSingleUser($param);
                    break;
                
                case "registerBusiness":
                    $res = $this->dh->registerBusiness($param);
                    break;

                case "loginUser":
                    $res = $this->dh->loginUser($param);
                    break;
    
                case "getUserByUsername":
                    $res = $this->dh->getUserByUsername($param);
                    break;
    
                case "getAdressByUsername":
                    $res = $this->dh->getAdressByUsername($param);
                    break;

                case "updateUserInfo":
                    $res = $this->dh->updateUserInfo($param);
                    break;
                
                default:
                    $res = null;
                    break;
            }
            return $res;
        }
    }

?>

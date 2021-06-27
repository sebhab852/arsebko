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

                case "editUser":
                    $res = $this->dh->editUser($param);
                    break;

                case "uploadPost":
                    $res = $this->dh->uploadPost($param);
                    break;

                case "getAllPostRows":
                    $res = $this->dh->getAllPostRows();
                    break;

                case "getAllPosts":
                    $res = $this->dh->getAllPosts();
                    break;
                
                case "getUserByID":
                    $res = $this->dh->getUserByID($param);
                    break;
                //new    
                case "emailCheck":
                    $res = $this->dh->emailCheck($param);
                    break;

                case "changePassword":
                    $res = $this->dh->changePassword($param);
                    break;

                case "isUserPartOfCompany":
                    $res = $this->dh->isUserPartOfCompany($param);
                    break;

                case "loadUserDetails":
                    $res = $this->dh->loadUserDetails($param);
                    break;

                case "loadUserAddress":
                    $res = $this->dh->loadUserAddress($param);
                    break;

                case "loadUserCompany":
                    $res = $this->dh->loadUserCompany($param);
                    break;

                case "loadCompanyName":
                    $res = $this->dh->loadCompanyName($param);
                    break;

                case "getAllPostsByUser":
                    $res = $this->dh->getAllPostsByUser($param);
                    break;
                
                default:
                    $res = null;
                    break;
            }
            return $res;
        }
    }

?>

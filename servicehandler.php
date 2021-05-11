<?php
    include("Businesslogic/logic.php");

    //print_r($_POST);

    $param = "";
    $method = "";

    //check for method and param -> get and post
    isset($_GET["method"]) ? $method = $_GET["method"] : false;
    isset($_POST["method"]) ? $method = $_POST["method"] : false;
    
    if(isset($_GET["param"]) && $_GET["param"] == null){
        $param = null;
    }
    else {
        isset($_GET["param"]) ? $param = $_GET["param"] : false;
    }

    isset($_POST["param"]) ? $param = $_POST["param"] : false;


    $logic = new Logic();
    $result = $logic->handleRequest($method, $param); 
    
    if ($result == null) {
        response("GET", 400, null);
    } else {
        response("GET", 200, $result);
    }

    
    //var_dump($result);
    function response($method, $httpStatus, $data) {
        header('Content-Type: application/json');
        switch ($method) {
            case "GET":
                http_response_code($httpStatus);
                echo (json_encode($data));
                break;
            default:
                http_response_code(405);
                echo ("Method not supported yet!");
        }
    }
?>
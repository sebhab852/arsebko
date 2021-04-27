<?php
    include("Businesslogic/logic.php");

    $param = "";
    $method = "";

    isset($_GET["method"]) ? $method = $_GET["method"] : false;
    
    if(isset($_GET["param"]) && $_GET["param"] == null){
        $param = null;
    }
    else {
        isset($_GET["param"]) ? $param = $_GET["param"] : false;
    }

    
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
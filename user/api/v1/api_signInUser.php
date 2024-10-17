<?php
   
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include "../../config/config.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $config = new Config();

        $userName = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $res = $config->signInUser($userName,$password);

        if($res) {
            $arr['msg'] = "LogIn succesfully...";
        } else {
            $arr['msg'] = "LogIn failed...";
        }

    } else {
        $arr['error'] = "Only POST http request methods allowed..";
    }

    echo json_encode($arr);

?>
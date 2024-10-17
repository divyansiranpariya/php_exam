<?php

header("Access-Control-Allow-Methods:POST");
header("Content-Type:application/json");
include '../../config/config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $userName=$_REQUEST['username'];
    $password=$_REQUEST['password'];

    $config=new Config();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $res = $config->signUpUser($userName, $hashed_password);

    if ($res) {
        $arr['data'] = "SignUp Successfully";
    } else {
        $arr['data'] = "SignUp failed";
    }
}
else{
    $arr['error']="Only POST type http request methods allowed..";

}
echo json_encode($arr);

?>
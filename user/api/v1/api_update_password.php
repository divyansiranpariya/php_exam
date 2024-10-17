<?php

header("Access-Control-Allow-Methods:DELETE");
header("Content-Type:application/json");
include("../../config/config.php");

$config=new Config();


    if($_SERVER['REQUEST_METHOD']=='PUT'){
$input=file_get_contents('php://input');
parse_str($input,$_UPDATE);
       

   $id=$_UPDATE['id'];
   $password=$_UPDATE['password'];
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $res= $config->updatePassword($hashed_password,$id);
      if($res){
        $arr['data']="Password update successfully..";
      }else{
          $arr['data']="Password update failed..";
      }

}else{
    $arr['error']="Only PUT http request method is allowed...";
}

echo json_encode($arr);
?>
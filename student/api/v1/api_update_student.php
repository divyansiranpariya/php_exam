<?php

header("Access-Control-Allow-Methods:DELETE");
header("Content-Type:application/json");
include("../../config/config.php");

$config=new Config();


    if($_SERVER['REQUEST_METHOD']=='PUT'){
$input=file_get_contents('php://input');
parse_str($input,$_UPDATE);
       

   $id=$_UPDATE['id'];
   $age=$_UPDATE['age'];
   $course=$_UPDATE['course'];
   
      $res= $config->updateStudentDetail($age,$course,$id);
      if($res){
        $arr['data']="student update successfully..";
      }else{
          $arr['data']="student update failed..";
      }

}else{
    $arr['error']="Only PUT http request method is allowed...";
}

echo json_encode($arr);
?>
<?php

header("Access-Control-Allow-Methods:DELETE");
header("Content-Type:application/json");
include("../../config/config.php");

$config=new Config();


    if($_SERVER['REQUEST_METHOD']=='DELETE'){
$input=file_get_contents('php://input');
parse_str($input,$_DELETE);

       $id=$_DELETE['id'];
      $res= $config->deleteBorrowedDetails($id);
      if($res){
        $arr['data']="BorrowerDetails delete successfully..";
      }else{
          $arr['data']="BorrowerDetails delete failed..";
      }

}else{
    $arr['error']="Only DELETE http request method is allowed...";
}

echo json_encode($arr);
?>
<?php

header("Access-Control-Allow-Methods:DELETE");
header("Content-Type:application/json");
include("../../config/config.php");

$config=new Config();


    if($_SERVER['REQUEST_METHOD']=='PUT'){
$input=file_get_contents('php://input');
parse_str($input,$_UPDATE);
       

   $id=$_UPDATE['id'];
   $publisher_name=$_UPDATE['publisher_name'];
   $book_name=$_UPDATE['book_name'];
   
      $res= $config->updateStudentDetail($publisher_name,$book_name,$id);
      if($res){
        $arr['data']="publisherDetails update successfully..";
      }else{
          $arr['data']="publisherDetails update failed..";
      }

}else{
    $arr['error']="Only PUT http request method is allowed...";
}

echo json_encode($arr);
?>
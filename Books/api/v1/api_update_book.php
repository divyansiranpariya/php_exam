<?php

header("Access-Control-Allow-Methods:DELETE");
header("Content-Type:application/json");
include("../../config/config.php");

$config=new Config();


    if($_SERVER['REQUEST_METHOD']=='PUT'){
$input=file_get_contents('php://input');
parse_str($input,$_UPDATE);
       

   $id=$_UPDATE['id'];
   $book_name=$_UPDATE['book_name'];
   $book_author=$_UPDATE['book_author'];
   $language=$_UPDATE['language'];
   
      $res= $config->updateBook($id,$book_name,$book_author,$language);
      if($res){
        $arr['data']="books update successfully..";
      }else{
          $arr['data']="books update failed..";
      }

}else{
    $arr['error']="Only PUT http request method is allowed...";
}

echo json_encode($arr);
?>
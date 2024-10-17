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
   $borrower_name=$_UPDATE['borrower_name'];
   $borrower_date=$_UPDATE['borrower_date'];

      $res= $config->updateBorrowedDetails($book_name,$borrower_name,$borrower_date,$id);
      if($res){
        $arr['data']="BorrowerDetails update successfully..";
      }else{
          $arr['data']="BorrowerDetails update failed..";
      }

}else{
    $arr['error']="Only PUT http request method is allowed...";
}

echo json_encode($arr);
?>
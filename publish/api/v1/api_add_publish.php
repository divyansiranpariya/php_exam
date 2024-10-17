<?php
include '../../config/config.php';

header("Access-Control-Allow-Methods:POST");  
header("Content-Type:application/json");      
if($_SERVER['REQUEST_METHOD']=='POST'){        

    $publisher_name=$_POST['publisher_name'];
    $book_name=$_POST['book_name'];
    $id=$_POST['id'];

    $config=new Config();
    $res=$config->insertPublishDetails($publisher_name,$book_name,$id);


    
if($res){
  $arr['data']="publisherDetails inserted successfully..";
}else{
    $arr['data']="publisherDetails inserted failed..";
}

}
else{
    $arr['error']="Only POST http request method is allowed...";
}


echo json_encode($arr);

?>
<?php
include '../../config/config.php';

header("Access-Control-Allow-Methods:POST");  
header("Content-Type:application/json");      
if($_SERVER['REQUEST_METHOD']=='POST'){        

    $book_name=$_POST['book_name'];
    $book_author=$_POST['book_author'];
    $language=$_POST['language'];
    $id=$_POST['id'];

    $config=new Config();
    $res=$config->insertBook($book_name,$book_author,$language);


    
if($res){
  $arr['data']="BookDetails inserted successfully..";
}else{
    $arr['data']="BookDetails inserted failed..";
}

}
else{
    $arr['error']="Only POST http request method is allowed...";
}


echo json_encode($arr);

?>
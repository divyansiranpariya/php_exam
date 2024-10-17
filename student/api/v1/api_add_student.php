<?php
include '../../config/config.php';

header("Access-Control-Allow-Methods:POST");  
header("Content-Type:application/json");      
if($_SERVER['REQUEST_METHOD']=='POST'){        

    $age=$_POST['age'];
    $course=$_POST['course'];
    $id=$_POST['id'];

    $config=new Config();
    $res=$config->insertStudentDetail($age,$course,$id);


    
if($res){
  $arr['data']="StudentDetails inserted successfully..";
}else{
    $arr['data']="StudentDetails inserted failed..";
}

}
else{
    $arr['error']="Only POST http request method is allowed...";
}


echo json_encode($arr);

?>
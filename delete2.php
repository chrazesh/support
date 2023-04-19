<?php
include 'dbcon.php';
 $con = dbConnection();
if(isset($_POST['supportId'])){
    $supportId=$_POST['supportId'];
$deletequery="delete from support where id='$supportId' ";
$query=mysqli_query($con,$deletequery);
if($query){
 $response=array('message'=>'success','status_code'=>'200');
 echo json_encode($response);
}else{

  $response=array('message'=>'success','status_code'=>'404');
 echo json_encode($response);
}
}

?>
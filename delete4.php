<?php 
include 'dbcon.php';
 $con = dbConnection();
if(isset($_POST['demoId'])){
    $demoId=$_POST['demoId'];
    $deletequery="delete from demo where id='$demoId'";
$query=mysqli_query($con,$deletequery);
if($query){
 $response=array('message'=>'success','status_code'=>'200');
 echo json_encode($response);
}else{

   $response=array('message'=>'success','status_code'=>'200');
 echo json_encode($response);
}
}



?>
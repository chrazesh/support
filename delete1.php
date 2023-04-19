<?php 
include 'dbcon.php';
 $con = dbConnection();
if(isset($_POST['installationId'])){
$installationId=$_POST['installationId'];
$deletequery="delete from installation where id='$installationId' ";
$query=mysqli_query($con,$deletequery);
if($query){
 $response=array('mesage'=>'success','status_code'=>'200');
 echo json_encode($response);
}else{

 $response=array('message'=>'failure','status_code'=>'404');
 echo json_encode($response);
}
}
?>
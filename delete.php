<?php 
include 'dbcon.php';
$con = dbConnection();
// $response=array();
if(isset($_POST['customerId'])){
$cId=$_POST['customerId'];
$delete="delete from customer where customer_id='$cId'";
$passDelete=mysqli_query($con,$delete);
// echo 'rajesh';
if($passDelete){
 
      $response=array('message'=>'success','status_code'=>'200');
    echo json_encode($response);
}else{
   $response=array('message'=>'failed', 'status_code'=>'55');
echo json_encode($response);
     
}
}          
 ?>   

<?php
include 'dbcon.php';
 $con = dbConnection();
if(isset($_POST['renewId'])){
    $renewId=$_POST['renewId'];
    $deletequery="delete from renew where id='$renewId' ";
$query=mysqli_query($con,$deletequery);
if($query){
  $response=array('message'=>'success','status_code'=>'200');
  echo json_encode($response);

}else{
  $response=array('message'=>'failed','status_code'=>'404');
  echo json_encode($response);
}

    
    
}


?>
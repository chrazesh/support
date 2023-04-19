<?php 
include 'setting.php';
echo"<h1>Payment Successful</h1>";

$refId=$_GET['refId'];
$data =[
    'amt'=> $actualamount,
    'rid'=> $refId,
    'pid'=>$pid,
    'scd'=> $merchant_code
];

    $curl = curl_init($fraudcheck);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if (strpos($response,"Success") !== false) {
      header("location:http://localhost:8080/new/payment.php");
    }else{
        header("location:http://google.com");
    } 
    curl_close($curl);


?>
<a href="payment.php">Goto Home</a>
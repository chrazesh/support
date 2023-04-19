<?php
function give_response($code)
{

    $success = array(
        'message' => 'success',
        'status_code' => '200'
    );
    $failure = array(
        'message' => 'failure',
        'status_code' => '201'
    );
    $errore = array(
        'message' => 'errore',
        'status_code' => '502'
    );
    $response = array(
        'message' => 'unknown',
        'status_code' => '501'
    );
    $nodata = array(
        'message' => 'unknown',
        'status_code' => '404'
    );
    $parentrow = array(
        'message' => 'Parent row',
        'status_code' => '1451'
    );
    $duplicate = array(
        'message' => 'Duplicate Entry',
        'status_code' => '55'
    );

    switch ($code) {
        case '200':
            return $success;
            break;
        case '201':
            return $failure;
            break;
        case '502':
            return $errore;
            break;
        case '501':
            return $response;
            break;
        case '404':
            return $nodata;
            break;
        case '1451':
            return $parentrow;
            break;
        case '55':
            return $duplicate;
            break;
        default:
            # code...
            break;
    }
}

function check_if_exist($sql)
{
    $conn = dbConnecting();
    $req = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($req);
    $val = $result['result'];
    if ($val == 1) {
        return 1;
    } else if ($val == 0) {
        return 0;
    } else {
        return mysqli_error($conn);
    }
    mysqli_close($conn);
}
    if(isset($_POST['get_data_from_server'])){
      $from=$_POST['get_data_from_server']; 
      $check_exist = "SELECT IF (EXISTS(SELECT * FROM `installation` WHERE `id`='$from'),1,0) as result;";
      $result = check_if_exist($check_exist);
      if($result==0){
        echo "table is empty";
      }
      else($result==1){
        $con=mysqli_connect('localhost','root','','info');
       $selecDate="where installation_date >= $from && installation_date <= $to";
       $pass=mysqli_query($con,"select * from installation  $selecDate ");
       $response = array();
       $response = array(
           "message" => "success",
           "status_code" => '200',
           "products" => $data
       );
       echo json_encode($response);

    }
    else {
        $response = give_response(404);
        echo json_encode($response);
    }
    }
?>
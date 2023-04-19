<?php
function dbConnection(){
$con=mysqli_connect("localhost","globaltechcom_support","D3&V-[qUTKH;","globaltechcom_info");
 if($con) {
    //  echo "Connected";
     return $con;
  }
 else{
     echo "Not Connected";
 }
}

function get_Table_Data($sql)
{
    $con = dbConnection();
    $req = mysqli_query($con, $sql) or die(mysqli_error($con));
    if (!$req) {
        return 0;
    } else if (mysqli_num_rows($req) != 0) {
        $list = [];
        $i = 1;
        while ($data = mysqli_fetch_assoc($req)) {
            $list[$i] = $data;
            $i = $i + 1;
        }
        return $list;
    } else {
        return 0;
    }
}

function check_if_exist($sql)
{
    $con = dbConnection();
    $req = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($req);
    $val = $result['result'];
    if ($val == 1) {
        return 1;
    } else if ($val == 0) {
        return 0;
    } else {
        return mysqli_error($con);
    }
    // mysqli_close($conn);
}
?>
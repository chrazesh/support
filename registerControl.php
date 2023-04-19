<?php
include 'dbcon.php';

$con = dbConnection();
if(isset($_POST['get_regCompanyName'])){
    $get_regCompanyName = $_POST['get_regCompanyName'];
    $select="SELECT IF (EXISTS(SELECT company_name FROM `customer` WHERE `company_name`='$get_regCompanyName'),1,0) as result";
    $query=check_if_exist($select);
    $response="";
    if($query=='0'){
        $response = array(
            "message" => "*Please enter valid Company.",
            "status_code" => '33',
        );
    }else if($query=='1'){
        $selectCompany="select * from registration where name='$get_regCompanyName'";
        $passSelectCompany=mysqli_query($con,$selectCompany);
        // $row=mysqli_fetch_assoc($passSelectCompany);
        if($row=mysqli_fetch_assoc($passSelectCompany)>0){
              $response = array(
            "message" => "*Company already exists. You have already registered.",
            "status_code" => '200',
        );
        }else{
             $response = array(
            "message" => "*Success.",
            "status_code" => '200',
        );
        }
         
    }
    echo json_encode($response);
}

if(isset($_POST['get_regUsername'])){
    $get_regUsername = $_POST['get_regUsername'];
    $select="SELECT IF (EXISTS(SELECT username FROM `registration` WHERE `username`='$get_regUsername'),1,0) as result";
    $query=check_if_exist($select);
    $response="";
    if($get_regUsername !== ""){
         if($query=='0'){
        $response = array(
            "message" => "*Success.",
            "status_code" => '33',
        );
    }else if($query=='1'){
          $response = array(
            "message" => "*Username already exists",
            "status_code" => '200',
        );
    }
    }
   
    echo json_encode($response);
}

if(isset($_POST['get_regEmail'])){
    $get_regEmail = $_POST['get_regEmail'];
    $select="SELECT IF (EXISTS(SELECT email FROM `registration` WHERE `email`='$get_regEmail'),1,0) as result";
    $query=check_if_exist($select);
    $response="";
    if($get_regEmail !==""){
          if($query=='0'){
        $response = array(
            "message" => "*Success.",
            "status_code" => '33',
        );
    }else if($query=='1'){
          $response = array(
            "message" => "*Email already exists",
            "status_code" => '200',
        );
    }
    }
  
    echo json_encode($response);
}
if(isset($_POST['get_regMobile'])){
    $get_regMobile = $_POST['get_regMobile'];
    $select="SELECT IF (EXISTS(SELECT mobile FROM `registration` WHERE `mobile`='$get_regMobile'),1,0) as result";
    $query=check_if_exist($select);
    $response="";
    if($get_regMobile!==""){
            if($query=='0'){
        $response = array(
            "message" => "*Success.",
            "status_code" => '33',
        );
    }else if($query=='1'){
          $response = array(
            "message" => "*Mobile already exists",
            "status_code" => '200',
        );
    }
        
    }
    

    echo json_encode($response);
}
  if(isset($_POST['get_regPass1'])){
    $get_regPass1 = md5($_POST['get_regPass1']);
    $select="SELECT IF (EXISTS(SELECT * FROM `registration` WHERE `password`='$get_regPass1'),1,0) as result";
    $query=check_if_exist($select);
    $response="";
    if($get_regPass1 !==""){
         if($query=='0'){
        $response = array(
            "message" => "*Success.",
            "status_code" => '33',
        );
    }else if($query=='1'){
          $response = array(
            "message" => "*Password already taken.Try with another password",
            "status_code" => '200',
        );
    }
    }
   
    echo json_encode($response);
}
   
?>
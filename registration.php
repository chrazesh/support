<?php
include 'dbcon.php';
?>
<?php  
  $con = dbConnection();
if(isset($_POST['req_submit'])){
  $name= ucwords($_POST['name']);
  $username = $_POST['username'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $staff=$_POST['staff'];
  $userpassword = $_POST['pass'];
  $cuserpassword = $_POST['cpass'];
  $encrypted_pwd = md5($userpassword);
  $encrypted_cpwd = md5($cuserpassword);
  $token=bin2hex(random_bytes(15));
    if( $name=="" || $username=="" ||$mobile=="" ||$staff=="" || $userpassword=="" ||$cuserpassword=="" ){
     ?>
      <script>
        alert("Please fill all the fields.");
        window.location.href="registration.php";
      </script>
     <?php 
    }else{
         // $con = dbConnection();
         $myquery = "SELECT `email`,`username`,`name` FROM `registration` WHERE email='$email' OR username='$username' OR name='$name'";
         $getdata = mysqli_query($con,$myquery) or die(mysqli_error($con));
         $myquery1 = "SELECT `password` FROM `registration` WHERE password='$encrypted_pwd'";
         $getdata1= mysqli_query($con,$myquery1) or die(mysqli_error($con));
         $myquery2 = "SELECT `mobile` FROM `registration` WHERE mobile='$mobile'";
         $getdata2= mysqli_query($con,$myquery2) or die(mysqli_error($con));
        
         if(mysqli_num_rows($getdata)>0){
          ?>
          <script type="text/javascript">
          alert("Please fill all the fileds correctly and try again");
          
          window.location.href="registration.php";
          </script>
          <?php 
          }elseif(mysqli_num_rows($getdata2)>0){
              ?>
          <script type="text/javascript">
          alert("Please fill all the fileds correctly and try again");
        
          window.location.href="registration.php";
          </script>
          <?php 
          }elseif(mysqli_num_rows($getdat1)>0){
            ?>
          <script type="text/javascript">
          alert("Please fill all the fileds correctly and try again");
          window.location.href="registration.php";
         </script>
        <?php 
        }elseif($encrypted_pwd != $encrypted_cpwd){
            ?>
          <script type="text/javascript">
           alert("Please fill all the fileds correctly and try again");
          window.location.href="registration.php";
          </script>
          <?php 
         }else{
          $con = dbConnection();
          $query="INSERT INTO `registration`(`name`,`username`,`email`,`mobile`,`staff`,`password`,`cpassword`,`token`) VALUES('$name','$username','$email','$mobile','$staff','$encrypted_pwd','$encrypted_cpwd','$token')";
          $req = mysqli_query($con, $query) or die(mysqli_error($con));
          if($req){
            echo"
             <script>
                alert('Registration Successful');
                window.location.href='index.php';
                 </script>";
              $to_email = "$email";
                $subject = "Registration Alert";
                $body = "Dear ".$_POST['name'].", your have successfully registered with username-'".$_POST['username']."', Thank You!";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
          }
        }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Register</title>
</head>
<body>
<div class="loginmain">
<form action="#" method="post" class="loginform">
     <!--<img src="registration.gif" alt="" style="width:210px;position:relative;bottom:-15px;left:71px">-->
      <div class="name">
          <label>Company Name:</label>
          <input type="text" name="name" placeholder="Enter Company Name Full" id="regCompany" required>
           <div style="color:green;font-size:11px;" id="para2"></div>
          <div style="color:red;font-size:11px;" id="para1"></div>
          <!--<p style="display:none;color:red;font-size:11px;" id="para1">*Please enter valid Company .</p>-->
    
        </div>
        
        <div class="username">
          <label>Username:</label>
          <input type="text" name="username" placeholder="Username" id="regUsername" required>
           <div style="color:red;font-size:11px;" id="para3"></div>
          <div style="color:green;font-size:11px;" id="para4"></div>
        </div>
        
         <div class="email">
          <label>Email:</label>
          <input type="email" name="email" placeholder="Email" id="regEmail" required>
           <div style="color:red;font-size:11px;" id="para5"></div>
          <div style="color:green;font-size:11px;" id="para6"></div>
        </div>
        
         <div class="mobile">
          <label>Mobile:</label>
          <input type="text" name="mobile" placeholder="Mobile" id="regMobile" required>
           <div style="color:red;font-size:11px;" id="para7"></div>
          <div style="color:green;font-size:11px;" id="para8"></div>
        </div>
        
         <div class="staff">
          <label>Client :</label>
            <select name='staff' value="client" required>
            <option value="client">Client</option>
          </select>
        </div>
        
        <div class="password">
          <label>Password:</label>
          <input type="password" name="pass" placeholder="Password" id="pass1" maxlength="20" required>
            <div style="color:red;font-size:11px;" id="para10"></div>
          <div style="color:green;font-size:11px;" id="para11"></div>
        </div>
        
         <div class="cpassword">
          <label>Conform Password:</label>
          <input type="password" name="cpass" placeholder="Conform Password" id="confpass"   maxlength="20" required>
              <p style="display:none;color:red;font-size:11px;" id="para">*Password and Conform Password must be same.</p>
        </div>

 <button type="submit" name="req_submit" class="btn btn-primary loginbutton mb-3">Create</button>
 <div><span>Already have an account ?<a href="index.php">Login</a></span></div>
</form>
</div>
<script>
 $(document).ready(function () {
 $('#confpass').keyup(function(){
    if($('#pass1').val() != $('#confpass').val()){
        $("#para").css("display", "block");
        $("#confpass").css("border", "2px solid red");
    }else if($('#pass1').val() == $('#confpass').val()){
         $("#para").css("display", "none");
          $("#confpass").css("border", "2px solid  green");
         
    }else{
        $("#para").css("display", "none");
         $("#confpass").css("border", "2px solid  green");
    }
 });
 
  $('#regCompany').blur(function(){
      var regCompany=$('#regCompany').val();
              $.ajax({
               url:"registerControl.php",
               method:"POST",
               data:{get_regCompanyName:regCompany},
               success: function (data) {
                   console.log(data);
                   var da = JSON.parse(data);
                   if(da.status_code == 33) {
                         $("#para1").empty();
                        $("#para2").empty();
                       $("#para1").append(da.message);
                         
                   }else{
                       $("#para2").empty();
                         $("#para1").empty();
                       $("#para2").append(da.message);
                    
                   }
                       
                   }
               }); 
  });
    $('#regUsername').blur(function(){
      var regUsername=$('#regUsername').val();
              $.ajax({
               url:"registerControl.php",
               method:"POST",
               data:{get_regUsername:regUsername},
               success: function (data) {
                   console.log(data);
                   var da = JSON.parse(data);
                   if(da.status_code == 33) {
                         $("#para3").empty();
                        $("#para4").empty();
                       $("#para4").append(da.message);
                         
                   }else{
                       $("#para3").empty();
                         $("#para4").empty();
                       $("#para3").append(da.message);
                   }
                       
                   }
               }); 
    });
    
     $('#regEmail').blur(function(){
      var regEmail=$('#regEmail').val();
              $.ajax({
               url:"registerControl.php",
               method:"POST",
               data:{get_regEmail:regEmail},
               success: function (data) {
                   console.log(data);
                   var da = JSON.parse(data);
                   if(da.status_code == 33) {
                         $("#para5").empty();
                        $("#para6").empty();
                       $("#para6").append(da.message);
                         
                   }else{
                       $("#para5").empty();
                         $("#para6").empty();
                       $("#para5").append(da.message);
                   }
                       
                   }
               }); 
    });
        
       $('#regMobile').blur(function(){
      var regMobile=$('#regMobile').val();
              $.ajax({
               url:"registerControl.php",
               method:"POST",
               data:{get_regMobile:regMobile},
               success: function (data) {
                   console.log(data);
                   var da = JSON.parse(data);
                   if(da.status_code == 33) {
                         $("#para7").empty();
                        $("#para8").empty();
                       $("#para8").append(da.message);
                         
                   }else{
                       $("#para7").empty();
                         $("#para8").empty();
                       $("#para7").append(da.message);
                   }
                       
                   }
               }); 
    });
      $('#pass1').blur(function(){
      var regPass1=$('#pass1').val();
      if(regPass1==""){
           $("#para10").empty();
            $("#para11").empty();
          return false;
      }else{
          
          
              $.ajax({
               url:"registerControl.php",
               method:"POST",
               data:{get_regPass1:regPass1},
               success: function (data) {
                   console.log(data);
                   var da = JSON.parse(data);
                   if(da.status_code == 33) {
                         $("#para10").empty();
                        $("#para11").empty();
                       $("#para11").append(da.message);
                         
                   }else{
                       $("#para10").empty();
                         $("#para11").empty();
                       $("#para10").append(da.message);
                   }
                       
                   }
               }); 
      }
      
    });

});
  </script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

</body>
</html>




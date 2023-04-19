<?php 
include 'dbcon.php';
session_start();
ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Support</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
</head>
<body>
     
<div class="loginmain"  id="loginMain"  data-aos="fade-up" data-aos-duration="3000">

  <form action="" method="POST"  class="loginform">
     <img src="images/logo.png" alt="" style="width:246px;position:relative;bottom:21px;">
     <h3 style="margin-bottom:41px">Generate New Password</h3>
   <div>
       <P class="text-warning px-4 text-center"><?php 
    if(isset($_SESSION['passmsg'])){
    echo $_SESSION['passmsg'];
    }else{
         echo $_SESSION['passmsg']="";
    }
    
    ?></p>
    <?php $_SESSION['passmsg']=""; ?>
   </div>
    
     
        <div class="password">
          <label>New Password:</label>
          <input type="password" name="password" placeholder="Enter New Password" required>
        <i class="fa-solid fa-key"></i>
        </div>
         <div class="password">
          <label>Conform Password:</label>
          <input type="password" name="cpassword" placeholder="Conform New Password" required>
        <i class="fa-solid fa-key"></i>
        </div>

    <button  type="submit" class="btn btn-primary loginbutton" name="submit">Submit</button>
    <div style="margin-top:23px"><span>Already have an account ?<a href="index.php">Login</a></span></div>
    
  </form>
</div>
 <script>
  AOS.init();

</script>
</body>
</html>

<?php 
 $con = dbConnection();
if(isset($_POST['submit'])){
    if(isset($_GET['token'])){
        $token=$_GET['token'];echo $token;
$password=$_POST['password'];   
$cpassword=$_POST['cpassword'];
//  echo"<script>alert($token)</script>";
$selectEmail="select * from registration where token='$token'";
$passEmail=mysqli_query($con,$selectEmail);
  $userData=mysqli_fetch_assoc($passEmail);
  $dbToken=$userData['token'];echo "gdfff".$dbToken."'";
  echo"<script>alert($token)</script>";
if($password===$cpassword){
    if($dbToken===$token){
        $updatePassword="update registration set `password`='$password',`cpassword`='$cpassword' where `token`='$token'";
  $passPassword=mysqli_query($con,$updatePassword);
    if($passPassword){
    $_SESSION['msg']="Your Password has been Updated.";
    $updatetoken=bin2hex(random_bytes(15));
        $updateToken="update registration set `token`='$updatetoken' where `token`='$token'";
        $passToken=mysqli_query($con,$updateToken);
    echo"<script>window.location.href='index.php'</script>";
    }else{
     $_SESSION['passmsg']="Your Password is not Updated.";
    echo"<script>window.location.href='updatePassword.php'</script>";
    }
    }else{
        
         $_SESSION['passmsg']="The token you entered is already used.";
        
          echo"<script>window.location.href='  http://support.globaltech.com.np/updatePassword.php?token=$token'</script>";
    }


}else{
     
      $_SESSION['passmsg']="Your Password is not matching.";
        
        echo"<script>window.location.href='  http://support.globaltech.com.np/updatePassword.php?token=$token'</script>";
}
        
    }else{
    
        
        echo"No token found";
    }
}

?>














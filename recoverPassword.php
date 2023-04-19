<?php 
include 'dbcon.php';
session_start();

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
     <h3 style="margin-bottom:41px">Recover Password</h3>

     
        <div class="password">
          <label>Enter Email:</label>
          <input type="email" name="email" placeholder="Enter Email" required>
        <i class="fa-solid fa-envelope"></i>
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
$email=$_POST['email'];  
$selectEmail="select * from registration where email='$email'";
$passEmail=mysqli_query($con,$selectEmail);
$emailCount=mysqli_num_rows($passEmail);
if($emailCount){
    $userData=mysqli_fetch_assoc($passEmail);
    $username=$userData['username'];
    $token=$userData['token'];
    $subject="Reset Password";
    $body="Hi,$username. Click the link to reset your password
        http://support.globaltech.com.np/updatePassword.php?token=$token";
    $senderEmail="From:support@globaltech.com.np";    
    if(mail($email,$subject,$body,$senderEmail)){
        $_SESSION['msg']="Check your email to reset your password $email"; 
        echo"<script>window.location.href='index.php'</script>";
    }else{
     echo"<script>alert('Email sending failed');</script>";
    }

}else{
    echo"<script>alert('No Email Found')</script>";
}
}

?>














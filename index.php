<?php 
include 'dbcon.php';
SESSION_START();
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
  <link rel="stylesheet" href="preloaderStyle.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
</head>
<body onload="myFunction()">
         <!--preloader-->
 <div class="center" id="preloader">
        <div class="ring"></div>
        <span>globaltech.....</span>
    </div>
<!--preloader closed-->
     
<div class="loginmain"  id="loginMain"  data-aos="fade-up" data-aos-duration="3000">

  <form action="" method="POST"  class="loginform">
     <img src="logingif.gif" alt="" style="width:210px;margin-top:-76px;position:relative;top:49px;">
     <img src="OMS.png" alt="" style="width:246px;position:relative;bottom:37px;">
     
      <div>
          <P class="text-success px-4 text-center m-4"><?php echo $_SESSION['msg'] ?></p>
          <?php $_SESSION['msg']=""; ?>
      </div>
      
       <div class="username">
          <!--<label>Username:</label>-->
          <input type="text" name="uname" placeholder="Username" required>
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="password">
          <!--<label>Password:</label>-->
          <input type="password" name="pass" placeholder="Password" required>
          <i class="fa-solid fa-key"></i>
        </div>

    <button  type="submit" class="btn btn-primary loginbutton" name="login">Login</button>
     <a href="recoverPassword.php" style="margin-top:15px;">Forgot Password? Click Here.</a>
    <a href="registration.php" style="margin-top:15px;">New User? Sign Up Here.</a>
    
  </form>
</div>
 <script>
  AOS.init();
let preloader1=document.getElementById('preloader');
function myFunction(){
    setInterval(function(){
       
         preloader1.style.display='none'
         
    },1000)
}

</script>
</body>
</html>



<?php 
$con = dbConnection();
if(isset($_POST['login'])){
$username=$_POST['uname'];
$password=$_POST['pass']; 
$selectquery="SELECT * FROM registration WHERE username='$username';";
$query=mysqli_query($con,$selectquery);
if($query){
    $username_search=mysqli_num_rows($query); 
    if($username_search){
    $username_pass=mysqli_fetch_assoc($query);
    $staff=$username_pass['staff'];
    $db_pass= $username_pass['password'];//echo $db_pass;
    $password1=md5($password); //echo "<br>".$password1;
    if($staff=="client"){
        if(trim($db_pass)===trim($password1) || $password===$db_pass){
        $_SESSION['username']=$username;
        echo "<script>window.location.href='client.php';</script>";
      }else
      {
        echo "<script> alert('wrong password'); 
        window.location.href='index.php';
        </script>";
       
      }
    }else{
        if(trim($db_pass)===trim($password1)|| $password===$db_pass){
          $_SESSION['username']=$username;
        echo "<script>window.location.href='curmonthinstallation.php';</script>";
      }else
      {
        echo "<script> alert('wrong password'); 
        window.location.href='index.php';
        </script>";
       
      }
    }
      
    }
    else{
        echo "<script> alert('Username not exist.'); 
        window.location.href='index.php';
        </script>";
        
    }
}
else{
    
    echo mysqli_error($con);
}
}

?>

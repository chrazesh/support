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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
</head>
<body>


<div class="loginmain">

  <form action="" method="POST"  class="loginform">
     <img src="logingif.gif" alt="" style="width:210px;">
     <img src="login2ndgif.gif" alt="" style="width:210px;position:relative;bottom:70px;">

       <div class="username">
          <label>Username:</label>
          <input type="text" name="uname" placeholder="Username">
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="password">
          <label>Password:</label>
          <input type="password" name="pass" placeholder="Password">
          <i class="fa-solid fa-key"></i>
        </div>

    <button  type="submit" class="btn btn-primary loginbutton" name="login">Login</button>

  
    
  </form>
</div>



<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>



<?php 
if(isset($_POST['login'])){
$con = dbConnection();
$username=$_POST['uname']; /*echo $_POST['uname']; */
$password=$_POST['pass']; /*echo " snf ".$password;*/
$selectquery="SELECT * FROM login_details WHERE username='$username';"; /*echo $selectquery;*/
$query=mysqli_query($con,$selectquery);
if($query){
   // echo "executed";
    $username_search=mysqli_num_rows($query); //echo "<br>Row Count :".$username_search;
    if($username_search){
        //echo "i am in";
    $username_pass=mysqli_fetch_assoc($query);
    $pass1= $username_pass['password']; //echo "retruved password : ". $pass1;
//    $pass_decode=password_verify($password, $pass1);
      if($password==$pass1){
          $_SESSION['username']=$username;
          echo $_SESSION['username'];
        // echo "<script>alert('login successful');window.location.href='curmonthinstallation.php';</script>";
        echo "<script>window.location.href='curmonthinstallation.php';</script>";
      }else
      {
        echo "<script> alert('wrong password'); window.location.href='index.php';</script>";
       // echo "Hewhehehe";
      }
    }
    else{
        echo "<script> alert('Username not exist.'); window.location.href='index.php';</script>";
        // echo "row count is 0";
    }
}
else{
    // echo "not executed";
    echo mysqli_error($con);
}
}

?>

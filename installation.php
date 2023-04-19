<?php 
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">

</head>   

<body>
  
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <a class="navbar-brand text-dark" href="curmonthinstallation.php">globalTech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark" aria-current="page" href="record.php">Master</a>
        <a class="nav-link text-dark" href="record3.php">Inquiry</a>
        <a class="nav-link text-light" href="record1.php">Installation Information</a>
        <a class="nav-link text-dark" href="report.php">Report</a>
        <a class="nav-link text-dark" href="record2.php">Support</a>
        <a class="nav-link text-dark" href="record4.php">Demo</a>
          <a class="nav-link text-dark" href="index.php" style="margin-left:762px">Logout</a>

    
      </div>
    </div>
  </div>
</nav>
<script src="script.js"></script>
</body>
</html>





<!--  if(isset($_POST['update1'])){
//   $cname1=$_POST['cname1'];
//     $idate=$_POST['idate'];
//     $users=$_POST['users'];
//     $type=$_POST['type'];
//     $exp=$_POST['exp'];
//     $reference=$_POST['reference'];
//   $updatequery="update installation set installation_date='$idate',no_of_users='$users',type='$type',exp_date='$exp',referenced_by='$reference' where client_name='$cname1' ";
//   $query1=mysqli_query($con,$updatequery);
//   if($query1){
//       echo"<script>
//       alert('data updated successfullly');
//       window.location.href='index.php';
//       </script>";
//   }else{
//       echo"<script>
//       alert('data not updated');
//       window.location.href='index.php';
//       </script>";
//   }

// }

// if(isset($_POST['delete1'])){
//   $cname1=$_POST['cname1'];
//   $deletequery="delete from installation where client_name='$cname1'";
//   $query2=mysqli_query($con,$deletequery);
//   if($query2){
//       echo"<script>
//       alert('data deleted successfullly');
//       window.location.href='index.php';
//       </script>";
//   }else{
//     echo"<script>
//     alert('data not deleted');
//     window.location.href='index.php';
//     </script>";
//   }
// }
 -->

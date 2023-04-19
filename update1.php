<?php 
include 'dbcon.php';
session_start();
if(isset($_SESSION['username'])){
    // echo $_SESSION['username'];
}else{
 echo"<script>window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Installation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
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
          <div class="dropdown bg-success">
            <button class="btn btn-success dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">Transaction</button>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="record3.php">Inquiry</a></li>
              <li><a class="dropdown-item" href="record1.php">Installation</a></li>
              <li><a class="dropdown-item" href="record2.php">Support</a></li>
              <li><a class="dropdown-item" href="record4.php">Demo</a></li>
                <li><a class="dropdown-item" href="record5.php">Registration</a></li>
            </ul>
          </div>
        <div class="dropdown bg-success">
          <button class="btn btn-success dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Report</button>
            <ul class="dropdown-menu dropdown-menu-dark ">
              <li><a class="dropdown-item" href="currentinstallation.php">Current Month Installation</a></li>
              <li><a class="dropdown-item" href="currentexpiry.php">Current Month Expiry</a></li>
              <li><a class="dropdown-item" href="expired.php">Expired</a></li>
                <li><a class="dropdown-item" href="regReport.php">Registration Report</a></li>
               <li><a class="dropdown-item" href="support3.php">Support</a></li>
            </ul>
        </div>
        <!-- <a class="nav-link text-light" href="report.php">Report</a> -->
         <a class="nav-link text-dark" href="client-issue.php">Client-Issue</a> 
        <a class="nav-link text-dark" href="payment.php">Payment</a>
        <a class="nav-link text-dark" href="logout.php" style="margin-left:762px"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    
      </div>
    </div>
  </div>
</nav>


<div class="container-fluid update1main">
<form action="" method="POST" class="needs-validation update1form" enctype="multipart/form-data" novalidate>

<?php 
$con = dbConnection();
$id=$_GET['id'];
$select="select * from installation where id='$id'";
$query=mysqli_query($con,$select);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['update1'])){
    $id=$_GET['id'];
    $companyname=$_POST['companyname'];
    $cemail=$_POST['cemail'];
    $cname1=$_POST['cname1'];
    $cpemail=$_POST['cpemail'];
    $pan=$_POST['pan'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $type=$_POST['type'];
    $users=$_POST['users'];
    $idate=$_POST['idate'];
    $exp=$_POST['exp'];
    $support=$_POST['support'];
    $reference=$_POST['reference'];
    $sfeedback=$_POST['sfeedback'];
    $user=$_POST['supportName'];
      $pname=basename($_FILES["insAttachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
    $tname=$_FILES["insAttachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
   $upload_dir='attachment-installation/'.$pname;
   if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
   }else{
      echo "file not uploaded";
   }
    $updatequery="update installation set company_name='$companyname',company_email='$cemail',client_name='$cname1',person_email='$cpemail',pan_no='$pan',address='$address',city='$city',phone='$phone',mobile='$mobile',no_of_users='$users',installation_date='$idate',exp_date='$exp',support_officer='$support', referenced_by='$reference',feedback='$sfeedback',attachment='$pname',user='$user',entryDate=now() where id='$id' ";
    $query1=mysqli_query($con,$updatequery);
    if($query1){
        echo"<script>
        alert('data udated successfullly');
        window.location.href='record1.php';
        </script>";
    }else{
        echo"data not updated".mysqli_error($con); 
        // echo"<script>
        // alert('data not udated');
        // window.location.href='record1.php';
        // </script>";
    }

}

?>
<div class="row">
    <div  class="col-4 mb-2">
        <label class="form-label" >Company Name:</label>
        <input type="text" name="companyname"  class="form-control special" id="exampleFormControlInput1" value="<?php echo $result['company_name'] ?>" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Company Email:</label>
        <input type="email" name="cemail"  class="form-control" id="exampleFormControlInput1" value="<?php echo $result['company_email'] ?>">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label">Contact Person:</label>
        <input type="text" name="cname1"  class="form-control special" id="exampleFormControlInput1" value="<?php echo $result['client_name'] ?>">
    </div>
   

</div>
  

<div class="row">

<div  class="col-4 mb-2">
        <label class="form-label" >Contact Person Email:</label>
        <input type="email" name="cpemail"  class="form-control" id="exampleFormControlInput1" value="<?php echo $result['person_email'] ?>">
    </div>
    <div  class="col-4 mb-2">
        <label class="form-label" >Pan No:</label>
        <input type="text" name="pan"  class="form-control special4" id="exampleFormControlInput1" value="<?php echo $result['pan_no'] ?>">
    </div>

<div  class="col-4 mb-2">
        <label class="form-label" >Address:</label>
        <input type="text" name="address"  class="form-control special" id="exampleFormControlInput1" value="<?php echo $result['address'] ?>">
    </div>

   

</div>

  <div class="row">

  <div  class="col-4 mb-2">
        <label class="form-label" >City:</label>
        <input type="text" name="city"  class="form-control special" id="exampleFormControlInput1" value="<?php echo $result['city'] ?>">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Phone:</label>
        <input type="text" name="phone"  class="form-control special2" id="exampleFormControlInput1" value="<?php echo $result['phone'] ?>">
    </div>
  <div  class="col-4 mb-2">
        <label class="form-label" >Mobile:</label>
        <input type="text" name="mobile"  class="form-control special3" id="exampleFormControlInput1" value="<?php echo $result['mobile'] ?>">
    </div>

  
  </div>

   <div class="row">
   

   <div  class="col-4 mb-2">
        <label class="form-label">No of Users:</label>
        <input type="text" name="users"  class="form-control special4" id="exampleFormControlInput1" value="<?php echo $result['no_of_users'] ?>">
    </div>


   <div  class="col-4 mb-2" >
        <label class="form-label">Installation Date:</label>
        <input type="text" name="idate"  class="form-control" id="defaultdate2" value="<?php echo $result['installation_date'] ?>" required>
    </div>
  
 <div class="col-4 mb-2">
        <label class="form-label">Expiry Date:</label>
        <input type="text" name="exp"  class="form-control" id="exampleFormControlInput1" value="<?php echo $result['exp_date'] ?>" required>
    </div>
   </div>

   
   <div class="row">
  
    
     <div class="col-4 mb-2">
  <label class="form-label">Support Staff</label>
   <select   id="installationSupport" name="support" class="form-control" required>
       <option value="">Select Suppport Staff</option>
       <?php 
  $con = dbConnection();
  $selectUsers="select name from registration where staff='staff'";
  $passSelectUsers=mysqli_query($con,$selectUsers);
  while($result=mysqli_fetch_assoc($passSelectUsers)){
  ?>
  <option value="<?php echo $result['name'] ?>"><?php echo $result['name'] ?></option>
   <?php
  }
  ?>
  </select>
 </div>

    
    <!--<div  class="col-4 mb-2" >-->
    <!--     <label class="form-label">Support Officer:</label>-->
    <!--    <input type="text" name="support"  class="form-control special" id="exampleFormControlInput1" value="<?php echo $result['support_officer'] ?>" required>-->
    <!--</div>-->


   <div class="col-4 mb-2">
        <label class="form-label">Referenced By:</label>
        <input type="text" name="reference"  class="form-control special" id="exampleFormControlInput1" value="<?php echo $result['referenced_by'] ?>">
    </div>
  <div class="col-4 mb-2" >
  <label class="form-label">Feedback</label>
  <textarea  cols="45" rows="3"  placeholder="Feedback" class="form-control"  id="supportFeedback" name="sfeedback"><?php echo $result['feedback'] ?></textarea>
 </div>
 <div  class="col-4 mb-3" >
         <label class="form-label">Attactment:</label>
        <input type="file" name="insAttachment"  class="form-control" id="installationAttachment" >
    </div>


   </div>
<input type="hidden" name="supportName" value="<?php echo $_SESSION['username']?>">
  
<div class="update1button">
<button  type="submit" name="update1"> UPDATE</button>
<!-- <a href="record1.php" name="display"><i class="fa-regular fa-eye"></i>VIEW</a> -->
</div>
  
</form>

</div>
<script src="script.js"></script>
</body>
</html>
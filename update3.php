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
  <title>Update Inquiry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
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

<div class="container-fluid update2main">

<form action=""  method="POST" class="row needs-validation update2form" enctype="multipart/form-data" novalidate>

<?php 
$con = dbConnection();
$id=$_GET['id'];
$select="select * from inquiry where inquiry_id='$id'";
$query=mysqli_query($con,$select);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['update3'])){
  $companyname=$_POST['companyname'];
  $date=$_POST['date'];
  $miti=$_POST['miti'];
  $clientname=$_POST['clientname'];
  $address=$_POST['address'];
  $cemail=$_POST['cemail'];
  $cpemail=$_POST['cpemail'];
  $reference=$_POST['reference'];
  $software=$_POST['software'];
  $organization=$_POST['organization'];
  $phone=$_POST['phone'];
  $pan=$_POST['pan'];
  $follow=$_POST['follow'];
  $next=$_POST['nextfollow'];
  $feedback=$_POST['feedback'];
   $iattachment=$_POST['iattachment'];
   $user=$_POST['supportName'];
    $pname=basename($_FILES["iattachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
    $tname=$_FILES["iattachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
   $upload_dir='attachment-inquiry/'.$pname;
   if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
   }else{
      echo "file not uploaded";
   }
    $updatequery="update inquiry set company_name='$companyname',date='$date',miti='$miti',client_name='$clientname',address='$address',company_email='$cemail',person_email='$cpemail',reference_by='$reference',software_type='$software',organization_type='$organization',phone='$phone',pan_no='$pan',follow_up='$follow',next_follow='$next',feedback='$feedback',attachment='$pname',user='$user',entryDate=now() where inquiry_id='$id'";
    $query1=mysqli_query($con,$updatequery);
    if($query1){
        echo"<script>
        alert('data udated successfullly');
        window.location.href='record3.php';
        </script>";
    }else{
        echo "data not updated".mysqli_error($con);
    }

}

?>


<div class="col-4">
      <label for="exampleFormControlTextarea1" class="form-label">Company Name:</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control special" name="companyname"  id="exampleFormControlInput1" placeholder="Enter Company name" value="<?php echo $result['company_name'] ?>" required>
      <i class="fa-solid fa-magnifying-glass input-group-text" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
    </div>
  </div>

    <div class="col-4 mb-3">
      <label for="exampleFormControlInput1" class="form-label">Date:</label>
      <input type="text" class="form-control" name="date" id="defaultdate" value="<?php echo $result['date'] ?>" required>
    </div>

   <div class="col-4 mb-3">
     <label for="exampleFormControlTextarea1" class="form-label ">Miti:</label>
     <input type="text" class="form-control" name="miti"   id="miti" placeholder="Enter Miti" value="<?php echo $result['miti'] ?>" required>
   </div>


<div class="col-4 mb-2">
    <label for="exampleFormControlInput1" class="form-label">Contact Person:</label>
    <input type="text" class="form-control special" name="clientname"  id="exampleFormControlInput1" placeholder="Enter Client Name" value="<?php echo $result['client_name'] ?>">
   </div>

   <div class="col-4 mb-2">
    <label for="exampleFormControlInput1" class="form-label">Address:</label>
    <input type="text" class="form-control special" name="address"  id="exampleFormControlInput1" placeholder="Enter Adddress" value="<?php echo $result['address'] ?>" >
   </div>
 
   <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Company Email:</label>
    <input type="email" class="form-control" name="cemail"  id="exampleFormControlInput1" placeholder="Enter Company Email" value="<?php echo $result['company_email'] ?>">
  </div>

  <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Contact Person Email:</label>
    <input type="email" class="form-control" name="cpemail"  id="exampleFormControlInput1" placeholder="Enter Contact Person Email" value="<?php echo $result['person_email'] ?>">
  </div>
  <div class="col-4 mb-2">
  <label for="exampleFormControlInput1" class="form-label">Reference By:</label>
  <input type="text" class="form-control special" name="reference"  id="exampleFormControlInput1" placeholder="Enter Reference By" value="<?php echo $result['reference_by'] ?>" >
</div>


<div class="col-4 mb-2">
   <label for="exampleFormControlInput1" class="form-label">Software Type:</label>
   <input type="text" class="form-control special" name="software"  id="exampleFormControlInput1" placeholder="Enter Software Type" value="<?php echo $result['software_type'] ?>">
  </div>
  
<div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Organization Type:</label>
    <input type="text" class="form-control special" name="organization"  id="exampleFormControlInput1" placeholder="Enter Interseted project" value="<?php echo $result['organization_type'] ?>">
  </div>
  <div class="col-4 mb-2">
   <label for="exampleFormControlTextarea1" class="form-label">Phone:</label>
   <input type="text" class="form-control special2" name="phone"  id="exampleFormControlInput1" placeholder="Enter Phone" value="<?php echo $result['phone'] ?>" >
  </div>

 
  <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Pan No:</label>
    <input type="text" class="form-control special4" name="pan"  id="exampleFormControlInput1" placeholder="Enter Pan" value="<?php echo $result['pan_no'] ?>">
  </div>
 
 

  <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Follow Up By:</label>
      <input type="text" class="form-control special" name="follow"  id="exampleFormControlInput1" placeholder="Enter Refer To" value="<?php echo $result['follow_up'] ?>">
   </div>
   <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Next Follow Up date:</label>
      <input type="date" class="form-control" name="nextfollow"  id="exampleFormControlInput1" placeholder="Enter Refer To" value="<?php echo $result['next_follow'] ?>"  required>
   </div>

<div class="col-4 mb-2">
  <label for="exampleFormControlTextarea1" class="form-label">Feedback:</label>
  <textarea class="form-control" name="feedback"  id="exampleFormControlTextarea1" rows="3" placeholder="Enter Feedback" ><?php echo $result['feedback'] ?></textarea>
</div>

 <div class="row">
      <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Attachment:</label>
    <input type="file" class="form-control" name="iattachment"  id="inquiryAttachment">
    </div>
   <div class="col-4">
      <input type="text" class="form-control invisible" name="customer_id" id="inquiryId" placeholder="Enter id">
   </div>
 </div>
<input type="hidden" name="supportName" value="<?php echo $_SESSION['username']?>">

<div class="inquirybutton">
  <button type="submit" name="update3">UPDATE</button>
 <!-- <a href="record3.php"><i class="fa-regular fa-eye"></i>VIEW</a> -->

</div>

</form>


</div>


<script src="script.js"></script>

</body>
</html>
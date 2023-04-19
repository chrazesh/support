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
  <title>Update-Demo</title>
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

<form action=""  method="POST" class="needs-validation update2form" enctype="multipart/form-data" novalidate>

<?php 
$con = dbConnection();
$id=$_GET['id'];
$select="select * from demo where id='$id'";
$query=mysqli_query($con,$select);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['update4'])){
    $id=$_GET['id'];
    $date=$_POST['date'];
    $companyname=$_POST['companyname'];
    $clientname=$_POST['clientname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $pan=$_POST['pan'];
    $feedback=$_POST['feedback'];
    $remark=$_POST['remark'];
    $user=$_POST['supportName'];
    $pname=basename($_FILES["dattachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
  $tname=$_FILES["dattachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
  $upload_dir='attachment-demo/'.$pname;
  if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
  }else{
      echo "file not uploaded";
  }
    $updatequery="update demo set date='$date',company_name='$companyname',client_name='$clientname',address='$address',phone='$phone', mobile='$mobile',email='$email',pan_no='$pan',feedback='$feedback',remarks='$remark',attachment='$pname',user='$user',entryDate=now() where id='$id'";
    $query1=mysqli_query($con,$updatequery);
    if($query1){
        echo"<script>
        alert('data udated successfullly');
        window.location.href='record4.php';
        </script>";
    }else{
        echo "data not updated".mysqli_error($con);
    }

}

?>


<div class="row">

<div  class="col-4 mb-2">
        <label class="form-label">Date:</label>
        <input type="date" name="date"  class="form-control" id="exampleFormControlInput1"  placeholder="Enter Date" value="<?php echo $result['date'] ?>" required>
    </div>
    <div  class="col-4 mb-2">
        <label class="form-label">Company Name:</label>
        <input type="text" name="companyname"  class="form-control special" id="exampleFormControlInput1"  placeholder="Enter Company Name" value="<?php echo $result['company_name'] ?>" required>
    </div>
    
    <div  class="col-4 mb-2">
        <label class="form-label" >Contact Person:</label>
        <input type="text" name="clientname"  class="form-control special" id="exampleFormControlInput1"  placeholder="Enter Enter Name" value="<?php echo $result['client_name'] ?>">
    </div>

</div>
<div class="row">

<div  class="col-4 mb-2">
        <label class="form-label" >Address:</label>
        <input type="text" name="address"  class="form-control special" id="exampleFormControlInput1"  placeholder="Enter Address" value="<?php echo $result['address'] ?>" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Phone:</label>
        <input type="text" name="phone"  class="form-control special2" id="exampleFormControlInput1"  placeholder="Enter Phone" value="<?php echo $result['phone'] ?>">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Mobile:</label>
        <input type="text" name="mobile"  class="form-control special3" id="exampleFormControlInput1"  placeholder="Enter Mobile" value="<?php echo $result['mobile'] ?>" required>
    </div>

</div>

<div class="row">
<div  class="col-4 mb-2">
        <label class="form-label" >Email:</label>
        <input type="email" name="email"  class="form-control" id="exampleFormControlInput1"  placeholder="Enter Email" value="<?php echo $result['email'] ?>">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Pan No:</label>
        <input type="text" name="pan"  class="form-control special4" id="exampleFormControlInput1"  placeholder="Enter Pan" value="<?php echo $result['pan_no'] ?>">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Feedback</label>
    <textarea name="feedback" class="form-control" cols="30" rows="3"  placeholder="Enter Feedback" required><?php echo $result['feedback'] ?></textarea>
    </div>

</div>
   <div class="row">
   <div  class="col-4 mb-2">
        <label class="form-label" >Remark:</label>
        <input type="text" name="remark"  class="form-control" id="exampleFormControlInput1"  placeholder="Enter Remark" value="<?php echo $result['remarks'] ?>">
    </div>

<div  class="col-4 mb-2">
        <label class="form-label" >Attachment:</label>
        <input type="file" name="dattachment" class="form-control" id="demoAttachment">
    </div>
   </div>
   
<input type="hidden" name="supportName" value="<?php echo $_SESSION['username']?>">
   

   <div class="demobutton">
   <button  type="submit"  name="update4">UPDATE</button>
   <!-- <a href="record4.php"><i class="fa-regular fa-eye"></i>VIEW</a> -->
   </div>

</form>


</div>


<script src="script.js"></script>

</body>
</html>
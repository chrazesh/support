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
  <title>Update Master</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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

<div class="updatemain">

<form action="" method="POST" class="needs-validation updateform" novalidate>
<?php 
$con = dbConnection();
$id=$_GET['id'];
$select="select * from customer where customer_id='$id'";
$query=mysqli_query($con,$select);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['update'])){
    $id=$_GET['id'];
    $cname=$_POST['cname'];
    $cperson=$_POST['cperson'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $pan=$_POST['pan'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $user=$_POST['supportName'];
    $updatequery="update customer set company_name='$cname',contact_person='$cperson',phone_no='$phone',mobile='$mobile',email='$email',pan_no='$pan',address='$address',city='$city',country='$country',user='$user',entryDate=now()  where customer_id='$id' ";
    $query1=mysqli_query($con,$updatequery);
    if($query1){
        echo"<script>
        alert('data udated successfullly');
        window.location.href='record.php';
        </script>";
    }else{
        echo"<script>
        alert('data not udated');
        window.location.href='record.php';
        </script>";
    }

}
?>

<div class="row">
<div class="col-4 mb-2">
        <label  class="form-label">Comany Name:</label>
        <input type="text" name="cname" class="form-control special" id="exampleFormControlInput1"  value="<?php echo $result['company_name']?>" required>
    </div>

    <div class="col-4 mb-2">
        <label class="form-label">Contact Person:</label>
        <input type="text" name="cperson" class="form-control special" id="exampleFormControlInput1"  value="<?php echo $result['contact_person'] ?>">
    </div>
    
 

   <div class="col-4 mb-2">
        <label class="form-label">Phone No:</label>
        <input type="text" name="phone" class="form-control special2" id="exampleFormControlInput1"  value="<?php echo $result['phone_no'] ?>">
    </div>
</div>

<div class="row">
<div class="col-4 mb-2">
        <label class="form-label">Mobile No:</label>
        <input type="text" name="mobile" class="form-control special3" id="exampleFormControlInput1"  value="<?php echo $result['mobile'] ?>" required>
    </div>
   
   
   <div class="col-4 mb-2">
        <label  class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"  value="<?php echo $result['email'] ?>">
    </div>
    <div class="col-4 mb-2">
        <label  class="form-label">Pan No:</label>
        <input type="text" name="pan" class="form-control special4" id="exampleFormControlInput1"  value="<?php echo $result['pan_no'] ?>" >
    </div>

</div>
  
   
<div class="row">

<div class="col-4 mb-2">
        <label  class="form-label">Address:</label>
        <input type="text" name="address" class="form-control special" id="exampleFormControlInput1"  value="<?php echo $result['address'] ?>">
    </div>
    <div class="col-4 mb-2">
        <label  class="form-label">City:</label>
        <input type="text" name="city" class="form-control special" id="exampleFormControlInput1"  value="<?php echo $result['city'] ?>">
    </div>
   
   
   <div class="col-4 mb-2">
        <label class="form-label"  style="margin-right:22px;">Country:</label>
        <input type="text" name="country" class="form-control special" id="exampleFormControlInput1"  value="<?php echo $result['country'] ?>">
    </div>
</div>
   <input type="hidden" name="supportName" value="<?php echo $_SESSION['username']?>">
   
 
 <div class="updatebutton">
 <button  type="submit" name="update"></i>UPDATE</button>
<!-- <a href="record.php" name="display"><i class="fa-regular fa-eye"></i>VIEW</a> -->
 </div>
</form>
</div>
<script src="script.js"></script>
</body>
</html>

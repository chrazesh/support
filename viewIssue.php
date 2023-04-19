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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Client-Issue</title>
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

<form action=""  method="POST" class="needs-validation supportform" enctype="multipart/form-data" novalidate>
    
    <?php 
  $con = dbConnection();
  $id=$_GET['id'];
  $selectAll="select * from issue where id='$id'";
  $passSelectAll=mysqli_query($con,$selectAll);
  $row2=mysqli_fetch_assoc($passSelectAll);
  
  $customerId=$row2['customerId'];
  $companyname=$row2['companyName'];
  $contactPerson=$row2['contactPerson'];
   $phone=$row2['phone'];
   $email=$row2['email'];
    $address=$row2['address'];
     $call=$row2['callBy'];
      $forward=$row2['forward'];
      $priority=$row2['priority'];
      $pname=$row2['attachment'];
        $feedback=$row2['feedback'];
          $remote=$row2['remoteOnsite'];
             $sstatus=$row2['client_status'];
               $date=$row2['date'];
  
  if(isset($_POST['Save'])){
      
  $selectSid="select * from support where token='$id'";
  $passSid=mysqli_query($con,$selectSid);
  $fetchSid=mysqli_fetch_assoc($passSid);
  $sId=$fetchSid['id'];
      
  $companyname=$_POST['companyname'];
  $sdate=$_POST['sdate'];
  $sissue=$_POST['sissue'];
  $sissue=str_replace("'","''",$sissue); 
  $ssupport=$_POST['ssupport'];
  $user=$_SESSION['username'];
  

   
 $insertquery="insert into support(customerId,company_name,client_name,phone,email,address, call_by,support_staff,date,forward,priority,attachment,issue, feedback, remote_onsite, status,user,entryDate,token) values('$customerId','$companyname','$contactPerson','$phone','$email','$address','$call','$ssupport','$sdate','$forward','$priority','$pname','$sissue','$feedback','$remote','$sstatus','$user',now(),'$id')";
 $passQuery=mysqli_query($con,$insertquery); 
 
 $selectSid="select * from support where token='$id'";
  $passSid=mysqli_query($con,$selectSid);
  $fetchSid=mysqli_fetch_assoc($passSid);
  $sId=$fetchSid['id'];
 
   $insertIntoShistory="insert into supportHistory(supportId,transferredFrom,transferredTo,transferredDate,user,entryDate) values('$sId','$user','$ssupport','$date','$user',now())";
   $passShistory=mysqli_query($con,$insertIntoShistory);
 
  $insert="update issue set assigned_officer='$ssupport', assigned='1' where id='$id'";
  $passInsert=mysqli_query($con,$insert);
  
    $selectCompany="select * from registration where name='$ssupport'";
    $passSelectCompany=mysqli_query($con,$selectCompany);
    $row=mysqli_fetch_assoc($passSelectCompany);
    
      $selectCompany1="select email from customer where company_name='$companyname'";
      $passSelectCompany1=mysqli_query($con,$selectCompany1);
      $row1=mysqli_fetch_assoc($passSelectCompany1);
      
//   $updateAssigned="update issue set assigned='1' w";
//   $passUpdateAssigned=mysqli_query($con,$updateAssigned);
                $to_email =$row['email'];
                $subject = "Issue Assigned";
                $body = "You have been assigned to the issue with ticket no. $id. for the issue - '".$sissue."'";
                $from = "support@globaltech.com.np";
                $header = "From: $from";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
            
                $to_email1 = $row1['email'];
                $subject1 = "Issue Assigned";
                $body1 = "Your issue - '".$sissue."' with ticket no. ".$_GET['id']." has been assigned to ".$ssupport."'";
                $header1 = "From: support@globaltech.com.np";
                $mail_sent1 = mail($to_email1, $subject1, $body1, $header1);
                echo $mail_sent1 ? "Mail sent" : "Mail failed";
                  echo"<script>window.location.href='client-issue.php'</script>";
}
?>

<div class="row">
    <div class="col-4">
   <label class="form-label">Ticket No.</label>
   <div class="input-group mb-3">
       <input name="ticket" id="ticket" class="form-control" value="<?php echo $row2['id'] ?>" readonly> 
   </div>
   </div>
  <div class="col-4">
   <label class="form-label">Company Name</label>
   <div class="input-group mb-3">
       <input name="companyname" id="company" class="form-control" value="<?php echo $row2['companyName'] ?>" readonly> 
   </div>
  </div>
  
 <div class="col-4 mb-2">
  <label class="form-label">Date</label>
  <input type="date" id="defaultdatee" class="form-control" name="sdate" value="<?php echo $row2['date'] ?>" readonly required>
 </div>

</div>
 


<div class="row">
 <div class="col-4 mb-2" >
  <label class="form-label">Issue</label>
  <textarea  cols="45" rows="3"  placeholder="Issue" class="form-control"  id="supportIssue" name="sissue" readonly required><?php echo $row2['issue'] ?></textarea>
 </div>
    
 <div class="col-4 mb-2">
  <label class="form-label">Support Staff</label>
   <select  name="ssupport" class="form-control" required>
       <option value="">Select Suppport Staff</option>
       <?php 
        $con = dbConnection();
        $selectUsers="select name from registration where staff='staff'";
        $passSelectUsers=mysqli_query($con,$selectUsers);
        while($result=mysqli_fetch_assoc($passSelectUsers)){
        ?>
        <option value="<?php echo $result['name'] ?>" ><?php echo $result['name'] ?></option>
         <?php
        }
        ?>
  </select>
 </div>
  <div class="col-4 mb-2" >
  <!--<label class="form-label">Attachment</label>-->
  <?php 
  if($row2['attachment']==""){
      echo"";
  }else{?>
   <a href="<?php echo $row2['path'] . $row2['attachment'] ?>" download>
  <img src="<?php echo $row2['path'] . $row2['attachment'] ?>" width="500" height="580">
      
  </a>

      <?php
  }
  ?>
 
 </div>
</div>

 <div class="supportbutton">
  <button type="submit" name="Save">SUBMIT</button>
  <!-- <a href="record2.php" name="display"><i class="fa-regular fa-eye"></i>VIEW</a> -->
 </div>

</form>
<script src="script.js"></script>
</body>
</html>


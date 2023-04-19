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
  <title>Update Support</title>
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

<form action=""  method="POST" class="needs-validation update2form" novalidate>
 
<?php 
$abc =array();
 $selectUsers="select name from registration where staff='staff'";
 //$passSelectUsers=mysqli_query($con,$selectUsers);
  $getData=get_Table_Data($selectUsers);
  foreach($getData as $value){
      array_push($abc,$value['name']);
  }
  
$con = dbConnection();
$id=$_GET['id'];
$select="select * from support where id='$id'";
$query=mysqli_query($con,$select);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['update2'])){
    $id=$_GET['id'];
    $issueId=$_POST['token'];
    $companyname=$_POST['companyname'];
    $sname=$_POST['sname'];
    $sphone=$_POST['sphone'];
    $semail=$_POST['semail'];
    $saddress=$_POST['saddress'];
    $scall=$_POST['scall'];
    $ssupport=$_POST['ssupport'];
    $sdate=$_POST['sdate'];
    $forward=$_POST['sforward'];
    $priority=$_POST['spriority'];
    $pname=basename($_FILES["sattachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
    $tname=$_FILES["sattachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
    $upload_dir='attachment/'.$pname;
    if(move_uploaded_file($tname,$upload_dir)){
       echo "file Uploaded";
    }else{
        echo "file not uploaded";
    }
    $sissue=$_POST['sissue'];
    $sissue=str_replace("'","''",$sissue); //echo $sissue;
    // $sissue=$_POST['sissue'];
    $feedback=$_POST['feedback'];
    $sremote=$_POST['sremote'];
    $sstatus=$_POST['sstatus'];
    $user=$_POST['supportName'];
    
    // if($forward==""){
    $updatequery="update support set company_name='$companyname', client_name='$sname',phone='$sphone',email='$semail',address='$saddress',call_by='$scall',support_staff='$ssupport',date='$sdate',forward='$forward',priority='$priority',attachment='$pname',issue='$sissue',feedback='$feedback',remote_onsite='$sremote',status='$sstatus',user='$user',entryDate=now() where id='$id'";
    $query1=mysqli_query($con,$updatequery);
    
    if($query1){
        $insertActivity="INSERT INTO `activity`(`supportId`,`issueId`,`date`, `asssignedTo`, `remarks`,`user`,`entryDate`) VALUES('$id','$issueId','$sdate','$ssupport','$feedback','$user',now())";
        $passActivity=mysqli_query($con,$insertActivity);

    //   $updateSupport="update issue set assigned_officer='$ssupport' where id='".$result['token']."'";
    //   $passSupport=mysqli_query($con,$updateSupport); 

       $updatequery1="update issue set client_status='$sstatus' where id='".$result['token']."'";
       $passUpdateQuery=mysqli_query($con,$updatequery1);
        if($sstatus=="Close"){ 
        $selectAll="SELECT  `email` FROM `customer` WHERE company_name='$companyname'";
        $passSelectAll=mysqli_query($con,$selectAll);
        $row=mysqli_fetch_assoc($passSelectAll);
                $to_email = $row['email'];
                $subject = "Issue Resolved";
                $body = "Your Issue- '$sissue' has been resolved. Thank You!";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
    }
        echo"<script>
        alert('data udated successfullly');
        window.location.href='record2.php';
        </script>";
    }else{
        echo "data not updated".mysqli_error($con);
    }
// }else{
//       $updatequery="update issue set assigned_officer='$forward', assigned='1' where id='$issueId'";
//     $query1=mysqli_query($con,$updatequery);
//     if($query1){
        
//           $updatequery="update support set company_name='$companyname', client_name='$sname',phone='$sphone',email='$semail',address='$saddress',call_by='$scall',support_staff='$forward',date='$sdate',forward='$forward',priority='$priority',attachment='$pname',issue='$sissue',feedback='$feedback',remote_onsite='$sremote',status='$sstatus',user='$user',entryDate=now() where id='$id'";
//           $query1=mysqli_query($con,$updatequery); 
        
//         $insertActivity="INSERT INTO `activity`(`supportId`,`issueId`,`date`, `asssignedTo`, `remarks`,`user`,`entryDate`) VALUES('$id','$issueId','$sdate','$ssupport','$feedback','$user',now())";
//         $passActivity=mysqli_query($con,$insertActivity);
      
//          $updatequery1="update issue set client_status='$sstatus' where id='".$result['token']."'";
//       $passUpdateQuery=mysqli_query($con,$updatequery1);
//         if($sstatus=="Close"){ 
//         $selectAll="SELECT  `email` FROM `customer` WHERE company_name='$companyname'";
//         $passSelectAll=mysqli_query($con,$selectAll);
//         $row=mysqli_fetch_assoc($passSelectAll);
//                 $to_email = $row['email'];
//                 $subject = "Issue Resolved";
//                 $body = "Your Issue has been resolved. Thank You!";
//                 $header = "From: support@globaltech.com.np";
//                 $mail_sent = mail($to_email, $subject, $body, $header);
//                 echo $mail_sent ? "Mail sent" : "Mail failed";
//     }
//         echo"<script>
//         alert('data udated successfullly');
//         window.location.href='record2.php';
//         </script>";
//     }else{
//         echo "data not updated".mysqli_error($con);
//     }
// }
}

?>


<div class="row">
<div class="col-4 mb-2">
       <label class="form-label">Company Name</label>
       <input type="text" placeholder="Company Name" class="form-control special" name="companyname" value="<?php echo $result['company_name'] ?>" required>
     
   </div>

    <div class="col-4 mb-2">
       <label class="form-label">Contact Person</label>
       <input type="text" placeholder="Contact Person" class="form-control special" name="sname" value="<?php echo $result['client_name'] ?>">
   </div>
   <div class="col-4 mb-2">
       <label class="form-label">Phone</label>
       <input type="text" placeholder="Phone Number" class="form-control special2" name="sphone" value="<?php echo $result['phone'] ?>">
   </div>
  


</div>
<div class="row">

<div class="col-4 mb-2">
       <label class="form-label">Email</label>
       <input type="email" placeholder="Email" class="form-control" name="semail" value="<?php echo $result['email'] ?>">
   </div>
   <div class="col-4 mb-2">
       <label class="form-label">Address</label>
       <input type="text" placeholder="Address" class="form-control special" name="saddress" value="<?php echo $result['address'] ?>">
   </div>
<div class="col-4 mb-2">
    <label class="form-label">Call By</label>
     <input type="text" placeholder="Call By" class="form-control special" name="scall" value="<?php echo $result['call_by'] ?>">
   </div>
</div>

<div class="row">
<div class="col-4 mb-2">
    <label class="form-label">Support Staff</label>
    <select  id="supportStaff" name="ssupport" class="form-control"  required>
       <option value="<?php echo $result['support_staff'] ?>" style="display:none"><?php echo $result['support_staff'] ?></option>
       <?php 
       
    //   foreach($getData as $name){
    //   echo '<option value="'.$name['name'].'">'.$name['name'].'</option>';
    //   }
    foreach($abc as $name){
       echo '<option value="'.$name.'">'.$name.'</option>';
       }
       ?>
  </select>
      
   </div>

   <div class="col-4 mb-2">
    <label class="form-label">Date</label>
    <input type="date" placeholder="Date" class="form-control" name="sdate" value="<?php echo $result['date'] ?>" required>
   </div>

   <div class="col-4 mb-2" >
    <label class="form-label">Issue</label>
    <textarea cols="45" rows="3"  placeholder="Status" class="form-control" name="sissue"  required><?php echo $result['issue'] ?></textarea>
   </div>
</div>

<div class="row">
 <div class="col-4 mb-2" hidden>
  <label class="form-label">Forward To</label>
  <select id="forwardTo" name="sforward" class="form-control">
        <option value="<?php echo $result['forward'] ?>" style="display:none"><?php echo $result['forward'] ?></option>
       <?php 
       foreach($getData as $name){
       echo '<option value="'.$name['name'].'">'.$name['name'].'</option>';
       }?>
  
  </select>
 
 </div>

 <div class="col-4 mb-2">
  <label class="form-label">Priority</label>
  <select id="supportPriority" name="spriority" class="form-control">
      <option value="">Select Priority</option>
      <option value="normal">Normal</option>
      <option value="high">High</option>
      <option value="critical">Critical</option>
  </select>
 
 </div>

 <div class="col-4 mb-2" >
  <label class="form-label">Attachment</label>
  <input type="file" class="form-control"  id="supportAttachment" name="sattachment">
 </div>



</div>

<div class="row">
<div class="col-4 mb-2" >
    <label class="form-label">Feedback</label>
    <textarea id="" cols="45" rows="3"  placeholder="Status" class="form-control" name="feedback"  required></textarea>
   </div>

   <div class="col-4 mb-2">
    <label class="form-label">Remote/Onsite</label>
    <select name="sremote" class="form-control" required>
      <?php
      if($result['remote_onsite']=="Remote"){?>
         <option value="Remote"  <?php $result['remote_onsite']=='Remote'?"selected":"" ?>>Remote</option>
         <option value="Onsite">Onsite</option>
<?php
      }else{?>
        <option  value="Onsite" <?php $result['remote_onsite']=='Onsite'?"selected":"" ?>>Onsite</option>
        <option value="Remote">Remote</option>
        <?php
      }
      
      ?>

    </select>
   </div>

   <div class="col-4 mb-2">
    <label class="form-label">Status</label>
    <select name="sstatus" class="form-control" required>
        <!--<option value="">Select Status</option>-->
    <?php if($result['status']=="Open"){?>
          <option <?php $result['status'] =="Open" ?"Selected":""?> value="Open">Open</option>  
          <option value="Close">Close</option>
         <?php
        }else{?>
        <option <?php $result['status'] =="Close" ?"Selected":""?> value="Close">Close</option>
        <option value="Open">Open</option>
        <?php
        }
        ?>
    </select>
   </div>

</div>
<input type="hidden" name="supportName" value="<?php echo $_SESSION['username']?>">
<input type="hidden" name="token" value="<?php echo $result['token']?>">

<div class="update2button">
<button type="submit" name="update2">UPDATE</button>
<!-- <a href="record2.php" class="button2"><i class="fa-regular fa-eye"></i>VIEW</a> -->
</div>

</form>


</div>


<script src="script.js"></script>

</body>
</html>
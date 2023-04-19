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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> 
    <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Support</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <a class="navbar-brand text-dark" href="#">globalTech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark" href="logout.php" style="margin-left:1100px"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    
      </div>
    </div>
  </div>
</nav>
<div class="mx-2 heading"><h2>Transfer TO -></h2></div>

<form action="" method="POST" class="needs-validation supportform" novalidate>
    
  
      <?php
    
    $con=dbConnection();
    $id=$_GET['id'];
    $select="select * from support where id='$id'";
    $passSelect=mysqli_query($con,$select);
    $fetchData=mysqli_fetch_assoc($passSelect);
    $supportId=$fetchData['id'];
    $issueId=$fetchData['token'];
    if(isset($_POST['Save'])){
        $companyName=$_POST['companyname'];
          $issue=$_POST['issue'];
            $transfer=strtolower($_POST['transfer']);
              $supportStaff=$_POST['supportStaff'];
                $reason=$_POST['reason'];
                $user=$_SESSION['username'];
    $insert="insert into supportHistory(supportId,transferredFrom,transferredTo,transferredDate,reasonOfTransferred,user,entryDate) values('$id','$supportStaff','$transfer',curdate(),'$reason','$user',now())";
        $passInsert=mysqli_query($con,$insert);
        if($passInsert){
            $update="update support set support_staff='$transfer',feedback='$reason' where id='$id'";
            $passUpdate=mysqli_query($con,$update);
            
             $insertIntoActivity="insert into `activity`(`supportId`, `issueId`, `date`, `asssignedTo`, `remarks`, `user`, `entryDate`) values('$id','$issueId',curdate(),'$transfer','$reason','$user',now())";
             $passIntoActivity=mysqli_query($con,$insertIntoActivity);
           
           
            
            $updateIssue="update issue set assigned_officer='$transfer' where id='$issueId'";
            $passSupport=mysqli_query($con,$updateIssue);
            
            echo"<script>
            alert('tranferred succeefully');
            window.location.href='record2.php';
            </script>";
            $selectEmail="select email from customer where company_name='$companyName'";
            $passEmail=mysqli_query($con,$selectEmail);
            $fetchData=mysqli_fetch_assoc($passEmail);
            $fetchedEmail=$fetchData['email'];
            
            $selectToken="select token from support where id='$id'";
            $passToken=mysqli_query($con,$selectToken);
            $fetchToken=mysqli_fetch_assoc($passToken);
            $token=$fetchToken['token'];
            
             $to_email = "$fetchedEmail";
                $subject = "Issue Forwarded";
                $body = "Your  issue- '$issue' with ticket number- '$token' has been forwarded to $transfer";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
            
        }else{
            echo mysqli_error($con);
        }
        
    }
    
    ?>
    
    
    
    
    <div class="row">
  <div class="col-4">
   <label class="form-label">Company Name</label>
   <div class="input-group mb-3">
     <input type="text" class="form-control special" id="supportCompany" name="companyname" value="<?php echo $fetchData['company_name'] ?>" readonly>
     
   </div>
  </div>

        
  <div class="col-4 mb-2">
     <label class="form-label">Issue</label>
      <textarea  cols="45" rows="3"  class="form-control"  id="supportFeedback" name="issue" readonly><?php echo $fetchData['issue'] ?></textarea>
  </div>
  
  <div class="col-4 mb-2">
     <label class="form-label">Transfer To</label>
      <select class="form-control" name="transfer" required>
         <option value="">---Select---</option>
         <?php
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
   <div class="col-4 mb-2">
     <label class="form-label">Support Staff</label>
      <input type="text" class="form-control special2"  id="supportPhone" name="supportStaff" value="<?php echo $fetchData['support_staff'] ?>" readonly>
     
  </div>

  <div class="col-4 mb-2">
     <label class="form-label">Reason of transfer</label>
      <textarea  cols="45" rows="3"  placeholder="Reason of transfer" class="form-control"  id="supportFeedback" name="reason" required></textarea>
  </div>

</div>

<div class="supportbutton">
  <button type="submit" name="Save">SUBMIT</button>
</form>

<script src="script.js"></script>
</body>
</html>





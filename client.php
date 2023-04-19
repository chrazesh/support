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
        <!--<a class="nav-link text-dark" aria-current="page" href="record.php">Master</a>-->
        <a class="nav-link text-light" aria-current="page" href="#">Support</a>
        <a class="nav-link text-dark" href="logout.php" style="margin-left:762px"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    
      </div>
    </div>
  </div>
</nav>





<!-- Modal -->
<div class="modal fade" id="exampleModal1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body">
      <h2 class="text-center rounded-3">Add Support</h2>
      <div class="supportmain">

<form action=""  method="POST" class="needs-validation supportform" enctype="multipart/form-data" novalidate>

<div class="row">
    <div class="col-4">
      <label class="form-label">Company Name</label>
      <div class="input-group mb-3">
           <?php  $con = dbConnection();
    $selectCompany="select name from registration where username='".$_SESSION['username']."'";
    $passSelectCompany=mysqli_query($con,$selectCompany);
    $row=mysqli_fetch_assoc($passSelectCompany); ?>
        <input type="text" placeholder="Company Name" class="form-control special" id="supportCompany" value="<?php echo $row['name']?>" name="companyname" readonly>
      </div>
    </div>
    <div class="col-4 mb-2">
      <label class="form-label">Date</label>
      <input type="date" id="defaultdate" class="form-control" name="sdate" readonly>
    </div>
    <div class="col-4 mb-2" >
      <label class="form-label">Attachment</label>
      <input type="file" class="form-control"  id="supportAttachment" name="sattachment">
    </div>
    
 </div>
<div class="container row">
    <div class="col-12 mb-2" >
      <label class="form-label">Issue</label>
      <textarea  rows="5" placeholder="Enter Your Issue Here" class="form-control"  id="supportIssue" name="sissue" maxlength="255" required></textarea>
    </div>
    <input type="hidden" name="supportName" value="<?php echo $_SESSION['username']?>">
    <?php  $con = dbConnection();
    $selectCompany="select email from registration where username='".$_SESSION['username']."'";
    $passSelectCompany=mysqli_query($con,$selectCompany);
    $row=mysqli_fetch_assoc($passSelectCompany);  ?>
    <input type="email" name="email" value="<?php echo $row['email']?>" style="visibility:hidden;">
  
</div>
 



 <div class="supportbutton">
  <button type="submit" name="Save">SUBMIT</button>
 </div>

</form>

</div>
      </div>
     
    </div>
  </div>
</div>


<div class="mx-4 heading">
    <?php 
     $con = dbConnection();
    $selectCompany="select name from registration where username='".$_SESSION['username']."'";
    $passSelectCompany=mysqli_query($con,$selectCompany);
    $row=mysqli_fetch_assoc($passSelectCompany);?>
    <h2><?php echo $row['name'] ?></h2>
    
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mx-2 btnAdd">ADD</button>
</div>

<div class="fromTo text-center">
      <label for="from">From:</label>
      <input type="date" class="m-1 px-1" id="from"  name="from">
      <label for="to">To:</label>
      <input type="date" class="m-1 px-1" id="to" name="to" >
      <input type="hidden" id="sessionId" value="<?php echo $_SESSION['username'] ?>" >
      <input type="button" name="filter" value="Search" id="filterDate" onclick="GetReportBy('filDate3')"><br><br>
     <p class="text-danger" id="para"></p>
</div>
  <div class="mx-4" data-aos="zoom-in-up">
    
   <table class="display">
    <thead>
    <tr>
        <th>SN</th>
          <th>Ticket Number</th>
          <th>Company Name</th>
           <th>Date</th>
            <th>Attachment</th>
             <th>Issue</th>
             <th>Status</th>
              <th>Action</th>
             
           
           
        </tr>
    </thead>
       <tbody id="tbody_2">
      <?php 
       $con = dbConnection();
    //   $selectCompany="select name from registration where username='".$_SESSION['username']."'";
    //   $passSelectCompany=mysqli_query($con,$selectCompany);
    //   $row=mysqli_fetch_assoc($passSelectCompany);
      $select="select * from issue where user='".$_SESSION['username']."'order by date desc"; 
      $query=mysqli_query($con, $select);
      $i=1;
      while( $result = mysqli_fetch_assoc($query)){
        ?>
      
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $result['id'] ?></td>
        <td><?php echo $result['companyName'] ?></td>
        <td><?php echo $result['date'] ?></td>
         <?php if($result['attachment']==""){?>
  <td><?php echo $result['attachment'] ?></td>
  <?php
  }else{?>
  
  <td><a href="<?php echo $result['path'] . $result['attachment'] ?>" download><img src="<?php echo $result['path'] . $result['attachment'] ?>" width="100" height="110"></a></td>
  <?php
  } ?>
        <td><?php echo $result['issue'] ?></td>
        <td><?php echo $result['client_status'] ?></td>
         <td><a href="issueReport.php?id=<?php echo $result['id'] ?>"><i class="fa-solid fa-eye text-dark"></i></a></td>
        
      </tr>
      <?php
      $i++;
              }

        ?>



</tbody>
</table>

</div>
<script>
AOS.init();
$(document).ready(function(){
      $(".display").DataTable({
    //     sorting: false,
    ordering: false,
    scrollY: 450,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    
    // searching: false,
    dom: "Bfrtip",
  });
 });

    function GetReportBy(ReportBy){
    var from = $("#from").val();
    var to = $("#to").val();
    var name=$("#sessionId").val();
    // alert(name);
     if(from=="" || to==""||name==""){
         return false;
     }else{
         $.ajax({
              url:"transactionFilter.php",
              method:"POST",
              data:{reportBy:ReportBy,from:from,to:to,name:name},
              success: function (data) {
                  $("#tbody_2").empty();
                  console.log(data);
                  var da = JSON.parse(data);
                  if(da.status_code == 200) {
                  $("#tbody_2").append(da.data);
                  }else if(da.status_code == 404) {
                     var html = '<tr><td class="text-center" colspan="17">'+da.message+'</td></tr>';
                     $("#tbody_2").append(html);
                  }
                  }
              }); 
     }
   
}
  </script>
<script src="script.js"></script>
</body>
</html>




<?php 
 $con = dbConnection();
if(isset($_POST['Save'])){
  $companyname=$_POST['companyname'];
  $sdate=$_POST['sdate'];
  $pname=basename($_FILES["sattachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
  $tname=$_FILES["sattachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
  $upload_dir='attachment-issue/'.$pname;
  if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
  }else{
      echo "file not uploaded";
  }
  $sissue=$_POST['sissue'];
  $sissue=str_replace("'","''",$sissue);
  $user=$_POST['supportName'];
  $semail=$_POST['email'];
  $path='attachment-issue/';
  
  $selectCompany="select * from customer where company_name='$companyname'"; 
  $passCompany=mysqli_query($con,$selectCompany);
  $fetchData=mysqli_fetch_assoc($passCompany);
  $customerId=$fetchData['customer_id'];
  $customerUser=$fetchData['user'];
  
  $selectRegId="select * from registration where username='$customerUser'";
  $passRegId=mysqli_query($con,$selectRegId);
  $fetchRegId=mysqli_fetch_assoc($passRegId);
  $regId=$fetchRegId['id'];

  $insertquery="INSERT INTO `issue`(`customerId`,`companyName`, `date`, `path`, `attachment`, `issue`, `user`, `entryDate`) values('$customerId','$companyname','$sdate','$path','$pname','$sissue','$user',now())";
  $query=mysqli_query($con,$insertquery);
  if($query){
    echo"
    <script>
    alert('Data submitted successfully');
    window.location.href='client.php';
    </script>    
    ";
    $selectId="select * from issue where id = LAST_INSERT_ID()";
    $passSelectId=mysqli_query($con,$selectId);
    $row=mysqli_fetch_assoc($passSelectId);
      $to_email = "$semail";
                $subject = "Issue Alert";
                $body = "Dear ".$_SESSION['username'].", your ticket-".$row['id']." has been generated successfully for the issue '". $sissue."', Thank You!";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
  }else{
    echo mysqli_error($con);
    // echo $insertquery;
  }

}
?>

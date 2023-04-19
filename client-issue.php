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
          <a class="nav-link text-light" href="client-issue.php">Client-Issue</a> 
        <a class="nav-link text-dark" href="payment.php">Payment</a>
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
     <input type="text" placeholder="Company Name" class="form-control special" id="supportCompany1" name="companyname" required readonly>
     <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer"></i>
   </div>
  </div>

        
  <div class="col-4 mb-2">
     <label class="form-label">Contact Person</label>
     <input type="text" placeholder="Contact Person" class="form-control special"  id="supportPerson" name="sname">
  </div>
  <div class="col-4 mb-2">
     <label class="form-label">Phone</label>
     <input type="text" placeholder="Phone Number" class="form-control special2"  id="supportPhone" name="sphone" required>
  </div>

 

</div>
 
<div class="row">
<div class="col-4 mb-2">
     <label class="form-label">Email</label>
     <input type="email" placeholder="Email" class="form-control"  id="supportEmail" name="semail">
  </div>
  <div class="col-4 mb-2">
     <label class="form-label">Address</label>
     <input type="text" placeholder="Address" class="form-control special"  id="supportAddress" name="saddress">
  </div>


<div class="col-4 mb-2">
  <label class="form-label">Call From</label>
   <input type="text" placeholder="Call From" class="form-control special"  id="supportCall" name="scall">
  </div>

</div>

<div class="row">
 <div class="col-4 mb-2">
  <label class="form-label">Support Staff</label>
   <select  id="supportStaff" name="ssupport" class="form-control" required>
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
  <!--<input type="text" placeholder="Support Staff" class="form-control special"  id="supportStaff" name="ssupport" required>-->
 </div>

 <div class="col-4 mb-2">
  <label class="form-label">Date</label>
  <input type="date" id="defaultdate" class="form-control" name="sdate" required>
 </div>

 <div class="col-4 mb-2" >
  <label class="form-label">Issue</label>
  <textarea  cols="45" rows="3"  placeholder="Issue" class="form-control"  id="supportIssue" name="sissue" required></textarea>
 </div>
</div>
<div class="row">
 <div class="col-4 mb-2">
  <label class="form-label">Forward To</label>
  <select  id="forwardTo" name="sforward" class="form-control">
         <option value="">Select Forward To</option>
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

 <div class="col-4 mb-2">
  <label class="form-label">Priority</label>
  <select id="supportPriority" name="spriority" class="form-control">
      <option value="">Select priority</option>
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
  <textarea  cols="45" rows="3"  placeholder="Feedback" class="form-control"  id="supportFeedback" name="feedback" readonly></textarea>
 </div>

 <div class="col-4 mb-2">
  <label class="form-label">Remote/Onsite</label>
  <select name="sremote" class="form-control"  id="supportRemote" required>
  <option value="Remote">Remote</option>
  <option value="Onsite">Onsite</option> 
  </select>
 </div>

 <div class="col-4 mb-2">
  <label class="form-label">Status</label>
  <select name="sstatus" class="form-control" required>
  <option value="" >Select Status</option>   
  <option value="Open" >Open</option>
  <option value="Close" >Close</option> 
  </select>
 </div>

</div>
<!--<div class="row">-->
<!--     <div class="col-4 mb-2" >-->
<!--  <label class="form-label">Ticket No.</label>-->
<!--    <input type="text" placeholder="Ticket No." class="form-control special2"  id="supportTicket" name="sTicket">-->
<!-- </div>-->
    
<!--</div>-->
<input type="hidden" name="supportName" id="username" value="<?php echo $_SESSION['username']?>">


 <div class="supportbutton">
  <button type="submit" name="Save">SUBMIT</button>
  <!-- <a href="record2.php" name="display"><i class="fa-regular fa-eye"></i>VIEW</a> -->
 </div>

</form>

</div>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content" style="height:95vh;overflow:scroll;">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Lists of Companies</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
              <table class="display">
                <thead>
                   <tr>
                       <th>SN</th>
                       <th>Company Name</th>
                          <th>Date</th>
                         <th>Issue</th>
                   </tr>
                </thead>
            <tbody>
            <?php  
            $con = dbConnection();
            $select="select * from issue where client_status='Open' and assigned='0'  order by date desc";
            $query=mysqli_query($con, $select);
            $i=1;
            while( $result = mysqli_fetch_assoc($query)){
              ?>
              <tr class="clstrCustomer"  data-company="<?php echo $result['companyName']?>" data-token="<?php echo $result['id']?>" data-date="<?php echo $result['date']?>" data-issue="<?php echo $result['issue']?>" data-assigned="<?php echo $result['assigned_officer']?>" data-client_status="<?php echo $result['client_status']?>">       
                    <td><?php echo $i?></td>
                    <td><?php echo $result['companyName']?></td>
                    <td><?php echo $result['date']?></td>
                    <td><?php echo $result['issue']?></td>
             </tr>
             <?php
             $i++; 
            }
            ?>
            </tbody>
            </table>             
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
             </div>
          </div>
        </div>
      </div>


<!-- <div class="row m-3 bg "> -->
<!-- <div class="col-6"> -->
<div class="mx-4 heading">
  <h2>Client Issues</h2>
  <!--<button type="button" class="btn btn-primary mx-2 btnAdd">ADD</button>-->
</div>
    <div class="fromTo text-center">
      <label for="from">From:</label>
      <input type="date" class="m-1 px-1" id="from"  name="from">
      <label for="to">To:</label>
      <input type="date" class="m-1 px-1" id="to" name="to" >
      <input type="button"  value="Search" onclick="GetReportBy('client-issue')"><br><br>
    </div>

    <div class="mx-4" data-aos="zoom-in-up" style=" width: 98%;height: 600px;overflow-x: scroll;"> 
<table class="display">
  <thead>

    <tr>
      <th>SN</th>
      <th>Ticket No.</th>
      <th>Company Name</th>
      <th>Assigned Officer</th>
      <th>Date</th>
      <th>Attachment</th>
      <th>Issue</th>
      <th>Action</th>
      
     
      
    </tr>
  </thead>
  <tbody id="tbody_2">

    
<?php 
$con = dbConnection();
if($_SESSION['username']=="oms" || $_SESSION['username']=="OMS"){
    
    $select="select * from issue where client_status='Open' and assigned='0'  order by date desc"; 
    
}else{
     $select="select * from issue where client_status='Open' and assigned='0' and assigned_officer=".$_SESSION['username']."order by date desc"; 
}
$query=mysqli_query($con, $select);
$i=1;
while( $result = mysqli_fetch_assoc($query)){
  ?>

<tr>
  <td><?php echo $i ?></td>
 <td><?php echo $result['id'] ?></td>
  <td><?php echo $result['companyName'] ?></td>
  <td><?php echo $result['assigned_officer'] ?></td>
  <td><?php echo $result['date'] ?></td>
   <?php if($result['attachment']==""){?>
  <td><?php echo $result['attachment'] ?></td>
  <?php
  }else{?>
  
  <td><a href="<?php echo $result['path'] . $result['attachment'] ?>" download><img src="<?php echo $result['path'] . $result['attachment'] ?>" width="100" height="110"></a></td>
  <?php
  } ?>
  <td><?php echo $result['issue'] ?></td>
  <td><a href="viewIssue.php?id=<?php echo $result['id'] ?>"><i class="fa-solid fa-eye text-dark"></i></a></td>
  
</tr>
<?php
$i++;
        }
        ?>
        </tbody>
    </table>

  
    </div>


<script src="script.js"></script>
<script>
AOS.init();
 $(document).ready(function(){
      $(".display").DataTable({
    //     sorting: false,
    ordering: false,
    // scrollY: 450,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    
    // searching: false,
    dom: "Bfrtip",
  });
 });
 
  $('.clstrCustomer').click(function(){
   $("#supportCompany1").val($(this).attr("data-company") );
//   $("#supportStaff").val($(this).attr("data-assigned") );
       $("#supportIssue").val($(this).attr("data-issue") );
         $("#supportStatus").val($(this).attr("data-client_status") );
           $("#token").val($(this).attr("data-token") );
            $("#cId").val($(this).attr("data-cId") );
             $("#exampleModal").modal('hide');
     });
 
 function GetReportBy(ReportBy){
    var from = $("#from").val();
    var to = $("#to").val();
    var username=$('#username').val();
     if(from=="" || to==""){
         return false;
     }else{
         $.ajax({
              url:"transactionFilter.php",
              method:"POST",
              data:{reportBy:ReportBy,from:from,to:to,username:username},
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
   
</body>
</html>

<?php 

$con = dbConnection();
if(isset($_POST['Save'])){
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
  $upload_dir='attachment-support/'.$pname;
  if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
  }else{
      echo "file not uploaded";
  }
  $sissue=$_POST['sissue'];
  $sissue=str_replace("'","''",$sissue); //echo $sissue;
  $feedback=$_POST['feedback'];
  $sremote=$_POST['sremote'];
  $sstatus=$_POST['sstatus'];
  $user=$_POST['supportName'];
  $insertquery="insert into support(company_name,client_name,phone,email,address, call_by,support_staff,date,forward,priority,attachment,issue, feedback, remote_onsite, status,user,entryDate) values('$companyname','$sname','$sphone','$semail','$saddress','$scall','$ssupport','$sdate','$forward','$priority','$pname','$sissue','$feedback','$sremote','$sstatus','$user',now())";
   $query=mysqli_query($con,$insertquery);
  if($query){
        $insertIntoShistpry="insert into supportHistory(supportId,transferredFrom,transferredTo,transferredDate,reasonOfTransferred,user,entryDate) values()";
        $insertActivity="INSERT INTO `activity`(`supportId`,`issueId`,`date`, `asssignedTo`, `remarks`,`user`,`entryDate`) VALUES('$id','$issueId','$sdate','$ssupport','$feedback',`$user`,now())";
        $passActivity=mysqli_query($con,$insertActivity);
        $updatequery1="update issue set client_status='$sstatus' where id='".$result['token']."'";
        $passUpdateQuery=mysqli_query($con,$updatequery1);
        if($sstatus=="Close"){ 
        $selectAll="SELECT  `email` FROM `registration` WHERE name='$companyname'";
        $passSelectAll=mysqli_query($con,$selectAll);
        $row=mysqli_fetch_assoc($passSelectAll);
                $to_email = $row['email'];
                $subject = "Issue Resolved";
                $body = "Your Issue has been resolved. Thank You!";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
    }
//   echo $row5['id'];
      
  }else{
    echo mysqli_error($con);
  }
}
?>
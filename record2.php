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
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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
    <a class="navbar-brand text-dark" href="curmonthinstallation.php">globalTech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark" aria-current="page" href="record.php">Master</a>
          <div class="dropdown bg-success">
            <button class="btn btn-success dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">Transaction</button>
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
     <input type="text" placeholder="Company Name" class="form-control special" id="supportCompany" name="companyname" required>
     <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer"></i>
   </div>
  </div>

        
  <div class="col-4 mb-2">
     <label class="form-label">Contact Person</label>
     <input type="text" placeholder="Contact Person" class="form-control special"  id="supportPerson" name="sname">
  </div>
  <div class="col-4 mb-2">
     <label class="form-label">Phone</label>
     <input type="text" placeholder="Phone Number" class="form-control special2"  id="supportPhone" name="sphone">
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
  <label class="form-label">Date</label>
  <input type="date" id="defaultdate" class="form-control" name="sdate" required>
 </div>

 <div class="col-4 mb-2" >
  <label class="form-label">Issue</label>
  <textarea  cols="45" rows="3"  placeholder="Issue" class="form-control"  id="supportIssue" name="sissue" required></textarea>
 </div>
  <div class="col-4 mb-2">
  <label class="form-label">Forward To</label>
  <select  id="forwardTo" name="sforward" class="form-control" disabled>
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
 
</div>
<div class="row">


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

<div class="col-4 mb-2" >
  <label class="form-label">Feedback</label>
  <textarea  cols="45" rows="3"  placeholder="Feedback" class="form-control"  id="supportFeedback" name="feedback"></textarea>
 </div>

</div>

<div class="row">


 <div class="col-4 mb-2">
  <label class="form-label">Remote/Onsite</label>
  <select name="sremote" class="form-control"  id="supportRemote">
       <option value="">---Status---</option>
  <option value="Remote">Remote</option>
  <option value="Onsite">Onsite</option> 
  </select>
 </div>

 <div class="col-4 mb-2">
  <label class="form-label">Status</label>
  <select name="sstatus" class="form-control"  id="supportStatus" required>
  <option value="" >---Select Status---</option>   
  <option value="Open" >Open</option>
  <!--<option value="Close" >Close</option> -->
  </select>
 </div>

</div>
<input type="hidden" name="supportName" id="username" value="<?php echo $_SESSION['username']?>">
<input type="hidden" name="customerId" id="customerId">
<input type="hidden" name="issueId" id="issueId">


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
          <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Lists of Companies</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" style="width:98%;height:600px;overflow:scroll" >
              <table class="display">
                <thead>
                   <tr>
                       <th>SN</th>
                       <th>Company Name</th>
                        <th>Pan No</th>
                         <th>Phone</th>
                         <th>Address</th>
                   </tr>
                </thead>
            <tbody>
            <?php  
            $con = dbConnection();
            $select="select * from installation order by entryDate desc";
            $query=mysqli_query($con, $select);
            $i=1;
            
            while( $result = mysqli_fetch_assoc($query)){
              ?>
              <tr class="clstrCustomer" data-cId="<?php echo $result['customerId']?>" data-company="<?php echo $result['company_name']?>" data-person="<?php echo $result['client_name']?>"  data-phone="<?php echo $result['phone']?>" data-mobile="<?php echo $result['mobile']?>" data-email="<?php echo $result['company_email']?>" data-pan="<?php echo $result['pan_no']?>" data-address="<?php echo $result['address']?>" data-city="<?php echo $result['city']?>" data-country="<?php echo $result['country']?>" >       
                      <td><?php echo $i?></td>
                    <td><?php echo $result['company_name']?></td>
                     <td><?php echo $result['pan_no']?></td>
                    <td><?php echo $result['phone_no']?></td>
                    <td><?php echo $result['address']?></td>
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






<div class="mx-4 heading">
  <h2>Support Information</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mx-2 btnAdd">ADD</button>
</div>
<div class="fromTo text-center">
      <label for="from">From:</label>
      <input type="date" class="m-1 px-1" id="from"  name="from">
      <label for="to">To:</label>
      <input type="date" class="m-1 px-1" id="to" name="to" >
      <input type="button" name="filter" value="Search" id="filterDate" onclick="GetReportBy('filDate4')">
      <?php 
    //   $selectUsername="select * from registration where ".$_SESSION['username']."'";
    //   $passSelectUsername=mysqli_query($con,$selectUsername);
    //   $aaaa=mysqli_fetch_assoc($passSelectUsername);
      if($_SESSION['username']=="oms"){?>
          
      <button style="border-radius:5px"><a href="adminPending.php" style="text-decoration:none;color:black">Pending</a></button>
    <?php
      }else{?>
          <button style="border-radius:5px"><a href="pending.php" style="text-decoration:none;color:black">Pending</a></button>
<?php
      } ?>
      
      <select style="padding:3px;"  >
          <option style="display:none">Select</option>
          <option onclick="GetReportBy1('open')" value="open" id="record2Open">Open</option>
          <option onclick="GetReportBy1('close')" value="close" id="record2Close">Close</option>
          
      </select><br><br>
</div>
  <div class="mx-4" data-aos="zoom-in-up" style="width:98%;height:500px;overflow-x:scroll">
    
   <table class="display">
    <thead>
    <tr>
        <th>SN</th>
          <th>Company Name</th>
          <th>Contact Person</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
            <th>Call By</th>
            <th>Support Staff</th>
            <th>Date</th>
            <th>Forwarded From</th>
            <th>Priority</th>
            <th>Issue</th>
            <th>Feedback</th>
            <th>Remote/Onsite</th>
            <th>Status</th>
            <th>Action</th>
           
        </tr>
    </thead>
       <tbody id="tbody_2">
      <?php 
      $con = dbConnection();
      if($_SESSION['username']=="oms"){
           $select="select * from support order by entryDate desc";
      }else{
      $selectName="select name from registration where username='".$_SESSION['username']."'";
      $passName=mysqli_query($con,$selectName);
      $fetchName=mysqli_fetch_assoc($passName);
      $name=$fetchName['name'];
      $select="select  *,'0' as transferred from support s where support_staff='".$name."' union  select  *,'1' as transferred from support s where id in (select supportId from supportHistory where transferredFrom='".$name."')order by entryDate desc";
      //$select="select *,(select count(*) from supportHistory where transferredfrom='".$_SESSION['username']."' and supportid=s.id) as isTransferred from support s where support_staff='".$_SESSION['username']."' order by date desc";echo $select; 
      }
      $query=mysqli_query($con, $select);
      $i=1;
      while( $result = mysqli_fetch_assoc($query)){
        ?>
      <tr data-id="<?php echo $result['id'] ?>">
         <td><?php echo $i ?></td>
        <td><?php echo $result['company_name'] ?></td>
        <td><?php echo $result['client_name'] ?></td>
        <td><?php echo $result['phone'] ?></td>
        <td><?php echo $result['email'] ?></td>
        <td><?php echo $result['address'] ?></td>
        <td><?php echo $result['call_by'] ?></td>
        <td><?php echo $result['support_staff'] ?></td>
        <td><?php echo $result['date'] ?></td>
        <!--<td><//?php echo $result['forward'] ?></td>-->
        
        <td>
            <?php 
            if($result['transferred']=="1"){
                echo "";
            }else{ 
             
                $selectTfrom="select * from supportHistory where supportId='".$result['id']."'order by entryDate desc";
                $passTfrom=mysqli_query($con,$selectTfrom);
                $fetchTfrom=mysqli_fetch_assoc($passTfrom);
                $tFrom=$fetchTfrom['transferredFrom'];
                echo $tFrom;
            }
            ?>
            
            </td>
        <td><?php echo $result['priority'] ?></td>
        <td><?php echo $result['issue'] ?></td>
        <td><?php echo $result['feedback'] ?></td>
        <td><?php echo $result['remote_onsite'] ?></td>
        <td><?php echo $result['status'] ?></td>
        <td>
        <?php
        if($result['transferred']=="1"){
            echo "<a href='adminViewActivity.php?id=".$result['id']."' type='submit' class='bnone'><i class='fa-solid fa-eye'></i></a>";
            
        }else{
        echo"<a href='update2.php?id=".$result['id']."' type='submit' class='bnone'><i class='fa-solid fa-pen-to-square'></i></a>
        <a href='#'  class='bnone delCustomer' data-supportId='".$result['id']."' ><i class='fa-solid fa-trash' ></i></a>
        <a href='transfer.php?id=".$result['id']."'  class='bnone'><i class='fa-solid fa-arrow-right-arrow-left'></i></a>
        <a href='adminViewActivity.php?id=".$result['id']."' type='submit' class='bnone'><i class='fa-solid fa-eye'></i></a>
        ";
        }
        ?>
       
        </td>
        
        
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
$(document).on('click','.delCustomer',function(){
    let supportId=$(this).attr('data-supportId');
    if(confirm("Are you sure want to delete?")){
        $.ajax({
            url:'delete2.php',
            method:'POST',
            data:{supportId:supportId},
            success:function(data){
                let da=JSON.parse(data);
                if(da.status_code==200){
                    alert("Deleted");
                    location.reload();
                }else if(da.status_code==404){
                    alert("Cannot delete parent row");
                    
                }
            }
        })
    }
})
$(document).ready(function () {
  $(".display").DataTable({
        // sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    
    // searching: false,
    dom: "Bfrtip",
  });
});
    
   $('.clstrCustomer').click(function(){
   $("#supportCompany").prop('disabled', false);
   $("#supportCompany").attr('required', true);
   $("#customerId").val($(this).attr("data-cId") );
   $("#supportCompany").val($(this).attr("data-company") );
   $("#supportPerson").val($(this).attr("data-person") );
   $("#supportPhone").val($(this).attr("data-phone") );
    $("#supportEmail").val($(this).attr("data-email") );
    $("#supportAddress").val($(this).attr("data-address") );
    
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
      function GetReportBy1(ReportBy1){
      var record2Open = $("#record2Open").val();
       var record2Close = $("#record2Close").val();
       var username=$('#username').val();
         $.ajax({
              url:"transactionFilter.php",
              method:"POST",
              data:{reportBy:ReportBy1,record2Open:record2Open,record2Close:record2Close,username:username},
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
 

  </script>
<script src="script.js"></script>
</body>
</html>




<?php 

$con = dbConnection();
if(isset($_POST['Save'])){
  $customerId=$_POST['customerId'];
  
  $issueId=$_POST['issueId'];
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
   $path='attachment-support/';
  $sissue=$_POST['sissue'];
  $sissue=str_replace("'","''",$sissue); //echo $sissue;
  $feedback=$_POST['feedback'];
  $sremote=$_POST['sremote'];
  $sstatus=$_POST['sstatus'];
  $user=$_POST['supportName'];
 
  
   $select="select * from support where token='$issueId'";
  $passSelect=mysqli_query($con,$select);
  if(mysqli_num_rows($passSelect)>0){
       echo"<script>alert('Issue already added to support');
       window.location.href='record2.php';
       </script>";
  }else{
  $insert="insert into issue(customerId,companyName,date,path,attachment,issue,client_status,user,entryDate,assigned_officer) values('$customerId','$companyname','$sdate','$path','$pname','$sissue','$sstatus','$user',now(),'Not assign to anyone')";
  $passInsert=mysqli_query($con,$insert);
//   $insertquery="insert into support(customerId,company_name,client_name,phone,email,address, call_by,support_staff,date,forward,priority,attachment,issue, feedback, remote_onsite, status,user,entryDate,token) values('$customerId','$companyname','$sname','$sphone','$semail','$saddress','$scall','$ssupport','$sdate','$forward','$priority','$pname','$sissue','$feedback','$sremote','$sstatus','$user',now(),'$issueId')";
//   $query=mysqli_query($con,$insertquery);
  if($passInsert){
     
        // $updatequery5="update issue set client_status='$sstatus' where id='$issueId'";
        // $passUpdateQuery=mysqli_query($con,$updatequery5);
    echo"
    <script>
    alert('Data submitted successfully');
    window.location.href='record2.php';
    </script>    
    ";
    $selectTicket="select * from issue where id=LAST_INSERT_ID()";
    $passTicket=mysqli_query($con,$selectTicket);
    $fetchTicket=mysqli_fetch_assoc($passTicket);
    $ticket=$fetchTicket['id'];
  
        $to_email = "$semail";
                $subject = "Issue Alert";
                $body = "Your ticket number- '".$ticket."' for the issue- '".$sissue."' has been generated.";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
    
      
  }else{
    echo mysqli_error($con);
  }

}
}
?>

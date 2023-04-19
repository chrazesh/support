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
      <h2 class="text-center rounded-3">Add Registration</h2>
      <div class="supportmain">

<form action=""  method="POST" class="needs-validation supportform" enctype="multipart/form-data" novalidate>

<div class="row">
  <div class="col-4">
   <label class="form-label">Company Name</label>
   <div class="input-group mb-3">
     <input type="text" placeholder="Company Name" class="form-control special" id="supportCompany" name="companyname" disabled="true"  required>
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
  <label class="form-label">Registration Duration(In days)</label>
  <input type="text" class="form-control special4" name="timePeriod" id="duration" required>
 </div>
 
 <div class="col-4 mb-2" >
  <input type="hidden" class="form-control special4" name="timePeriod1" id="duration1"  required>
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
  <textarea  cols="45" rows="3"  placeholder="Feedback" class="form-control"  id="supportFeedback" name="feedback"></textarea>
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
  <select name="sstatus" class="form-control"  id="supportStatus" required>
  <option value="" >Select Status</option>   
  <!--<option value="Open" >Open</option>-->
  <option value="Close" >Close</option> 
  </select>
 </div>

</div>
<input type="hidden" name="supportName" value="<?php echo $_SESSION['username']?>">
<input type="hidden" name="customerId" id="customerId">
<input type="hidden" name="installationId" id="installationId">


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
             <div class="modal-body" style="width:98%;height:600px;overflow:scroll">
              <table class="display">
                <thead>
                   <tr>
                       <th>SN</th>
                       <th>Company Name</th>
                       <th>Phone</th>
                       <th>Email</th>
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
              <tr class="clstrCustomer" data-id="<?php echo $result['id']?>" data-cId="<?php echo $result['customerId']?>" data-company="<?php echo $result['company_name']?>" data-person="<?php echo $result['client_name']?> " data-phone="<?php echo $result['phone']?>" data-mobile="<?php echo $result['mobile']?>" data-email="<?php echo $result['company_email']?>" data-pan="<?php echo $result['pan_no']?>" data-address="<?php echo $result['address']?>">       
                    <td><?php echo $i?></td>
                    <td><?php echo $result['company_name']?></td>
                    <td><?php echo $result['phone'] ?></td>
                    <td><?php echo $result['company_email'] ?></td>
                    <td><?php echo $result['address'] ?> </td>
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
  <h2>Registration Information</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mx-2 btnAdd">ADD</button>
</div>
<div class="fromTo text-center">
      <label for="from">From:</label>
      <input type="date" class="m-1 px-1" id="from"  name="from">
      <label for="to">To:</label>
      <input type="date" class="m-1 px-1" id="to" name="to" >
      <input type="button" name="filter" value="Search" id="filterDate" onclick="GetReportBy('filDate2')"><br><br>
     <!--<button style="border-radius:5px"><a href="pending.php" style="text-decoration:none;color:black">Pending</a></button>-->
      <!--<select style="padding:3px;"  >-->
      <!--    <option style="display:none">Select</option>-->
      <!--    <option onclick="GetReportBy1('open')" value="open" id="record2Open">Open</option>-->
      <!--    <option onclick="GetReportBy1('close')" value="close" id="record2Close">Close</option>-->
          
      <!--</select>-->
</div>
  <div class="mx-4" data-aos="zoom-in-up" style="width:98%;height:500px;overflow-x:scroll">
    
   <table class="display">
    <thead>
    <tr>
        <th>SN</th>
          <th>Company Name</th>
          <th>Installation date</th>
          <th>Contact Person</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
          <th>Call By</th>
          <th>Support Staff</th>
          <th>Date</th>
          <th>Forward To</th>
          <th>Priority</th>
          <th>Registration Duration (In Days)</th>
          <th>Feedback</th>
          <th>Remote/Onsite</th>
          <th>Status</th>
          <th>Action</th>
           
        </tr>
    </thead>
       <tbody id="tbody_2">
      <?php 
      $con = dbConnection();
      if($_SESSION['username']=='oms'){
            $select="select renew.*,installation.installation_date from renew left join installation on renew.installationId=installation.id order by entryDate desc";
      }else{
        
           $select="select renew.*,installation.installation_date from renew left join installation on renew.installationId=installation.id order by entryDate desc";
      }
    
      $query=mysqli_query($con, $select);
      
    
      $i=1;
      while( $result = mysqli_fetch_assoc($query)){
   
        ?>
      
      <tr>
         <td><?php echo $i ?></td>
        <td><?php echo $result['company_name'] ?></td>
        <td><?php echo $result['installation_date'] ?></td>
        <td><?php echo $result['client_name'] ?></td>
        <td><?php echo $result['phone'] ?></td>
        <td><?php echo $result['email'] ?></td>
        <td><?php echo $result['address'] ?></td>
        <td><?php echo $result['call_by'] ?></td>
        <td><?php echo $result['support_staff'] ?></td>
        <td><?php echo $result['date'] ?></td>
        <td><?php echo $result['forward'] ?></td>
        <td><?php echo $result['priority'] ?></td>
        <td><?php echo $result['timePeriod'] ?></td>
        <td><?php echo $result['feedback'] ?></td>
         <td><?php echo $result['remote_onsite'] ?></td>
        <td><?php echo $result['status'] ?></td>
        <td><a href="update5.php?id=<?php echo $result['id'] ?> " type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="#" class="bnone delCustomer" data-renewId="<?php echo $result['id'] ?>" ><i class="fa-solid fa-trash" ></i></a></td>
        
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
    let renewId=$(this).attr('data-renewId');
    if(confirm("Are you sure want to delete?")){
        $.ajax({
            url:'delete5.php',
            method:'POST',
            data:{renewId:renewId},
            success:function(data){
                let da=JSON.parse(data)
                if(da.status_code==200){
                    alert('Deleted');
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
    dom: "Bfrtip",
        // sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    // searching: false,
  });
});
    
   $('.clstrCustomer').click(function(){
   $("#supportCompany").prop('disabled', false);
   $("#supportCompany").attr('required', true);
   $("#customerId").val($(this).attr("data-cId") );
     $("#installationId").val($(this).attr("data-id") );
   $("#supportCompany").val($(this).attr("data-company") );
     $("#supportEmail").val($(this).attr("data-email") );
   $("#supportPerson").val($(this).attr("data-person"));
   $("#supportPhone").val($(this).attr("data-phone"));
   $("#supportAddress").val($(this).attr("data-address"));
   $("#exampleModal").modal('hide');
     });
    
    function GetReportBy(ReportBy){
    var from = $("#from").val();
    var to = $("#to").val();
     if(from=="" || to==""){
         return false;
     }else{
         $.ajax({
              url:"transactionFilter.php",
              method:"POST",
              data:{reportBy:ReportBy,from:from,to:to},
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
    //   function GetReportBy1(ReportBy1){
    //   var record2Open = $("#record2Open").val();
    //   var record2Close = $("#record2Close").val();
    //      $.ajax({
    //           url:"transactionFilter.php",
    //           method:"POST",
    //           data:{reportBy:ReportBy1,record2Open:record2Open,record2Close:record2Close},
    //           success: function (data) {
    //               $("#tbody_2").empty();
    //               console.log(data);
    //               var da = JSON.parse(data);
    //               if(da.status_code == 200) {
    //               $("#tbody_2").append(da.data);
    //               }else if(da.status_code == 404) {
    //                  var html = '<tr><td class="text-center" colspan="17">'+da.message+'</td></tr>';
    //                  $("#tbody_2").append(html);
    //               }
    //               }
    //           }); 
    //  }
 

  </script>
<script src="script.js"></script>
</body>
</html>




<?php 

$con = dbConnection();

if(isset($_POST['Save'])){
   $customerId=$_POST['customerId'];  
   $installationId=$_POST['installationId'];
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
  $upload_dir='attachment-renew/'.$pname;
  if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
  }else{
      echo "file not uploaded";
  }
   $timePeriod=$_POST['timePeriod'];
  $timePeriod1=$_POST['timePeriod1'];
  $feedback=$_POST['feedback'];
  $sremote=$_POST['sremote'];
  $sstatus=$_POST['sstatus'];
  $user=$_POST['supportName'];
  $insertquery="insert into renew(customerId,installationId,company_name,client_name,phone,email,address, call_by,support_staff,date,timePeriod,expDate,forward,priority,attachment,feedback, remote_onsite, status,user,entryDate) values('$customerId','$installationId','$companyname','$sname','$sphone','$semail','$saddress','$scall','$ssupport','$sdate','$timePeriod','$timePeriod1','$forward','$priority','$pname','$feedback','$sremote','$sstatus','$user',now())";
  $query=mysqli_query($con,$insertquery);
  if($query){
      $updateDate="update installation set exp_date='$timePeriod1' where company_name='$companyname'";
      $passUpdateDate=mysqli_query($con,$updateDate);
    echo"
    <script>
    alert('Data submitted successfully');
    window.location.href='record5.php';
    </script>    
    ";
    
        $to_email = "$semail";
                $subject = "Re-Installation Alert";
                $body = "Your have successfully renewed service for- ".$timePeriod." days(upto '".$timePeriod1."')";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
      
  }else{
    echo mysqli_error($con);
  }

}
?>

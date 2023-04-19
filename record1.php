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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Support-Installation</title>
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
      <h2 class="text-center rounded-3">Add Installation</h2>

      <div class="installationmain">
    <form action="" method="POST" class="row needs-validation installationform" enctype="multipart/form-data" novalidate>

<div class="col-4">
<label class="form-label" >Company Name:</label>
    <div  class="input-group mb-3">
        <input type="text" name="companyname"  class="form-control special" id="installationCompany" placeholder="Enter Company Name" disabled>
        <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer" ></i>
    </div>

</div>
<div  class="col-4 mb-3">
        <label class="form-label" >Company Email:</label>
        <input type="email" name="cemail"  class="form-control" id="installationCemail" placeholder="Enter Company Email">
    </div>
<div  class="col-4 mb-3">
        <label class="form-label" >Contact Person:</label>
        <input type="text" name="cname1"  class="form-control special" id="installationPerson" placeholder="Enter Contact Person">
    </div>


<div  class="col-4 mb-3">
        <label class="form-label" >Contact Person Email:</label>
        <input type="email" name="cpemail"  class="form-control" id="installationPemail" placeholder="Enter Company Email">
    </div>

<div  class="col-4 mb-3">
        <label class="form-label" >Pan No:</label> 
        <input type="text" name="pan"  class="form-control special4" id="installationPan" placeholder="Enter Pan">
    </div>

<div  class="col-4 mb-3">
        <label class="form-label" >Address:</label>
        <input type="text" name="address"  class="form-control special1" id="installationAddress" placeholder="Enter Address" required>
    </div>



<div  class="col-4 mb-3">
        <label class="form-label" >City:</label>
        <input type="text" name="city"  class="form-control special" id="installationCity"  placeholder="Enter City">
    </div>

    <div  class="col-4 mb-3class">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone"  class="form-control special2" id="installationPhone" placeholder="Enter Phone">
    </div>
<div  class="col-4 mb-3">
        <label class="form-label" >Mobile:</label>
        <input type="text" name="mobile"  class="form-control special3" id="installationMobile" placeholder="Enter Mobile" >
    </div>
   

    <!-- <div class="col-4">-->
    <!--    <label class="form-label">Type:</label>-->
    <!--   <select name="type"  class="form-control" id="installationType" placeholder="Enter Type"  required>-->
    <!--        <option value="" style="display:none" >Select Type</option>-->
    <!--    <option value="New">New</option>-->
    <!--    <option value="Renew">Renew</option>-->
    <!--   </select>-->
    <!--</div>-->

    <div  class="col-4 mb-3" >
        <label class="form-label" >No of Users:</label>
        <input type="text" name="users"  class="form-control special5" id="installationUsers" placeholder="Enter No. of Users">
    </div>

   <div  class="col-4 mb-3">
        <label class="form-label">Installation Date:</label>
        <input type="text" name="idate"  class="form-control" id="defaultdate" placeholder="Enter Installation Date"  required>
    </div>

   
   <div  class="col-4 mb-3">
        <label class="form-label" >Expiry Date:</label>
        <input type="text" name="exp"  class="form-control" id="installationExpiry" placeholder="Enter Expiry Date" required>
    </div>


 <div class="col-4 mb-2">
  <label class="form-label">Support Staff</label>
   <select   id="installationSupport" name="support" class="form-control" required>
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
 </div>


    <!--<div  class="col-4 mb-3" >-->
    <!--     <label class="form-label">Support Officer:</label>-->
    <!--    <input type="text" name="support"  class="form-control special" id="installationSupport" placeholder="Enter Support Officer">-->
    <!--</div>-->
   <div  class="col-4 mb-3" >
         <label class="form-label">Referenced By:</label>
        <input type="text" name="reference"  class="form-control special" id="installationReference" placeholder="Enter Referenced By">
    </div>
    
     <div class="col-4 mb-2" >
  <label class="form-label">Feedback</label>
  <textarea  cols="45" rows="3"  placeholder="Feedback" class="form-control"  id="supportFeedback" name="sfeedback"></textarea>
 </div>
     <div  class="col-4 mb-3" >
         <label class="form-label">Attactment:</label>
        <input type="file" name="insAttachment"  class="form-control" id="installationAttachment" >
    </div>
   
<input type="hidden" name="installationName" value="<?php echo $_SESSION['username']?>"> 
<input type="hidden" name="cusId" id="cusId"> 
   <div class="installationbutton">
   <button  type="submit" name="add1">SUBMIT</button>
 
   </div>

</form>
</div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Lists of Companies</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" style="width:98%;height:600px;overflow:scroll">
              
               <table class="display" >
             

               <thead>
                 <tr>
                   <th>SN</th>
                   <th>Company Name</th>
                   <th>Contact Person</th>
                   <th>Phone</th>
                   <th>Mobile</th>
                   <th>Email</th>
                   <th>Pan No.</th>
                   <th>Address</th>
                   <th>City</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php 
           $con = dbConnection();
            $select="SELECT customer.*,installation.installation_date,installation.exp_date FROM customer left join installation on customer.customer_id=installation.customerId order by entryDate desc";
            $query=mysqli_query($con, $select);
            $i=1;
            while( $result = mysqli_fetch_assoc($query)){
              ?>
           
           <tr class="clstrInstallation" data-expiry="<?php echo $result['exp_date']?>"  data-installation="<?php echo $result['installation_date']?>"  data-id="<?php echo $result['customer_id']?>"   data-company="<?php echo $result['company_name']?>" data-person="<?php echo $result['contact_person']?>"  data-phone="<?php echo $result['phone_no']?>" data-mobile="<?php echo $result['mobile']?>" data-email="<?php echo $result['email']?>" data-pan="<?php echo $result['pan_no']?>" data-address="<?php echo $result['address']?>" data-city="<?php echo $result['city']?>" data-phone="<?php echo $result['country']?>">
           
           
             <td> <?php echo $i?></td>
             <td><?php echo $result['company_name'] ?></td>
             <td><?php echo $result['contact_person'] ?></td>
             <td><?php echo $result['phone_no'] ?></td>
             <td><?php echo $result['mobile'] ?></td>
             <td><?php echo $result['email'] ?></td>
             <td><?php echo $result['pan_no'] ?></td>
             <td><?php echo $result['address'] ?></td>
             <td><?php echo $result['city'] ?></td>
            </tr>
            
            <?php
             $i++; 
             
            }
            //  echo"</ol>";
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
  <h2>Installation Information</h2>
  <button type="button" class="btn btn-primary mx-2 btnAdd">ADD</button>
</div>
<div class="fromTo text-center">
   
      <label for="from">From:</label>
      <input type="date" class="m-1 px-1" id="from"  name="from">
      <label for="to">To:</label>
      <input type="date" class="m-1 px-1" id="to" name="to" >
      <input type="button" name="filter" value="Search" id="filterDate"  onclick="GetReportBy('filDate1')"><br><br>
</div>

  <div class="mx-4"  data-aos="zoom-in-up" style=" width: 98%;height: 500px;overflow-x: scroll;">
    
    <table class="display"> 
      <thead>

        <tr>
            <th>SN</th> 
          <th>Company Name</th>
            <th>Company Email</th>
            <th>Contact Person</th>
            <th>Cotact Person Email</th>
            <th>Pan No</th>
            <th>Address</th>
            <th>City</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>No of Users</th>
            <th>Installation Date</th>
            <th>Expiry Date</th>
            <th>Support Officer</th>
              <th>Feedback</th>
            <th>Action</th>
            
          </tr>
        </thead>
          <tbody id="tbody_2">

            <?php 
            $con = dbConnection();
          $select="select * from installation order by entryDate desc ";
            $query=mysqli_query($con, $select);
            $i=1;
            while($result = mysqli_fetch_assoc($query)){
              ?>
    
              <tr> 
                <td><?php echo $i?></td>
                <td><?php echo $result['company_name'] ?></td>
                <td><?php echo $result['company_email'] ?></td>
                <td><?php echo $result['client_name'] ?></td>
                <td><?php echo $result['person_email'] ?></td>
                <td><?php echo $result['pan_no'] ?></td>
                <td><?php echo $result['address'] ?></td>
                <td><?php echo $result['city'] ?></td>
                <td><?php echo $result['phone'] ?></td>
                <td><?php echo $result['mobile'] ?></td>
                <td><?php echo $result['no_of_users'] ?></td>
                <td><?php echo $result['installation_date'] ?></td>
                <td><?php echo $result['exp_date'] ?></td>
                <td><?php echo $result['support_officer'] ?></td>
                <td><?php echo $result['feedback'] ?></td>
                
                <td><a href="update1.php?id=<?php echo $result['id'] ?>"  type="submit"  class="bnone"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" class="bnone delCustomer" data-insId="<?php echo $result['id'] ?>"><i class="fa-solid fa-trash" ></i></a></td>
                
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
      let installationId=$(this).attr('data-insId');
      if(confirm("Are you sure want to delete?")){
          $.ajax({
              url:'delete1.php',
              method:'POST',
              data:{installationId:installationId},
              success:function(data){
                  let da=JSON.parse(data);
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
$(document).ready(function(){
     $(".display").DataTable({
    //     sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    
    // searching: false,
    dom: "Bfrtip",
  });
$('#defaultdate').datepicker({
    showAnim: 'slideDown',
        //   changeMonth: true,
    //   changeYear: true,
      dateFormat: 'yy-mm-dd'
    
});
$('#installationExpiry').datepicker({
    showAnim: 'slideDown',
      dateFormat: 'yy-mm-dd'
        //   changeMonth: true,
    //   changeYear: true

});
    
 $('.clstrInstallation').click(function(){
   $("#cusId").val($(this).attr("data-id"));  
 $("#installationCompany").prop('disabled', false);
 $("#installationCompany").attr('required', true);
 $("#installationCompany").val($(this).attr("data-company"));
 $("#installationCemail").val($(this).attr("data-email"));
 $("#installationPerson").val($(this).attr("data-person"));
 $("#installationPan").val($(this).attr("data-pan"));
 $("#installationAddress").val($(this).attr("data-address"));
 $("#installationCity").val($(this).attr("data-city"));
 $("#installationPhone").val($(this).attr("data-phone"));
 $("#installationMobile").val($(this).attr("data-mobile"));
 $("#defaultdate").val($(this).attr("data-installation"));

 $("#exampleModal").modal('hide');
 $("#installationCompany").focus();
     });
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



</script>

  <script src="script.js"></script>
</body>
</html>




<?php
           $con = dbConnection();
           if(isset($_POST['add1'])){
              $companyname=$_POST['companyname'];
              $customerId=$_POST['cusId'];
              $cemail=$_POST['cemail'];
              $cname1=$_POST['cname1'];
              $cpemail=$_POST['cpemail'];
              $pan=$_POST['pan'];
              $address=$_POST['address'];
              $city=$_POST['city'];
              $phone=$_POST['phone'];
              $mobile=$_POST['mobile'];
              $type=$_POST['type'];
              $users=$_POST['users'];
              $idate=$_POST['idate'];
              $exp=$_POST['exp'];
              $support=$_POST['support'];
              $reference=$_POST['reference'];
              $sfeedback=$_POST['sfeedback'];
              $user=$_POST['installationName'];
              $pname=basename($_FILES["insAttachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
              $tname=$_FILES["insAttachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
              $upload_dir='attachment-installation/'.$pname;
             if(move_uploaded_file($tname,$upload_dir)){
               echo "file Uploaded";
      
               }else{
               echo "file not uploaded";
               }
              $selectquery="select * from installation where company_name='$companyname'";
              $query=mysqli_query($con, $selectquery); 
              if(mysqli_num_rows($query)>0){
              echo"<script>
              alert('Company name already exsists');
              window.location.href='record1.php';
              </script>";
              }else{
                  if($users!=''){
              $insertquery="INSERT INTO installation(customerId,company_name,company_email,client_name,person_email,pan_no,address,city,phone,mobile,no_of_users, installation_date, exp_date,support_officer, referenced_by,feedback,attachment,user,entryDate) VALUES('$customerId','$companyname','$cemail','$cname1','$cpemail','$pan','$address','$city','$phone','$mobile','$users','$idate','$exp','$support','$reference','$sfeedback','$pname','$user',now())";
                  }else{
              $insertquery="INSERT INTO installation(customerId,company_name,company_email,client_name,person_email,pan_no,address,city,phone,mobile, installation_date, exp_date,support_officer, referenced_by,feedback,attachment,user,entryDate) VALUES('$customerId','$companyname','$cemail','$cname1','$cpemail','$pan','$address','$city','$phone','$mobile','$idate','$exp','$support','$reference','$sfeedback','$pname','$user',now())";
                  }
              $query1=mysqli_query($con,$insertquery);
              if($query1){
                 echo"<script>
                 alert('Data inserted successfully'); 
                 window.location.href='record1.php';
                 </script>";
                
                 $to_email = "$cemail";
                $subject = "Installation Alert";
                $body = "Your Installation has been done successfully from '".$idate."' to '".$exp."'";
                $header = "From: support@globaltech.com.np";
                $mail_sent = mail($to_email, $subject, $body, $header);
                echo $mail_sent ? "Mail sent" : "Mail failed";
                }else{
               echo  mysqli_error($con);
               }
             }
            }
         
        
      


  
?>
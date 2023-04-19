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
    <link rel="stylesheet€" href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css”>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/nepali.datepicker.v4.0.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/nepali.datepicker.v4.0.min.js"></script>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js”></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> 
    <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Support-Inquiry</title>
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

<div class="mx-4 heading">
  <h2>Inquiry Info</h2>
  <button type="button" class="btn btn-primary mx-2 btnAdd">ADD</button>
</div>
<div class="fromTo text-center">
      <label for="from">From:</label>
      <input type="date" class="m-1 px-1" id="from"  name="from">
      <label for="to">To:</label>
      <input type="date" class="m-1 px-1" id="to" name="to" >
      <input type="button"  value="Search" onclick="GetReportBy('filDate')"><br><br>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1"  role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h2 class="text-center rounded-3">Add Inquiry</h2>
 <div class="inquirymain">
    <form action=""  method="POST" class="row needs-validation inquiryform" enctype="multipart/form-data" novalidate>

  <div class="row">
  <div class="col-4">
      <label for="exampleFormControlTextarea1" class="form-label">Company Name:</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control special" name="companyname"  id="inquiryCompany" placeholder="Enter Company name" disabled>
      <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer" id="myBtn"></i>
    </div>
  </div>
    <div class="col-4 mb-3">
      <label for="exampleFormControlInput1" class="form-label">Date:</label>
      <input type="text" class="form-control" name="date" id="defaultdate" required>
    </div>

   <div class="col-4 mb-3">
     <label for="exampleFormControlTextarea1" class="form-label ">Miti:</label>
     <input type="text" class="form-control" name="miti"   id="miti" placeholder="Enter Miti" required>
   </div>
  </div>
 
<div class="row">
<div class="col-4 mb-2">
    <label for="exampleFormControlInput1" class="form-label">Contact Person:</label>
    <input type="text" class="form-control special" name="clientname"  id="inquiryPerson"  placeholder="Enter Client Name">
   </div>

   <div class="col-4 mb-2">
    <label for="exampleFormControlInput1" class="form-label">Address:</label>
    <input type="text" class="form-control special1" name="address" id="inquiryAddress" placeholder="Enter Adddress"  required>
   </div>
 
   <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Company Email:</label>
    <input type="email" class="form-control" name="cemail"  id="inquiryCemail" placeholder="Enter Company Email">
  </div>
</div>

<div class="row">
<div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Contact Person Email:</label>
    <input type="email" class="form-control" name="cpemail"  id="inquiryPemail" placeholder="Enter Contact Person Email" >
  </div>
  <div class="col-4 mb-2">
  <label for="exampleFormControlInput1" class="form-label">Reference By:</label>
  <input type="text" class="form-control special" name="reference"  id="inquiryReference" placeholder="Enter Reference By">
</div>


<div class="col-4 mb-2">
   <label for="exampleFormControlInput1" class="form-label">Software Type:</label>
   <input type="text" class="form-control special" name="software" id="inquirySoftware"  placeholder="Enter Software Type">
  </div>
</div>


 <div class="row">

 <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Organization Type:</label>
    <input type="text" class="form-control special" name="organization" id="inquiryOrganization" placeholder="Enter Organization Type">
  </div>
  <div class="col-4 mb-2">
   <label for="exampleFormControlTextarea1" class="form-label">Phone:</label>
   <input type="text" class="form-control special2" name="phone"  id="inquiryPhone" placeholder="Enter Phone"  required>
  </div>

 
  <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Pan No:</label>
    <input type="text" class="form-control special4" name="pan"  id="inquiryPan" placeholder="Enter Pan">
  </div>
 </div>
  

 
 <div class="row">
 <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Follow Up By:</label>
      <input type="text" class="form-control special" name="follow" id="inquiryFollow" placeholder="Enter Follow By">
   </div>
   <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Next Follow Up date:</label>
      <input type="date" class="form-control special" name="nextfollow" id="inquiryNext" placeholder="Enter Refer To"  required>
   </div>

<div class="col-4 mb-2">
  <label for="exampleFormControlTextarea1" class="form-label">Feedback:</label>
  <textarea class="form-control" name="feedback"  id="inquiryFeedback" rows="3" placeholder="Enter Feedback"  required></textarea>
</div>
 </div>
 <div class="row">
      <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Attachment:</label>
    <input type="file" class="form-control" name="iattachment"  id="inquiryAttachment">
    </div>
   <div class="col-4">
      <input type="text" class="form-control invisible" name="customer_id" id="inquiryId" placeholder="Enter id">
   </div>
   <input type="hidden" name="inquiryName" value="<?php echo $_SESSION['username']?>">
 </div>
    <div class="inquirybutton">
     <button type="submit" name="save">SUBMIT</button>
   
    </div>

    </form>
</div>
      </div>
    </div>
  </div>
</div>


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" aria-hidden="true" role="dialog">
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
                       <th>Pan No.</th>
                       <th>Phone</th>
                       <th>Address</th>
                   </tr>
                </thead>
            <tbody>
            <?php  
            $con = dbConnection();
            $select="select * from customer order by entryDate desc";
            $query=mysqli_query($con, $select);
            $i=1;
            while( $result = mysqli_fetch_assoc($query)){
              ?>
              <tr class="clstrCustomer" data-id="<?php echo $result['customer_id']?>" data-company="<?php echo $result['company_name']?>" data-person="<?php echo $result['contact_person']?>" data-phone="<?php echo $result['phone_no']?>" data-mobile="<?php echo $result['mobile']?>" data-email="<?php echo $result['email']?>" data-pan="<?php echo $result['pan_no']?>" data-address="<?php echo $result['address']?>" >       
                    <td><?php echo $i?></td>
                    <td><?php echo $result['company_name']?></td>
                    <td><?php echo $result['pan_no'] ?></td>
                    <td><?php echo $result['phone_no'] ?></td>
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

  <div class="mx-4" data-aos="zoom-in-up" style="width:98%;height:500px;overflow:scroll">
   <table class="display">
    <thead>
         <tr>
             <th>SN</th>
            <th>Company Name</th>
            <th>Date</th>
            <th>Miti</th>
            <th>Contact Person</th>
            <th>Address</th>
            <th>Company Email</th>
            <th>Contact Person Email</th>
            <th>Reference By</th>
            <th>Software Type</th>
            <th>Organization Type</th>
            <th>Phone</th>
            <th>Pan No</th>
            <th>Follow Up By</th>
            <th>Next Follow Update</th>
            <th>Action</th>
        </tr>
    </thead>
      
    <tbody id="tbody_2">
      <?php 
      $con = dbConnection();
      $select="select * from inquiry order by entryDate desc";
      $query=mysqli_query($con, $select);
       $i=1;
      while( $result = mysqli_fetch_assoc($query)){
       ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $result['company_name'] ?></td>
            <td><?php echo $result['date'] ?></td>
            <td><?php echo $result['miti'] ?></td>
            <td><?php echo $result['client_name'] ?></td>
            <td><?php echo $result['address'] ?></td>
            <td><?php echo $result['company_email'] ?></td>
            <td><?php echo $result['person_email'] ?></td>
            <td><?php echo $result['reference_by'] ?></td>
            <td><?php echo $result['software_type'] ?></td>
            <td><?php echo $result['organization_type'] ?></td>
            <td><?php echo $result['phone'] ?></td>
            <td><?php echo $result['pan_no'] ?></td>
            <td><?php echo $result['follow_up'] ?></td>
            <td><?php echo $result['next_follow'] ?></td>
            <td><a href="update3.php?id=<?php echo $result['inquiry_id'] ?>" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a><a  href="#" class="bnone delCustomer"  data-Iid="<?php echo $result['inquiry_id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
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
      let inquiryId=$(this).attr("data-Iid");
      if(confirm("Are you sure want to delete?")){
          $.ajax({
              url:'delete3.php',
              type:'POST',
              data:{inquiryId:inquiryId},
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
    $('.clstrCustomer').click(function(){
      $("#inquiryCompany").prop('disabled', false);
      $("#inquiryCompany").attr('required', true);
      $("#inquiryCompany").val($(this).attr("data-company") );
      $("#inquiryPerson").val($(this).attr("data-person"));
      $("#inquiryAddress").val($(this).attr("data-address"));
      $("#inquiryCemail").val($(this).attr("data-email"));
      $("#inquiryPhone").val($(this).attr("data-phone"));
      $("#inquiryPan").val($(this).attr("data-pan"));
      $("#inquiryId").val($(this).attr("data-id"));
      $("#exampleModal").modal('hide');
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
if(isset($_POST['save'])){
   $customer_id=$_POST['customer_id'];
    $companyname=$_POST['companyname'];
    $date=$_POST['date'];
    $miti=$_POST['miti'];
    $clientname=$_POST['clientname'];
    $address=$_POST['address'];
    $cemail=$_POST['cemail'];
    $cpemail=$_POST['cpemail'];
    $reference=$_POST['reference'];
    $software=$_POST['software'];
    $organization=$_POST['organization'];
    $phone=$_POST['phone'];
    $pan=$_POST['pan'];
    $follow=$_POST['follow'];
    $next=$_POST['nextfollow'];
    $feedback=$_POST['feedback'];
    $user=$_POST['inquiryName'];
    $pname=basename($_FILES["iattachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
    $tname=$_FILES["iattachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
   $upload_dir='attachment-inquiry/'.$pname;
   if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
   }else{
      echo "file not uploaded";
   }
    $selectquery="select * from inquiry where company_name='$companyname'";
    $query=mysqli_query($con, $selectquery); 
  
    if(mysqli_num_rows($query)>0){
        ?>
        <script>
              
           alert("Company name already exists");
           window.location.href="record3.php";
         
        </script>
<?php
    }else{
      $insertquery="INSERT INTO inquiry(customer_id,company_name,date,miti,client_name,address,company_email,person_email,reference_by,software_type,organization_type,phone,pan_no,follow_up,next_follow,feedback,attachment,user,entryDate) VALUES('$customer_id','$companyname','$date','$miti','$clientname','$address','$cemail','$cpemail','$reference','$software','$organization','$phone','$pan','$follow','$next','$feedback','$pname','$user',now())";
      $query1=mysqli_query($con,$insertquery);
      if($query1){?>
         <script>
              
              alert("Data inserted successfully");
         window.location.href="record3.php";
       
      </script>
        <?php
      }else{
        echo  mysqli_error($con);
      }
    ?>
  <?php
    
    }
}

?>
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
    <title>Support-Demo</title>
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
      <h2 class="text-center rounded-3">Add Demo</h2>
      <div class="demomain">
<form action="" method="POST" class="needs-validation demoform" enctype="multipart/form-data" novalidate>

<div class="row">
<div  class="col-4 mb-2">
        <label class="form-label">Date:</label>
        <input type="date" name="date" class="form-control" id="defaultdate" required>
    </div>
     <div class="col-4">
     <label class="form-label">Company Name:</label>
    <div  class="input-group mb-2">
        <input type="text" name="companyname" class="form-control special" id="demoCompany" placeholder="Enter Company Name" disabled>
        <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer" ></i>
    </div>

     </div>
 
    <div  class="col-4 mb-2">
        <label class="form-label" >Contact Person:</label>
        <input type="text" name="clientname" class="form-control special" id="demoClient" placeholder="Enter Name">
    </div>


</div>
   
<div class="row">

<div  class="col-4 mb-2">
        <label class="form-label" >Address:</label>
        <input type="text" name="address" class="form-control special1" id="demoAddress" placeholder="Enter Address" required>
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Phone:</label>
        <input type="text" name="phone" class="form-control special2" id="demoPhone" placeholder="Enter Phone">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Mobile:</label>
        <input type="text" name="mobile" class="form-control special3" id="demoMobile" placeholder="Enter Mobile" required>
    </div>

</div>

<div class="row">
<div  class="col-4 mb-2">
        <label class="form-label" >Email:</label>
        <input type="email" name="email" class="form-control" id="demoEmail" placeholder="Enter Email">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Pan No:</label>
        <input type="text" name="pan" class="form-control special4" id="demoPan" placeholder="Enter Pan">
    </div>

    <div  class="col-4 mb-2">
        <label class="form-label" >Feedback</label>
    <textarea name="feedback" class="form-control" cols="30" rows="3" id="demoFeedback" placeholder="Enter Feedback" required></textarea>
    </div>

</div>

  <div class="row">
    <div  class="col-4 mb-2">
        <label class="form-label" >Remark:</label>
        <textarea name="remark" class="form-control" cols="30" rows="3" id="demoRemark" placeholder="Enter remark" required></textarea>
    </div>
    <div  class="col-4 mb-2">
        <label class="form-label" >Attachment:</label>
        <input type="file" name="dattachment" class="form-control" id="demoAttachment">
    </div>
<input type="hidden" name="demoName" value="<?php echo $_SESSION['username']?>">
  </div>
    


   <div class="demobutton">
     <button  type="submit"  name="add">SUBMIT</button>
   </div>

</form>
</div>
      </div>
     
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
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
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Pan No.</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
                </thead>
              
                <tbody>

                  <?php 
           $con = dbConnection();
            $select="select * from customer";
            $query=mysqli_query($con, $select);
            $i=1;
            while( $result = mysqli_fetch_assoc($query)){
              ?>
           
             <tr  class="clstrDemo" data-company="<?php echo $result['company_name']?>" data-contact="<?php echo $result['contact_person']?>"    data-email="<?php echo $result['email']?>" data-pan="<?php echo $result['pan_no']?>" data-phone="<?php echo $result['phone_no']?>" data-address="<?php echo $result['address']?>" >
               
               <td><?php echo $i ?></td>
               <td><?php echo $result['company_name'] ?></td>
               <td><?php echo $result['contact_person'] ?></td>
               <td><?php echo $result['email'] ?></td>
               <td><?php echo $result['pan_no'] ?></td>
               <td><?php echo $result['phone_no'] ?></td>
               <td><?php echo $result['address'] ?></td>
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
               <!-- <button type="button" class="btn btn-primary">Ok</button> -->
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
             </div>
          </div>
        </div>
    </div>



<div class="mx-4 heading">
  <h2>Demo Information</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mx-2 btnAdd" >
  ADD
</button>
</div>
  <div class="mx-4" data-aos="zoom-in-up">
    
   <table class="display">
    <thead>
    <tr>
             <th>SN</th> 
            <th>Date</th>
            <th>Company Name</th>
            <th>Client Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Pan No</th>
            <th>Feedback</th>
            <th>Remark</th>
            <th>Action</th>
           
        </tr>
    </thead>
      
<tbody>
  <?php 

        $con = dbConnection();
        $select="select * from demo order by date desc";
        $query=mysqli_query($con, $select);
        $i=1;
        while( $result = mysqli_fetch_assoc($query)){
          ?>

<tr>
          <td><?php echo $i ?></td>
          <td><?php echo $result['date'] ?></td>
          <td><?php echo $result['company_name'] ?></td>
          <td><?php echo $result['client_name'] ?></td>
          <td><?php echo $result['address'] ?></td>
          <td><?php echo $result['phone'] ?></td>
          <td><?php echo $result['mobile'] ?></td>
          <td><?php echo $result['email'] ?></td>
          <td><?php echo $result['pan_no'] ?></td>
          <td><?php echo $result['feedback'] ?></td>
          <td><?php echo $result['remarks'] ?></td>
          <td><a href="update4.php?id=<?php echo $result['id'] ?>" type="submit" class="bnone"><i class="fa-solid fa-pen-to-square"></i></a>
          <a href="#" data-demoId="<?php echo $result['id'] ?>" class="bnone delCustomer"><i class="fa-solid fa-trash" ></i></a></td>
          
        </tr>
        <?php
        $i++;
        }
        ?>
</tbody>
</table>

</div>
<script>
 AOS.init()
 
 $(document).on('click','.delCustomer',function(){
     let demoId=$(this).attr('data-demoId');
     if(confirm("Are you sure want to delete?")){
         $.ajax({
             url:'delete4.php',
             method:'POST',
             data:{demoId:demoId},
             success:function(data){
                 let da=JSON.parse(data);
                 if(da.status_code==200){
                     alert("Deleted");
                     location.reload();
                 }else if(da.status_code==404){
                     alert("Cannot delete parent row.");
                 }
             }
             
         })
     }
 })
 
$(document).ready(function(){
     $(".display").DataTable({
    //     sorting: false,
    // ordering: false,
    scrollY: 450,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    
    // searching: false,
    dom: "Bfrtip",
  });
    
 $('.clstrDemo').click(function(){
 $("#demoCompany").prop('disabled', false);
 $("#demoCompany").attr('required', true);
 $("#demoCompany").val($(this).attr("data-company") );
 $("#demoClient").val($(this).attr("data-contact"));
 $("#demoEmail").val($(this).attr("data-email"));
 $("#demoPan").val($(this).attr("data-pan"));
 $("#demoPhone").val($(this).attr("data-phone"));
 $("#demoAddress").val($(this).attr("data-address"));
 $("#exampleModal").modal('hide');
     });
    });
  </script>
   <script src="script.js"></script>
</body>
</html>




<?php 
$con = dbConnection();

if(isset($_POST['add'])){
    $date=$_POST['date'];
    $companyname=$_POST['companyname'];
    $selectCid="select * from customer where company_name='$companyname'";
              $passCid=mysqli_query($con,$selectCid);
              $fetchCid=mysqli_fetch_assoc($passCid);
              $customerId=$fetchCid['customer_id'];
    $clientname=$_POST['clientname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $pan=$_POST['pan'];
    $feedback=$_POST['feedback'];
    $remark=$_POST['remark'];
     $pname=basename($_FILES["dattachment"]["name"]); //echo "<br> file name: ".$pname."<br>";
    $tname=$_FILES["dattachment"]["tmp_name"];// echo "temp_name : ".$tname."<br>";
   $upload_dir='attachment-demo/'.$pname;
   if(move_uploaded_file($tname,$upload_dir)){
      echo "file Uploaded";
   }else{
      echo "file not uploaded";
   }
    $user=$_POST['demoName'];   
    $insertquery="INSERT INTO demo(customerId,date,company_name,client_name,address, phone, mobile, email, pan_no,feedback,remarks,attachment,user,entryDate) VALUES('$customerId','$date','$companyname','$clientname','$address','$phone','$mobile','$email','$pan','$feedback','$remark','$pname','$user',now())";
    $query=mysqli_query($con,$insertquery);
    if($query){
        ?>
        <script>
              
                alert("Data inserted successfully");
           window.location.href="record4.php";
         
        </script>
<?php
    }else{
      echo $insertquery;
    ?>
  <?php
    
    }
}

?>
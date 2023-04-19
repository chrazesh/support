<?php
include 'dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet€" href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css”>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/nepali.datepicker.v4.0.min.css">
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type=’text/javascript’ src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js”></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> 
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css"> 
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
        <a class="nav-link text-light" href="record3.php">Inquiry</a>
        <a class="nav-link text-dark" href="record1.php">Installation Information</a>
        <a class="nav-link text-dark" href="report.php">Report</a>
        <a class="nav-link text-dark" href="record2.php">Support</a>
        <a class="nav-link text-dark" href="record4.php">Demo</a>
          <a class="nav-link text-dark" href="index.php" style="margin-left:762px">Logout</a>

    
      </div>
    </div>
  </div>
</nav>

     

    <!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <table class="display" style="width:100%">
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
                 $select="select * from customer";
                 $query=mysqli_query($con, $select);
                 $i=1;
                 while( $result = mysqli_fetch_assoc($query)){
                   ?>
                   <tr class="clstrCustomer" data-company="<?php echo $result['company_name']?>" data-person="<?php echo $result['contact_person']?>" data-phone="<?php echo $result['phone_no']?>" data-mobile="<?php echo $result['mobile']?>" data-email="<?php echo $result['email']?>" data-pan="<?php echo $result['pan_no']?>" data-address="<?php echo $result['address']?>" >       
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
  </div>
</div>






<div class="inquirymain">
    <form action=""  method="POST" class="row needs-validation inquiryform" novalidate>

  <div class="row">
  <div class="col-4">
      <label for="exampleFormControlTextarea1" class="form-label">Company Name:</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="companyname"  id="inquiryCompany" placeholder="Enter Company name"  required>
      <i class="fa-solid fa-magnifying-glass input-group-text btnSearchCustomer"></i>
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
    <input type="text" class="form-control special" name="clientname"  id="inquiryPerson"  placeholder="Enter Client Name"  required>
   </div>

   <div class="col-4 mb-2">
    <label for="exampleFormControlInput1" class="form-label">Address:</label>
    <input type="text" class="form-control special1" name="address" id="inquiryAddress" placeholder="Enter Adddress"  required>
   </div>
 
   <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Company Email:</label>
    <input type="email" class="form-control" name="cemail"  id="inquiryCemail" placeholder="Enter Company Email"  required>
  </div>
</div>

<div class="row">
<div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Contact Person Email:</label>
    <input type="email" class="form-control" name="cpemail"  id="inquiryPemail" placeholder="Enter Contact Person Email"  required>
  </div>
  <div class="col-4 mb-2">
  <label for="exampleFormControlInput1" class="form-label">Reference By:</label>
  <input type="text" class="form-control special" name="reference"  id="inquiryReference" placeholder="Enter Reference By"  required>
</div>


<div class="col-4 mb-2">
   <label for="exampleFormControlInput1" class="form-label">Software Type:</label>
   <input type="text" class="form-control special" name="software" id="inquirySoftware"  placeholder="Enter Software Type"  required>
  </div>
</div>


 <div class="row">

 <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Organization Type:</label>
    <input type="text" class="form-control special" name="organization" id="inquiryOrganization" placeholder="Enter Interseted project"  required>
  </div>
  <div class="col-4 mb-2">
   <label for="exampleFormControlTextarea1" class="form-label">Phone:</label>
   <input type="number" class="form-control" name="phone"  id="inquiryPhone" placeholder="Enter Phone"  required>
  </div>

 
  <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Pan No:</label>
    <input type="number" class="form-control" name="pan"  id="inquiryPan" placeholder="Enter Pan"  required>
  </div>
 </div>
  

 
 <div class="row">
 <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Follow Up By:</label>
      <input type="text" class="form-control special" name="follow" id="inquiryFollow" placeholder="Enter Refer To"  required>
   </div>
   <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Next Follow Update:</label>
      <input type="text" class="form-control special" name="nextfollow" id="inquiryNext" placeholder="Enter Refer To"  required>
   </div>

<div class="col-4 mb-2">
  <label for="exampleFormControlTextarea1" class="form-label">Feedback:</label>
  <textarea class="form-control" name="feedback"  id="inquiryFeedback" rows="3" placeholder="Enter Feedback"  required></textarea>
</div>
 </div>

    <div class="inquirybutton">
     <button type="submit" name="save">SUBMIT</button>
   
    </div>

    </form>
</div>
<script>
  
 $(document).ready(function() {
    $(".btnSearchCustomer").click(function () {
    $(".bd-example-modal-lg").modal("show");
  });
  });


</script>


<script src="js/nepali.datepicker.v4.0.min.js"></script>
<script src="script1.js"></script>


</body>
</html>



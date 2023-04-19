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
  <title>Support</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css"> 
  
</head>   

<body>
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="curmonthinstallation.php">globalTech</a>
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
         <a class="nav-link text-dark" href="client-issue.php">Client-Issue</a> 
        <a class="nav-link text-dark" href="payment.php">Payment</a>
        <a class="nav-link text-dark" href="logout.php" style="margin-left:762px"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

    
      </div>
    </div>
  </div>
</nav>
<div class="m-3">
<div class="row" data-aos="zoom-in-up">
<div  class="col-6" >
  <h2 class="text-center">Current Month Installation Lists</h2>
  
  <div class="col-12" style="overflow-x:scroll;">
  
    
    <table class="display">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>Client Name</th>
          <th>Installation Date</th>
          <th>No. of Users</th>
          <th>Type</th>
          <th>Referenced By</th>
        </tr>
      </thead>
      
      <tbody>
        <?php
         $con = dbConnection();
         $selectquery="select * from installation where month(installation_date)=month(now()) and year(installation_date)=year(now())";
         $query=mysqli_query($con,$selectquery);
         $i=1;
         while($result=mysqli_fetch_assoc($query)){
           ?>
           
           <tr >
            <td><?php echo $i ?></td>
             <td><?php echo $result['client_name'] ?></td>
             <td><?php echo $result['installation_date'] ?></td>
             <td><?php echo $result['no_of_users'] ?></td>
             <td><?php echo $result['type'] ?></td>
             <td><?php echo $result['referenced_by'] ?></td>
          </tr>
          <?php 
        $i++;
      }
      ?>
   
      </tbody>
     </table> 
   
   
</div>
</div>

<div  class="col-6" >
<h2  class="text-center">Current Month Expiry Lists</h2>

<div class="col-12" style="overflow-x:scroll;">

  <table class="display">
    <thead>
    <tr>
          <th>S.No.</th>
          <th>Client Name</th>
          <th>No of Users</th>
          <th>Type</th>
          <th>Exp Date</th>
          <th>Referenced By</th>
        </tr>
    </thead>
   
      <tbody>
      <?php
       $con = dbConnection();
         $selectquery="select * from installation where month(exp_date)=month(now()) and year(exp_date)=year(now()) order by exp_date desc";
         $query=mysqli_query($con,$selectquery);
         $i=1;
         while($result=mysqli_fetch_assoc($query)){
           ?>
            <tr>
            <td><?php echo $i ?></td>
             <td><?php echo $result['client_name'] ?></td>
             <td><?php echo $result['no_of_users'] ?></td>
             <td><?php echo $result['type'] ?></td>
             <td><?php echo $result['exp_date'] ?></td>
             <td><?php echo $result['referenced_by'] ?></td>
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
 <div class="row mt-3">
 <div  class="col-6" >
   <h2  class="text-center">Pending Supports</h2>
   <div class="col-12"style="overflow-x:scroll;">
   <table class="display">
     <thead>
     <tr>
        <th>S.No.</th>
        <th>Company Name</th>
        <th>Call By</th>
        <th>Support Staff</th>
        <th>Issue</th>
        <th>Status</th>
     </tr>
     </thead>

     <tbody>
     <?php
       $con = dbConnection();
       $selectquery="select * from support where status='open'";
       $query=mysqli_query($con,$selectquery);
       $i=1;
       while($result=mysqli_fetch_assoc($query)){
     ?>
        <tr>
           <td><?php echo $i ?></td>
           <td><?php echo $result['company_name'] ?></td>
           <td><?php echo $result['call_by'] ?></td>
           <td><?php echo $result['support_staff'] ?></td>
           <td><?php echo $result['issue'] ?></td>
           <td><?php echo $result['status'] ?></td>
        </tr>
      <?php 
      $i++;
         }
       ?>
       </tbody>
    </table>
   </div>
</div>

<div  class="col-6" >
   <h2  class="text-center">Marketing</h2>
    <div class="col-12" style="overflow-x:scroll;">
     <table class="display">
       <thead>
       <tr>
          <th>S.No.</th>
          <th>Company Name</th>
          <th>address</th>
          <th>Software Type</th>
          <th>Organization Type</th>
          <th>Follow up By</th>
        </tr>
       </thead>

       <tbody>
       <?php
       $con = dbConnection();
         $selectquery="select * from inquiry";
         $query=mysqli_query($con,$selectquery);
         $i=1;
         while($result=mysqli_fetch_assoc($query)){
       ?>
          <tr>
             <td><?php echo $i ?></td>
             <td><?php echo $result['company_name'] ?></td>
             <td><?php echo $result['address'] ?></td>
             <td><?php echo $result['software_type'] ?></td>
             <td><?php echo $result['organization_type'] ?></td>
             <td><?php echo $result['follow_up'] ?></td>
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
</div>
<script>
  AOS.init();
  $(document).ready(function () {
  $(".display").DataTable({
    //     sorting: false,
    ordering: false,
    scrollY: 350,   
    // scrollX: true,  
    paging: false,
    // order:[[5,'desc']],
    
    // searching: false,
    dom: "Bfrtip",
  });
});

</script>
<script src="script.js"></script>
</body>
</html>
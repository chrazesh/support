<?php 
include 'dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Report</title>
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
        <a class="nav-link text-dark" href="record3.php">Inquiry</a>
        <a class="nav-link text-dark" href="record4.php">Demo</a>
        <a class="nav-link text-dark" href="record1.php">Installation Information</a>
        <div class="dropdown bg-success">
          <button class="btn btn-success dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Report</button>
            <ul class="dropdown-menu dropdown-menu-dark ">
            <li><a class="dropdown-item" href="currentinstallation.php">Current Month Installation</a></li>
             <li><a class="dropdown-item" href="currentexpiry.php">Current Month Expiry</a></li>
            </ul>
        </div>
        <!-- <a class="nav-link text-light" href="report.php">Report</a> -->
        <a class="nav-link text-dark" href="record2.php">Support</a>
          <a class="nav-link text-dark" href="index.php" style="margin-left:762px">Logout</a>

    
      </div>
    </div>
  </div>
</nav>
<div class="row m-3 bg ">
<div class="col-6">
<h2 class="text-center">Current Month Installation Lists</h2> 
<table class="display">
  <thead>
  <tr>
       <th>Client Name</th>
       <th>Installation Date</th>
       <th>No of Users</th>
       <th>Type</th>
       <th>Exp Date</th>
       <th>Referenced By</th>
   </tr>
  </thead>
       
    <tbody>
      <?php 
$con = dbConnection();
$select="select * from installation order by exp_date";
$query=mysqli_query($con, $select);
while( $result = mysqli_fetch_assoc($query)){
  ?>
 <tr>
  
     <td><?php echo $result['client_name'] ?></td>
     <td><?php echo $result['installation_date'] ?></td>
     <td><?php echo $result['no_of_users'] ?></td>
     <td><?php echo $result['type'] ?></td>
     <td><?php echo $result['exp_date'] ?></td>
     <td><?php echo $result['referenced_by'] ?></td>
 </tr>
     <?php
        }
        ?>
        </tbody>
    </table>
  </div>

  <div class="col-6 ">
    <h2 class="text-center">Current Month Expiry Lists</h2> 
<table class="display">
  <thead>

    <tr>
      
      <th>Client Name</th>
      <th>Installation Date</th>
      <th>No of Users</th>
      <th>Type</th>
      <th>Exp Date</th>
      <th>Referenced By</th>
      
    </tr>
  </thead>
  <tbody>

    
    <?php 

$con = dbConnection();
$select="select * from installation order by installation_date desc";
$query=mysqli_query($con, $select);

while( $result = mysqli_fetch_assoc($query)){
  ?>

<tr>
  
  <td><?php echo $result['client_name'] ?></td>
  <td><?php echo $result['installation_date'] ?></td>
  <td><?php echo $result['no_of_users'] ?></td>
  <td><?php echo $result['type'] ?></td>
  <td><?php echo $result['exp_date'] ?></td>
  <td><?php echo $result['referenced_by'] ?></td>
</tr>
<?php
        }
        ?>
        </tbody>
    </table>
</div>
  
</div>

<script src="script.js"></script>

   
</body>
</html>
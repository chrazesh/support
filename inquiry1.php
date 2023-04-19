<?php
include 'dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet€" href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css”>
  <link rel="stylesheet" href="css/nepali.datepicker.v4.0.min.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
  <script type=’text/javascript’ src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js”></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">

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

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog">
              <div class="modal-content">
             <div class="modal-header">
             <h1 class="modal-title fs-5" id="exampleModalLabel">Lists of Companies</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped text-center">
                    <tr>
                    <th>SN</th>
                    <th>Company Name</th>
                    <th>Pan No.</th>
                    <th>Phone</th>
                    <th>Address</th>
                    </tr>
                <?php 

$con = dbConnection();
$select="select * from inquiry";
$query=mysqli_query($con, $select); 
$i=1;
while( $result = mysqli_fetch_assoc($query)){
    ?>
<tr>
<td><?php echo $i ?></td>
<?php
 

?> 
                <td><a href="inquiry1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['company_name'] ?> </a></td>
                <td><a href="inquiry1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['pan_no'] ?> </a></td>
                <td><a href="inquiry1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['phone'] ?> </a></td>
                <td><a href="inquiry1.php?id=<?php echo $result['id'] ?>" style="text-decoration:none;color:black;"><?php echo $result['address'] ?> </a></td>
</tr>


 <?php
 $i++;
 }
 
?> 
                </table>
            </div>
          <div class="modal-footer">
              <!-- <button type="button" class="btn btn-primary">Ok</button> -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
         </div>
        </div>
      </div>


<div class="inquirymain">
    <form action=""  method="POST" class="row needs-validation inquiryform" novalidate>


    <?php 
$con = dbConnection();
$id=$_GET['id'];
$select="select * from inquiry where id='$id'";
$query=mysqli_query($con,$select);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['save'])){
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
  $insertquery="INSERT INTO inquiry(company_name,date,miti,client_name,address,company_email,person_email,reference_by,software_type,organization_type,phone,pan_no,follow_up,next_follow,feedback) VALUES('$companyname','$date','$miti','$clientname','$address','$cemail','$cpemail','$reference','$software','$organization','$phone','$pan','$follow','$next','$feedback')";
  $query=mysqli_query($con,$insertquery);
    if($query){
        ?>
        <script>
              
                alert("Data inserted successfully");
           window.location.href="record3.php";
         
        </script>
<?php
    }else{
      echo $insertquery;
    ?>
  <?php
    
    }
}

?>

<div class="col-4">
      <label for="exampleFormControlTextarea1" class="form-label">Company Name:</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="companyname"  id="exampleFormControlInput1" placeholder="Enter Company name" value="<?php echo $result['company_name'] ?>" required>
      <i class="fa-solid fa-magnifying-glass input-group-text" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
    </div>
  </div>

    <div class="col-4 mb-3">
      <label for="exampleFormControlInput1" class="form-label">Date:</label>
      <input type="text" class="form-control" name="date" id="defaultdate" value="<?php echo $result['date'] ?>" required>
    </div>

   <div class="col-4 mb-3">
     <label for="exampleFormControlTextarea1" class="form-label ">Miti:</label>
     <input type="text" class="form-control" name="miti"   id="miti" placeholder="Enter Miti" value="<?php echo $result['miti'] ?>" required>
   </div>


<div class="col-4 mb-2">
    <label for="exampleFormControlInput1" class="form-label">Contact Person:</label>
    <input type="text" class="form-control" name="clientname"  id="exampleFormControlInput1" placeholder="Enter Client Name" value="<?php echo $result['client_name'] ?>"  required>
   </div>

   <div class="col-4 mb-2">
    <label for="exampleFormControlInput1" class="form-label">Address:</label>
    <input type="text" class="form-control" name="address"  id="exampleFormControlInput1" placeholder="Enter Adddress" value="<?php echo $result['address'] ?>"  required>
   </div>
 
   <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Company Email:</label>
    <input type="email" class="form-control" name="cemail"  id="exampleFormControlInput1" placeholder="Enter Company Email" value="<?php echo $result['company_email'] ?>"  required>
  </div>

  <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Contact Person Email:</label>
    <input type="email" class="form-control" name="cpemail"  id="exampleFormControlInput1" placeholder="Enter Contact Person Email" value="<?php echo $result['person_email'] ?>"  required>
  </div>
  <div class="col-4 mb-2">
  <label for="exampleFormControlInput1" class="form-label">Reference By:</label>
  <input type="text" class="form-control" name="reference"  id="exampleFormControlInput1" placeholder="Enter Reference By" value="<?php echo $result['reference_by'] ?>"  required>
</div>


<div class="col-4 mb-2">
   <label for="exampleFormControlInput1" class="form-label">Software Type:</label>
   <input type="text" class="form-control" name="software"  id="exampleFormControlInput1" placeholder="Enter Software Type" value="<?php echo $result['software_type'] ?>" required>
  </div>
  
<div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Organization Type:</label>
    <input type="text" class="form-control" name="organization"  id="exampleFormControlInput1" placeholder="Enter Interseted project" value="<?php echo $result['organization_type'] ?>"  required>
  </div>
  <div class="col-4 mb-2">
   <label for="exampleFormControlTextarea1" class="form-label">Phone:</label>
   <input type="number" class="form-control" name="phone"  id="exampleFormControlInput1" placeholder="Enter Phone" value="<?php echo $result['phone'] ?>" required>
  </div>

 
  <div class="col-4 mb-2">
    <label for="exampleFormControlTextarea1" class="form-label">Pan No:</label>
    <input type="number" class="form-control" name="pan"  id="exampleFormControlInput1" placeholder="Enter Pan" value="<?php echo $result['pan_no'] ?>" required>
  </div>
 
 

  <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Follow Up By:</label>
      <input type="text" class="form-control" name="follow"  id="exampleFormControlInput1" placeholder="Enter Refer To" value="<?php echo $result['follow_up'] ?>" required>
   </div>
   <div class="col-4">
      <label for="exampleFormControlInput1" class="form-label">Next Follow Update:</label>
      <input type="text" class="form-control" name="nextfollow"  id="exampleFormControlInput1" placeholder="Enter Refer To" value="<?php echo $result['next_follow'] ?>"  required>
   </div>

<div class="col-4 mb-2">
  <label for="exampleFormControlTextarea1" class="form-label">Feedback:</label>
  <textarea class="form-control" name="feedback"  id="exampleFormControlTextarea1" rows="3" placeholder="Enter Feedback" required><?php echo $result['feedback'] ?></textarea>
</div>

    <div class="inquirybutton">
     <button type="submit" name="save">SUBMIT</button>
     <!-- <a href="record3.php"><i class="fa-regular fa-eye"></i>VIEW</a> -->
    </div>
   

    </form>
</div>

<script src="js/nepali.datepicker.v4.0.min.js"></script>
<script src="script.js"></script>
                          

</body>
</html>


